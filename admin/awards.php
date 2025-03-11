<?php
$page_title = "Manage Awards";
include '../includes/admin-header.php';

// Process form submission for deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Get image path before deleting
    $sql = "SELECT image_path FROM awards WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $award = $result->fetch_assoc();
        $image_path = $award['image_path'];
        
        // Delete from database
        $delete_sql = "DELETE FROM awards WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Delete image file if it exists and is not a default image
            if (!empty($image_path) && file_exists("../$image_path") && strpos($image_path, 'default') === false) {
                unlink("../$image_path");
            }
            $success_message = "Award deleted successfully.";
        } else {
            $error_message = "Error deleting award.";
        }
        
        $delete_stmt->close();
    }
    $stmt->close();
}

// Fetch all awards
$sql = "SELECT * FROM awards ORDER BY display_order ASC, award_date DESC";
$result = mysqli_query($conn, $sql);
?>

<a href="add-award.php" class="add-btn"><i class="fas fa-plus"></i> Add New Award</a>

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
                <th width="25%">Title</th>
                <th width="20%">Awarded By</th>
                <th width="15%">Date</th>
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
                                <img src="<?php echo '../' . $row['image_path']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            <?php else: ?>
                                <div style="width: 80px; height: 80px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-trophy" style="font-size: 30px; color: #ccc;"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['awarded_by']); ?></td>
                        <td><?php echo $row['award_date'] ? date('d M Y', strtotime($row['award_date'])) : 'N/A'; ?></td>
                        <td><?php echo $row['is_active'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="edit-award.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="awards.php?delete=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this award?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No awards found. <a href="add-award.php">Add one now</a>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/admin-footer.php'; ?>