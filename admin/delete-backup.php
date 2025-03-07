<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Validate filename parameter
if (!isset($_GET['file']) || empty($_GET['file'])) {
    header("Location: backup-database.php");
    exit();
}

$filename = basename($_GET['file']);
$backup_dir = '../backups/';
$file_path = $backup_dir . $filename;

// Check if file exists and has .sql extension
if (!file_exists($file_path) || pathinfo($filename, PATHINFO_EXTENSION) != 'sql') {
    header("Location: backup-database.php?error=invalid_file");
    exit();
}

// Delete the file
if (unlink($file_path)) {
    header("Location: backup-database.php?success=deleted");
} else {
    header("Location: backup-database.php?error=delete_failed");
}
exit();
?>