<?php
$page_title = "Edit Product";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: products.php");
    exit();
}

$id = $_GET['id'];

// Fetch product data
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: products.php");
    exit();
}

$product = $result->fetch_assoc();
$stmt->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price_display = trim($_POST['price_display']);
    $product_url = trim($_POST['product_url']);
    $location = trim($_POST['location']);
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($name)) {
        $error_message = "Product name is required.";
    } elseif (empty($price_display)) {
        $error_message = "Price display is required.";
    } elseif (empty($product_url)) {
        $error_message = "Product URL is required.";
    } else {
        // Initialize image path with existing value
        $image_path = $product['image_path'];
        
        // Process image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/products/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['image']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // If there's an existing image, delete it
                    if (!empty($product['image_path']) && file_exists('../' . $product['image_path']) && strpos($product['image_path'], 'default') === false) {
                        unlink('../' . $product['image_path']);
                    }
                    
                    $image_path = 'images/products/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        }
        
        // Update database if no errors
        if (empty($error_message)) {
            $sql = "UPDATE products SET name = ?, description = ?, price_display = ?, product_url = ?, image_path = ?, location = ?, display_order = ?, is_active = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssiis", $name, $description, $price_display, $product_url, $image_path, $location, $display_order, $is_active, $id);
            
            if ($stmt->execute()) {
                $success_message = "Product updated successfully!";
                
                // Refresh product data
                $sql = "SELECT * FROM products WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $product = $result->fetch_assoc();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Edit Product</h2>
    
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
            <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Product Name *</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: bold;">Description</label>
            <input type="text" id="description" name="description" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($product['description']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Brief description or subtitle for the product</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="price_display" style="display: block; margin-bottom: 8px; font-weight: bold;">Price Display *</label>
            <input type="text" id="price_display" name="price_display" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($product['price_display']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., Rs. 650</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="product_url" style="display: block; margin-bottom: 8px; font-weight: bold;">Product URL *</label>
            <input type="url" id="product_url" name="product_url" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($product['product_url']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Full URL where the product can be purchased (e.g., Daraz)</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Product Image</label>
            <?php if (!empty($product['image_path'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="<?php echo '../' . $product['image_path']; ?>" alt="Current image" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                    <p>Current image</p>
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Leave empty to keep current image. Recommended size: 500x500 pixels. Max file size: 2MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="location" style="display: block; margin-bottom: 8px; font-weight: bold;">Location</label>
            <input type="text" id="location" name="location" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($product['location']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $product['display_order']; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo $product['is_active'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (product will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Update Product
            </button>
            <a href="products.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>