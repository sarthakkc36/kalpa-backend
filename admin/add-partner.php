<?php
$page_title = "Add New Partner";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = trim($_POST['name']);
    $website_url = trim($_POST['website_url']);
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($name)) {
        $error_message = "Partner name is required.";
    } else {
        // Process logo upload if provided
        $logo_path = '';
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['logo']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/partners/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['logo']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
                    $logo_path = 'images/partners/' . $filename;
                } else {
                    $error_message = "Failed to upload logo.";
                }
            }
        } else {
            $error_message = "Partner logo is required.";
        }
        
        // Insert into database if no errors
        if (empty($error_message)) {
            $sql = "INSERT INTO partners (name, logo_path, website_url, display_order, is_active) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssii", $name, $logo_path, $website_url, $display_order, $is_active);
            
            if ($stmt->execute()) {
                $success_message = "Partner added successfully!";
                // Reset form data
                $name = $website_url = '';
                $display_order = 0;
                $is_active = 1;
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Add New Partner</h2>
    
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
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Partner Name *</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="logo" style="display: block; margin-bottom: 8px; font-weight: bold;">Logo *</label>
            <input type="file" id="logo" name="logo" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Recommended size: 150x150 pixels. Max file size: 2MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="website_url" style="display: block; margin-bottom: 8px; font-weight: bold;">Website URL</label>
            <input type="url" id="website_url" name="website_url" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($website_url) ? htmlspecialchars($website_url) : ''; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., https://example.com</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($display_order) ? $display_order : 0; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo (!isset($is_active) || $is_active) ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (partner will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Save Partner
            </button>
            <a href="partners.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>