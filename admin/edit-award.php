<?php
$page_title = "Edit Award";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: awards.php");
    exit();
}

$id = $_GET['id'];

// Fetch award data
$sql = "SELECT * FROM awards WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: awards.php");
    exit();
}

$award = $result->fetch_assoc();
$stmt->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = trim($_POST['title']);
    $subtitle = trim($_POST['subtitle']);
    $description = trim($_POST['description']);
    $awarded_by = trim($_POST['awarded_by']);
    $award_date = !empty($_POST['award_date']) ? $_POST['award_date'] : NULL;
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($title)) {
        $error_message = "Award title is required.";
    } else {
        // Initialize image path with existing value
        $image_path = $award['image_path'];
        
        // Process image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/awards/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['image']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // If there's an existing image, delete it
                    if (!empty($award['image_path']) && file_exists('../' . $award['image_path']) && strpos($award['image_path'], 'default') === false) {
                        unlink('../' . $award['image_path']);
                    }
                    
                    $image_path = 'images/awards/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        }
        
        // Update database if no errors
        if (empty($error_message)) {
            $sql = "UPDATE awards SET 
                    title = ?, 
                    subtitle = ?, 
                    description = ?, 
                    image_path = ?, 
                    awarded_by = ?, 
                    award_date = ?, 
                    display_order = ?, 
                    is_active = ? 
                    WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssiis", 
                $title, 
                $subtitle, 
                $description, 
                $image_path, 
                $awarded_by, 
                $award_date, 
                $display_order, 
                $is_active,
                $id
            );
            
            if ($stmt->execute()) {
                $success_message = "Award updated successfully!";
                
                // Refresh award data
                $sql = "SELECT * FROM awards WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $award = $result->fetch_assoc();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Edit Award</h2>
    
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
            <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Award Title *</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($award['title']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="subtitle" style="display: block; margin-bottom: 8px; font-weight: bold;">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($award['subtitle']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: bold;">Description</label>
            <textarea id="description" name="description" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($award['description']); ?></textarea>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Award Image</label>
            <?php if (!empty($award['image_path'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="<?php echo '../' . $award['image_path']; ?>" alt="Current image" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                    <p>Current image</p>
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Leave empty to keep current image. Recommended size: 400x400 pixels. Max file size: 2MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="awarded_by" style="display: block; margin-bottom: 8px; font-weight: bold;">Awarded By</label>
            <input type="text" id="awarded_by" name="awarded_by" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($award['awarded_by']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="award_date" style="display: block; margin-bottom: 8px; font-weight: bold;">Award Date</label>
            <input type="date" id="award_date" name="award_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $award['award_date'] ? date('Y-m-d', strtotime($award['award_date'])) : ''; ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $award['display_order']; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo $award['is_active'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (award will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Update Award
            </button>
            <a href="awards.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>