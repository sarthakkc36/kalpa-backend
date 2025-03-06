<?php
$page_title = "Manage Testimonials";
include '../includes/admin-header.php';

// Process form submission for deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Get image path before deleting
    $sql = "SELECT image_path FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $testimonial = $result->fetch_assoc();
        $image_path = $testimonial['image_path'];
        
        // Delete from database
        $delete_sql = "DELETE FROM testimonials WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Delete image file if it exists and is not a default image
            if (!empty($image_path) && file_exists("../$image_path") && !strpos($image_path, 'default')) {
                unlink("../$image_path");
            }
            $success_message = "Testimonial deleted successfully.";
        } else {
            $error_message = "Error deleting testimonial.";
        }
        
        $delete_stmt->close();
    }
    $stmt->close();
}

// Fetch all testimonials
$sql = "SELECT * FROM testimonials ORDER BY display_order ASC";
$result = mysqli_query($conn, $sql);
?>

<a href="add-testimonial.php" class="add-btn"><i class="fas fa-plus"></i> Add New Testimonial</a>

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
    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="15%">Image</th>
                <th width="15%">Name</th>
                <th width="15%">Role</th>
                <th width="30%">Content</th>
                <th width="5%">Rating</th>
                <th width="5%">Order</th>
                <th width="5%">Active</th>
                <th width="15%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <?php if (!empty($row['image_path'])): ?>
                                <img src="<?php echo '../' . $row['image_path']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                            <?php else: ?>
                                <div style="width: 80px; height: 80px; background: #eee; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user" style="font-size: 30px; color: #ccc;"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td><?php echo substr(htmlspecialchars($row['content']), 0, 100) . '...'; ?></td>
                        <td><?php echo $row['rating']; ?></td>
                        <td><?php echo $row['display_order']; ?></td>
                        <td><?php echo $row['is_active'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="edit-testimonial.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="testimonials.php?delete=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this testimonial?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" style="text-align: center;">No testimonials found. <a href="add-testimonial.php">Add one now</a>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/admin-footer.php'; ?>