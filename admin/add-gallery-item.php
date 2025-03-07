<?php
$page_title = "Add Gallery Item";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $type = $_POST['type'];
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($title)) {
        $error_message = "Title is required.";
    } elseif (empty($category)) {
        $error_message = "Category is required.";
    } elseif ($type == 'image' && (!isset($_FILES['image']) || $_FILES['image']['error'] != 0)) {
        $error_message = "Please upload an image file.";
    } elseif ($type == 'video' && empty($_POST['video_url'])) {
        $error_message = "YouTube URL is required for video type.";
    } else {
        $file_path = '';
        $video_url = '';
        
        // Handle image upload
        if ($type == 'image') {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/gallery/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['image']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $file_path = 'images/gallery/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        } else {
            // Handle video URL
            $video_url = $_POST['video_url'];
            
            // Validate YouTube URL
            if (!preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/', $video_url)) {
                $error_message = "Please enter a valid YouTube URL.";
            }
        }
        
        // Insert into database if no errors
        if (empty($error_message)) {
            $sql = "INSERT INTO gallery_items (title, description, category, type, file_path, video_url, display_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssii", $title, $description, $category, $type, $file_path, $video_url, $display_order, $is_active);
            
            if ($stmt->execute()) {
                $success_message = "Gallery item added successfully!";
                // Reset form data
                $title = $description = $category = '';
                $type = 'image';
                $display_order = 0;
                $is_active = 1;
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}

// Get existing categories for suggestions
$categories_query = "SELECT DISTINCT category FROM gallery_items WHERE category IS NOT NULL AND category != '' ORDER BY category";
$categories_result = mysqli_query($conn, $categories_query);
$categories = [];
while ($row = mysqli_fetch_assoc($categories_result)) {
    $categories[] = $row['category'];
}
?>

<div class="content-card">
    <h2>Add New Gallery Item</h2>
    
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
            <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Title *</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: bold;">Description</label>
            <textarea id="description" name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="category" style="display: block; margin-bottom: 8px; font-weight: bold;">Category *</label>
            <select id="category" name="category" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                <option value="">Select Category</option>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo (isset($category) && $category == $cat) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars(ucfirst($cat)); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
                <option value="new">+ Add New Category</option>
            </select>
            <div id="new-category-container" style="display: none; margin-top: 10px;">
                <input type="text" id="new-category" placeholder="Enter new category" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            </div>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Item Type *</label>
            <div style="display: flex; gap: 20px;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="radio" name="type" value="image" <?php echo (!isset($type) || $type == 'image') ? 'checked' : ''; ?> style="margin-right: 10px;">
                    Image
                </label>
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="radio" name="type" value="video" <?php echo (isset($type) && $type == 'video') ? 'checked' : ''; ?> style="margin-right: 10px;">
                    YouTube Video
                </label>
            </div>
        </div>
        
        <div id="image-upload-container" style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Upload Image *</label>
            <input type="file" id="image" name="image" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Recommended size: 800x600 pixels. Max file size: 5MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div id="video-url-container" style="margin-bottom: 20px; display: none;">
            <label for="video_url" style="display: block; margin-bottom: 8px; font-weight: bold;">YouTube URL *</label>
            <input type="text" id="video_url" name="video_url" placeholder="https://www.youtube.com/watch?v=..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($video_url) ? htmlspecialchars($video_url) : ''; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Enter a YouTube video URL (e.g., https://www.youtube.com/watch?v=XXXXXXXXXXX)</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo isset($display_order) ? $display_order : 0; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo (!isset($is_active) || $is_active) ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (item will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Save Gallery Item
            </button>
            <a href="gallery.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle between image and video upload
        const typeRadios = document.querySelectorAll('input[name="type"]');
        const imageUploadContainer = document.getElementById('image-upload-container');
        const videoUrlContainer = document.getElementById('video-url-container');
        
        typeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'image') {
                    imageUploadContainer.style.display = 'block';
                    videoUrlContainer.style.display = 'none';
                } else {
                    imageUploadContainer.style.display = 'none';
                    videoUrlContainer.style.display = 'block';
                }
            });
        });
        
        // Handle new category
        const categorySelect = document.getElementById('category');
        const newCategoryContainer = document.getElementById('new-category-container');
        const newCategoryInput = document.getElementById('new-category');
        
        categorySelect.addEventListener('change', function() {
            if (this.value === 'new') {
                newCategoryContainer.style.display = 'block';
                newCategoryInput.focus();
                
                // Update form submission to use new category
                document.querySelector('form').addEventListener('submit', function(e) {
                    if (categorySelect.value === 'new') {
                        if (newCategoryInput.value.trim() === '') {
                            e.preventDefault();
                            alert('Please enter a new category name');
                            newCategoryInput.focus();
                        } else {
                            // Set the select value to the new category to be submitted with the form
                            categorySelect.value = newCategoryInput.value.trim();
                        }
                    }
                });
            } else {
                newCategoryContainer.style.display = 'none';
            }
        });
    });
</script>

<?php include '../includes/admin-footer.php'; ?>