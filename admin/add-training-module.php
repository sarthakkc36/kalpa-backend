<?php
$page_title = "Add New Training Module";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = trim($_POST['title']);
    $subtitle = trim($_POST['subtitle']);
    $short_description = trim($_POST['short_description']);
    $full_description = trim($_POST['full_description']);
    $highlights = trim($_POST['highlights']);
    $duration = trim($_POST['duration']);
    $target_audience = trim($_POST['target_audience']);
    $mode = trim($_POST['mode']);
    $certification = isset($_POST['certification']) ? 1 : 0;
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($title)) {
        $error_message = "Module title is required.";
    } else {
        // Initialize paths
        $image_path = '';
        $video_path = '';
        
        // Process image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['image']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_path = 'images/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        } else {
            $error_message = "Module image is required.";
        }
        
        // Process video upload if provided
        if (empty($error_message) && isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
            $allowed_types = ['video/mp4', 'video/webm', 'video/ogg'];
            
            if (!in_array($_FILES['video']['type'], $allowed_types)) {
                $error_message = "Only MP4, WebM, and OGG videos are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../videos/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['video']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
                    $video_path = 'videos/' . $filename;
                } else {
                    $error_message = "Failed to upload video.";
                }
            }
        }
        
        // Insert into database if no errors
        if (empty($error_message)) {
            $sql = "INSERT INTO training_modules (
                    title, 
                    subtitle, 
                    short_description, 
                    full_description, 
                    highlights, 
                    image_path, 
                    video_path, 
                    duration, 
                    target_audience, 
                    mode, 
                    certification, 
                    display_order, 
                    is_active) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssiis", 
                $title, 
                $subtitle, 
                $short_description, 
                $full_description, 
                $highlights, 
                $image_path, 
                $video_path, 
                $duration, 
                $target_audience, 
                $mode, 
                $certification, 
                $display_order, 
                $is_active
            );
            
            if ($stmt->execute()) {
                $success_message = "Training module added successfully!";
                // Reset form data
                $title = $subtitle = $short_description = $full_description = $highlights = $duration = $target_audience = '';
                $mode = 'Virtual Live Sessions';
                $display_order = 0;
                $is_active = 1;
                $certification = 1;
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Add New Training Module</h2>
    
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
            <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Module Title *</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="subtitle" style="display: block; margin-bottom: 8px; font-weight: bold;">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($subtitle) ? htmlspecialchars($subtitle) : ''; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">A brief caption or tagline for the module</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="short_description" style="display: block; margin-bottom: 8px; font-weight: bold;">Short Description</label>
            <textarea id="short_description" name="short_description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo isset($short_description) ? htmlspecialchars($short_description) : ''; ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">A brief summary (1-2 sentences)</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="full_description" style="display: block; margin-bottom: 8px; font-weight: bold;">Full Description</label>
            <textarea id="full_description" name="full_description" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo isset($full_description) ? htmlspecialchars($full_description) : ''; ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Detailed description of the module</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="highlights" style="display: block; margin-bottom: 8px; font-weight: bold;">Highlights</label>
            <textarea id="highlights" name="highlights" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo isset($highlights) ? htmlspecialchars($highlights) : ''; ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Enter key points, one per line</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Module Image *</label>
            <input type="file" id="image" name="image" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Recommended size: 800x600 pixels. Max file size: 5MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="video" style="display: block; margin-bottom: 8px; font-weight: bold;">Module Video (Optional)</label>
            <input type="file" id="video" name="video" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Max file size: 50MB. Supported formats: MP4, WebM, OGG</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="duration" style="display: block; margin-bottom: 8px; font-weight: bold;">Duration</label>
            <input type="text" id="duration" name="duration" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($duration) ? htmlspecialchars($duration) : ''; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., 2 Days, 4 Hours, etc.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="target_audience" style="display: block; margin-bottom: 8px; font-weight: bold;">Target Audience</label>
            <input type="text" id="target_audience" name="target_audience" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($target_audience) ? htmlspecialchars($target_audience) : ''; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., Teachers & Parents, School Leaders, etc.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="mode" style="display: block; margin-bottom: 8px; font-weight: bold;">Training Mode</label>
            <select id="mode" name="mode" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                <option value="Virtual Live Sessions" <?php echo (isset($mode) && $mode == 'Virtual Live Sessions') ? 'selected' : ''; ?>>Virtual Live Sessions</option>
                <option value="In-person Workshop" <?php echo (isset($mode) && $mode == 'In-person Workshop') ? 'selected' : ''; ?>>In-person Workshop</option>
                <option value="Hybrid" <?php echo (isset($mode) && $mode == 'Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
                <option value="Self-paced" <?php echo (isset($mode) && $mode == 'Self-paced') ? 'selected' : ''; ?>>Self-paced</option>
            </select>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($display_order) ? $display_order : 0; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="certification" value="1" <?php echo (!isset($certification) || $certification) ? 'checked' : ''; ?> style="margin-right: 10px;">
                Certification Available
            </label>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo (!isset($is_active) || $is_active) ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (module will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Save Module
            </button>
            <a href="training-modules.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>