<?php
$page_title = "Edit Training Program";
include '../includes/admin-header.php';

$error_message = '';
$success_message = '';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: training-programs.php");
    exit();
}

$id = $_GET['id'];

// Fetch training program data
$sql = "SELECT * FROM training_programs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: training-programs.php");
    exit();
}

$program = $result->fetch_assoc();
$stmt->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = trim($_POST['title']);
    $subtitle = trim($_POST['subtitle']);
    $description = trim($_POST['description']);
    $highlights = trim($_POST['highlights']);
    $start_date = $_POST['start_date'] ? $_POST['start_date'] : NULL;
    $end_date = $_POST['end_date'] ? $_POST['end_date'] : NULL;
    $time_info = trim($_POST['time_info']);
    $location = trim($_POST['location']);
    $is_online = isset($_POST['is_online']) ? 1 : 0;
    $fee = trim($_POST['fee']);
    $status = trim($_POST['status']);
    $registration_url = trim($_POST['registration_url']);
    $course_info = trim($_POST['course_info']);
    $note = trim($_POST['note']);
    $display_order = (int)$_POST['display_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    // Validate input
    if (empty($title)) {
        $error_message = "Program title is required.";
    } else {
        // Initialize image path with existing value
        $image_path = $program['image_path'];
        
        // Process image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $error_message = "Only JPG, PNG, and WEBP images are allowed.";
            } else {
                // Create uploads directory if it doesn't exist
                $upload_dir = '../images/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate unique filename
                $filename = time() . '_' . $_FILES['image']['name'];
                $target_file = $upload_dir . $filename;
                
                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // If there's an existing image, delete it
                    if (!empty($program['image_path']) && file_exists('../' . $program['image_path']) && strpos($program['image_path'], 'default') === false) {
                        unlink('../' . $program['image_path']);
                    }
                    
                    $image_path = 'images/' . $filename;
                } else {
                    $error_message = "Failed to upload image.";
                }
            }
        }
        
        // Update database if no errors
        if (empty($error_message)) {
            $sql = "UPDATE training_programs SET 
                    title = ?, 
                    subtitle = ?, 
                    description = ?, 
                    highlights = ?, 
                    image_path = ?, 
                    start_date = ?, 
                    end_date = ?, 
                    time_info = ?, 
                    location = ?, 
                    is_online = ?, 
                    fee = ?, 
                    status = ?, 
                    registration_url = ?, 
                    course_info = ?, 
                    note = ?, 
                    display_order = ?, 
                    is_active = ? 
                    WHERE id = ?";
                    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssssssiisi", 
                $title, 
                $subtitle, 
                $description, 
                $highlights, 
                $image_path, 
                $start_date, 
                $end_date, 
                $time_info, 
                $location, 
                $is_online, 
                $fee, 
                $status, 
                $registration_url, 
                $course_info, 
                $note, 
                $display_order, 
                $is_active,
                $id
            );
            
            if ($stmt->execute()) {
                $success_message = "Training program updated successfully!";
                
                // Refresh program data
                $sql = "SELECT * FROM training_programs WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $program = $result->fetch_assoc();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    }
}
?>

