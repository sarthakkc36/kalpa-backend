<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // change to your MySQL username
define('DB_PASS', '');      // change to your MySQL password
define('DB_NAME', 'kalpavriksha_db');

// Create database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set
mysqli_set_charset($conn, "utf8mb4");

// Helper functions
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

// Include helper functions
require_once __DIR__ . '/helpers.php';
?>