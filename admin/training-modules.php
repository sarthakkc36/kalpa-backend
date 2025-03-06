<?php
$page_title = "Manage Training Modules";
include '../includes/admin-header.php';

// Process form submission for deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Get image path before deleting
    $sql = "SELECT image_path, video_path FROM training_modules WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $module = $result->fetch_assoc();
        $image_path = $module['image_path'];
        $video_path = $module['video_path'];
        
        // Delete from database
        $delete_sql = "DELETE FROM training_modules WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Delete image file if it exists and is not a default image
            if (!empty($image_path) && file_exists("../$image_path") && strpos($image_path, 'default') === false) {
                unlink("../$image_path");
            }
            
            // Delete video file if it exists
            if (!empty($video_path) && file_exists("../$video_path")) {
                unlink("../$video_path");
            }
            
            $success_message = "Training module deleted successfully.";
        } else {
            $error_message = "Error deleting training module.";
        }
        
        $delete_stmt->close();
    }
    $stmt->close();
}

// Process featured flag toggle
if (isset($_GET['feature']) && is_numeric($_GET['feature'])) {
    $id = $_GET['feature'];
    
    // First unset any currently featured module
    $update_sql = "UPDATE training_modules SET is_featured = 0 WHERE is_featured = 1";
    mysqli_query($conn, $update_sql);
    
    // Now set the selected module as featured
    $feature_sql = "UPDATE training_modules SET is_featured = 1 WHERE id = ?";
    $feature_stmt = $conn->prepare($feature_sql);
    $feature_stmt->bind_param("i", $id);
    
    if ($feature_stmt->execute()) {
        $success_message = "Featured module updated successfully.";
    } else {
        $error_message = "Error updating featured module.";
    }
    
    $feature_stmt->close();
}

// Fetch all training modules
$sql = "SELECT id, title, duration, target_audience, is_featured, is_active FROM training_modules ORDER BY display_order ASC, title ASC";
$result = mysqli_query($conn, $sql);
?>

<a href="add-training-module.php" class="add-btn"><i class="fas fa-plus"></i> Add New Training Module</a>

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
                <th width="35%">Title</th>
                <th width="15%">Duration</th>
                <th width="20%">Target Audience</th>
                <th width="10%">Featured</th>
                <th width="5%">Active</th>
                <th width="20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['duration']); ?></td>
                        <td><?php echo htmlspecialchars($row['target_audience']); ?></td>
                        <td>
                            <?php if ($row['is_featured']): ?>
                                <span style="color: #28a745;"><i class="fas fa-star"></i> Yes</span>
                            <?php else: ?>
                                <a href="training-modules.php?feature=<?php echo $row['id']; ?>" class="action-btn" style="background: #ffc107; color: white;">
                                    <i class="far fa-star"></i> Set Featured
                                </a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['is_active'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="edit-training-module.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="training-modules.php?delete=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this training module?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No training modules found. <a href="add-training-module.php">Add one now</a>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/admin-footer.php'; ?>