<?php
$page_title = "Backup Database";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Function to create database backup
function backup_database($host, $user, $pass, $name, $tables = '*') {
    $connection = new mysqli($host, $user, $pass, $name);
    if ($connection->connect_error) {
        return "Database connection failed: " . $connection->connect_error;
    }
    
    // Get all tables if none specified
    if ($tables == '*') {
        $tables = [];
        $result = $connection->query("SHOW TABLES");
        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }
    
    // Generate backup file content
    $output = "-- PHP MySQL Backup\n";
    $output .= "-- Generated: " . date('Y-m-d H:i:s') . "\n";
    $output .= "-- Host: " . $host . "\n";
    $output .= "-- Database: " . $name . "\n";
    $output .= "-- --------------------------------------------------------\n\n";
    
    // Add table structure and data for each table
    foreach ($tables as $table) {
        // Get table structure
        $result = $connection->query("SHOW CREATE TABLE `$table`");
        $row = $result->fetch_row();
        
        $output .= "\n\n" . $row[1] . ";\n\n";
        
        // Get table data
        $result = $connection->query("SELECT * FROM `$table`");
        
        if ($result->num_rows > 0) {
            // Get column count
            $fields_count = $result->field_count;
            
            while ($row = $result->fetch_row()) {
                $output .= "INSERT INTO `$table` VALUES(";
                
                for ($i = 0; $i < $fields_count; $i++) {
                    if ($row[$i] === null) {
                        $output .= "NULL";
                    } elseif (is_numeric($row[$i])) {
                        $output .= $row[$i];
                    } else {
                        $row[$i] = str_replace("\n", "\\n", addslashes($row[$i]));
                        $output .= "'" . $row[$i] . "'";
                    }
                    
                    if ($i < ($fields_count - 1)) {
                        $output .= ", ";
                    }
                }
                
                $output .= ");\n";
            }
        }
        
        $output .= "\n\n";
    }
    
    $connection->close();
    
    return $output;
}

// Process backup request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['backup'])) {
    try {
        $backup_dir = '../backups/';
        
        // Create backup directory if it doesn't exist
        if (!file_exists($backup_dir)) {
            mkdir($backup_dir, 0777, true);
        }
        
        // Create .htaccess file to protect backups
        $htaccess_file = $backup_dir . '.htaccess';
        if (!file_exists($htaccess_file)) {
            file_put_contents($htaccess_file, "Order deny,allow\nDeny from all");
        }
        
        // Generate backup filename
        $backup_file = $backup_dir . 'kalpavriksha_db_' . date('Y-m-d_H-i-s') . '.sql';
        
        // Generate backup content
        $backup_content = backup_database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if (strpos($backup_content, 'Database connection failed') !== false) {
            $error_message = $backup_content;
        } else {
            // Save backup file
            if (file_put_contents($backup_file, $backup_content)) {
                $success_message = "Database backup created successfully!";
                
                // Send backup file to browser for download
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($backup_file) . '"');
                header('Content-Length: ' . filesize($backup_file));
                readfile($backup_file);
                exit;
            } else {
                $error_message = "Failed to save backup file.";
            }
        }
    } catch (Exception $e) {
        $error_message = "Error: " . $e->getMessage();
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
?>

<div class="content-card">
    <h2><i class="fas fa-database"></i> Database Backup</h2>
    <p>Create a backup of your website's database to protect your data.</p>
    
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
    
    <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
        <h3 style="margin-top: 0; color: #48825d;"><i class="fas fa-download"></i> Create New Backup</h3>
        <p>This will create a complete backup of your database and download it to your computer.</p>
        
        <form method="POST" action="">
            <button type="submit" name="backup" value="1" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease; margin-top: 10px;">
                <i class="fas fa-download"></i> Create & Download Backup
            </button>
        </form>
    </div>
    
    <?php if (!empty($backups)): ?>
    <div style="margin-top: 30px;">
        <h3><i class="fas fa-history"></i> Backup History</h3>
        <p>These backups are stored on the server. Click on a backup file to download it.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr>
                    <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Filename</th>
                    <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Date</th>
                    <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Size</th>
                    <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($backups as $backup): ?>
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($backup['filename']); ?></td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;"><?php echo date('Y-m-d H:i:s', $backup['date']); ?></td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;"><?php echo round($backup['size'] / 1024, 2); ?> KB</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        <a href="download-backup.php?file=<?php echo urlencode($backup['filename']); ?>" style="color: #48825d; margin-right: 10px;" title="Download">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="restore-database.php?file=<?php echo urlencode($backup['filename']); ?>" style="color: #ffc107; margin-right: 10px;" title="Restore">
                            <i class="fas fa-undo"></i>
                        </a>
                        <a href="delete-backup.php?file=<?php echo urlencode($backup['filename']); ?>" style="color: #dc3545;" title="Delete" onclick="return confirm('Are you sure you want to delete this backup?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    
    <div style="margin-top: 20px;">
        <a href="settings.php" style="display: inline-block; background: #6c757d; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Back to Settings
        </a>
    </div>
</div>

<div style="background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; margin-top: 20px;">
    <h3 style="color: #48825d;"><i class="fas fa-info-circle"></i> Database Backup Tips</h3>
    <ul style="margin-top: 15px; margin-left: 20px;">
        <li>Regularly backup your database, especially before making major changes to your website.</li>
        <li>Keep copies of your backups in multiple locations (local computer, cloud storage, etc.).</li>
        <li>Label your backups with descriptive names to easily identify their contents.</li>
        <li>Test your backups periodically to ensure they can be successfully restored.</li>
        <li>Consider automating backups with a scheduled task or service.</li>
    </ul>
</div>

<?php include '../includes/admin-footer.php'; ?>