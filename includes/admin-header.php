<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kalpavriksha Education Foundation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f6f6e5;
            margin: 0;
            padding: 0;
        }
        
        /* Sidebar */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background: #48825d;
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        
        .sidebar-header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        
        .sidebar-header h2 {
            margin: 0;
            font-size: 18px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 30px 0 0 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .sidebar-menu a:hover, 
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            border-left: 4px solid white;
        }
        
        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-header h1 {
            margin: 0;
            color: #48825d;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-info span {
            margin-right: 15px;
        }
        
        .logout-btn {
            background: #d9534f;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        
        .logout-btn:hover {
            background: #c9302c;
        }
        
        /* Content Card */
        .content-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .data-table th {
            background-color: #f2f2f2;
            color: #48825d;
            font-weight: bold;
        }
        
        .data-table tr:hover {
            background-color: #f9f9f9;
        }
        
        /* Action Buttons */
        .action-btn {
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 5px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        
        .view-btn {
            background: #5bc0de;
            color: white;
        }
        
        .edit-btn {
            background: #f0ad4e;
            color: white;
        }
        
        .delete-btn {
            background: #d9534f;
            color: white;
        }
        
        .add-btn {
            background: #5cb85c;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .add-btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="../images/logo.webp" alt="Kalpavriksha Logo">
                <h2>Admin Panel</h2>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="dashboard.php" <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'class="active"' : ''; ?>><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="testimonials.php" <?php echo basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'class="active"' : ''; ?>><i class="fas fa-comment-dots"></i> Testimonials</a></li>
                <li><a href="gallery.php" <?php echo basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'class="active"' : ''; ?>><i class="fas fa-images"></i> Gallery</a></li>
                <li><a href="partners.php" <?php echo basename($_SERVER['PHP_SELF']) == 'partners.php' ? 'class="active"' : ''; ?>><i class="fas fa-handshake"></i> Partners</a></li>
                <li><a href="training-programs.php" <?php echo basename($_SERVER['PHP_SELF']) == 'training-programs.php' ? 'class="active"' : ''; ?>><i class="fas fa-chalkboard-teacher"></i> Training Programs</a></li>
                <li><a href="training-modules.php" <?php echo basename($_SERVER['PHP_SELF']) == 'training-modules.php' ? 'class="active"' : ''; ?>><i class="fas fa-book"></i> Training Modules</a></li>
                <li><a href="products.php" <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'class="active"' : ''; ?>><i class="fas fa-shopping-cart"></i> Products</a></li>
                <li><a href="settings.php" <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'class="active"' : ''; ?>><i class="fas fa-sliders-h"></i> Settings</a></li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : 'Admin Dashboard'; ?></h1>
                <div class="user-info">
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>