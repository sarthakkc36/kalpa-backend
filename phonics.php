<!DOCTYPE html>
<html lang="en">

<head>
<?php
// Set page-specific variables
$page_title = "Phonics Consultation - Kalpavriksha Education Foundation";
$current_page = "phonics";
$additional_css ='  
<style>
    :root {
      --primary: #48825d;
      --primary-dark: #3a6b4a;
      --secondary: #b8cec0;
      --background: #f6f6e5;
      --text: #333333;
      --white: #FFFFFF;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Georgia, serif;
    }

    /* Premium Animations */
    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes shine {
      0% {
        background-position: -100%;
      }

      100% {
        background-position: 200%;
      }
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(72, 130, 93, 0.4);
      }

      70% {
        box-shadow: 0 0 0 20px rgba(72, 130, 93, 0);
      }

      100% {
        box-shadow: 0 0 0 0 rgba(72, 130, 93, 0);
      }
    }

    /* Fancy Scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: var(--background);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary);
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }

    .hero-section {
      position: relative;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      overflow: hidden;
    }

    .hero-particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
      pointer-events: none;
    }

    .hero-particle {
      position: absolute;
      width: 6px;
      height: 6px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      animation: float 15s infinite linear;
    }

    .hero-content {
      position: relative;
      z-index: 3;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transform: translateY(20px);
      animation: fadeInUp 1s forwards;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .hero-video-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      color: var(--white);
      max-width: 800px;
      padding: 2rem;
    }

    .hero-title {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #5CBA6D;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-tagline {
      font-size: 1.8rem;
      margin-bottom: 2rem;
      color: var(--white);
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    /* Methodology Section */
    .methodology-section {
      padding: 6rem 2rem;
      background: var(--white);
    }

    .section-title {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-title h2 {
      color: var(--primary);
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .methodology-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .methodology-card {
      background: var(--white);
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      text-align: center;
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(72, 130, 93, 0.1);
    }

    .methodology-card::before {
      content: \'\';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, transparent, rgba(72, 130, 93, 0.1), transparent);
      transform: translateX(-100%);
      transition: all 0.6s ease;
    }

    .methodology-card:hover::before {
      transform: translateX(100%);
    }

    .methodology-card::after {
      content: \'\';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--primary-dark));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.5s ease;
    }

    .methodology-card:hover::after {
      transform: scaleX(1);
    }

    .methodology-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .methodology-icon {
      width: 80px;
      height: 80px;
      background: var(--primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      color: var(--white);
      font-size: 2rem;
    }

    /* Resources Section */
    .resources-section {
      padding: 6rem 2rem;
      background: var(--background);
    }

    .resources-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .resource-card {
      background: var(--white);
      padding: 2rem;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .resource-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .resource-icon {
      width: 60px;
      height: 60px;
      margin: 0 auto 1.5rem;
      color: var(--primary);
      font-size: 2rem;
    }

    /* Implementation Section */
    .implementation-section {
      padding: 6rem 2rem;
      background: var(--white);
    }

    .timeline {
      max-width: 800px;
      margin: 0 auto;
      position: relative;
      padding: 2rem 0;
    }

    .timeline::before {
      content: \'\';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      width: 2px;
      height: 100%;
      background: var(--primary);
      top: 0;
    }

    .timeline-item {
      margin-bottom: 2rem;
      position: relative;
      width: calc(50% - 2rem);
    }

    .timeline-item:nth-child(even) {
      margin-left: auto;
    }

    .timeline-content {
      background: var(--white);
      padding: 1.5rem;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Stats Section */
    .stats-section {
      padding: 6rem 2rem;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      position: relative;
      overflow: hidden;
    }

    .stats-section::before {
      content: \'\';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url(\'/api/placeholder/100/100\') center/30px repeat;
      opacity: 0.1;
      animation: float 20s infinite linear;
    }

    .stats-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 2.5rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stats-card:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.15);
    }

    .stat-number {
      font-size: 3.5rem;
      font-weight: 800;
      background: linear-gradient(45deg, #fff, #e0e0e0);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
      position: relative;
      display: inline-block;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .stat-card {
      text-align: center;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      backdrop-filter: blur(10px);
    }

    .stat-number {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    /* Consultation Form */
    .consultation-form-section {

      padding: 6rem 2rem;
      background: white;
    }

    .form-container {
      max-width: 800px;
      margin: 0 auto;
      background: var(--white);
      padding: 3rem;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
    }

    .form-container::before {
      content: \'\';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), var(--primary-dark), var(--primary));
      background-size: 200% 100%;
      animation: shine 3s infinite linear;
    }

    .form-group {
      margin-bottom: 2rem;
      position: relative;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 1.2rem;
      border: 2px solid rgba(72, 130, 93, 0.1);
      border-radius: 12px;
      transition: all 0.3s ease;
      font-size: 1rem;
      background: rgba(246, 246, 229, 0.5);
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(72, 130, 93, 0.1);
      outline: none;
    }

    .submit-button {
      background: linear-gradient(45deg, var(--primary), var(--primary-dark));
      color: var(--white);
      padding: 1.2rem 2.5rem;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      width: 100%;
      font-size: 1.1rem;
      font-weight: 600;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .submit-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(72, 130, 93, 0.2);
    }

    .submit-button:active {
      transform: translateY(0);
    }

    .submit-button::before {
      content: \'\';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg,
          transparent,
          rgba(255, 255, 255, 0.2),
          transparent);
      transition: all 0.6s;
    }

    .submit-button:hover::before {
      left: 100%;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 1rem;
      border: 2px solid var(--secondary);
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .submit-button {
      background: var(--primary);
      color: var(--white);
      padding: 1rem 2rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
      font-size: 1.1rem;
      transition: all 0.3s ease;
    }

    .submit-button:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }

      .hero-tagline {
        font-size: 1.3rem;
      }

      .timeline::before {
        left: 1rem;
      }

      .timeline-item {
        width: calc(100% - 3rem);
        margin-left: 3rem !important;
      }
    }

    .benefit-icon {
      width: 80px;
      height: 80px;
      background: var(--primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
    }

    .benefit-icon i {
      color: var(--white);
      font-size: 2rem;
    }

    /* Add these new styles for enhanced icon animation */
    .benefit-icon {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .benefit-icon::before {
      content: \'\';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transform: translateX(-100%);
      transition: 0.5s;
    }

    .benefit-card:hover .benefit-icon {
      transform: scale(1.1);
    }

    .benefit-card:hover .benefit-icon::before {
      transform: translateX(100%);
    }

    /* Stats Section Spacing */
    .stats-section {
      padding: 8rem 2rem;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      margin-bottom: 6rem;
      /* Add bottom margin to create space */
    }

    /* Benefits Section Spacing */
    .benefits-section {
      padding: 8rem 2rem;
      background: var(--background);
      /* Changed to match your theme background */
      margin-top: 6rem;
      /* Add top margin to create space */
      position: relative;
      /* For z-index handling */
      z-index: 1;
      /* Ensure proper layering */
    }

    /* Optional: Add a decorative separator */
    .benefits-section::before {
      content: \'\';
      position: absolute;
      top: -3rem;
      /* Position it in the space between sections */
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      max-width: 1200px;
      height: 2px;
      background: linear-gradient(90deg,
          transparent,
          rgba(72, 130, 93, 0.2),
          transparent);
    }

    /* Container styles */
    .container {
      max-width: 1400px;
      margin: 0 auto;
      position: relative;
    }

    .materials-section {
      padding: 6rem 2rem;
      background: var(--white);
      position: relative;
      margin: 4rem 0;
      /* Added margin for spacing */
    }

    .materials-video-container {
      max-width: 1000px;
      margin: 0 auto 4rem;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      position: relative;
      background: var(--white);
      padding: 0;
      /* Remove padding to make video fill container */
    }

    .materials-video-container video {
      width: 100%;
      display: block;
      background: #000;
      /* Black background for video */
      transition: all 0.3s ease;
    }

    /* Enhanced video container styling */
    .materials-video-container::before {
      content: \'\';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--primary-dark));
      z-index: 1;
    }

    .section-title {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-title h2 {
      color: var(--primary);
      font-size: 2.5rem;
      margin-bottom: 1rem;
      position: relative;
      display: inline-block;
    }

    .section-title h2::after {
      content: \'\';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: var(--primary);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .materials-section {
        padding: 4rem 1rem;
      }

      .materials-video-container {
        margin: 0 auto 2rem;
        border-radius: 15px;
      }

      .section-title h2 {
        font-size: 2rem;
      }

      .materials-video-container video {
        height: 300px;
        /* Adjusted height for mobile */
      }
    }

    .back-to-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: var(--primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.3s ease;
      z-index: 1000;
      box-shadow: 0 4px 12px rgba(72, 130, 93, 0.3);
      visibility: hidden;
    }

    .back-to-top.visible {
      opacity: 1;
      transform: translateY(0);
      visibility: visible;
    }

    .progress-ring circle {
      fill: none;
      stroke-width: 3;
      stroke-linecap: round;
    }

    .progress-ring .background {
      stroke: rgba(255, 255, 255, 0.2);
    }

    .progress-ring .progress {
      stroke: white;
      transition: stroke-dashoffset 0.3s ease;
    }

    .back-to-top::before {
      content: \'\';
      width: 12px;
      height: 12px;
      border-left: 3px solid white;
      border-top: 3px solid white;
      transform: rotate(45deg) translate(2px, 2px);
      transition: transform 0.3s ease;
    }

    .back-to-top:hover {
      background: var(--primary-dark);
      transform: translateY(-5px);
    }
    .testimonials-section {
        background-color: #f6f6e5;
        padding: 6rem 2rem;
        position: relative;
        overflow: hidden;
      }

      /* Decorative elements */
      .testimonials-decor {
        position: absolute;
        inset: 0;
        pointer-events: none;
      }

      .decor-circle {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
      }

      .decor-circle-1 {
        width: 300px;
        height: 300px;
        background: #48825d;
        top: -150px;
        left: -150px;
      }

      .decor-circle-2 {
        width: 200px;
        height: 200px;
        background: #b8cec0;
        bottom: -100px;
        right: -100px;
      }

      .section-title {
        text-align: center;
        color: #48825d;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-family: Georgia, serif;
        position: relative;
      }

      .section-subtitle {
        text-align: center;
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 4rem;
      }

      .testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
      }

      .testimonials-track {
        display: flex;
        transition: transform 0.5s ease-out;
      }

      .testimonial-card {
        flex: 0 0 100%;
        padding: 0 1rem;
      }

      .testimonial-content {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        transition: transform 0.3s ease;
      }

      .testimonial-content:hover {
        transform: translateY(-5px);
      }

      .quote-icon {
        position: absolute;
        font-size: 4rem;
        color: #48825d;
        opacity: 0.1;
      }

      .quote-left {
        top: 20px;
        left: 20px;
      }

      .quote-right {
        bottom: 20px;
        right: 20px;
      }

      .testimonial-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
        margin-bottom: 2rem;
        position: relative;
        z-index: 1;
      }

      .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .author-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #48825d;
      }

      .author-info h4 {
        color: #48825d;
        font-size: 1.2rem;
        margin: 0 0 0.25rem 0;
      }

      .author-info p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
      }

      .testimonial-rating {
        color: #ffd700;
        font-size: 1.2rem;
        margin-top: 1rem;
      }

      .navigation-arrows {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        padding: 0 1rem;
        pointer-events: none;
      }

      .nav-arrow {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #48825d;
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        pointer-events: auto;
        opacity: 0.8;
      }

      .nav-arrow:hover {
        background: #3a6b4a;
        opacity: 1;
        transform: scale(1.1);
      }

      .dots-container {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
      }

      .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #b8cec0;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .dot.active {
        background: #48825d;
        transform: scale(1.3);
      }

      @media (max-width: 768px) {
        .testimonials-section {
          padding: 4rem 1rem;
        }

        .section-title {
          font-size: 2rem;
        }

        .testimonial-content {
          padding: 2rem;
        }

        .testimonial-text {
          font-size: 1rem;
        }

        .nav-arrow {
          width: 40px;
          height: 40px;
          font-size: 1.2rem;
        }
      }
      .partners-section {
    padding: 4rem 2rem;
    background: #ffffff;
    overflow: hidden;
}

.partner-slider {
    max-width: 100%;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}

.partner-track {
    display: flex;
    animation: slidePartners 60s linear infinite;
    gap: 2rem;
}

.partner-slide {
    flex: 0 0 200px;
    min-width: 200px; /* Ensure minimum width */
}

.partner-slide img {
    width: 150px;
    height: 150px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.partner-slide:hover img {
    transform: scale(1.1);
}

@keyframes slidePartners {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Pause animation on hover */
.partner-track:hover {
    animation-play-state: paused;
}

/* Make sure the track has enough width */
.partner-track {
    width: fit-content;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .partner-slide {
        flex: 0 0 150px;
        min-width: 150px;
    }
    
    .partner-slide img {
        width: 120px;
        height: 120px;
    }
}
.testimonials-section {
  background-color: #f6f6e5;
  padding: 6rem 2rem;
  position: relative;
  overflow: hidden;
}

/* Decorative elements */
.testimonials-decor {
  position: absolute;
  inset: 0;
  pointer-events: none;
}

.decor-circle {
  position: absolute;
  border-radius: 50%;
  opacity: 0.1;
}

.decor-circle-1 {
  width: 300px;
  height: 300px;
  background: #48825d;
  top: -150px;
  left: -150px;
}

.decor-circle-2 {
  width: 200px;
  height: 200px;
  background: #b8cec0;
  bottom: -100px;
  right: -100px;
}

.section-title {
  text-align: center;
  color: #48825d;
  font-size: 2.5rem;
  margin-bottom: 1rem;
  font-family: Georgia, serif;
  position: relative;
}

.section-subtitle {
  text-align: center;
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 4rem;
}

.testimonials-container {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease-out;
}

.testimonial-card {
  flex: 0 0 100%;
  padding: 0 1rem;
}

.testimonial-content {
  background: white;
  border-radius: 20px;
  padding: 3rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  position: relative;
  transition: transform 0.3s ease;
}

.testimonial-content:hover {
  transform: translateY(-5px);
}

.quote-icon {
  position: absolute;
  font-size: 4rem;
  color: #48825d;
  opacity: 0.1;
}

.quote-left {
  top: 20px;
  left: 20px;
}

.quote-right {
  bottom: 20px;
  right: 20px;
}

.testimonial-text {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #333;
  margin-bottom: 2rem;
  position: relative;
  z-index: 1;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.author-image {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #48825d;
}

.author-info h4 {
  color: #48825d;
  font-size: 1.2rem;
  margin: 0 0 0.25rem 0;
}

.author-info p {
  color: #666;
  font-size: 0.9rem;
  margin: 0;
}

.testimonial-rating {
  color: #ffd700;
  font-size: 1.2rem;
  margin-top: 1rem;
}

.navigation-arrows {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  transform: translateY(-50%);
  display: flex;
  justify-content: space-between;
  padding: 0 1rem;
  pointer-events: none;
}

.nav-arrow {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #48825d;
  color: white;
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  transition: all 0.3s ease;
  pointer-events: auto;
  opacity: 0.8;
}

.nav-arrow:hover {
  background: #3a6b4a;
  opacity: 1;
  transform: scale(1.1);
}

.dots-container {
  display: flex;
  justify-content: center;
  gap: 0.5rem;
  margin-top: 2rem;
}

.dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #b8cec0;
  cursor: pointer;
  transition: all 0.3s ease;
}

.dot.active {
  background: #48825d;
  transform: scale(1.3);
}

@media (max-width: 768px) {
  .testimonials-section {
    padding: 4rem 1rem;
  }

  .section-title {
    font-size: 2rem;
  }

  .testimonial-content {
    padding: 2rem;
  }

  .testimonial-text {
    font-size: 1rem;
  }

  .nav-arrow {
    width: 40px;
    height: 40px;
    font-size: 1.2rem;
  }
}
  .testimonials-container {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  overflow: hidden;
  /* Add this to prevent horizontal scroll */
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease-out;
  width: 100%;
  /* Ensure track is contained */
}

.testimonial-card {
  flex: 0 0 100%;
  /* Each card takes full width */
  width: 100%;
  min-width: 100%;
  /* Ensure consistent sizing */
}
  Back to Top Button */
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, #48825d, #3a6b4a);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 1000;
  box-shadow:
    0 4px 12px rgba(72, 130, 93, 0.3),
    0 8px 24px rgba(72, 130, 93, 0.2);
}
  </style>';
// Include database connection
require_once 'includes/config.php';

// Fetch testimonials for the testimonials section
$testimonials_query = "SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order ASC LIMIT 8";
$testimonials_result = mysqli_query($conn, $testimonials_query);
$testimonials = array();
if ($testimonials_result) {
    while ($row = mysqli_fetch_assoc($testimonials_result)) {
        $testimonials[] = $row;
    }
}

// Fetch partners/organizations
$partners_query = "SELECT * FROM partners WHERE is_active = 1 ORDER BY display_order ASC";
$partners_result = mysqli_query($conn, $partners_query);
$partners = array();
if ($partners_result) {
    while ($row = mysqli_fetch_assoc($partners_result)) {
        $partners[] = $row;
    }
}

// If there are no partners in the DB yet, use the static images as fallback
$use_static_partners = (count($partners) == 0);

// Include the header
include 'includes/header.php';
?>
</head>


  <body>
    <!-- Header -->
    <!-- Hero Section -->
    <section class="hero-section">
      <video class="hero-video-bg" autoplay muted loop playsinline>
        <source src="/videos/phonics.mp4" type="video/mp4">
      </video>
      <div class="hero-overlay"></div>

    </section>

    <!-- Methodology Section -->
    <section class="methodology-section">
      <div class="section-title">
        <h2>Our Phonics Methodology</h2>
      </div>
      <div class="methodology-grid">
        <div class="methodology-card">
          <div class="methodology-icon">
            <i class="fas fa-book-reader"></i>
          </div>
          <h3>Systematic Approach</h3>
          <p>Structured learning progression from basic to advanced phonics</p>
        </div>
        <div class="methodology-card">
          <div class="methodology-icon">
            <i class="fas fa-puzzle-piece"></i>
          </div>
          <h3>Interactive Learning</h3>
          <p>Engaging activities and games for effective phonics practice</p>
        </div>
        <div class="methodology-card">
          <div class="methodology-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3>Progress Monitoring</h3>
          <p>Regular assessment and tracking of student development</p>
        </div>
      </div>
    </section>
    <section class="materials-section">
      <div class="section-title">
        <h2>Watch Our Phonics Program in Action</h2>
      </div>
      <div class="materials-video-container">
        <!-- Video element with poster (thumbnail) -->
        <video width="100%" height="450" controls poster="/api/placeholder/800/450">
          <source src="/videos/Phonics-Program.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </section>
    <!-- Resources Section -->
    <section class="resources-section">
      <div class="section-title">
        <h2>Teaching Resources</h2>
      </div>
      <div class="resources-grid">
        <div class="resource-card">
          <div class="resource-icon">
            <i class="fas fa-book"></i>
          </div>
          <h3>Workbooks</h3>
          <p>Comprehensive practice materials</p>
        </div>
        <div class="resource-card">
          <div class="resource-icon">
            <i class="fas fa-images"></i>
          </div>
          <h3>Flash Cards</h3>
          <p>Visual learning aids</p>
        </div>
        <div class="resource-card">
          <div class="resource-icon">
            <i class="fas fa-gamepad"></i>
          </div>
          <h3>Learning Games</h3>
          <p>Interactive educational activities</p>
        </div>
        <div class="resource-card">
          <div class="resource-icon">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <h3>Teacher Guides</h3>
          <p>Detailed instruction manuals</p>
        </div>
      </div>
    </section>

    <!-- Implementation Timeline -->
    <section class="action-plan-section" style="padding: 6rem 2rem; background: #f6f6e5;">
      <div class="section-title">
        <h2>Yearly Action Plan</h2>
      </div>

      <div style="max-width: 1200px; margin: 0 auto; position: relative;">
        <!-- Center line -->
        <div
          style="position: absolute; left: 50%; transform: translateX(-50%); width: 2px; height: 100%; background: #48825d;">
        </div>

        <!-- Item 1: Content Left, Image Right -->
        <div style="position: relative; margin-bottom: 4rem; min-height: 300px;">
          <div
            style="width: 45%; margin-left: 0; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;"
            onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 style="color: #48825d; margin-bottom: 1rem;">Infrastructure &amp; Setup</h3>
            <ul style="list-style: none; padding: 0;">
              <li>Physical Infrastructure Consultation</li>
              <li>Initial Assessment</li>
              <li>Resource Planning</li>
            </ul>
          </div>
          <div
            style="position: absolute; width: 20px; height: 20px; background: #48825d; border-radius: 50%; left: 50%; transform: translateX(-50%); top: 50%;">
          </div>
          <div
            style="width: 45%; position: absolute; right: 0; top: 0; height: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <img src="/images/infrastructure.jpg" alt="Infrastructure"
              style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
              onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          </div>
        </div>

        <!-- Item 2: Content Right, Image Left -->
        <div style="position: relative; margin-bottom: 4rem; min-height: 300px;">
          <div
            style="width: 45%; position: absolute; left: 0; top: 0; height: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <img src="/images/training.webp" alt="Training"
              style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
              onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          </div>
          <div
            style="position: absolute; width: 20px; height: 20px; background: #48825d; border-radius: 50%; left: 50%; transform: translateX(-50%); top: 50%;">
          </div>
          <div
            style="width: 45%; margin-left: 55%; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;"
            onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 style="color: #48825d; margin-bottom: 1rem;">Training &amp; Development</h3>
            <ul style="list-style: none; padding: 0;">
              <li>Curriculum Guidelines Training</li>
              <li>Teacher Training Programs</li>
              <li>Material Guidelines</li>
            </ul>
          </div>
        </div>

        <!-- Item 3: Content Left, Image Right -->
        <div style="position: relative; margin-bottom: 4rem; min-height: 300px;">
          <div
            style="width: 45%; margin-left: 0; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;"
            onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 style="color: #48825d; margin-bottom: 1rem;">Implementation</h3>
            <ul style="list-style: none; padding: 0;">
              <li>Physical and Virtual Support As per Required</li>

            </ul>
          </div>
          <div
            style="position: absolute; width: 20px; height: 20px; background: #48825d; border-radius: 50%; left: 50%; transform: translateX(-50%); top: 50%;">
          </div>
          <div
            style="width: 45%; position: absolute; right: 0; top: 0; height: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <img src="/images/implementation.webp" alt="Implementation"
              style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
              onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          </div>
        </div>

        <!-- Item 4: Content Right, Image Left -->
        <div style="position: relative; margin-bottom: 4rem; min-height: 300px;">
          <div
            style="width: 45%; position: absolute; left: 0; top: 0; height: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <img src="/images/monitoring.jpg" alt="Monitoring"
              style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
              onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          </div>
          <div
            style="position: absolute; width: 20px; height: 20px; background: #48825d; border-radius: 50%; left: 50%; transform: translateX(-50%); top: 50%;">
          </div>
          <div
            style="width: 45%; margin-left: 55%; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;"
            onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 style="color: #48825d; margin-bottom: 1rem;">Monitoring &amp; Assessment</h3>
            <ul style="list-style: none; padding: 0;">
              <li>Continuous Assessment</li>
              <li>Implementation Reports</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-number">10000+</div>
          <div class="stat-label">Students Impacted</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">50+</div>
          <div class="stat-label">Schools Partnered</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">95%</div>
          <div class="stat-label">Success Rate</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">500+</div>
          <div class="stat-label">Teaching Resources</div>
        </div>
      </div>
    </section>

    <!-- Consultation Form -->

    <!-- Benefits Section -->
    <section class="benefits-section">
      <div class="section-title">
        <h2>Program Benefits</h2>
      </div>
      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <h3>Enhanced Learning</h3>
          <p>Improved reading and writing skills through systematic phonics instruction</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fa-solid fa-users"></i>
          </div>
          <h3>Teacher Development</h3>
          <p>Comprehensive training and support for teaching staff</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fa-solid fa-chart-bar"></i>
          </div>
          <h3>Measurable Results</h3>
          <p>Track progress with our detailed assessment system</p>
        </div>
      </div>
    </section>
<!-- This is your testimonials HTML section, updated to handle dynamic content -->
<section class="testimonials-section">
    <div class="testimonials-decor">
        <div class="decor-circle decor-circle-1"></div>
        <div class="decor-circle decor-circle-2"></div>
    </div>

    <h2 class="section-title">Voices of Our Stakeholders</h2>
    <p class="section-subtitle">Hear from the schools and educators we collaborate with</p>

    <div class="testimonials-container">
        <div class="testimonials-track">
            <?php if (count($testimonials) > 0): ?>
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <span class="quote-icon quote-left">"</span>
                            <p class="testimonial-text">
                                <?php echo htmlspecialchars($testimonial['content']); ?>
                            </p>
                            <span class="quote-icon quote-right">"</span>
                            <div class="testimonial-author">
                                <?php if (!empty($testimonial['image_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($testimonial['image_path']); ?>" 
                                        alt="<?php echo htmlspecialchars($testimonial['name']); ?>" 
                                        class="author-image" width="60" height="60">
                                <?php else: ?>
                                    <div class="author-image author-placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="author-info">
                                    <h4><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                    <?php if (!empty($testimonial['role'])): ?>
                                        <p><?php echo htmlspecialchars($testimonial['role']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                <?php 
                                $rating = isset($testimonial['rating']) ? intval($testimonial['rating']) : 5;
                                echo str_repeat('★', $rating);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback if no testimonials in database -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">No testimonials available at the moment.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="navigation-arrows">
            <button class="nav-arrow prev-arrow">←</button>
            <button class="nav-arrow next-arrow">→</button>
        </div>

        <div class="dots-container">
            <?php
            $testimonial_count = count($testimonials);
            for ($i = 0; $i < $testimonial_count; $i++): 
            ?>
                <div class="dot <?php echo ($i === 0) ? 'active' : ''; ?>"></div>
            <?php endfor; ?>
        </div>
    </div>
</section>
  <?php

// Fetch partners/organizations
$partners_query = "SELECT * FROM partners WHERE is_active = 1 ORDER BY display_order ASC, id DESC";
$partners_result = mysqli_query($conn, $partners_query);
$partners = array();
if ($partners_result) {
    while ($row = mysqli_fetch_assoc($partners_result)) {
        $partners[] = $row;
    }
}

// If there are no partners in the DB yet, use the static images as fallback
$use_static_partners = (count($partners) == 0);
?>
<section class="partners-section">
    <h2 class="section-title">Organizations we have worked with</h2>
    <div class="partner-slider">
        <div class="partner-track" style="display: flex; gap: 2rem; animation: slidePartners 60s linear infinite;">
            <?php if (!$use_static_partners): ?>
                <?php foreach ($partners as $partner): ?>
                    <div class="partner-slide">
                        <img src="<?php echo htmlspecialchars($partner['logo_path']); ?>" 
                             alt="<?php echo htmlspecialchars($partner['name']); ?>" 
                             width="150" height="150" loading="lazy">
                    </div>
                <?php endforeach; ?>
                <?php foreach ($partners as $partner): ?>
                    <div class="partner-slide">
                        <img src="<?php echo htmlspecialchars($partner['logo_path']); ?>" 
                             alt="<?php echo htmlspecialchars($partner['name']); ?>" 
                             width="150" height="150" loading="lazy">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback to static images if no partners in database -->
                <div class="partner-slide">
                    <img src="/images/Apischool.webp" alt="Partner 1" width="150" height="150" loading="lazy">
                </div>
                <div class="partner-slide">
                    <img src="/images/Bodhisattva.webp" alt="Partner 2" width="150" height="150" loading="lazy">
                </div>
                <div class="partner-slide">
                    <img src="/images/bright kinderworld.webp" alt="Partner 3" width="150" height="150" loading="lazy">
                </div>
                <!-- Include all other partner slides as before -->
            <?php endif; ?>
        </div>
    </div>
</section>
    <section class="consultation-form-section">
      <div class="section-title">
        <h2>Request a Consultation</h2>
      </div>
      <div class="form-container">
        <form action="https://formspree.io/f/xjkvarnq" method="POST" class="consultation-form">
          <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
            <input type="text" name="school" placeholder="School Name" required>
          </div>
          <div class="form-group">
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
          </div>
          <button type="submit" class="submit-button">
            <span>Submit Request</span>
            <i class="fas fa-arrow-right"></i>
          </button>
        </form>
      </div>
    </section>
    <!-- Footer -->
<?php include 'includes/footer.php'; ?>
    <script>
      // Animation for stats numbers
      function animateStats() {
        const stats = document.querySelectorAll('.stat-number');
        stats.forEach(stat => {
          const target = parseInt(stat.innerText);
          const suffix = stat.innerText.match(/[+%]/) ? stat.innerText.match(/[+%]/)[0] : '';
          let current = 0;
          const increment = target / 50;
          const update = setInterval(() => {
            current += increment;
            if (current >= target) {
              current = target;
              clearInterval(update);
            }
            stat.innerText = Math.floor(current) + suffix;
          }, 40);
        });
      }

      // Observer for animation triggers
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            if (entry.target.classList.contains('stats-section')) {
              animateStats();
            }
            entry.target.classList.add('visible');
          }
        });
      }, { threshold: 0.1 });

      // Observe elements
      document.querySelectorAll('.methodology-card, .resource-card, .benefit-card, .stats-section').forEach(el => {
        observer.observe(el);
      });

      // Form submission handling
      document.querySelector('.consultation-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const submitButton = this.querySelector('.submit-button');
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

        // Submit form logic would go here
        // After successful submission:
        setTimeout(() => {
          submitButton.innerHTML = '<i class="fas fa-check"></i> Submitted Successfully';
          // Reset form
          this.reset();
          setTimeout(() => {
            submitButton.disabled = false;
            submitButton.innerHTML = '<span>Submit Request</span><i class="fas fa-arrow-right"></i>';
          }, 3000);
        }, 2000);
      });
    </script>
    <script>document.addEventListener('DOMContentLoaded', function () {
        const backToTopButton = document.querySelector('.back-to-top');
        const progressCircle = backToTopButton.querySelector('.progress');

        // Function to update button visibility and progress
        function updateBackToTop() {
          const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
          const scrollProgress = window.scrollY;
          const scrollPercentage = (scrollProgress / scrollTotal) * 100;

          // Update progress circle
          if (progressCircle) {
            const circumference = 2 * Math.PI * 22.5; // r=22.5 from the SVG
            const offset = circumference - (scrollPercentage / 100) * circumference;
            progressCircle.style.strokeDasharray = `${circumference} ${circumference}`;
            progressCircle.style.strokeDashoffset = offset;
          }

          // Show/hide button based on scroll position
          if (scrollProgress > 300) {
            backToTopButton.classList.add('visible');
          } else {
            backToTopButton.classList.remove('visible');
          }
        }

        // Scroll to top function with smooth behavior
        function scrollToTop() {
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }

        // Add click event listener
        backToTopButton.addEventListener('click', scrollToTop);

        // Add scroll event listener
        window.addEventListener('scroll', updateBackToTop);

        // Initial update
        updateBackToTop();
      });</script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const menuButton = document.querySelector('.mobile-menu-button');
          const mobileMenu = document.querySelector('.mobile-menu');
          const menuOverlay = document.querySelector('.menu-overlay');
          const body = document.body;
        
          function toggleMenu() {
            menuButton.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            body.classList.toggle('menu-open');
          }
        
          // Toggle menu on button click
          menuButton.addEventListener('click', toggleMenu);
        
          // Close menu when overlay is clicked
          menuOverlay.addEventListener('click', toggleMenu);
        
          // Close menu when a link is clicked
          const menuLinks = document.querySelectorAll('.mobile-nav a');
          menuLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
          });
        
          // Close menu on desktop resize
          window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
              toggleMenu();
            }
          });
        });
        </script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            // Testimonials Slider
            const track = document.querySelector('.testimonials-track');
            const slides = document.querySelectorAll('.testimonial-card');
            const dots = document.querySelectorAll('.dot');
            const prevButton = document.querySelector('.prev-arrow');
            const nextButton = document.querySelector('.next-arrow');
          
            let currentSlide = 0;
            let slideInterval;
            const slideDelay = 12000; // 12 seconds between slides
          
            function updateSlidePosition() {
              track.style.transform = `translateX(-${currentSlide * 100}%)`;
              dots.forEach(dot => dot.classList.remove('active'));
              dots[currentSlide].classList.add('active');
            }
          
            function nextSlide() {
              currentSlide = (currentSlide + 1) % slides.length;
              updateSlidePosition();
            }
          
            function prevSlide() {
              currentSlide = (currentSlide - 1 + slides.length) % slides.length;
              updateSlidePosition();
            }
          
            function startSlideShow() {
              stopSlideShow();
              slideInterval = setInterval(nextSlide, slideDelay);
            }
          
            function stopSlideShow() {
              if (slideInterval) {
                clearInterval(slideInterval);
              }
            }
          
            // Event Listeners
            prevButton.addEventListener('click', () => {
              prevSlide();
              stopSlideShow();
              startSlideShow();
            });
          
            nextButton.addEventListener('click', () => {
              nextSlide();
              stopSlideShow();
              startSlideShow();
            });
          
            dots.forEach((dot, index) => {
              dot.addEventListener('click', () => {
                currentSlide = index;
                updateSlidePosition();
                stopSlideShow();
                startSlideShow();
              });
            });
          
            // Touch events for mobile
            let touchStartX = 0;
            let touchEndX = 0;
          
            track.addEventListener('touchstart', (e) => {
              touchStartX = e.touches[0].clientX;
              stopSlideShow();
            });
          
            track.addEventListener('touchmove', (e) => {
              touchEndX = e.touches[0].clientX;
            });
          
            track.addEventListener('touchend', () => {
              const difference = touchStartX - touchEndX;
              if (Math.abs(difference) > 50) {
                if (difference > 0) {
                  nextSlide();
                } else {
                  prevSlide();
                }
              }
              startSlideShow();
            });
          
            // Initialize slider
            updateSlidePosition();
            startSlideShow();
          });
          </script>
    <script defer src="script.js"></script>
    <script defer src="optimization.js"></script>
  </body>

</html>