<div class="content-card">
    <h2>Edit Training Program</h2>
    
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
            <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Program Title *</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['title']); ?>">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="subtitle" style="display: block; margin-bottom: 8px; font-weight: bold;">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['subtitle']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">A brief caption or tagline for the program</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: bold;">Description</label>
            <textarea id="description" name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($program['description']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Detailed description of the program</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="highlights" style="display: block; margin-bottom: 8px; font-weight: bold;">Highlights</label>
            <textarea id="highlights" name="highlights" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($program['highlights']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">Enter key points, one per line</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Program Image</label>
            <?php if (!empty($program['image_path'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="<?php echo '../' . $program['image_path']; ?>" alt="Current image" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                    <p>Current image</p>
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            <small style="color: #666; display: block; margin-top: 5px;">Leave empty to keep current image. Recommended size: 800x600 pixels. Max file size: 5MB. Supported formats: JPG, PNG, WEBP</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; margin-bottom: 8px; font-weight: bold;">
                <input type="checkbox" name="is_online" value="1" <?php echo $program['is_online'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                This is an online program
            </label>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label for="start_date" style="display: block; margin-bottom: 8px; font-weight: bold;">Start Date</label>
                <input type="date" id="start_date" name="start_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $program['start_date'] ? date('Y-m-d', strtotime($program['start_date'])) : ''; ?>">
            </div>
            
            <div>
                <label for="end_date" style="display: block; margin-bottom: 8px; font-weight: bold;">End Date</label>
                <input type="date" id="end_date" name="end_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $program['end_date'] ? date('Y-m-d', strtotime($program['end_date'])) : ''; ?>">
            </div>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="time_info" style="display: block; margin-bottom: 8px; font-weight: bold;">Time Information</label>
            <input type="text" id="time_info" name="time_info" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['time_info']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., 9:00 AM - 5:00 PM</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="location" style="display: block; margin-bottom: 8px; font-weight: bold;">Location</label>
            <input type="text" id="location" name="location" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['location']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Physical location or "Online" if applicable</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="fee" style="display: block; margin-bottom: 8px; font-weight: bold;">Program Fee</label>
            <input type="text" id="fee" name="fee" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['fee']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">e.g., Rs. 6500/-, Free, etc.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="status" style="display: block; margin-bottom: 8px; font-weight: bold;">Program Status</label>
            <select id="status" name="status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                <option value="Upcoming" <?php echo ($program['status'] == 'Upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                <option value="New Batch Starting" <?php echo ($program['status'] == 'New Batch Starting') ? 'selected' : ''; ?>>New Batch Starting</option>
                <option value="Ongoing" <?php echo ($program['status'] == 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                <option value="Last Few Seats" <?php echo ($program['status'] == 'Last Few Seats') ? 'selected' : ''; ?>>Last Few Seats</option>
                <option value="Registration Closed" <?php echo ($program['status'] == 'Registration Closed') ? 'selected' : ''; ?>>Registration Closed</option>
                <option value="Completed" <?php echo ($program['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="registration_url" style="display: block; margin-bottom: 8px; font-weight: bold;">Registration URL</label>
            <input type="url" id="registration_url" name="registration_url" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo htmlspecialchars($program['registration_url']); ?>">
            <small style="color: #666; display: block; margin-top: 5px;">External registration link (if applicable)</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="course_info" style="display: block; margin-bottom: 8px; font-weight: bold;">Course Info (HTML)</label>
            <textarea id="course_info" name="course_info" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; font-family: monospace;"><?php echo htmlspecialchars($program['course_info']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">HTML formatted info box. Example: &lt;div class="course-info"&gt;&lt;p&gt;&lt;i class="fas fa-calendar"&gt;&lt;/i&gt; Starts: 23rd Magh, 2081&lt;/p&gt;&lt;/div&gt;</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="note" style="display: block; margin-bottom: 8px; font-weight: bold;">Additional Note</label>
            <textarea id="note" name="note" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"><?php echo htmlspecialchars($program['note']); ?></textarea>
            <small style="color: #666; display: block; margin-top: 5px;">A brief note or tagline displayed at the bottom of the program card</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="display_order" style="display: block; margin-bottom: 8px; font-weight: bold;">Display Order</label>
            <input type="number" id="display_order" name="display_order" min="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;" value="<?php echo $program['display_order']; ?>">
            <small style="color: #666; display: block; margin-top: 5px;">Lower numbers appear first. Leave as 0 for default ordering.</small>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" <?php echo $program['is_active'] ? 'checked' : ''; ?> style="margin-right: 10px;">
                Active (program will be displayed on the website)
            </label>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #48825d; color: white; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-save" style="margin-right: 5px;"></i> Update Program
            </button>
            <a href="training-programs.php" style="background: #6c757d; color: white; border: none; border-radius: 5px; padding: 12px 20px; text-decoration: none; transition: all 0.3s ease;">
                <i class="fas fa-times" style="margin-right: 5px;"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/admin-footer.php'; ?>