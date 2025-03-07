<?php
$page_title = "Restore Database";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';
$warning_shown = false;

// Function to restore database from SQL file
function restore_database($host, $user, $pass, $name, $sql_file) {
    try {
        // Connect to database
        $connection = new mysqli($host, $user, $pass, $name);
        if ($connection->connect_error) {
            return "Database connection failed: " . $connection->connect_error;
        }
        
        // Read SQL file content
        $sql_content = file_get_contents($sql_file);
        if (!$sql_content) {
            return "Failed to read SQL file.";
        }
        
        // Split SQL file into separate queries
        $queries = explode(';', $sql_content);
        
        // Execute each query
        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                if (!$connection->query($query)) {
                    return "Error executing SQL query: " . $connection->error;
                }
            }
        }
        
        $connection->close();
        return true;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

// Process file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['restore'])) {
    // Check if confirmation is checked
    if (!isset($_POST['confirm_restore']) || $_POST['confirm_restore'] != '1') {
        $error_message = "You must confirm that you understand the risks of database restoration.";
    } else {
        // From existing backup file
        if (isset($_POST['backup_file']) && !empty($_POST['backup_file'])) {
            $backup_file = '../backups/' . basename($_POST['backup_file']);
            
            if (file_exists($backup_file) && pathinfo($backup_file, PATHINFO_EXTENSION) == 'sql') {
                $result = restore_database(DB_HOST, DB_USER, DB_PASS, DB_NAME, $backup_file);
                
                if ($result === true) {
                    $success_message = "Database restored successfully from " . basename($backup_file) . "!";
                } else {
                    $error_message = $result;
                }
            } else {
                $error_message = "Invalid backup file.";
            }
        }
        // From uploaded file
        elseif (isset($_FILES['sql_file']) && $_FILES['sql_file']['error'] == 0) {
            $uploaded_file = $_FILES['sql_file']['tmp_name'];
            $file_extension = pathinfo($_FILES['sql_file']['name'], PATHINFO_EXTENSION);
            
            if ($file_extension != 'sql') {
                $error_message = "Only SQL files are allowed.";
            } else {
                $result = restore_database(DB_HOST, DB_USER, DB_PASS, DB_NAME, $uploaded_file);
                
                if ($result === true) {
                    $success_message = "Database restored successfully from uploaded file!";
                } else {
                    $error_message = $result;
                }
            }
        } else {
            $error_message = "No backup file selected or uploaded.";
        }
    }
}

// Get all existing backups
$backups = [];
$backup_dir = '../backups/';
if (file_exists($backup_dir)) {
    $files = scandir($backup_dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..' && $file != '.htaccess' && pathinfo($file, PATHINFO_EXTENSION) == 'sql') {
            $backups[] = [
                'filename' => $file,
                'date' => filemtime($backup_dir . $file),
                'size' => filesize($backup_dir . $file)
            ];
        }
    }
    
    // Sort backups by date (newest first)
    usort($backups, function($a, $b) {
        return $b['date'] - $a['date'];
    });
}

// If a specific file is selected from backup-database.php
$selected_file = isset($_GET['file']) ? $_GET['file'] : '';
if (!empty($selected_file)) {
    $warning_shown = true;
}
?>

<div class="content-card">
    <h2><i class="fas fa-undo-alt"></i> Restore Database</h2>
    <p>Restore your website's database from a backup file.</p>
    
    <?php if (!empty($error_message)): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <?php echo $error_message; ?>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($success_message)): ?>
    <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <?php echo $success_message; ?>
    </div>
    <?php endif; ?>
    
    <?php if (!$warning_shown): ?>
    <div style="background: #fff3cd; color: #856404; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <h3 style="margin-top: 0;"><i class="fas fa-exclamation-triangle"></i> Warning</h3>
        <p>Restoring a database will <strong>overwrite all current data</strong> with the data from the backup file. This action cannot be undone.</p>
        <p>It is recommended to <a href="backup-database.php" style="color: #856404; text-decoration: underline;">create a backup</a> of your current database before proceeding.</p>
    </div>
    <?php endif; ?>
    
    <form method="POST" action="" enctype="multipart/form-data">
        <div style="margin-bottom: 30px;">
            <?php if (!empty($backups)): ?>
            <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
                <h3 style="margin-top: 0; color: #48825d;"><i class="fas fa-history"></i> Restore from Existing Backup</h3>
                <div style="margin-bottom: 20px;">
                    <label for="backup_file" style="display: block; margin-bottom: 8px; font-weight: bold;">Select Backup File</label>
                    <select id="backup_file" name="backup_file" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                        <option value="">-- Select a backup file --</option>
                        <?php foreach ($backups as $backup): ?>
                            <option value="<?php echo htmlspecialchars($backup['filename']); ?>" <?php echo ($selected_file == $backup['filename']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($backup['filename']) . ' - ' . date('Y-m-d H:i:s', $backup['date']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            
            <div style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
                <h3 style="margin-top: 0; color: #48825d;"><i class="fas fa-upload"></i> Restore from Upload</h3>
                <div style="margin-bottom: 20px;">
                    <label for="sql_file" style="display: block; margin-bottom: 8px; font-weight: bold;">Upload SQL Backup File</label>
                    <input type="file" id="sql_file" name="sql_file" accept=".sql" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 5px;">Only .sql files are allowed.</small>
                </div>
            </div>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" id="confirm_restore" name="confirm_restore" value="1" style="margin-right: 10px;">
                I understand that restoring a database will overwrite all current data and this action cannot be undone.
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" name="restore" value="1" style="background: #ffc107; color: #212529; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease; font-weight: bold;">
                <i class="fas fa-undo"></i> Restore Database
            </button>
            <a href="settings.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center;">
                <i class="fas fa-arrow-left"></i> Back to Settings
            </a>
        </div>
    </form>
</div>

<div style="background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; margin-top: 20px;">
    <h3 style="color: #48825d;"><i class="fas fa-info-circle"></i> Database Restore Tips</h3>
    <ul style="margin-top: 15px; margin-left: 20px;">
        <li>Always create a backup of your current database before restoring from a previous backup.</li>
        <li>Ensure that the backup file you're restoring from is from the same version of your website.</li>
        <li>After restoration, check your website thoroughly to ensure everything is working correctly.</li>
        <li>If you encounter issues after restoration, you may need to log out and log back in to the admin panel.</li>
        <li>For large databases, the restoration process may take some time. Please be patient.</li>
    </ul>
</div>

<?php include '../includes/admin-footer.php'; ?>