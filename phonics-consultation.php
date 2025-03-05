<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><!-- Favicon and Icon Links -->
	<link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
	<link href="/images/android-chrome-192x192.png" rel="icon" sizes="192x192" type="image/png" />
	<link href="/images/android-chrome-512x512.png" rel="icon" sizes="512x512" type="image/png" />
	<link href="/images/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
	<link href="/site.webmanifest" rel="manifest" /><!-- Theme Color --><meta name="theme-color" content="#48825d"><!-- Primary Meta Tags --><meta name="title" content="Kalpavriksha Education Foundation"><meta name="description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources."><!-- Open Graph Meta Tags --><meta property="og:type" content="website"><meta property="og:url" content="https://kalpaeducation.com"><meta property="og:title" content="Kalpavriksha Education Foundation"><meta property="og:description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources."><meta property="og:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png"><!-- Twitter Card Meta Tags --><meta name="twitter:card" content="summary_large_image"><meta name="twitter:url" content="https://kalpaeducation.com"><meta name="twitter:title" content="Kalpavriksha Education Foundation"><meta name="twitter:description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources."><meta name="twitter:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png"><meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"><meta http-equiv="Pragma" content="no-cache"><meta http-equiv="Expires" content="0"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Educational Consultation - Kalpavriksha Education Foundation</title>
	<link href="/styles.css?v=1.0" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<link href="/optimization.css" rel="stylesheet" />
	<link href="scroll-to-top.css" rel="stylesheet" />
	<style type="text/css">.alert {
        padding: 1rem;
        margin: 1rem 0;
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
    .button-loader {
        margin-left: 0.5rem;
    }
    .submit-button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    .stats-section {
    padding: 4rem 0;
    background-color: #48825d;
    color: white;
}
/* Enhanced form styling */
.consultation-form input:focus,
.consultation-form textarea:focus,
.consultation-form select:focus {
  border-color: #48825d;
  box-shadow: 0 0 0 2px rgba(72, 130, 93, 0.2);
}

/* Pulse animation for CTA buttons */
.submit-button {
  position: relative;
  overflow: hidden;
}

.submit-button:after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.3s ease-out, height 0.3s ease-out;
}

.submit-button:active:after {
  width: 200px;
  height: 200px;
}

/* Smooth scroll behavior */
html {
  scroll-behavior: smooth;
}

/* Enhanced accessibility focus styles */
*:focus {
  outline: 2px solid #48825d;
  outline-offset: 2px;
}

/* Responsive image grid */
.materials-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
}

/* Loading animation */
@keyframes spin {
  to { transform: rotate(360deg); }
}

.button-loader {
  animation: spin 1s linear infinite;
}

