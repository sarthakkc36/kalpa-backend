<?php
require_once __DIR__ . '../config.php';
require_once __DIR__ . '../settings-helper.php';
// Start the session if you need to track user login status later
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Favicon and Icon Links -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/android-chrome-512x512.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Theme Color -->
    <meta name="theme-color" content="#48825d">

    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php the_setting('site_title', 'Kalpavriksha Education Foundation'); ?>">
    <meta name="description" content="<?php the_setting('meta_description', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.'); ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kalpaeducation.com">
    <meta property="og:title" content="<?php the_setting('site_title', 'Kalpavriksha Education Foundation'); ?>">
    <meta property="og:description" content="<?php the_setting('meta_description', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.'); ?>">
    <meta property="og:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://kalpaeducation.com">
    <meta name="twitter:title" content="<?php the_setting('site_title', 'Kalpavriksha Education Foundation'); ?>">
    <meta name="twitter:description" content="<?php the_setting('meta_description', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.'); ?>">
    <meta name="twitter:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo isset($page_title) ? $page_title : the_setting('site_title', 'Kalpavriksha Education Foundation', false); ?></title>
    
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php if (isset($additional_css)): ?>
        <?php echo $additional_css; ?>
    <?php endif; ?>
    
    <!-- Google Analytics Code -->
    <?php $analytics_code = get_setting('google_analytics', ''); ?>
    <?php if (!empty($analytics_code)): ?>
    <script async>
        <?php echo $analytics_code; ?>
    </script>
    <?php endif; ?>
    
    <!-- Meta Keywords -->
    <?php $meta_keywords = get_setting('meta_keywords', ''); ?>
    <?php if (!empty($meta_keywords)): ?>
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/index.php" class="logo">
            <img src="images/logo.webp" alt="<?php the_setting('site_title', 'Kalpavriksha Logo'); ?>" width="auto" height="auto" />
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <ul class="nav-links">
                <li><a href="/index.php" <?php echo ($current_page == 'home') ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="/school-consultation.php" <?php echo ($current_page == 'school-consultation') ? 'class="active"' : ''; ?>>School Consultation</a></li>
                <li><a href="/phonics.php" <?php echo ($current_page == 'phonics') ? 'class="active"' : ''; ?>>Phonics Consultation</a></li>
                <li><a href="/training.php" <?php echo ($current_page == 'training') ? 'class="active"' : ''; ?>>Training</a></li>
                <li><a href="/Resources.php" <?php echo ($current_page == 'resources') ? 'class="active"' : ''; ?>>Resources</a></li>
                <li><a href="/contact.php" <?php echo ($current_page == 'contact') ? 'class="active"' : ''; ?>>Contact</a></li>
                <li><a href="/about-us.php" <?php echo ($current_page == 'about') ? 'class="active"' : ''; ?>>About Us</a></li>
                <li><a href="/gallery.php" <?php echo ($current_page == 'gallery') ? 'class="active"' : ''; ?>>Gallery</a></li>
            </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-button" aria-label="Toggle mobile menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <ul>
                <li><a href="/index.php" <?php echo ($current_page == 'home') ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="/school-consultation.php" <?php echo ($current_page == 'school-consultation') ? 'class="active"' : ''; ?>>School Consultation</a></li>
                <li><a href="/phonics.php" <?php echo ($current_page == 'phonics') ? 'class="active"' : ''; ?>>Phonics Consultation</a></li>
                <li><a href="/training.php" <?php echo ($current_page == 'training') ? 'class="active"' : ''; ?>>Training</a></li>
                <li><a href="/Resources.php" <?php echo ($current_page == 'resources') ? 'class="active"' : ''; ?>>Resources</a></li>
                <li><a href="/contact.php" <?php echo ($current_page == 'contact') ? 'class="active"' : ''; ?>>Contact</a></li>
                <li><a href="/about-us.php" <?php echo ($current_page == 'about') ? 'class="active"' : ''; ?>>About Us</a></li>
                <li><a href="/gallery.php" <?php echo ($current_page == 'gallery') ? 'class="active"' : ''; ?>>Gallery</a></li>
            </ul>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="menu-overlay"></div>
    </header>
    <div class="top-info-bar">
      <div class="container">
        <div class="info-slider">
          <div class="info-slide">
            <i class="fas fa-phone"></i>
             <a href="tel:<?php the_setting('contact_phone', '01-4547300'); ?>"><?php the_setting('contact_phone', '01-4547300'); ?></a>
          </div>
          <div class="info-slide">
            <i class="fas fa-envelope"></i>
            <a href="mailto:<?php the_setting('contact_email', 'kalpavriksha.efn@gmail.com'); ?>"><?php the_setting('contact_email', 'kalpavriksha.efn@gmail.com'); ?></a>
          </div>
          <div class="info-slide">
            <i class="far fa-clock"></i>
            Office Hour: <?php the_setting('office_hours', '9am - 6pm'); ?>
          </div>
          <div class="info-slide">
            <i class="fas fa-map-marker-alt"></i>
            <?php the_setting('contact_address_ktm', 'Maharajgunj, Kathmandu, Nepal'); ?> || <?php the_setting('contact_address_dang', 'Ghorahi, Dang, Nepal'); ?>
          </div>
        </div>
      </div>
    </div>