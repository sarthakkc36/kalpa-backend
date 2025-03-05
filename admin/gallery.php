<?php
$page_title = "Manage Gallery";
include 'includes/admin-header.php';

// Process form submission for deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Get file path before deleting
    $sql = "SELECT file_path, type FROM gallery_items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
        $file_path = $item['file_path'];
        $type = $item['type'];
        
        // Delete from database
        $delete_sql = "DELETE FROM gallery_items WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Only delete file if it's an image (not for YouTube videos)
            if ($type == 'image' && file_exists("../$file_path")) {
                unlink("../$file_path");
            }
            $success_message = "Gallery item deleted successfully.";
        } else {
            $error_message = "Error deleting gallery item.";
        }
        
        $delete_stmt->close();
    }
    $stmt->close();
}

// Get distinct categories for filter
$category_sql = "SELECT DISTINCT category FROM gallery_items WHERE category IS NOT NULL AND category != '' ORDER BY category";
$category_result = mysqli_query($conn, $category_sql);
$categories = [];
while ($row = mysqli_fetch_assoc($category_result)) {
    $categories[] = $row['category'];
}

// Apply filters if set
$where_clause = "1=1"; // Always true condition to start
$params = [];
$types = "";

if (isset($_GET['category']) && $_GET['category'] != 'all') {
    $where_clause .= " AND category = ?";
    $params[] = $_GET['category'];
    $types .= "s";
}

if (isset($_GET['type']) && in_array($_GET['type'], ['image', 'video'])) {
    $where_clause .= " AND type = ?";
    $params[] = $_GET['type'];
    $types .= "s";
}

// Fetch gallery items with applied filters
$sql = "SELECT * FROM gallery_items WHERE $where_clause ORDER BY display_order ASC, created_at DESC";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <a href="add-gallery-item.php" class="add-btn"><i class="fas fa-plus"></i> Add New Gallery Item</a>
    
    <div style="display: flex; gap: 10px;">
        <form method="get" style="display: flex; gap: 10px;">
            <select name="category" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                <option value="all">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category); ?>" <?php echo (isset($_GET['category']) && $_GET['category'] == $category) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars(ucfirst($category)); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <select name="type" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                <option value="all">All Types</option>
                <option value="image" <?php echo (isset($_GET['type']) && $_GET['type'] == 'image') ? 'selected' : ''; ?>>Images</option>
                <option value="video" <?php echo (isset($_GET['type']) && $_GET['type'] == 'video') ? 'selected' : ''; ?>>Videos</option>
            </select>
            
            <button type="submit" style="padding: 8px 15px; background: #48825d; color: white; border: none; border-radius: 5px; cursor: pointer;">
                <i class="fas fa-filter"></i> Filter
            </button>
            
            <?php if (isset($_GET['category']) || isset($_GET['type'])): ?>
                <a href="gallery.php" style="padding: 8px 15px; background: #6c757d; color: white; border: none; border-radius: 5px; text-decoration: none;">
                    <i class="fas fa-times"></i> Clear
                </a>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php if (isset($success_message)): ?>
<div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
    <?php echo $success_message; ?>
</div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
<div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
    <?php echo $error_message; ?>
</div>
<?php endif; ?>

<div class="content-card">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($item = mysqli_fetch_assoc($result)): ?>
                <div style="background: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div style="position: relative; height: 180px; overflow: hidden;">
                        <?php if ($item['type'] == 'image'): ?>
                            <img src="<?php echo '../' . $item['file_path']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; background: #000; display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="fas fa-play-circle" style="font-size: 40px;"></i>
                            </div>
                        <?php endif; ?>
                        <span style="position: absolute; top: 10px; right: 10px; background: <?php echo $item['type'] == 'image' ? '#5bc0de' : '#f0ad4e'; ?>; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">
                            <?php echo ucfirst($item['type']); ?>
                        </span>
                    </div>
                    <div style="padding: 15px;">
                        <h3 style="margin: 0 0 10px 0; font-size: 16px; color: #48825d; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p style="margin: 0 0 10px 0; font-size: 14px; color: #666; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            <?php echo htmlspecialchars($item['description']); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="background: #e9ecef; padding: 3px 8px; border-radius: 3px; font-size: 12px; color: #495057;">
                                <?php echo ucfirst($item['category']); ?>
                            </span>
                            <span style="color: <?php echo $item['is_active'] ? '#28a745' : '#dc3545'; ?>; font-size: 12px;">
                                <?php echo $item['is_active'] ? 'Active' : 'Inactive'; ?>
                            </span>
                        </div>
                        <div style="display: flex; gap: 5px; margin-top: 15px;">
                            <a href="edit-gallery-item.php?id=<?php echo $item['id']; ?>" class="action-btn edit-btn" style="flex: 1; text-align: center;"><i class="fas fa-edit"></i> Edit</a>
                            <a href="gallery.php?delete=<?php echo $item['id']; ?>" class="action-btn delete-btn" style="flex: 1; text-align: center;" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px 0;">
                <i class="fas fa-image" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                <p style="margin: 0; font-size: 18px; color: #666;">No gallery items found.</p>
                <a href="add-gallery-item.php" style="display: inline-block; margin-top: 20px; background: #48825d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                    Add Your First Gallery Item
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>