/* Enhanced mobile responsiveness */
@media (max-width: 768px) {
  .stats-grid, .features-grid, .program-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  
  .form-wrapper {
    padding: 1rem;
  }
}

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    h1, h2, h3 {
      font-weight: 700;
    }
    
    h2 {
      font-size: 2.5rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .tagline {
      font-size: 1.5rem;
      max-width: 800px;
      margin: 0 auto 2rem;
    }

    /* Why Consult Section */
    .why-consult-section {
      padding: 6rem 0;
    }
    
    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .benefit-item {
      text-align: center;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      transition: transform 0.3s ease-in-out;
    }
   
    .benefit-item:hover {
     transform: translateY(-5px);
    }

    .benefit-item i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #48825d;  
    }
    
    .benefit-item h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    /* Integrated Curriculum Section */
    .curriculum-section {
      background: #f4f4f4;  
      padding: 6rem 0;
    }

    .curriculum-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;  
    }

    .curriculum-item {
      text-align: center;
    }

    .curriculum-item img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 1rem;
    }

    .curriculum-item h3 {
      font-size: 1.25rem;
    }

    /* Materials Section */  
    .materials-section {
      padding: 6rem 0;
    }

    .materials-grid {
      display: grid;  
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
    }

    .material-item {
      text-align: center;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .material-item img {
      width: 100px;
      height: 100px;  
      object-fit: contain;
      margin-bottom: 1rem;
    }

    /* Stats Section */
    .stats-section {
      background: #48825d;
      color: #fff;
      text-align: center;
      padding: 6rem 0;
    }
    
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));  
      gap: 2rem;
    }

    .stat-item i {
      font-size: 3rem;
      margin-bottom: 0.5rem;
    }

    .stat-item h3 {
      font-size: 2.5rem;
      font-weight: 700;  
      margin-bottom: 0;
    }

    .stat-item p {
      font-size: 1.25rem;
      text-transform: uppercase; 
    }

    /* Action Plan Section */
    .action-plan-section {
      padding: 6rem 0;
    }

    .action-plan-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .action-plan-list li {
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
      position: relative;
      padding-left: 30px;
    }

    .action-plan-list li::before {
      content: '\f00c'; 
      font-weight: 900;
      position: absolute;
      left: 0;
      color: #48825d;
    }

    /* Timeline Section */
    .timeline-section {
      padding: 6rem 0;
      background: #f4f4f4;
    }
    
    .timeline {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
    }

    .timeline::after {
      content: '';
      position: absolute;
      width: 6px;  
      background-color: #48825d;
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -3px;
    }

    .timeline-item {
      padding: 10px 40px;
      position: relative;
      background-color: inherit;
      width: 50%;
    }

    .timeline-item:nth-child(even) {
     left: 50%;
    }

    .timeline-content {
      padding: 20px 30px;
      background-color: #fff;
      position: relative;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .timeline-item::after {
      content: '';
      position: absolute;  
      width: 25px;
      height: 25px;
      right: -17px;
      background-color: white;
      border: 4px solid #48825d;
      top: 15px;
      border-radius: 50%;
      z-index: 1;
    }
    
    .timeline-item:nth-child(even)::after {
      left: -16px;
    }

    /* Takeaways Section */
    .takeaways-section {  
      padding: 6rem 0;
    }
    
    .takeaways-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .takeaway-item {
      text-align: center; 
    }
    
    .takeaway-item img {
      width: 200px;  
      height: 200px;
      object-fit: cover;  
      border-radius: 5px;
      margin-bottom: 1rem;
    }

    .takeaway-item h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
      h2 {
        font-size: 2rem;
      }
      
      .hero-section h1 {
        font-size: 3rem; 
      }

      .tagline {
        font-size: 1.25rem;
      }
      
      .hero-cta {
        font-size: 1.5rem;
      }

      .benefits-grid,
      .curriculum-grid,
      .materials-grid,       
      .stats-grid,
      .takeaways-grid {
        grid-template-columns: 1fr;
      }

      .timeline::after {
        left: 31px;  
      }
      
      .timeline-item {
        width: 100%;
        padding-left: 70px; 
        padding-right: 25px;
      }

      .timeline-item::before {
        left: 60px;
        border: medium solid white;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
      }

      .timeline-item::after {
        left: 15px;
      }
      
      .timeline-item:nth-child(even) {
        left: 0%;
      }

      .timeline-item:nth-child(even)::after {
        left: 15px; 
      }
    }
            /* Global Styles */
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .hero-content {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero-content > * {
            position: relative;
            z-index: 1;
            color: #FFFFFF
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-motto {
            font-size: 2.5rem;
            font-weight: 600;
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 0.4s;
            animation-fill-mode: both;
        }

        /* Curriculum Section */
        .curriculum-section {
            padding: 6rem 2rem;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .curriculum-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            z-index: 0;
        }

        .curriculum-content {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #48825d;
        }

        .curriculum-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .curriculum-card {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .curriculum-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(72, 130, 93, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .curriculum-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .curriculum-card:hover::before {
            opacity: 1;
        }

        .curriculum-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: #48825d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .curriculum-card:hover .curriculum-icon {
            transform: scale(1.1);
        }

        /* Materials Section */
        .materials-section {
            padding: 6rem 2rem;
            background: #f8f9fa;
            position: relative;
        }

        .materials-video-container {
            max-width: 800px;
            margin: 0 auto 4rem;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .materials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .material-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .material-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #48825d;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .material-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .material-card:hover::after {
            transform: scaleX(1);
        }

        .material-icon {
            font-size: 2.5rem;
            color: #48825d;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .material-card:hover .material-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .material-card h3 {
            font-size: 1.3rem;
            color: #333;
            margin: 0;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-motto {
                font-size: 2rem;
            }

            .curriculum-grid,
            .materials-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
                /* Global Styles */
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Georgia, serif;
        }

        /* Hero Section */

        .hero-content {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero-content > * {
            position: relative;
            z-index: 1;
            color: #FFFFFF
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-motto {
            font-size: 2.5rem;
            font-weight: 600;
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 0.4s;
            animation-fill-mode: both;
        }

        /* Curriculum Section */
        .curriculum-section {
            padding: 6rem 2rem;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .curriculum-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            z-index: 0;
        }

        .curriculum-content {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #48825d;
        }

        .curriculum-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .curriculum-card {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .curriculum-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(72, 130, 93, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .curriculum-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .curriculum-card:hover::before {
            opacity: 1;
        }

        .curriculum-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: #48825d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .curriculum-card:hover .curriculum-icon {
            transform: scale(1.1);
        }

        /* Materials Section */
        .materials-section {
            padding: 6rem 2rem;
            background: #f6f6e5;
            position: relative;
        }

        .materials-video-container {
            max-width: 800px;
            margin: 0 auto 4rem;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .materials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .material-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .material-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #48825d;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .material-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .material-card:hover::after {
            transform: scaleX(1);
        }

        .material-icon {
            font-size: 2.5rem;
            color: #48825d;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .material-card:hover .material-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .material-card h3 {
            font-size: 1.3rem;
            color: #333;
            margin: 0;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-motto {
                font-size: 2rem;
            }

            .curriculum-grid,
            .materials-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
        .stats-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #48825d 0%, #48825d 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stats-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/api/placeholder/100/100') center/30px repeat;
            opacity: 0.1;
        }

        .light h2 {
            color: white !important;
        }

        .light h2::after {
            background: white !important;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto 4rem;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .implementation-features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-3px);
        }

        /* Action Plan Section Styles */
        .action-plan-section {
            padding: 6rem 2rem;
            background: #ffffff;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
            margin-top: -2rem;
            margin-bottom: 4rem;
        }

        .timeline-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: #48825d;
        }

        .timeline-item {
            position: relative;
            padding: 2rem;
            width: calc(50% - 2rem);
            margin-bottom: 2rem;
        }

        .timeline-item:nth-child(odd) {
            margin-left: auto;
        }

        .timeline-dot {
            position: absolute;
            left: -2.5rem;
            width: 1.5rem;
            height: 1.5rem;
            background: #48825d;
            border-radius: 50%;
            top: 2.5rem;
        }

        .timeline-item:nth-child(odd) .timeline-dot {
            left: auto;
            right: -2.5rem;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
        }

        .timeline-content h3 {
            color: #48825d;
            margin-bottom: 1rem;
        }

        .timeline-content ul {
            list-style: none;
            padding: 0;
        }

        .timeline-content li {
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .timeline-content li::before {
            content: '•';
            color: #48825d;
            position: absolute;
            left: 0;
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 1rem;
            }

            .timeline-item {
                width: calc(100% - 3rem);
                margin-left: 3rem !important;
            }

            .timeline-dot {
                left: -2.5rem !important;
            }
        }
              .takeaways-section {
            padding: 6rem 2rem;
            background: #f8f9fa;
        }

        .takeaways-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .takeaways-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .takeaway-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .takeaway-card:hover {
            transform: translateY(-5px);
        }

        .takeaway-icon {
            width: 60px;
            height: 60px;
            background: #48825d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.5rem;
        }

        .takeaway-card h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .takeaway-card ul {
            list-style: none;
            padding: 0;
        }

        .takeaway-card li {
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
            color: #666;
        }

        .takeaway-card li::before {
            content: '✓';
            color: #48825d;
            position: absolute;
            left: 0;
        }

        /* Consultation Form Section Styles */
        .consultation-form-section {
            padding: 6rem 2rem;
            background: #f8f9fa;
        }

        .consultation-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .form-info h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .form-description {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .info-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
        }

        .info-card i {
            font-size: 2rem;
            color: #48825d;
            margin-bottom: 1rem;
        }

        .info-card h4 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .info-card p {
            color: #666;
            font-size: 0.9rem;
        }

        .consultation-types {
            margin-bottom: 2rem;
        }

        .consultation-types h3 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .program-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .program-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
        }

        .program-card h4 {
            color: #333;
            margin-bottom: 1rem;
        }

        .form-container {
          width: 100%;
            background: transparent;
        }

        .consultation-form .form-group {
            margin-bottom: 1.5rem;
        }

        .consultation-form label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .consultation-form input,
        .consultation-form select,
        .consultation-form textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-size: 0.95rem;
        }

        .consultation-form input:focus,
        .consultation-form select:focus,
        .consultation-form textarea:focus {
            border-color: #48825d;
            background: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(72, 130, 93, 0.1);
        }

        .consultation-form input:focus,
        .consultation-form select:focus,
        .consultation-form textarea:focus {
            border-color: #48825d;
            outline: none;
        }

        .submit-button {
            background: #48825d;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            transition: background 0.3s ease;
            width: 100%;
        }

        .submit-button:hover {
            background: #3a6b4a;
        }

        @media (max-width: 768px) {
            .consultation-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
 /* hero-section.css */

.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 2rem;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    color: #FFFFFF
}

.hero-title {
    font-size: 4.5rem;
    font-weight: 700;
    margin-bottom: 2.5rem;
    color: #5CBA6D;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.hero-tagline {
    font-size: 2rem;
    line-height: 1.6;
    margin-bottom: 3.5rem;
    /* Pure white color with stronger text shadow for contrast */
    color: #FFFFFF;
    font-weight: 500;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    text-shadow: 
        2px 2px 4px rgba(0, 0, 0, 0.5),
        0 0 20px rgba(255, 255, 255, 0.1);
    /* Optional background for even better readability */
    background: rgba(0, 0, 0, 0.4);
    padding: 1.5rem 2rem;
    border-radius: 10px;
}

.hero-motto {
    font-size: 4rem;
    font-weight: 700;
    letter-spacing: 4px;
    color: #7ED957;
    margin-top: 2rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-title {
        font-size: 3.5rem;
    }

    .hero-motto {
        font-size: 3rem;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2.8rem;
    }

    .hero-motto {
        font-size: 2.5rem;
    }
} 
.stat-number.static-text {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-number.static-text::after {
    display: none;
}
.curriculum-spectacular {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f6f6e5, #f6f6e5);
            position: relative;
            overflow: hidden;
        }

        .floating-particles {
            background-color: #fbfdfc;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .section-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .highlight-text {
            background-color: white;
            margin:auto; 
            overflow:hidden; 
            border-radius:25px; 
            box-shadow: 0px 1px 25px rgb(1, 126, 39);
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .highlight-badge {
            background: linear-gradient(135deg, #48825d, #5a9c70);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-size: 16px;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(72, 130, 93, 0.3);
            animation: badgePulse 2s infinite;
        }

        .highlight-text h2 {
            font-size: 48px;
            color: #333;
            margin: 20px 0;
            position: relative;
            display: inline-block;
        }

        .highlight-text h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: #48825d;
            animation: lineWidth 3s infinite;
        }

        .highlight-text p {
            font-size: 20px;
            color: #666;
            max-width: 600px;
            margin: 20px auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .feature-card {
            perspective: 1000px;
            padding: 15px;
        }

        .card-3d {
            position: relative;
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
            box-shadow: 0 15px 35px rgba(72, 130, 93, 0.1);
        }

        .feature-card:hover .card-3d {
            transform: rotateY(10deg) rotateX(10deg);
            box-shadow: 0 30px 50px rgba(72, 130, 93, 0.2);
        }

        .floating-icon {
            width: 90px;
            height: 90px;
            background: #48825d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            margin-bottom: 25px;
            position: relative;
            animation: floatingIcon 3s infinite ease-in-out;
        }

        .icon-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            animation: particleRotate 10s linear infinite;
        }

        .icon-particles::before,
        .icon-particles::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: #48825d;
            border-radius: 50%;
            opacity: 0.5;
        }

        .card-3d h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
            position: relative;
        }

        .card-3d p {
            color: #666;
            margin-bottom: 20px;
            position: relative;
        }

        .card-3d ul {
            list-style: none;
            padding: 0;
            position: relative;
        }

        .card-3d li {
            color: #48825d;
            margin: 10px 0;
            padding-left: 25px;
            position: relative;
        }

        .card-3d li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: #48825d;
            animation: arrowBounce 1s infinite;
        }

        .card-glow {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), 
                                      rgba(72, 130, 93, 0.15) 0%,
                                      transparent 80%);
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            border-radius: 20px;
        }

        .feature-card:hover .card-glow {
            opacity: 1;
        }

        @keyframes floatingIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes particleRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes badgePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes lineWidth {
            0%, 100% { width: 100px; }
            50% { width: 200px; }
        }

        @keyframes arrowBounce {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(5px); }
        }

        @media (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
            }

            .highlight-text h2 {
                font-size: 36px;
            }

            .feature-card {
                perspective: none;
            }

            .card-3d {
                transform: none !important;
            }
        }
        .stat-number.static-text {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-number.static-text::after {
    display: none;
}
.action-plan-section {
    padding: 6rem 2rem;
    background: #ffffff;
}

.timeline-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 0;
}

