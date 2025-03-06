<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once 'includes/config.php';

$page_title = "Training & Workshops";
$current_page = "training";
include 'includes/header.php';
$additonal_styles = '  <style>
    /* Registration Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      overflow-y: auto;
    }

    .modal-content {
      background-color: #fff;
      margin: 5% auto;
      padding: 2rem;
      border-radius: 12px;
      width: 90%;
      max-width: 600px;
      position: relative;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .close {
      position: absolute;
      right: 1rem;
      top: 1rem;
      font-size: 1.5rem;
      font-weight: bold;
      cursor: pointer;
      color: #666;
    }

    .close:hover {
      color: #333;
    }

    .registration-form {
      margin-top: 1.5rem;
    }

    .alert {
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 8px;
      display: none;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .form-error {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 0.25rem;
      display: none;
    }

    .registration-form .form-group {
      margin-bottom: 1.5rem;
    }

    .registration-form label {
      display: block;
      margin-bottom: 0.5rem;
      color: #333;
      font-weight: bold;
    }

    .registration-form input,
    .registration-form select,
    .registration-form textarea {
      width: 100%;
      padding: 0.8rem;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .registration-form input:focus,
    .registration-form select:focus,
    .registration-form textarea:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(72, 130, 93, 0.1);
    }

    .button-loader {
      display: none;
      margin-left: 0.5rem;
    }

    .submit-button {
      width: 100%;
      padding: 1rem;
      background: var(--primary);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .submit-button:hover {
      background: var(--primary-dark);
    }

    .submit-button:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }
    :root {
            --primary: #48825d;
            --primary-light: rgba(72, 130, 93, 0.1);
            --background: #f6f6e5;
            --text: #333333;
            --white: #FFFFFF;
        }

        .training-hero {
            background: linear-gradient(rgba(72, 130, 93, 0.05), rgba(72, 130, 93, 0.05));
            padding: 4rem 2rem;
            text-align: center;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .upcoming-training {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .social-feed {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .social-post {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .post-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .post-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .post-meta {
            flex-grow: 1;
        }

        .post-content {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .post-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e0e0e0;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: none;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .module-list {
            margin: 1rem 0;
            padding-left: 1.5rem;
        }

        .module-list li {
            margin-bottom: 0.5rem;
        }

        .register-button {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 20px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-button:hover {
            background: #3a6b4a;
            transform: translateY(-2px);
        }

        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        } 
  </style>';

// Get upcoming training programs
$upcoming_query = "SELECT * FROM training_programs WHERE start_date >= CURDATE() AND is_active = 1 ORDER BY start_date ASC LIMIT 3";
$upcoming_result = mysqli_query($conn, $upcoming_query);
$upcoming_programs = [];

if ($upcoming_result) {
    while ($row = mysqli_fetch_assoc($upcoming_result)) {
        $upcoming_programs[] = $row;
    }
}

// Get all training modules/categories
$modules_query = "SELECT * FROM training_modules WHERE is_active = 1 ORDER BY display_order ASC";
$modules_result = mysqli_query($conn, $modules_query);
$training_modules = [];

if ($modules_result) {
    while ($row = mysqli_fetch_assoc($modules_result)) {
        $training_modules[] = $row;
    }
}
?>
</head>

<body>
  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Training &amp; Workshops</h1>
      <p>Comprehensive training programs designed to enhance teaching methodologies and student outcomes</p>
    </div>
  </section>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Training Programs - Kalpavriksha Education Foundation</title>
      <style>
          :root {
              --primary: #48825d;
              --primary-light: rgba(72, 130, 93, 0.1);
              --background: #f6f6e5;
              --text: #333333;
              --white: #FFFFFF;
          }
  
          .training-hero {
              background: linear-gradient(rgba(72, 130, 93, 0.05), rgba(72, 130, 93, 0.05));
              padding: 4rem 2rem;
              text-align: center;
          }
  
          .content-grid {
              display: grid;
              grid-template-columns: 2fr 1fr;
              gap: 2rem;
              max-width: 1200px;
              margin: 0 auto;
              padding: 2rem;
          }
  
          .upcoming-training {
              background: white;
              border-radius: 20px;
              padding: 2rem;
              box-shadow: 0 4px 15px rgba(0,0,0,0.1);
          }
  
          .social-feed {
              background: white;
              border-radius: 20px;
              padding: 2rem;
              box-shadow: 0 4px 15px rgba(0,0,0,0.1);
          }
  
          .social-post {
              border: 1px solid #e0e0e0;
              border-radius: 15px;
              padding: 1.5rem;
              margin-bottom: 2rem;
          }
  
          .post-header {
              display: flex;
              align-items: center;
              gap: 1rem;
              margin-bottom: 1rem;
          }
  
          .post-logo {
              width: 50px;
              height: 50px;
              border-radius: 50%;
              object-fit: cover;
          }
  
          .post-meta {
              flex-grow: 1;
          }
  
          .post-content {
              font-size: 0.95rem;
              line-height: 1.6;
          }
  
          .post-actions {
              display: flex;
              gap: 1rem;
              margin-top: 1rem;
              padding-top: 1rem;
              border-top: 1px solid #e0e0e0;
          }
  
          .action-button {
              display: inline-flex;
              align-items: center;
              gap: 0.5rem;
              padding: 0.5rem 1rem;
              border: none;
              background: var(--primary-light);
              color: var(--primary);
              border-radius: 20px;
              cursor: pointer;
              transition: all 0.3s ease;
          }
  
          .module-list {
              margin: 1rem 0;
              padding-left: 1.5rem;
          }
  
          .module-list li {
              margin-bottom: 0.5rem;
          }
  
          .register-button {
              display: inline-block;
              background: var(--primary);
              color: white;
              padding: 0.8rem 1.5rem;
              border-radius: 20px;
              text-decoration: none;
              transition: all 0.3s ease;
          }
  
          .register-button:hover {
              background: #3a6b4a;
              transform: translateY(-2px);
          }
  
          @media (max-width: 992px) {
              .content-grid {
                  grid-template-columns: 1fr;
              }
          }
          /* Training Status Section */
