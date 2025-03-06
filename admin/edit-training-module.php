<?php
$page_title = "Edit Training Module";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: training-modules.php");
    exit();
}

$id = $_GET['id'];

// Fetch training module data
$sql = "SELECT * FROM training_modules WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: training-modules.php");
    exit();
}

$module = $result->fetch_assoc();
$stmt->close();

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
        // Initialize paths with existing values
        $image_path = $module['image_path'];
        $video_path = $module['video_path'];
        
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
                    // If there's an existing image, delete it
                    if (!empty($module['image_path']) && file_exists('../' . $module['image_path']) && strpos($module['image_path'], 'default') === false) {
                        unlink('../' . $module['image_path']);
                    }
                    
                    $image_path = 'images/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        }
        
        // Process video upload if provided
        if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
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
                    // If there's an existing video, delete it
                    if (!empty($module['video_path']) && file_exists('../' . $module['video_path'])) {
                        unlink('../' . $module['video_path']);
                    }
                    
                    $video_path = 'videos/' . $filename;
                } else {
                    $error_message = "Failed to upload video.";
                }
            }
        }
        
        // Update database if no errors
        if (empty($error_message)) {
            $sql = "UPDATE training_modules SET 
                    title = ?, 
                    subtitle = ?, 
                    short_description = ?, 
                    full_description = ?, 
                    highlights = ?, 
                    image_path = ?, 
                    video_path = ?, 
                    duration = ?, 
                    target_audience = ?, 
                    mode = ?, 
                    certification = ?, 
                    display_order = ?, 
                    is_active = ? 
                    WHERE id = ?";
                    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssiiis", 
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
                $is_active, 
                $id
            );
            
            if ($stmt->execute()) {
                $success_message = "Training module updated successfully!";
                
                // Refresh module data
                $sql = "SELECT * FROM training_modules WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $module = $result->fetch_assoc();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Edit Training Module</h2>
    
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
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($module['title']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="subtitle" style="display: block; margin-bottom: 8px; font-weight: bold;">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($module['subtitle']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">A brief caption or tagline for the module</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="short_description" style="display: block; margin-bottom: 8px; font-weight: bold;">Short Description</label>
            <textarea id="short_description" name="short_description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($module['short_description']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">A brief summary (1-2 sentences)</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="full_description" style="display: block; margin-bottom: 8px; font-weight: bold;">Full Description</label>
            <textarea id="full_description" name="full_description" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($module['full_description']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Detailed description of the module</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="highlights" style="display: block; margin-bottom: 8px; font-weight: bold;">Highlights</label>
            <textarea id="highlights" name="highlights" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($module['highlights']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Enter key points, one per line</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Module Image</label>
            <?php if (!empty($module['image_path'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="<?php echo '../' . $module['image_path']; ?>" alt="Current image" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                    <p>Current image</p>
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Leave empty to keep current image. Recommended size: 800x600 pixels. Max file size: 5MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="video" style="display: block; margin-bottom: 8px; font-weight: bold;">Module Video (Optional)</label>
            <?php if (!empty($module['video_path'])): ?>
                <div style="margin-bottom: 10px;">
                    <video width="320" height="240" controls>
                        <source src="<?php echo '../' . $module['video_path']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Current video</p>
                </div>
            <?php endif; ?>
            <input type="file" id="video" name="video" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Leave empty to keep current video. Max file size: 50MB. Supported formats: MP4, WebM, OGG</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="duration" style="display: block; margin-bottom: 8px; font-weight: bold;">Duration</label>
            <input type="text" id="duration" name="duration" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($module['duration']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., 2 Days, 4 Hours, etc.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="target_audience" style="display: block; margin-bottom: 8px; font-weight: bold;">Target Audience</label>
            <input type="text" id="target_audience" name="target_audience" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($module['target_audience']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., Teachers & Parents, School Leaders, etc.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="mode" style="display: block; margin-bottom: 8px; font-weight: bold;">Training Mode</label>
            <select id="mode" name="mode" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                <option value="Virtual Live Sessions" <?php echo ($module['mode'] == 'Virtual Live Sessions') ? 'selected' : ''; ?>>Virtual Live Sessions</option>
                <option value="In-person Workshop" <?php echo ($module['mode'] == 'In-person Workshop') ? 'selected' : ''; ?>>In-person Workshop</option>
                <option value="Hybrid" <?php echo ($module['mode'] == 'Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
                <option value="Self-paced" <?php echo ($module['mode'] == 'Self-paced') ? 'selected' : ''; ?>>Self-paced</option>
            </select>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $module['display_order']; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="certification" value="1" <?php echo $module['certification'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                Certification Available
            </label>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo $module['is_active'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (module will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Update Module
            </button>
            <a href="training-modules.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>