.timeline {
    position: relative;
    padding: 2rem 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 100%;
    background: #48825d;
}

.timeline-item {
    display: grid;
    grid-template-columns: 1fr 60px 1fr;
    gap: 20px;
    margin-bottom: 4rem;
    position: relative;
    align-items: center;
}

.timeline-dot {
    width: 20px;
    height: 20px;
    background: #48825d;
    border-radius: 50%;
    margin: 0 auto;
    z-index: 2;
}

.timeline-content, .timeline-media {
    width: 100%;
}

/* Left side positioning */
.left {
    grid-column: 1 / 2;
    justify-self: end;
}

/* Right side positioning */
.right {
    grid-column: 3 / 4;
    justify-self: start;
}

.timeline-content {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.timeline-content:hover {
    transform: translateY(-5px);
}

.timeline-content h3 {
    color: #48825d;
    margin-bottom: 1rem;
}

.timeline-content ul {
    list-style: none;
    padding: 0;
}

.timeline-content li {
    margin-bottom: 0.5rem;
    padding-left: 1.5rem;
    position: relative;
}

.timeline-content li::before {
    content: '•';
    color: #48825d;
    position: absolute;
    left: 0;
}

.timeline-media {
    height: 300px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.timeline-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.timeline-media:hover img {
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 992px) {
    .timeline::before {
        left: 30px;
    }

    .timeline-item {
        grid-template-columns: 60px 1fr;
        gap: 20px;
    }

    .timeline-dot {
        grid-column: 1;
        margin: 0;
    }

    .timeline-content, .timeline-media {
        grid-column: 2;
        width: 100%;
    }

    .left, .right {
        grid-column: 2;
        justify-self: start;
    }

    .timeline-media {
        height: 250px;
    }
}
	</style>
</head>
<body><!-- Header -->
<header><a class="logo" href="/index"><img alt="Kalpavriksha Logo" height="auto" src="/images/logo.webp" width="auto" /> </a> <!-- Desktop Navigation -->
<nav class="desktop-nav">
<ul class="nav-links">
	<li><a href="/index">Home</a></li>
	<li><a class="active" href="/consultation">Consultation</a></li>
	<li><a href="/training">Training</a></li>
	<li><a href="/Resources">Resources</a></li>
	<li><a href="/contact">Contact</a></li>
	<li><a href="/about-us">About Us</a></li>
	<li><a href="/gallery">Gallery</a></li>
</ul>
</nav>
<!-- Mobile Menu Button --><button class="mobile-menu-button"></button> <!-- Mobile Menu -->

<div class="mobile-menu">
<ul>
	<li><a href="/index">Home</a></li>
	<li><a class="active" href="/Consultation">Consultation</a></li>
	<li><a href="/training">Training</a></li>
	<li><a href="/Resources">Resources</a></li>
	<li><a href="/contact">Contact</a></li>
	<li><a href="/about-us">About Us</a></li>
	<li><a href="/gallery">Gallery</a></li>
</ul>
</div>

<div class="menu-overlay"></div>
</header>

<div class="top-info-bar">
<div class="container">
<div class="info-slider">
<div class="info-slide"><a href="tel:01-4547300">01-4547300</a></div>

<div class="info-slide"><a href="mailto:kalpavriksha.efn@gmail.com">kalpavriksha.efn@gmail.com</a></div>

<div class="info-slide">Office Hour: 9am - 6pm</div>

<div class="info-slide">Maharajgunj, Kathmandu, Nepal || Ghorai, Dang, Nepal</div>
</div>
</div>
</div>

<section class="hero-section">
<div class="hero-overlay"></div>

<video autoplay="" class="hero-video-bg" loop="" muted="" playsinline=""><source src="/videos/kalpa.mp4" type="video/mp4" /></video>

<div class="hero-content">
<h1 class="hero-title">School Consultation</h1>

<p style="color: white;">An integrated curriculum fostering holistic development through phonics and life skills education</p>

<div class="hero-motto">LEARN. GROW. LEAD.</div>
</div>
</section>

<section class="why-section">
<div class="section-title">
<h2>Why Choose Kalpavriksha?</h2>
</div>

<div class="benefits-grid">
<div class="benefit-card">
<h3>Innovative Teaching Methods</h3>

<p>Introducing modern teaching techniques to make learning more engaging and effective.</p>
</div>

<div class="benefit-card">
<h3>Customized Curriculum</h3>

<p>Tailoring the curriculum to suit the diverse learning needs of students, fostering individual growth.</p>
</div>

<div class="benefit-card">
<h3>Technology Integration</h3>

<p>Implementing digital tools to enhance the learning experience and promote technological literacy.</p>
</div>

<div class="benefit-card">
<h3>Teacher Training Programs</h3>

<p>Empowering educators with specialized training to improve their teaching skills and methods.</p>
</div>

<div class="benefit-card">
<h3>Student-Centric Approach</h3>

<p>Focusing on the holistic development of students, fostering critical thinking and problem-solving abilities.</p>
</div>

<div class="benefit-card">
<h3>Community Engagement</h3>

<p>Involving the local community to create a supportive ecosystem for the overall growth of students.</p>
</div>
</div>

<p>&nbsp;</p>
</section>
<!-- Curriculum Section -->

<section class="curriculum-spectacular">
<div class="floating-particles"></div>

<div class="section-container">
<div class="highlight-text"><span class="highlight-badge">Discover Our Excellence</span>

<h2>Integrated Curriculum Features</h2>

<p>Empowering future leaders through innovative education</p>
</div>

<div class="features-grid">
<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>English Phonics</h3>

<p>Systematic approach to language mastery</p>

<ul>
	<li>Interactive Learning</li>
	<li>Progressive Development</li>
	<li>Confidence Building</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>

<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>Nepali Phonics</h3>

<p>Cultural integration with modern methods</p>

<ul>
	<li>Native Proficiency</li>
	<li>Cultural Context</li>
	<li>Comprehensive Skills</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>

<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>Life Skills</h3>

<p>Building essential life competencies</p>

<ul>
	<li>Social Intelligence</li>
	<li>Emotional Growth</li>
	<li>Leadership Skills</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>

<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>STEAM Education</h3>

<p>Integrating science, arts &amp; technology</p>

<ul>
	<li>Project Learning</li>
	<li>Creative Thinking</li>
	<li>Innovation Focus</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>

<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>Fun Mathematics</h3>

<p>Making numbers exciting &amp; engaging</p>

<ul>
	<li>Interactive Games</li>
	<li>Problem Solving</li>
	<li>Practical Math</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>

<div class="feature-card">
<div class="card-3d">
<div class="floating-icon">
<div class="icon-particles"></div>
</div>

<h3>CAS System</h3>

<p>Advanced progress tracking &amp; feedback</p>

<ul>
	<li>Real-time Monitoring</li>
	<li>Personal Growth</li>
	<li>Data Analytics</li>
</ul>

<div class="card-glow"></div>

<div class="hover-effect"></div>
</div>
</div>
</div>
</div>
</section>

<section class="materials-section">
<div class="section-title">
<h2>Our Materials &amp; Resources</h2>
</div>

<div class="materials-video-container"><!-- Placeholder for demo video -->
<video controls="" height="450" poster="/api/placeholder/800/450" width="100%"><source src="/videos/kalpa-long.mp4" type="video/mp4" /> Your browser does not support the video tag.</video>
</div>

<div class="materials-grid"><!-- Material cards with enhanced styling -->
<div class="material-card">
<div class="material-icon"><img src="images/Reference.webp" style="height: 285px;" /></div>

<h3>Reference Books</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/DisplayCards.png" /></div>

<h3>Display Cards</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/Story.png" style="height: 285px;" /></div>

<h3>Story Books</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/board.png" /></div>

<h3>Board Games</h3>
</div>

<div class="material-card">
<div class="material-icon"></div>

<h3>Table Games</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/flashcards.png" /></div>

<h3>Flashcards</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/workbook.webp" style="height: 285px;" /></div>

<h3>Workbooks</h3>
</div>

<div class="material-card">
<div class="material-icon"></div>

<h3>Reading Books</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/AssesmentSheet.webp" /></div>

<h3>Assessment Sheets</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/board.png" /></div>

<h3>Cutouts</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/Checklist.png" /></div>

<h3>Checklist</h3>
</div>

<div class="material-card">
<div class="material-icon"><img src="images/booklet.png" /></div>

<h3>Booklet</h3>
</div>
</div>
</section>

<section class="stats-section">
<div class="stats-overlay"></div>

<div class="section-title light">
<h2>Implementation Statistics</h2>
</div>

<div class="stats-grid">
<div class="stat-card">
<div class="stat-icon"></div>

<div class="stat-number" data-target="15">0</div>

<div class="stat-label">Physical Visits</div>
</div>

<div class="stat-card">
<div class="stat-icon"></div>

<div class="stat-number" data-target="50">0</div>

<div class="stat-label">Virtual Sessions</div>
</div>

<div class="stat-card">
<div class="stat-icon"></div>

<div class="stat-number" data-target="15000">0</div>

<div class="stat-label">Resources</div>
</div>

<div class="stat-card">
<div class="stat-icon"></div>

<div class="stat-number static-text">As per Required</div>

<div class="stat-label">Parent Workshops</div>
</div>

<div class="stat-card">
<div class="stat-icon"></div>

<div class="stat-number static-text">As per Required</div>

<div class="stat-label">Exhibition</div>
</div>
</div>
<style type="text/css">.stats-section {
        padding: 6rem 2rem;
        background: linear-gradient(135deg, #48825d 0%, #48825d 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .stat-number {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .stat-number::after {
        content: '+';
        font-size: 2.5rem;
        font-weight: 700;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-number.completed::after {
        opacity: 1;
    }

    .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
</section>
<!-- Action Plan Section -->

<section class="action-plan-section">
<div class="section-title">
<h2>Yearly Action Plan</h2>

<p class="section-subtitle">3 Years Contract</p>
</div>

<div class="timeline-container">
<div class="timeline"><!-- Content left, image right -->
<div class="timeline-item">
<div class="timeline-content left">
<h3>Infrastructure &amp; Setup</h3>

<ul>
	<li>Physical Infrastructure Consultation</li>
	<li>Initial Assessment</li>
	<li>Resource Planning</li>
</ul>
</div>

<div class="timeline-dot"></div>

<div class="timeline-media right"><img alt="Infrastructure Setup" src="/images/infrastructure.webp" /></div>
</div>
<!-- Content right, image left -->

<div class="timeline-item">
<div class="timeline-media left"><img alt="Teacher Training" src="/images/training.webp" /></div>

<div class="timeline-dot"></div>

<div class="timeline-content right">
<h3>Training &amp; Development</h3>

<ul>
	<li>Curriculum Guidelines Training</li>
	<li>Teacher Training Programs</li>
	<li>Material Guidelines</li>
</ul>
</div>
</div>
<!-- Content left, image right -->

<div class="timeline-item">
<div class="timeline-content left">
<h3>Implementation</h3>

<ul>
	<li>Regular Reporting System</li>
	<li>Parent Awareness Sessions</li>
	<li>Physical and Virtual Support</li>
</ul>
</div>

<div class="timeline-dot"></div>

<div class="timeline-media right"><img alt="Implementation Process" src="/images/implementation.webp" /></div>
</div>
<!-- Content right, image left -->

<div class="timeline-item">
<div class="timeline-media left"><img alt="Monitoring and Assessment" src="/images/monitoring.webp" /></div>

<div class="timeline-dot"></div>

<div class="timeline-content right">
<h3>Monitoring &amp; Assessment</h3>

<ul>
	<li>Continuous Assessment</li>
	<li>Work History Documentation</li>
	<li>Implementation Reports</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="takeaways-section">
<div class="section-title">
<h2>Program Takeaways</h2>
</div>

<div class="takeaways-container">
<div class="takeaways-grid">
<div class="takeaway-card">
<div class="takeaway-icon"></div>

<h3>Curriculum Guidelines</h3>

<ul>
	<li>Theme-wise Teacher Reference Book</li>
	<li>13 Focused Themes</li>
	<li>Detailed Implementation Guide</li>
</ul>
</div>

<div class="takeaway-card">
<div class="takeaway-icon"></div>

<h3>Learning Materials</h3>

<ul>
	<li>Child Workbooks and Reading Books</li>
	<li>Display Cards and Flash Cards</li>
	<li>Educational Games and Puzzles</li>
</ul>
</div>

<div class="takeaway-card">
<div class="takeaway-icon"></div>

<h3>Assessment Tools</h3>

<ul>
	<li>Three-Term Evaluation System</li>
	<li>Grade Sheets and Progress Reports</li>
	<li>Continuous Assessment Framework</li>
</ul>
</div>

<div class="takeaway-card">
<div class="takeaway-icon"></div>

<h3>Training &amp; Support</h3>

<ul>
	<li>Virtual Training Sessions</li>
	<li>Parent&#39;s Seminars</li>
	<li>Regular Consultation Support</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Consultation Form Section -->

<section class="consultation-form-section">
<div class="consultation-grid">
<div class="form-info">
<h2>Request a Consultation</h2>

<p class="form-description">Start your journey towards educational excellence with our expert consultation services.</p>

<div class="info-cards">
<div class="info-card">
<h4>3-Year Contract</h4>

<p>Comprehensive support and guidance</p>
</div>

<div class="info-card">
<h4>Personalized Support</h4>

<p>Tailored to your institution&#39;s needs</p>
</div>

<div class="info-card">
<h4>Regular Updates</h4>

<p>Continuous monitoring and feedback</p>
</div>
</div>
</div>

<div class="form-container">
<form action="https://formspree.io/f/xjkvarnq" class="consultation-form" method="POST">
<div class="alert alert-success" id="successAlert" style="display: none;">Your message has been sent successfully!</div>

<div class="alert alert-error" id="errorAlert" style="display: none;">There was an error sending your message. Please try again.</div>

<div class="form-group"><input id="name" name="name" placeholder="Your Name" required="" type="text" />
<div class="form-error" id="nameError"></div>
</div>

<div class="form-group"><input id="email" name="email" placeholder="Your Email" required="" type="email" />
<div class="form-error" id="emailError"></div>
</div>

<div class="form-group"><input id="phone" name="phone" placeholder="Phone Number" required="" type="tel" />
<div class="form-error" id="phoneError"></div>
</div>

<div class="form-group"><input id="institution" name="institution" placeholder="Institution Name" required="" type="text" />
<div class="form-error" id="institutionError"></div>
</div>

<div class="form-group"><select id="consultationType" name="consultationType" required=""><option value="">Select Consultation Type</option><option value="preprimary">Preprimary (Nur-UKG)</option><option value="primary">Primary (Class 1)</option><option value="phonics">Phonics Program</option> </select>

<div class="form-error" id="consultationTypeError"></div>
</div>

<div class="form-group"><textarea id="message" name="message" placeholder="Your Message" required="" rows="5"></textarea>

<div class="form-error" id="messageError"></div>
</div>
<button class="submit-button" type="submit"><span class="button-text">Request Consultation</span> <span class="button-loader" style="display: none;"> </span></button></form>
</div>
</div>
</section>
<!-- Footer -->

<footer class="site-footer">
<div class="footer-content">
<div class="footer-section">
<h3>Contact Us</h3>

<div class="footer-map"><iframe allowfullscreen="" height="200" id="footer-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" sandbox="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.36972741325!2d85.33915669999999!3d27.736739999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19004faf0233%3A0xdbc2d75753d59dd5!2sKalpavriksha%20Education%20Foundation!5e0!3m2!1sen!2snp!4v1731578433006!5m2!1sen!2snp" style="border:0;" width="100%"></iframe><a class="footer-directions-button" href="https://maps.app.goo.gl/7YBEzH2ifte2T4P46" target="_blank">Get Directions </a></div>

<div class="contact-info"><a href="mailto:kalpavriksha.efn@gmail.com">kalpavriksha.efn@gmail.com</a>

<p>+977 9851364262 | 9840056656</p>
</div>
</div>

<div class="footer-section">
<h3>Quick Links</h3>

<ul class="footer-links">
	<li><a href="/index">Home</a></li>
	<li><a href="/training">Our Trainings</a></li>
	<li><a href="/Resources">Resources</a></li>
</ul>
</div>

<div class="footer-section">
<h3>Follow Us</h3>

<div class="social-links"></div>
</div>
</div>

<div class="footer-bottom">
<p>&copy; 2024 Kalpavriksha Education Foundation. All rights reserved.</p>
</div>
</footer>
<script defer src="script.js?v=1.0"></script><script defer src="optimization.js?v=1.0"></script><!-- Back to Top Button -->

<div aria-label="Back to top" class="back-to-top" role="button"><svg class="progress-ring" height="50" width="50"> <circle class="background" cx="25" cy="25" r="22.5"></circle> <circle class="progress" cx="25" cy="25" r="22.5"></circle> </svg></div>
</body>
</html>