.training-status {
    padding: 4rem 0;
    background-color: var(--background);
}

.program-card {
    background: var(--white);
    border-radius: 20px;
    padding: 2.5rem;
    margin-bottom: 2rem;
    position: relative;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.program-grid {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 2rem;
    align-items: center;
}

.program-image img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.program-content {
    padding: 1rem;
}

.program-title {
    color: var(--primary);
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.program-note {
    font-style: italic;
    color: var(--text);
    margin-top: 1rem;
}

/* Training Modules Section */
.training-modules {
    padding: 0;
    background-color: var(--white);
}

.module-card {
    background: var(--background);
    border-radius: 20px;
    padding: 2.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.module-grid {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 2rem;
    align-items: center;
}

.module-image img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.module-content {
    padding: 1rem;
}

.module-content h3 {
    color: var(--primary);
    font-size: 1.8rem;
    margin-bottom: 1rem;
}

.module-content h4 {
    color: var(--text);
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}

.feature-list {
    list-style: none;
    padding: 0;
    margin: 1.5rem 0;
}

.feature-list li {
    margin-bottom: 0.8rem;
    padding-left: 1.5rem;
    position: relative;
}

.feature-list li:before {
    content: "•";
    color: var(--primary);
    position: absolute;
    left: 0;
}

/* Responsive Design */
@media (max-width: 992px) {
    .program-grid,
    .module-grid {
        grid-template-columns: 1fr;
    }
    
    .program-title {
        font-size: 1.8rem;
    }
    
    .program-card,
    .module-card {
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .training-status,
    .training-modules {
        padding: 2rem 0;
    }
    
    .program-title {
        font-size: 1.5rem;
    }
    
    .module-content h3 {
        font-size: 1.5rem;
    }
}
  /* Training Status Section */
  .training-status {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f6f6e5 0%, #e8f0eb 100%);
    position: relative;
    overflow: hidden;
  }

  .training-status::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 0% 0%, rgba(72, 130, 93, 0.1) 0%, transparent 60%),
                radial-gradient(circle at 100% 100%, rgba(72, 130, 93, 0.1) 0%, transparent 60%);
    pointer-events: none;
  }

  .status-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 3rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
  }

  .program-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    padding: 2.5rem;
    position: relative;
    box-shadow: 0 10px 30px rgba(72, 130, 93, 0.1),
                0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(72, 130, 93, 0.1);
  }

  .program-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(72, 130, 93, 0.15),
                0 1px 5px rgba(0, 0, 0, 0.1);
    border-color: #48825d;
  }

  .badge {
    position: absolute;
    top: -15px;
    right: 25px;
    background: linear-gradient(135deg, #48825d 0%, #3a6b4a 100%);
    color: #fff;
    padding: 0.6rem 1.8rem;
    border-radius: 25px;
    font-size: 0.95rem;
    font-weight: bold;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(72, 130, 93, 0.2);
    text-transform: uppercase;
  }

  .program-image {
    margin: 2rem 0;
    position: relative;
    border-radius: 20px;
    overflow: hidden;
  }

  .program-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(72, 130, 93, 0) 0%, rgba(72, 130, 93, 0.1) 100%);
    z-index: 1;
    transition: opacity 0.3s ease;
  }

  .program-image img {
    width: 100%;
    height: auto;
    border-radius: 20px;
    transform: scale(1.01);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .program-card:hover .program-image img {
    transform: scale(1.05);
  }

  .program-content {
    text-align: center;
  }

  .program-title {
    color: #48825d;
    font-size: 1.8rem;
    margin-bottom: 1.8rem;
    min-height: 3.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1.3;
    font-weight: bold;
    transition: color 0.3s ease;
  }

  .program-details {
    text-align: left;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(72, 130, 93, 0.1);
  }

  .program-details h3 {
    color: #48825d;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    font-weight: 600;
  }

  .feature-list {
    list-style: none;
    padding: 0;
    margin: 1.2rem 0;
  }

  .feature-list li {
    margin-bottom: 1rem;
    padding-left: 2rem;
    position: relative;
    color: #333;
    transition: transform 0.3s ease;
  }

  .feature-list li:hover {
    transform: translateX(5px);
  }

  .feature-list li::before {
    content: '→';
    color: #48825d;
    position: absolute;
    left: 0;
    font-weight: bold;
    transition: transform 0.3s ease;
  }

  .program-note {
    font-style: italic;
    color: #333;
    margin-top: 1.5rem;
    padding: 1rem;
    background: rgba(72, 130, 93, 0.05);
    border-radius: 12px;
    font-size: 0.95rem;
  }

  @media (max-width: 992px) {
    .status-grid {
      grid-template-columns: 1fr;
      gap: 3rem;
    }
    
    .program-title {
      min-height: auto;
      font-size: 1.6rem;
    }
  }

  @media (max-width: 768px) {
    .training-status {
      padding: 4rem 0;
    }
    
    .program-card {
      padding: 2rem;
    }

    .badge {
      font-size: 0.85rem;
      padding: 0.5rem 1.5rem;
    }
  }
      </style>
      <style>
        /* Add this after your existing CSS */
        
        /* Training Modules Section */
        .training-modules {
          padding: 0;
          background: #fff;
          position: relative;
        }
      
        .training-modules::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: radial-gradient(circle at 100% 0%, rgba(72, 130, 93, 0.05) 0%, transparent 50%),
                      radial-gradient(circle at 0% 100%, rgba(72, 130, 93, 0.05) 0%, transparent 50%);
          pointer-events: none;
        }
      
        .module-card {
          background: #fff;
          border-radius: 24px;
          padding: 3rem;
          margin-bottom: 3rem;
          box-shadow: 0 10px 30px rgba(72, 130, 93, 0.1);
          transition: all 0.4s ease;
          position: relative;
          overflow: hidden;
          border: 1px solid rgba(72, 130, 93, 0.1);
        }
      
        .module-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 20px 40px rgba(72, 130, 93, 0.15);
          border-color: #48825d;
        }
      
        .module-grid {
          display: grid;
          grid-template-columns: 1fr 1.5fr;
          gap: 3rem;
          align-items: center;
        }
      
        .module-image {
          position: relative;
          border-radius: 20px;
          overflow: hidden;
        }
      
        .module-image::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: linear-gradient(135deg, rgba(72, 130, 93, 0.2) 0%, transparent 100%);
          z-index: 1;
          opacity: 0;
          transition: opacity 0.3s ease;
        }
      
        .module-card:hover .module-image::before {
          opacity: 1;
        }
      
        .module-image img {
          width: 100%;
          height: auto;
          border-radius: 20px;
          transition: transform 0.5s ease;
        }
      
        .module-card:hover .module-image img {
          transform: scale(1.05);
        }
      
        .module-content {
          padding: 1rem;
        }
      
        .module-content h3 {
          color: #48825d;
          font-size: 2.2rem;
          margin-bottom: 1rem;
          position: relative;
          padding-bottom: 1rem;
        }
      
        .module-content h3::after {
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          width: 60px;
          height: 3px;
          background: linear-gradient(90deg, #48825d, #3a6b4a);
          border-radius: 2px;
          transition: width 0.3s ease;
        }
      
        .module-card:hover .module-content h3::after {
          width: 100px;
        }
      
        .module-content h4 {
          color: #666;
          font-size: 1.3rem;
          margin-bottom: 1.5rem;
          font-weight: 500;
        }
      
        .module-content p {
          color: #666;
          font-size: 1.1rem;
          margin-bottom: 2rem;
          font-style: italic;
        }
      
        .module-list {
          list-style: none;
          padding: 0;
          margin: 0;
        }
      
        .module-list li {
          padding: 1rem 1.5rem;
          margin-bottom: 0.5rem;
          background: rgba(72, 130, 93, 0.05);
          border-radius: 10px;
          transition: all 0.3s ease;
          position: relative;
          padding-left: 3rem;
        }
      
        .module-list li::before {
          content: '✓';
          position: absolute;
          left: 1rem;
          color: #48825d;
          font-weight: bold;
          opacity: 0;
          transform: scale(0);
          transition: all 0.3s ease;
        }
      
        .module-list li:hover {
          background: rgba(72, 130, 93, 0.1);
          transform: translateX(5px);
          padding-left: 3.5rem;
        }
      
        .module-list li:hover::before {
          opacity: 1;
          transform: scale(1);
        }
      
        /* Module Cards Alternating Layout */
        .module-card:nth-child(even) .module-grid {
          grid-template-columns: 1.5fr 1fr;
        }
      
        .module-card:nth-child(even) .module-image {
          order: 2;
        }
      
        .module-card:nth-child(even) .module-content {
          order: 1;
        }
      
        /* Responsive Design */
        @media (max-width: 992px) {
          .module-grid,
          .module-card:nth-child(even) .module-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
          }
      
          .module-card {
            padding: 2rem;
          }
      
          .module-image {
            margin-bottom: 1.5rem;
          }
      
          .module-content h3 {
            font-size: 1.8rem;
          }
      
          .module-content h4 {
            font-size: 1.2rem;
          }
        }
      
        @media (max-width: 768px) {
          .training-modules {
            padding: 4rem 0;
          }
      
          .module-card {
            padding: 1.5rem;
          }
      
          .module-content h3 {
            font-size: 1.6rem;
          }
        }
      
        /* Optional: Animation for scroll reveal */
        .module-card {
          opacity: 0;
          transform: translateY(20px);
          transition: all 0.6s ease;
        }
      
        .module-card.visible {
          opacity: 1;
          transform: translateY(0);
        }
      </style>
      <style>
        /* Featured Programs Section */
        .featured-program {
            padding: 4rem 0;
            background: linear-gradient(135deg, #f6f6e5 0%, #e8f0eb 100%);
            position: relative;
        }
        
        .program-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .featured-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(72, 130, 93, 0.1);
            position: relative;
            border: 1px solid rgba(72, 130, 93, 0.1);
            transition: all 0.4s ease;
        }
        
        .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(72, 130, 93, 0.15);
            border-color: #48825d;
        }
        
        .featured-badge {
            position: absolute;
            top: -15px;
            right: 25px;
            background: linear-gradient(135deg, #48825d 0%, #3a6b4a 100%);
            color: white;
            padding: 0.6rem 1.8rem;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(72, 130, 93, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .featured-content h2 {
            color: #48825d;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }
        
        .featured-description {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            font-style: italic;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .info-box {
            background: rgba(72, 130, 93, 0.05);
            padding: 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .info-box:hover {
            background: rgba(72, 130, 93, 0.1);
            transform: translateY(-3px);
        }
        
        .info-box h3 {
            color: #48825d;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .info-box h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: #48825d;
            transition: width 0.3s ease;
        }
        
        .info-box:hover h3::after {
            width: 60px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }
        
        .info-item i {
            color: #48825d;
            font-size: 1.2rem;
        }
        
        /* Feature List Enhancements */
        .feature-list {
            margin: 1.5rem 0;
        }
        
        .feature-list li {
            position: relative;
            padding: 0.8rem 1rem 0.8rem 2.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .feature-list li::before {
            content: '→';
            position: absolute;
            left: 1rem;
            color: #48825d;
            transition: transform 0.3s ease;
        }
        
        .feature-list li:hover {
            background: rgba(72, 130, 93, 0.05);
            padding-left: 3rem;
        }
        
        .feature-list li:hover::before {
            transform: translateX(5px);
        }
        
        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 3rem 2rem;
            background: rgba(72, 130, 93, 0.05);
            border-radius: 15px;
            margin-top: 2rem;
        }
        
        .register-button {
            display: inline-block;
            background: linear-gradient(135deg, #48825d 0%, #3a6b4a 100%);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(72, 130, 93, 0.2);
        }
        
        .register-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(72, 130, 93, 0.3);
        }
        
        .contact-info {
            margin-top: 1.5rem;
            color: #666;
        }
        
        /* Price Tag */
        .price-tag {
            display: inline-block;
            background: rgba(72, 130, 93, 0.1);
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            color: #48825d;
            font-weight: bold;
            font-size: 1.3rem;
            margin: 1.5rem 0;
        }
        
        /* Timeline Section */
        .timeline {
            max-width: 1000px;
            margin: 3rem auto;
            position: relative;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: rgba(72, 130, 93, 0.2);
        }
        
        .timeline-item {
            position: relative;
            margin: 2rem 0;
            width: 50%;
            padding-right: 2rem;
        }
        
        .timeline-item:nth-child(even) {
            margin-left: 50%;
            padding-right: 0;
            padding-left: 2rem;
        }
        
        .timeline-content {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .timeline-number {
            position: absolute;
            top: 50%;
            right: -40px;
            width: 40px;
            height: 40px;
            background: #48825d;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transform: translateY(-50%);
        }
        
        .timeline-item:nth-child(even) .timeline-number {
            right: auto;
            left: -40px;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .featured-card {
                padding: 2rem;
            }
        
            .featured-content h2 {
                font-size: 1.8rem;
            }
        
            .info-grid {
                grid-template-columns: 1fr;
            }
        
            .timeline::before {
                left: 0;
            }
        
            .timeline-item,
            .timeline-item:nth-child(even) {
                width: 100%;
                margin-left: 0;
                padding-left: 3rem;
                padding-right: 0;
            }
        
            .timeline-number {
                left: -20px !important;
                right: auto !important;
            }
        }
        
        @media (max-width: 768px) {
            .featured-card {
                padding: 1.5rem;
            }
        
            .featured-badge {
                position: relative;
                top: 0;
                right: 0;
                display: inline-block;
                margin-bottom: 1rem;
            }
        
            .featured-content h2 {
                font-size: 1.5rem;
            }
        }
        
        /* Animation Classes */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        </style>
        <style>
            /* Register Button Style */
            .register-btn {
                display: inline-block;
                background: linear-gradient(135deg, #48825d 0%, #3a6b4a 100%);
                color: white;
                padding: 1rem 2.5rem;
                border-radius: 50px;
                text-decoration: none;
                font-weight: bold;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(72, 130, 93, 0.2);
                margin-top: 1.5rem;
                border: none;
                cursor: pointer;
            }
            
            .register-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(72, 130, 93, 0.3);
            }
            
            .register-btn i {
                margin-left: 8px;
            }
            
            .module-card .register-btn {
                margin-top: 2rem;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }
            .phonics-program {
  padding: 6rem 0;
  background: linear-gradient(135deg, #f6f6e5 0%, #e8f0eb 100%);
  position: relative;
  overflow: hidden;
}

.phonics-bg-pattern {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: radial-gradient(#48825d 1px, transparent 1px);
  background-size: 50px 50px;
  opacity: 0.1;
}

.section-header {
  text-align: center;
  margin-bottom: 4rem;
}

.section-title {
  padding-top: 15px;
  color: #48825d;
  font-size: 2.5rem;
  margin-bottom: 1rem;
}

.section-subtitle {
  color: #666;
  font-size: 1.2rem;
  max-width: 600px;
  margin: 0 auto;
}

.program-cards {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 3rem;
}

.feature-card {
  background: white;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(72, 130, 93, 0.1);
  transition: all 0.4s ease;
}

.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(72, 130, 93, 0.15);
}

.feature-card.primary {
  margin-top: auto;
  margin-bottom: 3rem;
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 2rem;
  padding: 3rem;
}

.card-badge {
  display: inline-block;
  background: #48825d;
  color: white;
  padding: 0.5rem 1.5rem;
  border-radius: 50px;
  font-size: 0.9rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
}

.card-content h3 {
  color: #48825d;
  font-size: 2rem;
  margin-bottom: 1.5rem;
  line-height: 1.3;
}

.card-description {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 2rem;
  line-height: 1.6;
}

.highlight-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
}

.highlight-item {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.highlight-icon {
  width: 50px;
  height: 50px;
  background: rgba(72, 130, 93, 0.1);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #48825d;
  font-size: 1.5rem;
}

.highlight-text h4 {
  color: #48825d;
  margin-bottom: 0.3rem;
  font-size: 1rem;
}

.highlight-text p {
  color: #666;
  font-size: 0.9rem;
}

.video-section {
  position: relative;
}

.video-container {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: none;
}

.video-caption {
  text-align: center;
  color: #666;
  margin-top: 1rem;
  font-size: 0.9rem;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

.feature-card.secondary {
  padding: 2rem;
  text-align: center;
}

.card-icon {
  width: 70px;
  height: 70px;
  background: rgba(72, 130, 93, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
  color: #48825d;
  font-size: 2rem;
}

.feature-card.secondary h4 {
  color: #48825d;
  margin-bottom: 1rem;
  font-size: 1.3rem;
}

.feature-list {
  list-style: none;
  padding: 0;
  text-align: left;
}

.feature-list li {
  margin-bottom: 0.8rem;
  padding-left: 1.5rem;
  position: relative;
  color: #666;
}

.feature-list li::before {
  content: "•";
  color: #48825d;
  position: absolute;
  left: 0;
}

.cta-card {
  background: linear-gradient(135deg, #48825d 0%, #3a6b4a 100%);
  border-radius: 24px;
  padding: 3rem;
  text-align: center;
  color: white;
}

.cta-content h3 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

.cta-content p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  opacity: 0.9;
}

.cta-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
}

.register-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  border-radius: 50px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
}

.register-btn.primary {
  background: white;
  color: #48825d;
}

.register-btn.secondary {
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: 2px solid white;
}

.register-btn:hover {
  transform: translateY(-2px);
}

@media (max-width: 1200px) {
  .features-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 992px) {
  .feature-card.primary {
    grid-template-columns: 1fr;
  }

  .highlight-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .phonics-program {
    padding: 4rem 0;
  }

  .section-title {
    font-size: 2rem;
  }

  .features-grid {
    grid-template-columns: 1fr;
  }

  .highlight-grid {
    grid-template-columns: 1fr;
  }

  .cta-buttons {
    flex-direction: column;
  }

  .feature-card.primary {
    padding: 2rem;
  }

  .card-content h3 {
    font-size: 1.5rem;
  }
}
.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}
.course-info {
    background: rgba(72, 130, 93, 0.05);
    padding: 1.5rem;
    border-radius: 12px;
    margin: 1.5rem 0;
}

.course-info p {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 0.8rem;
    color: var(--text);
}

.course-info p:last-child {
    margin-bottom: 0;
}

.course-info i {
    color: var(--primary);
    width: 20px;
    text-align: center;
}
            </style>
  <link rel="stylesheet" href="scroll-to-top.css">
</head>
<!-- Add this section after the page-header and before the featured-program -->
<!-- Training Status Section -->
<section class="training-status">
    <div class="container">
        <h2 class="section-title text-center mb-8">Upcoming & Ongoing Training Programs</h2>
        <div class="status-grid">
            <?php if (!empty($upcoming_programs)): ?>
                <?php foreach ($upcoming_programs as $program): ?>
                    <div class="program-card">
                        <div class="badge"><?php echo htmlspecialchars($program['status']); ?></div>
                        <div class="program-content">
                            <h2 class="program-title"><?php echo htmlspecialchars($program['title']); ?></h2>
                            <div class="program-image">
                                <img src="<?php echo htmlspecialchars($program['image_path']); ?>" alt="<?php echo htmlspecialchars($program['title']); ?>" class="img-responsive">
                            </div>
                            <div class="program-details">
                                <h3>Course Highlights:</h3>
                                <ul class="feature-list">
                                    <?php 
                                    $highlights = explode("\n", $program['highlights']);
                                    foreach ($highlights as $highlight):
                                        if (trim($highlight)):
                                    ?>
                                        <li><?php echo htmlspecialchars(trim($highlight)); ?></li>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </ul>
                                
                                <?php if (!empty($program['course_info'])): ?>
                                <div class="course-info">
                                    <?php echo $program['course_info']; ?>
                                </div>
                                <?php endif; ?>
                                
                                <p class="program-note"><?php echo htmlspecialchars($program['note']); ?></p>
                            </div>
                            <a href="<?php echo !empty($program['registration_url']) ? htmlspecialchars($program['registration_url']) : '#register'; ?>" class="register-btn" <?php echo !empty($program['registration_url']) ? 'target="_blank"' : ''; ?>>
                                Register Now <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-programs">
                    <p>No upcoming programs at the moment. Please check back later or contact us for custom training inquiries.</p>
                </div>
            <?php endif; ?>
        </div>   
    </div>
</section>

<!-- Training Modules Section -->
<section class="training-modules">
    <div class="container">
        <h2 class="section-title">Our Training Modules</h2>
        
        <!-- Featured module (if any) -->
        <?php 
        $featured_module = null;
        foreach ($training_modules as $key => $module) {
            if ($module['is_featured']) {
                $featured_module = $module;
                unset($training_modules[$key]);
                break;
            }
        }
        
        if ($featured_module): 
        ?>
        <div class="program-cards">
            <div class="feature-card primary">
                <div class="card-content">
                    <div class="card-badge">Featured Program</div>
                    <h3><?php echo htmlspecialchars($featured_module['title']); ?></h3>
                    <p class="card-description">
                        <?php echo htmlspecialchars($featured_module['short_description']); ?>
                    </p>
                    
                    <div class="program-highlights">
                        <div class="highlight-grid">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Duration</h4>
                                    <p><?php echo htmlspecialchars($featured_module['duration']); ?></p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Target Audience</h4>
                                    <p><?php echo htmlspecialchars($featured_module['target_audience']); ?></p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Mode</h4>
                                    <p><?php echo htmlspecialchars($featured_module['mode']); ?></p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Certification</h4>
                                    <p><?php echo $featured_module['certification'] ? 'Yes' : 'No'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="video-section">
                    <?php if (!empty($featured_module['video_path'])): ?>
                    <div class="video-container" id="phonics-video-container">
                        <video 
                            id="phonics-video"
                            src="<?php echo htmlspecialchars($featured_module['video_path']); ?>"
                            title="<?php echo htmlspecialchars($featured_module['title']); ?> Overview"
                            muted
                            playsinline
                            controls
                            class="w-full h-full object-cover">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="video-caption">Watch our program overview</div>
                    <?php else: ?>
                    <div class="module-image">
                        <img src="<?php echo htmlspecialchars($featured_module['image_path']); ?>" alt="<?php echo htmlspecialchars($featured_module['title']); ?>">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Regular training modules -->
        <?php foreach ($training_modules as $module): ?>
        <div class="module-card">
            <div class="module-grid">
                <div class="module-image">
                    <img src="<?php echo htmlspecialchars($module['image_path']); ?>" alt="<?php echo htmlspecialchars($module['title']); ?>">
                </div>
                <div class="module-content">
                    <h3><?php echo htmlspecialchars($module['title']); ?></h3>
                    <?php if (!empty($module['subtitle'])): ?>
                    <h4><?php echo htmlspecialchars($module['subtitle']); ?></h4>
                    <?php endif; ?>
                    
                    <?php if (!empty($module['short_description'])): ?>
                    <p><?php echo htmlspecialchars($module['short_description']); ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($module['highlights'])): ?>
                    <ul class="feature-list">
                        <?php 
                        $highlights = explode("\n", $module['highlights']);
                        foreach ($highlights as $highlight):
                            if (trim($highlight)):
                        ?>
                            <li><?php echo htmlspecialchars(trim($highlight)); ?></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                    <?php endif; ?>
                    
                    <a href="#register" class="register-btn">
                        Register Now <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Featured Training Programs -->
<section class="featured-program">
  <style>
      .featured-program {
          padding: 0;
          background: var(--background);
      }

      .program-container {
          max-width: 1200px;
          margin: 0 auto;
      }

      .program-card {
          background: white;
          border-radius: 20px;
          padding: 3rem;
          margin-bottom: 3rem;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          position: relative;
      }

      .badge {
          position: absolute;
          top: 1.5rem;
          right: 1.5rem;
          background: var(--primary);
          color: white;
          padding: 0.5rem 1.5rem;
          border-radius: 25px;
          font-weight: bold;
      }

      .program-title {
          color: var(--primary);
          font-size: 2rem;
          margin-bottom: 1.5rem;
          padding-right: 120px;
      }

      .program-description {
          color: #666;
          font-style: italic;
          margin-bottom: 2rem;
          line-height: 1.6;
      }

      .program-grid {
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 2rem;
          margin-bottom: 2rem;
      }

      .info-box {
          background: var(--background);
          padding: 2rem;
          border-radius: 15px;
      }

      .info-box h3 {
          color: var(--primary);
          margin-bottom: 1.5rem;
          font-size: 1.3rem;
      }

      .info-item {
          margin-bottom: 1rem;
      }

      .info-item:last-child {
          margin-bottom: 0;
      }

      .info-item i {
          color: var(--primary);
          width: 20px;
          margin-right: 0.5rem;
      }

      .feature-list {
          list-style: none;
          padding: 0;
      }

      .feature-list li {
          margin-bottom: 0.8rem;
          padding-left: 1.5rem;
          position: relative;
      }

      .feature-list li:before {
          content: "•";
          color: var(--primary);
          position: absolute;
          left: 0;
      }

      .cta-section {
          text-align: center;
          margin-top: 2rem;
          padding: 2rem;
          background: var(--background);
          border-radius: 15px;
      }

      .register-button {
          display: inline-block;
          background: var(--primary);
          color: white;
          padding: 1rem 2.5rem;
          border-radius: 50px;
          text-decoration: none;
          font-weight: bold;
          margin-bottom: 1rem;
          transition: background-color 0.3s ease;
      }

      .register-button:hover {
          background: var(--primary-dark);
      }

      .contact-info {
          color: #666;
          margin-top: 1rem;
      }

      @media (max-width: 768px) {
          .program-grid {
              grid-template-columns: 1fr;
          }

          .program-title {
              padding-right: 0;
              margin-top: 3rem;
          }

          .badge {
              top: 1rem;
              right: 1rem;
          }

          .program-card {
              padding: 2rem;
          }
      }
  </style>
</section>
  <!-- Contact Section -->

  <!-- Footer -->
<?php include 'includes/footer.php'; ?>
<script defer src="script.js?v=1.0"></script>
<script defer src="optimization.js?v=1.0"></script>
<script>
    // Scroll reveal animation for module cards
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.module-card');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, {
        threshold: 0.1
      });
  
      cards.forEach(card => {
        observer.observe(card);
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fade in animation for elements
        const fadeElements = document.querySelectorAll('.fade-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });
    
        fadeElements.forEach(element => {
            observer.observe(element);
        });
    
        // Optional: Smooth scroll for all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.feature-card');
        
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              entry.target.style.opacity = '1';
              entry.target.style.transform = 'translateY(0)';
            }
          });
        }, {
          threshold: 0.1
        });
      
        cards.forEach(card => {
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';
          card.style.transition = 'all 0.6s ease';
          observer.observe(card);
        });
      });
      </script>
      <script>// Add this to your existing script or in a new script tag
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for module cards
            const moduleCards = document.querySelectorAll('.module-card');
            
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
        
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
        
            moduleCards.forEach(card => {
                observer.observe(card);
            });
        });</script>
        <script>document.addEventListener('DOMContentLoaded', function() {
          const video = document.getElementById('phonics-video');
          
          const videoObserver = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      // Play video when in view
                      video.play();
                      // Stop observing after playing
                      videoObserver.unobserve(entry.target);
                  }
              });
          }, {
              threshold: 0.5
          });
      
          if (video) {
              videoObserver.observe(video);
              // Ensure video starts muted
              video.muted = true;
          }
      });</script>
</body>
</html>