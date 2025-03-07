<?php
$page_title = "Change Password";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate input
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($new_password != $confirm_password) {
        $error_message = "New password and confirm password do not match.";
    } elseif (strlen($new_password) < 8) {
        $error_message = "New password must be at least 8 characters long.";
    } else {
        // Get current user's password
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify current password
            if (password_verify($current_password, $user['password'])) {
                // Hash new password
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                
                // Update password in database
                $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("si", $new_password_hash, $user_id);
                
                if ($update_stmt->execute()) {
                    $success_message = "Your password has been updated successfully.";
                } else {
                    $error_message = "Failed to update password: " . $update_stmt->error;
                }
                
                $update_stmt->close();
            } else {
                $error_message = "Current password is incorrect.";
            }
        } else {
            $error_message = "User not found. Please try logging in again.";
        }
        
        $stmt->close();
    }
}
?>

<div class="content-card">
    <h2><i class="fas fa-key"></i> Change Password</h2>
    <p>Update your administrator password for better security.</p>
    
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
    
    <form action="" method="POST" style="max-width: 500px;">
        <div style="margin-bottom: 20px;">
            <label for="current_password" style="display: block; margin-bottom: 8px; font-weight: bold;">Current Password</label>
            <input type="password" id="current_password" name="current_password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="new_password" style="display: block; margin-bottom: 8px; font-weight: bold;">New Password</label>
            <input type="password" id="new_password" name="new_password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Password must be at least 8 characters long.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="confirm_password" style="display: block; margin-bottom: 8px; font-weight: bold;">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save"></i> Update Password
            </button>
            <a href="settings.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center;">
                <i class="fas fa-arrow-left"></i> Back to Settings
            </a>
        </div>
    </form>
</div>

<div style="background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; margin-top: 20px;">
    <h3 style="color: #48825d;"><i class="fas fa-shield-alt"></i> Password Security Tips</h3>
    <ul style="margin-top: 15px; margin-left: 20px;">
        <li>Use a combination of uppercase and lowercase letters, numbers, and special characters.</li>
        <li>Avoid using easily guessable information like your name, birth date, or common words.</li>
        <li>Create a unique password that you don't use for other accounts.</li>
        <li>Change your password periodically, especially after sharing access with temporary staff.</li>
        <li>Consider using a password manager to generate and store strong passwords.</li>
    </ul>
</div>

<?php include '../includes/admin-footer.php'; ?>