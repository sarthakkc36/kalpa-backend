<?php
$page_title = "Manage Partners";
include '../includes/admin-header.php';

// Process form submission for deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Get image path before deleting
    $sql = "SELECT logo_path FROM partners WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $partner = $result->fetch_assoc();
        $logo_path = $partner['logo_path'];
        
        // Delete from database
        $delete_sql = "DELETE FROM partners WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Delete image file if it exists and is not a default image
            if (!empty($logo_path) && file_exists("../$logo_path") && !strpos($logo_path, 'default')) {
                unlink("../$logo_path");
            }
            $success_message = "Partner deleted successfully.";
        } else {
            $error_message = "Error deleting partner.";
        }
        
        $delete_stmt->close();
    }
    $stmt->close();
}

// Fetch all partners
$sql = "SELECT * FROM partners ORDER BY display_order ASC, name ASC";
$result = mysqli_query($conn, $sql);
?>

<a href="add-partner.php" class="add-btn"><i class="fas fa-plus"></i> Add New Partner</a>

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
                <th width="15%">Logo</th>
                <th width="25%">Name</th>
                <th width="30%">Website URL</th>
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
                            <?php if (!empty($row['logo_path'])): ?>
                                <img src="<?php echo '../' . $row['logo_path']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" style="width: 80px; height: 80px; object-fit: contain;">
                            <?php else: ?>
                                <div style="width: 80px; height: 80px; background: #eee; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-building" style="font-size: 30px; color: #ccc;"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td>
                            <?php if (!empty($row['website_url'])): ?>
                                <a href="<?php echo htmlspecialchars($row['website_url']); ?>" target="_blank"><?php echo htmlspecialchars($row['website_url']); ?></a>
                            <?php else: ?>
                                <span style="color: #999;">No website URL</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['display_order']; ?></td>
                        <td><?php echo $row['is_active'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="edit-partner.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="partners.php?delete=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this partner?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No partners found. <a href="add-partner.php">Add one now</a>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/admin-footer.php'; ?>