<?php
$page_title = "Dashboard";
include '../includes/admin-header.php';

// Get some basic stats for the dashboard
$testimonials_count = 0;
$gallery_count = 0;

// Count testimonials
$sql = "SELECT COUNT(*) as count FROM testimonials";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $testimonials_count = $row['count'];
}

// More stat queries would go here
?>

<div class="content-card">
    <h2>Welcome to the Admin Dashboard</h2>
    <p>Manage your website content from this control panel.</p>
</div>

<div class="content-card">
    <h2>Website Statistics</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
        <div style="background: #f0f0f0; padding: 20px; border-radius: 10px; text-align: center;">
            <h3 style="margin-top: 0; color: #48825d;"><?php echo $testimonials_count; ?></h3>
            <p style="margin-bottom: 0;">Testimonials</p>
        </div>
        
        <!-- More stat cards would go here -->
        
        <div style="background: #f0f0f0; padding: 20px; border-radius: 10px; text-align: center;">
            <h3 style="margin-top: 0; color: #48825d;">0</h3>
            <p style="margin-bottom: 0;">Gallery Items</p>
        </div>
        
        <div style="background: #f0f0f0; padding: 20px; border-radius: 10px; text-align: center;">
            <h3 style="margin-top: 0; color: #48825d;">0</h3>
            <p style="margin-bottom: 0;">Partners</p>
        </div>
    </div>
</div>

<div class="content-card">
    <h2>Quick Links</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
        <a href="testimonials.php" style="background: #48825d; color: white; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none;">
            <i class="fas fa-comment-dots" style="font-size: 24px; margin-bottom: 10px;"></i>
            <p style="margin: 0;">Manage Testimonials</p>
        </a>
        
        <a href="gallery.php" style="background: #48825d; color: white; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none;">
            <i class="fas fa-images" style="font-size: 24px; margin-bottom: 10px;"></i>
            <p style="margin: 0;">Manage Gallery</p>
        </a>
        
        <a href="services.php" style="background: #48825d; color: white; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none;">
            <i class="fas fa-cogs" style="font-size: 24px; margin-bottom: 10px;"></i>
            <p style="margin: 0;">Manage Services</p>
        </a>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>