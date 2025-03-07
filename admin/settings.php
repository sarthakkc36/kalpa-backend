<?php
$page_title = "Site Settings";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Create settings table if it doesn't exist
$create_table_sql = "CREATE TABLE IF NOT EXISTS site_settings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(255) NOT NULL UNIQUE,
    setting_value TEXT,
    setting_group VARCHAR(100) NOT NULL,
    setting_label VARCHAR(255) NOT NULL,
    setting_type VARCHAR(50) NOT NULL DEFAULT 'text',
    setting_options TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!mysqli_query($conn, $create_table_sql)) {
    $error_message = "Error creating settings table: " . mysqli_error($conn);
}

// Initialize default settings if they don't exist
$default_settings = [
    // General Settings
    ['site_title', 'Kalpavriksha Education Foundation', 'general', 'Site Title', 'text'],
    ['site_tagline', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.', 'general', 'Site Tagline', 'textarea'],
    ['contact_email', 'kalpavriksha.efn@gmail.com', 'general', 'Contact Email', 'email'],
    ['contact_phone', '01-4547300', 'general', 'Contact Phone', 'text'],
    ['contact_address_ktm', 'Maharajgunj, Kathmandu, Nepal', 'general', 'Kathmandu Address', 'text'],
    ['contact_address_dang', 'Ghorahi, Dang, Nepal', 'general', 'Dang Address', 'text'],
    ['office_hours', '9am - 6pm', 'general', 'Office Hours', 'text'],
    
    // Social Media
    ['facebook_url', 'https://www.facebook.com/kalpavrikshaeducation', 'social', 'Facebook URL', 'url'],
    ['tiktok_url', 'https://www.tiktok.com/@kalpaedu', 'social', 'TikTok URL', 'url'],
    ['instagram_url', '', 'social', 'Instagram URL', 'url'],
    ['youtube_url', '', 'social', 'YouTube URL', 'url'],
    
    // Homepage Settings
    ['show_hero_section', '1', 'homepage', 'Show Hero Section', 'boolean'],
    ['show_testimonials', '1', 'homepage', 'Show Testimonials', 'boolean'],
    ['show_partners', '1', 'homepage', 'Show Partners', 'boolean'],
    ['testimonials_count', '4', 'homepage', 'Number of Testimonials to Display', 'number'],
    ['partners_count', '6', 'homepage', 'Number of Partners to Display', 'number'],
    
    // SEO Settings
    ['meta_description', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.', 'seo', 'Meta Description', 'textarea'],
    ['meta_keywords', 'education, training, schools, teachers, Nepal, phonics', 'seo', 'Meta Keywords', 'textarea'],
    ['google_analytics', '', 'seo', 'Google Analytics Code', 'textarea'],
    
    // Email Settings
    ['email_from_name', 'Kalpavriksha Education Foundation', 'email', 'From Name', 'text'],
    ['email_reply_to', 'kalpavriksha.efn@gmail.com', 'email', 'Reply-To Email', 'email'],
    ['auto_reply_subject', 'Thank you for contacting us', 'email', 'Auto-Reply Subject', 'text'],
    ['auto_reply_message', 'Thank you for contacting Kalpavriksha Education Foundation. We have received your message and will get back to you as soon as possible.', 'email', 'Auto-Reply Message', 'textarea'],
    
    // Admin Settings
    ['items_per_page', '10', 'admin', 'Items Per Page in Admin Lists', 'number'],
    ['enable_file_upload', '1', 'admin', 'Enable File Upload', 'boolean'],
    ['max_upload_size', '5', 'admin', 'Maximum Upload Size (MB)', 'number'],
];

foreach ($default_settings as $setting) {
    // Check if setting already exists
    $check_sql = "SELECT id FROM site_settings WHERE setting_key = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $setting[0]);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    // If setting doesn't exist, create it
    if ($check_result->num_rows === 0) {
        $insert_sql = "INSERT INTO site_settings (setting_key, setting_value, setting_group, setting_label, setting_type) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssss", $setting[0], $setting[1], $setting[2], $setting[3], $setting[4]);
        $insert_stmt->execute();
        $insert_stmt->close();
    }
    
    $check_stmt->close();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get current tab from form
    $current_tab = isset($_POST['current_tab']) ? $_POST['current_tab'] : 'general';
    
    // Process settings
    foreach ($_POST as $key => $value) {
        // Skip non-setting fields
        if ($key == 'current_tab' || $key == 'submit') {
            continue;
        }
        
        // For checkbox inputs, set value to 1 if present, 0 if not
        if (strpos($key, 'show_') === 0 || strpos($key, 'enable_') === 0) {
            $value = isset($_POST[$key]) ? 1 : 0;
        }
        
        // Update setting in database
        $update_sql = "UPDATE site_settings SET setting_value = ? WHERE setting_key = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $value, $key);
        
        if (!$update_stmt->execute()) {
            $error_message = "Error updating settings: " . $update_stmt->error;
            break;
        }
        
        $update_stmt->close();
    }
    
    if (empty($error_message)) {
        $success_message = "Settings updated successfully!";
    }
}

// Get all settings grouped by category
$settings_sql = "SELECT * FROM site_settings ORDER BY setting_group, id";
$settings_result = mysqli_query($conn, $settings_sql);

$settings = [];
while ($row = mysqli_fetch_assoc($settings_result)) {
    $settings[$row['setting_group']][] = $row;
}

// Determine current tab (either from form submission or URL parameter)
$current_tab = isset($_POST['current_tab']) ? $_POST['current_tab'] : (isset($_GET['tab']) ? $_GET['tab'] : 'general');
?>

<div class="content-card">
    <h2>Site Settings</h2>
    <p>Configure various settings for your website from this central dashboard.</p>
    
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
    
    <!-- Settings Tabs -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid #ddd;">
        <ul style="display: flex; list-style: none; padding: 0; margin: 0;">
            <li style="margin-right: 5px;">
                <a href="?tab=general" class="<?php echo ($current_tab == 'general') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'general') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'general') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'general') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-cog"></i> General
                </a>
            </li>
            <li style="margin-right: 5px;">
                <a href="?tab=social" class="<?php echo ($current_tab == 'social') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'social') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'social') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'social') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-share-alt"></i> Social Media
                </a>
            </li>
            <li style="margin-right: 5px;">
                <a href="?tab=homepage" class="<?php echo ($current_tab == 'homepage') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'homepage') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'homepage') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'homepage') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-home"></i> Homepage
                </a>
            </li>
            <li style="margin-right: 5px;">
                <a href="?tab=seo" class="<?php echo ($current_tab == 'seo') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'seo') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'seo') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'seo') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-search"></i> SEO
                </a>
            </li>
            <li style="margin-right: 5px;">
                <a href="?tab=email" class="<?php echo ($current_tab == 'email') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'email') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'email') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'email') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-envelope"></i> Email
                </a>
            </li>
            <li>
                <a href="?tab=admin" class="<?php echo ($current_tab == 'admin') ? 'active' : ''; ?>" style="display: block; padding: 10px 15px; text-decoration: none; color: <?php echo ($current_tab == 'admin') ? '#48825d' : '#555'; ?>; font-weight: <?php echo ($current_tab == 'admin') ? 'bold' : 'normal'; ?>; border-bottom: <?php echo ($current_tab == 'admin') ? '3px solid #48825d' : 'none'; ?>;">
                    <i class="fas fa-user-shield"></i> Admin
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Settings Form -->
    <form action="" method="POST">
        <input type="hidden" name="current_tab" value="<?php echo $current_tab; ?>">
        
        <!-- Show Settings Based on Current Tab -->
        <?php if (isset($settings[$current_tab])): ?>
            <div style="margin-bottom: 30px;">
                <?php foreach ($settings[$current_tab] as $setting): ?>
                    <div style="margin-bottom: 20px;">
                        <label for="<?php echo $setting['setting_key']; ?>" style="display: block; margin-bottom: 8px; font-weight: bold;">
                            <?php echo htmlspecialchars($setting['setting_label']); ?>
                        </label>
                        
                        <?php if ($setting['setting_type'] == 'textarea'): ?>
                            <textarea id="<?php echo $setting['setting_key']; ?>" name="<?php echo $setting['setting_key']; ?>" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($setting['setting_value']); ?></textarea>
                        
                        <?php elseif ($setting['setting_type'] == 'boolean'): ?>
                            <label style="display: flex; align-items: center; cursor: pointer;">
                                <input type="checkbox" id="<?php echo $setting['setting_key']; ?>" name="<?php echo $setting['setting_key']; ?>" value="1" <?php echo $setting['setting_value'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                                Enable
                            </label>
                        
                        <?php elseif ($setting['setting_type'] == 'number'): ?>
                            <input type="number" id="<?php echo $setting['setting_key']; ?>" name="<?php echo $setting['setting_key']; ?>" value="<?php echo htmlspecialchars($setting['setting_value']); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                        
                        <?php else: ?>
                            <input type="<?php echo $setting['setting_type']; ?>" id="<?php echo $setting['setting_key']; ?>" name="<?php echo $setting['setting_key']; ?>" value="<?php echo htmlspecialchars($setting['setting_value']); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                        
                        <?php endif; ?>
                        
                        <?php if ($setting['setting_key'] == 'google_analytics'): ?>
                            <small style="color: #666; display: block; margin-top: 5px;">Paste your Google Analytics tracking code here (e.g., UA-XXXXX-Y or G-XXXXXXXX).</small>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <button type="submit" name="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Save Settings
            </button>
        <?php else: ?>
            <div style="text-align: center; padding: 30px 0;">
                <p>No settings found for this category.</p>
            </div>
        <?php endif; ?>
    </form>
</div>

<div class="content-card">
    <h2>Advanced Settings</h2>
    
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <div style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
            <h3 style="color: #48825d; margin-top: 0;"><i class="fas fa-key"></i> Change Admin Password</h3>
            <p>Update your administrator password for better security.</p>
            <a href="change-password.php" style="display: inline-block; background: #48825d; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; margin-top: 10px;">
                <i class="fas fa-lock"></i> Change Password
            </a>
        </div>
        
        <div style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
            <h3 style="color: #48825d; margin-top: 0;"><i class="fas fa-database"></i> Database Operations</h3>
            <p>Backup or restore your website's database.</p>
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <a href="backup-database.php" style="display: inline-block; background: #48825d; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                    <i class="fas fa-download"></i> Backup
                </a>
                <a href="restore-database.php" style="display: inline-block; background: #6c757d; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                    <i class="fas fa-upload"></i> Restore
                </a>
            </div>
        </div>
    </div>
    
    <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; margin-top: 20px;">
        <h3 style="color: #48825d; margin-top: 0;"><i class="fas fa-sync-alt"></i> Clear Cache</h3>
        <p>If you're experiencing display issues or outdated content, try clearing the website cache.</p>
        <form method="post" action="clear-cache.php" style="margin-top: 10px;">
            <button type="submit" style="background: #dc3545; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer;">
                <i class="fas fa-trash"></i> Clear Cache
            </button>
        </form>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>