<?php
$page_title = "Dashboard";
include '../includes/admin-header.php';

// Get statistics for the dashboard
$stats = array();

// Count testimonials
$sql = "SELECT COUNT(*) as count FROM testimonials";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['testimonials'] = $row['count'];
} else {
    $stats['testimonials'] = 0;
}

// Count gallery items
$sql = "SELECT COUNT(*) as count FROM gallery_items";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['gallery'] = $row['count'];
} else {
    $stats['gallery'] = 0;
}

// Count partners
$sql = "SELECT COUNT(*) as count FROM partners";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['partners'] = $row['count'];
} else {
    $stats['partners'] = 0;
}

// Count training programs
$sql = "SELECT COUNT(*) as count FROM training_programs";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['training_programs'] = $row['count'];
} else {
    $stats['training_programs'] = 0;
}

// Count training modules
$sql = "SELECT COUNT(*) as count FROM training_modules";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['training_modules'] = $row['count'];
} else {
    $stats['training_modules'] = 0;
}

// Count products
$sql = "SELECT COUNT(*) as count FROM products";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stats['products'] = $row['count'];
} else {
    $stats['products'] = 0;
}

// Get recent updates (last 5 items added across all content types)
$recent_items = array();

// Get recent testimonials
$sql = "SELECT 'testimonial' as type, id, name as title, created_at FROM testimonials ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recent_items[] = $row;
    }
}

// Get recent gallery items
$sql = "SELECT 'gallery' as type, id, title, created_at FROM gallery_items ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recent_items[] = $row;
    }
}

// Get recent programs
$sql = "SELECT 'program' as type, id, title, created_at FROM training_programs ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recent_items[] = $row;
    }
}

// Sort by created_at
usort($recent_items, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

// Take only the 5 most recent
$recent_items = array_slice($recent_items, 0, 5);
?>

<div class="dashboard-welcome content-card">
    <h2>Welcome to the Admin Dashboard</h2>
    <p>Manage your website content from this control panel. Here's an overview of your site content:</p>
</div>

<div class="dashboard-stats content-card">
    <h2>Website Statistics</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-comment-dots"></i>
            <h3><?php echo $stats['testimonials']; ?></h3>
            <p>Testimonials</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-images"></i>
            <h3><?php echo $stats['gallery']; ?></h3>
            <p>Gallery Items</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-handshake"></i>
            <h3><?php echo $stats['partners']; ?></h3>
            <p>Partners</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-calendar-alt"></i>
            <h3><?php echo $stats['training_programs']; ?></h3>
            <p>Training Programs</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-book"></i>
            <h3><?php echo $stats['training_modules']; ?></h3>
            <p>Training Modules</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-shopping-cart"></i>
            <h3><?php echo $stats['products']; ?></h3>
            <p>Products</p>
        </div>
    </div>
</div>

<div class="dashboard-actions content-card">
    <h2>Quick Actions</h2>
    <div class="actions-grid">
        <a href="add-testimonial.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Testimonial</span>
        </a>
        
        <a href="add-gallery-item.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Gallery Item</span>
        </a>
        
        <a href="add-training-program.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Training Program</span>
        </a>
        
        <a href="add-training-module.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Training Module</span>
        </a>
        
        <a href="add-product.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Product</span>
        </a>
        
        <a href="add-partner.php" class="action-card">
            <i class="fas fa-plus-circle"></i>
            <span>Add Partner</span>
        </a>
    </div>
</div>

<div class="dashboard-recent content-card">
    <h2>Recent Updates</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recent_items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td>
                        <?php 
                            switch ($item['type']) {
                                case 'testimonial':
                                    echo '<span class="badge testimonial">Testimonial</span>';
                                    break;
                                case 'gallery':
                                    echo '<span class="badge gallery">Gallery Item</span>';
                                    break;
                                case 'program':
                                    echo '<span class="badge program">Training Program</span>';
                                    break;
                                default:
                                    echo '<span class="badge">Other</span>';
                            }
                        ?>
                    </td>
                    <td><?php echo date('M d, Y', strtotime($item['created_at'])); ?></td>
                    <td>
                        <?php 
                            $edit_url = 'edit-' . str_replace('program', 'training-program', $item['type']) . '.php?id=' . $item['id'];
                        ?>
                        <a href="<?php echo $edit_url; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
            <?php if (empty($recent_items)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No recent updates found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 20px;
    }
    
    .stat-card {
        background: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .stat-card i {
        font-size: 24px;
        color: #48825d;
        margin-bottom: 10px;
    }
    
    .stat-card h3 {
        font-size: 28px;
        margin: 10px 0;
        color: #48825d;
    }
    
    .stat-card p {
        margin: 0;
        color: #666;
    }
    
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 20px;
    }
    
    .action-card {
        background: #48825d;
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .action-card:hover {
        background: #3a6b4a;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .action-card i {
        font-size: 24px;
        margin-bottom: 10px;
    }
    
    .dashboard-recent {
        margin-top: 20px;
    }
    
    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }
    
    .badge.testimonial {
        background: #e3f2fd;
        color: #0d47a1;
    }
    
    .badge.gallery {
        background: #e8f5e9;
        color: #1b5e20;
    }
    
    .badge.program {
        background: #fff3e0;
        color: #e65100;
    }
    
    @media (max-width: 992px) {
        .stats-grid, .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .stats-grid, .actions-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php include '../includes/admin-footer.php'; ?>