<?php
$page_title = "Clear Cache";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Simple function to recursively delete files and directories
function delete_directory_contents($dir) {
    if (!is_dir($dir)) {
        return;
    }
    
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..' || $file === '.htaccess') {
            continue;
        }
        
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            delete_directory_contents($path);
            rmdir($path);
        } else {
            unlink($path);
        }
    }
}

// Process cache clearing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $cache_dir = '../cache/';
        
        // Create cache directory if it doesn't exist (for future use)
        if (!file_exists($cache_dir)) {
            mkdir($cache_dir, 0777, true);
        }
        
        // Delete all files in the cache directory
        delete_directory_contents($cache_dir);
        
        // Clear PHP opcode cache if available
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
        
        // Clear any session cache
        $_SESSION['cache_cleared'] = time();
        
        $success_message = "Cache cleared successfully!";
    } catch (Exception $e) {
        $error_message = "Error clearing cache: " . $e->getMessage();
    }
}
?>

<div class="content-card">
    <h2><i class="fas fa-sync-alt"></i> Clear Cache</h2>
    <p>Clear your website's cache to refresh content and fix display issues.</p>
    
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
        <h3 style="margin-top: 0; color: #48825d;"><i class="fas fa-sync-alt"></i> Cache Management</h3>
        <p>Clearing the cache will delete temporary files and refresh your website's content. This can help fix issues such as:</p>
        <ul style="margin-left: 20px; margin-bottom: 20px;">
            <li>Outdated content being displayed</li>
            <li>Missing images or styles</li>
            <li>Layout or formatting problems</li>
            <li>Recent changes not appearing</li>
        </ul>
        
        <form method="POST" action="">
            <button type="submit" style="background: #dc3545; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease; margin-top: 10px; font-weight: bold;">
                <i class="fas fa-trash"></i> Clear Website Cache
            </button>
        </form>
    </div>
    
    <div style="margin-top: 20px;">
        <a href="settings.php" style="display: inline-block; background: #6c757d; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Back to Settings
        </a>
    </div>
</div>

<div style="background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; margin-top: 20px;">
    <h3 style="color: #48825d;"><i class="fas fa-info-circle"></i> About Website Caching</h3>
    <p style="margin-bottom: 15px;">Website caching is a process where temporary files are stored to help websites load faster. However, sometimes these cached files can become outdated and cause issues.</p>
    
    <h4 style="color: #48825d; margin-top: 20px;">When to Clear Cache</h4>
    <ul style="margin-top: 10px; margin-left: 20px;">
        <li>After making significant changes to your website</li>
        <li>When you notice outdated content being displayed</li>
        <li>If your website's appearance has issues</li>
        <li>When new features or updates aren't working properly</li>
    </ul>
    
    <h4 style="color: #48825d; margin-top: 20px;">Browser Cache</h4>
    <p style="margin-top: 10px;">Remember that visitors may also need to clear their browser cache to see recent changes. You can advise them to press Ctrl+F5 (Windows) or Cmd+Shift+R (Mac) to force-refresh your website.</p>
</div>

<?php include '../includes/admin-footer.php'; ?>