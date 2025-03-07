<?php
require_once 'includes/config.php';
// Set page-specific variables
$page_title = get_setting('site_title', 'Kalpavriksha Education Foundation') . " - " . get_setting('site_tagline', 'Empowering Educators Since 2016');
$current_page = "home";
$additional_css ='
<style>
.hero-collage {
  position: relative;
  width: 100%;
  height: 500px;
  padding: 20px;
}

.collage-img {
  position: absolute;
  transition: transform 0.3s ease;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.collage-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.main-img {
  width: 80%;
  height: 70%;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) rotate(-2deg);
  z-index: 1;
}

.top-img {
  width: 40%;
  height: 50%;
  right: 5%;
  top: 0;
  transform: rotate(3deg);
  z-index: 2;
}

.bottom-img {
  width: 40%;
  height: 50%;
  left: 5%;
  bottom: 0;
  transform: rotate(-3deg);
  z-index: 2;
}

.circle-decoration {
  position: absolute;
  border-radius: 50%;
  opacity: 0.5;
}

.top-circle {
  width: 60px;
  height: 60px;
  background-color: #48825d;
  top: -20px;
  left: -20px;
}

.bottom-circle {
  width: 80px;
  height: 80px;
  background-color: #b8cec0;
  bottom: -20px;
  right: -20px;
}

/* Hover effects */
.collage-img:hover {
  transform: translate(-50%, -50%) rotate(-2deg) scale(1.05);
  z-index: 3;
}

.top-img:hover {
  transform: rotate(3deg) scale(1.05);
}

.bottom-img:hover {
  transform: rotate(-3deg) scale(1.05);
}

/* Responsive design */
@media (max-width: 768px) {
  .hero-collage {
    height: 400px;
  }

  .main-img {
    width: 90%;
  }

  .top-img,
  .bottom-img {
    width: 45%;
  }
}

/* Root Variables */
:root {
  --primary: #48825d;
  --primary-dark: #3a6b4a;
  --secondary: #b8cec0;
  --background: #f6f6e5;
  --text: #333333;
  --white: #FFFFFF;
  --shadow: rgba(0, 0, 0, 0.1);
}

/* Base Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: \'Georgia\', serif;
  line-height: 1.6;
  background-color: var(--background);
  color: var(--text);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* Hero Section */
.hero-section {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 80vh;
  padding: 2rem;
  gap: 2rem;
}

.hero-content {
  padding: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  z-index: 2;
}

.hero-content h1 {
  font-size: 3.5rem;
  color: var(--primary);
  margin-bottom: 1.5rem;
  line-height: 1.2;
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
}

.hero-buttons {
  display: flex;
  gap: 1rem;
}

/* Slideshow Container */
.slideshow-container {
  position: relative;
  height: 100%;
  width: 100%;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.slide {
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 1s ease-in-out;
  object-fit: cover;
}

.slide.active {
  opacity: 1;
}

/* Director Section */



.credential-tags {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  margin-top: 1.5rem;
}

.credential-tag {
  background: var(--primary);
  color: var(--white);
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.9rem;
}

/* Partners Section */
.partners-section {
  padding: 4rem 2rem;
  background: var(--white);
}

.partner-slider {
  max-width: 1200px;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
}

.partner-track {
  display: flex;
  transition: transform 0.5s ease;
  gap: 2rem;
}

.partner-slide {
  flex: 0 0 200px;
  text-align: center;
}

.partner-logo {
  width: 150px;
  height: auto;
  object-fit: contain;
  transition: transform 0.3s ease;
}

.partner-logo:hover {
  transform: scale(1.1);
}

/* Contact Form Section */
.contact-section {
  padding: 4rem 2rem;
  background: var(--background);
}

.contact-form {
  max-width: 600px;
  margin: 0 auto;
  padding: 2rem;
  background: var(--white);
  border-radius: 20px;
  box-shadow: 0 4px 15px var(--shadow);
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  color: var(--primary);
  font-weight: bold;
}

.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 1rem;
  border: 2px solid var(--secondary);
  border-radius: 8px;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(72, 130, 93, 0.1);
}

.button-text {
  display: inline-block;
}

.button-loader {
  display: none;
  width: 20px;
  height: 20px;
  border: 3px solid var(--white);
  border-top: 3px solid transparent;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

/* Animations */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scroll-left {
  0% {
    transform: translateX(100%);
  }

  100% {
    transform: translateX(-100%);
  }
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/* Button Styles */
.cta-button {
  display: inline-block;
  padding: 1rem 2.5rem;
  background: var(--primary);
  color: var(--white);
  text-decoration: none;
  border-radius: 50px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.cta-button:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
}

.secondary-button {
  display: inline-block;
  padding: 1rem 2.5rem;
  border: 2px solid var(--primary);
  color: var(--primary);
  text-decoration: none;
  border-radius: 50px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.secondary-button:hover {
  background: var(--primary);
  color: var(--white);
}

.submit-button {
  width: 100%;
  padding: 1rem;
  background: var(--primary);
  color: var(--white);
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.submit-button:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
}

.submit-button:disabled {
  background: var(--secondary);
  cursor: not-allowed;
  transform: none;
}

/* Responsive Design */
@media (max-width: 992px) {
  .hero-section {
    grid-template-columns: 1fr;
  }

  .hero-content {
    text-align: center;
    padding: 2rem 1rem;
  }

  .hero-buttons {
    justify-content: center;
  }

  .hero-content h1 {
    font-size: 2.5rem;
  }

  .slideshow-container {
    height: 400px;
    margin: 1rem auto;
    max-width: 600px;
  }

  .credential-tags {
    flex-direction: column;
    align-items: center;
  }
}

@media (max-width: 768px) {

  .hero-buttons {
    flex-direction: column;
    gap: 1rem;
  }

  .slideshow-container {
    height: 300px;
  }

  .contact-form {
    padding: 1.5rem;
  }
}

@keyframes slidePartners {
  0% {
    transform: translateX(0);
  }

  100% {
    transform: translateX(-100%);
  }
}

.partner-track:hover {
  animation-play-state: paused;
}

@media (max-width: 768px) {
  .container {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
}

.services-section {
  padding: 4rem 2rem;
}

.section-title {
  text-align: center;
  color: #48825d;
  font-size: 2.5rem;
  margin-bottom: 3rem;
}

.services-grid {
  display: flex;
  justify-content: center;
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.service-item {
  position: relative;
  background: white;
  border-radius: 12px;
  padding: 1.5rem 2rem;
  min-width: 280px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.service-main {
  display: flex;
  align-items: center;
  gap: 1rem;
  cursor: pointer;
}

.number {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  background: #48825d;
  color: white;
  border-radius: 50%;
  font-size: 0.9rem;
}

h3 {
  margin: 0;
  color: #48825d;
  font-size: 1.3rem;
  flex-grow: 1;
}

.arrow {
  color: #48825d;
  font-size: 0.8rem;
  transition: transform 0.3s ease;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: white;
  border-radius: 0 0 12px 12px;
  padding: 0.5rem 0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
  z-index: 100;
}

.service-item:hover .dropdown-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.service-item:hover .arrow {
  transform: rotate(180deg);
}

.dropdown-menu a {
  display: block;
  padding: 0.8rem 2rem;
  color: #333;
  text-decoration: none;
  transition: background-color 0.2s ease;
}

.dropdown-menu a:hover {
  background-color: rgba(72, 130, 93, 0.1);
  color: #48825d;
}

@media (max-width: 992px) {
  .services-grid {
    flex-direction: column;
    align-items: center;
  }

  .service-item {
    width: 100%;
    max-width: 400px;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.testimonial-slide {
  animation: fadeIn 0.5s ease-out infinite;

}

.testimonial-slide.active {
  display: block;
}

.dot:hover {
  transform: scale(1.2);
}

@media (max-width: 768px) {
  .testimonial-slide {
    padding: 2rem;
  }
}

@media (max-width: 768px) {
  .info-slider {
    animation: scrollLeft 20s linear infinite;
    display: flex;
    gap: 3rem;
    white-space: nowrap;
    width: max-content;
  }

  .info-slide {
    flex-shrink: 0;
    padding: 0 1rem;
  }

  @keyframes scrollLeft {
    0% {
      transform: translateX(100%);
    }

    100% {
      transform: translateX(-100%);
    }
  }
}

.info-slide {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.info-slide a {
  color: white;
  text-decoration: none;
  transition: opacity 0.3s;
}

.info-slide a:hover {
  opacity: 0.8;
}

/* Enhanced Hero Section Styles */
.hero-section {
  position: relative;
  min-height: 90vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  padding: 4rem;
  background: linear-gradient(135deg, #f6f6e5, #e6f0e9);
  overflow: hidden;
}

.hero-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  z-index: 2;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  padding: 0.75rem 1.5rem;
  background: rgba(72, 130, 93, 0.1);
  border-radius: 2rem;
  margin-bottom: 2rem;
  color: var(--primary);
  font-weight: 500;
}

.hero-badge i {
  margin-right: 0.75rem;
  color: var(--primary);
}

.hero-content h1 {
  font-size: 3.5rem;
  line-height: 1.2;
  margin-bottom: 1.5rem;
  color: var(--text);
}

.hero-content .highlight {
  color: var(--primary);
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 2.5rem;
  color: var(--text);
  max-width: 600px;
  line-height: 1.6;
}

.hero-buttons {
  display: flex;
  gap: 1.5rem;
}

/* Hero Images Styles */
.hero-images {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  padding: 2rem;
}

.main-image-container {
  position: relative;
  width: 100%;
  height: 400px;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.main-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
  pointer-events: none;
}

.secondary-images {
  display: flex;
  gap: 2rem;
  height: 200px;
}

.secondary-image {
  flex: 1;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.secondary-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
}

/* Hover Effects */
.main-image-container:hover .main-image {
  transform: scale(1.05);
}

.secondary-image:hover {
  transform: translateY(-10px);
}

.secondary-image:hover img {
  transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 1200px) {
  .hero-section {
    padding: 3rem;
    gap: 3rem;
  }

  .hero-content h1 {
    font-size: 3rem;
  }
}

@media (max-width: 992px) {
  .hero-section {
    grid-template-columns: 1fr;
    text-align: center;
  }

  .hero-content {
    padding: 0 2rem;
  }

  .hero-buttons {
    justify-content: center;
  }

  .hero-images {
    order: -1;
    max-width: 700px;
    margin: 0 auto;
  }
}

@media (max-width: 768px) {
  .hero-section {
    padding: 2rem 1rem;
  }

  .hero-content h1 {
    font-size: 2.5rem;
  }

  .main-image-container {
    height: 300px;
  }

  .secondary-images {
    height: 150px;
  }

  .hero-buttons {
    flex-direction: column;
    gap: 1rem;
  }

  .cta-button,
  .secondary-button {
    width: 100%;
    text-align: center;
  }
}

@keyframes gradient-animation {
  0% {
    background-position: 0% 50%;
  }

  50% {
    background-position: 100% 50%;
  }

  100% {
    background-position: 0% 50%;
  }
}

@keyframes float {

  0%,
  100% {
    transform: translateY(0) rotate(0deg);
  }

  50% {
    transform: translateY(-20px) rotate(2deg);
  }
}

@keyframes pulse {

  0%,
  100% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.05);
  }
}

.services-wrapper {
  position: relative;
  background: linear-gradient(-45deg, #f8f9fa, #ffffff, #f6f6e5, #e6f0e9);
  background-size: 400% 400%;
  animation: gradient-animation 15s ease infinite;
  overflow: hidden;
}

.services-section {
  position: relative;
  padding: 160px 80px;
  max-width: 1600px;
  margin: 0 auto;
}

/* Decorative Elements */
.decorative-sphere {
  position: absolute;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(72, 130, 93, 0.1), rgba(184, 206, 192, 0.1));
  filter: blur(60px);
  z-index: 0;
}

.sphere-1 {
  width: 600px;
  height: 600px;
  top: -200px;
  left: -200px;
  animation: float 20s infinite ease-in-out;
}

.sphere-2 {
  width: 400px;
  height: 400px;
  bottom: -100px;
  right: -100px;
  animation: float 15s infinite ease-in-out reverse;
}

/* Header Styles */
.services-header {
  text-align: center;
  margin-bottom: 100px;
  position: relative;
  z-index: 2;
}

.services-subtitle {
  display: inline-block;
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 4px;
  color: #48825d;
  background: rgba(72, 130, 93, 0.1);
  padding: 12px 24px;
  border-radius: 50px;
  margin-bottom: 24px;
  font-weight: 500;
}

.services-title {
  font-size: 4rem;
  font-weight: 700;
  background: linear-gradient(135deg, #333333, #48825d);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  margin: 0;
  line-height: 1.2;
  position: relative;
}

.services-title::after {
  content: \'\';
  display: block;
  width: 100px;
  height: 4px;
  background: linear-gradient(90deg, #48825d, transparent);
  margin: 30px auto;
  border-radius: 2px;
}

/* Grid Layout */
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
  position: relative;
  z-index: 2;
}

/* Service Card Styles */
.service-card {
  position: relative;
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(20px);
  border-radius: 30px;
  padding: 3px;
  transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
}

.service-card::before {
  content: \'\';
  position: absolute;
  inset: 0;
  border-radius: 30px;
  padding: 2px;
  background: linear-gradient(135deg, #48825d, transparent, #48825d);
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  opacity: 0.5;
  transition: opacity 0.6s ease;
}

.service-card:hover {
  transform: translateY(-10px) scale(1.02);
}

.service-card:hover::before {
  opacity: 1;
}

.service-content {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 28px;
  padding: 40px;
  height: 100%;
  position: relative;
  overflow: hidden;
}

/* Service Number */
.service-number {
  position: absolute;
  top: 20px;
  right: 20px;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  font-weight: 700;
  color: #48825d;
  background: linear-gradient(135deg, rgba(72, 130, 93, 0.1), rgba(72, 130, 93, 0.05));
  border-radius: 15px;
  transition: all 0.3s ease;
}

.service-card:hover .service-number {
  background: #48825d;
  color: white;
  transform: scale(1.1) rotate(10deg);
}

/* Service Title */
.service-title {
  font-size: 2rem;
  color: #333;
  margin: 0 0 30px 0;
  padding-right: 60px;
  position: relative;
}

.service-title::after {
  content: \'\';
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 40px;
  height: 3px;
  background: #48825d;
  transition: width 0.3s ease;
}

.service-card:hover .service-title::after {
  width: 60px;
}

/* Service Links */
.service-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.service-link {
  margin-bottom: 15px;
}

.service-link a {
  display: flex;
  align-items: center;
  padding: 15px 20px;
  color: #666;
  text-decoration: none;
  background: rgba(72, 130, 93, 0.05);
  border-radius: 12px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.service-link a::before {
  content: \'\';
  position: absolute;
  top: 0;
  left: 0;
  width: 3px;
  height: 100%;
  background: #48825d;
  transform: scaleY(0);
  transition: transform 0.3s ease;
}

.service-link a:hover {
  background: rgba(72, 130, 93, 0.1);
  padding-left: 25px;
  color: #48825d;
}

.service-link a:hover::before {
  transform: scaleY(1);
}

/* Hover Effects */
.service-card::after {
  content: \'\';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%),
      rgba(255, 255, 255, 0.1) 0%,
      transparent 50%);
  border-radius: 30px;
  opacity: 0;
  transition: opacity 0.3s ease;
  pointer-events: none;
}

.service-card:hover::after {
  opacity: 1;
}

/* 3D Transform Effect */
.service-card {
  transform-style: preserve-3d;
  perspective: 1000px;
}

.service-content {
  transform: translateZ(20px);
  transform-style: preserve-3d;
}

.service-number {
  transform: translateZ(30px);
}

/* Animation Classes */
.fade-up {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeUp 0.6s ease forwards;
}

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive Design */
@media (max-width: 1200px) {
  .services-section {
    padding: 120px 40px;
  }

  .services-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }

  .services-title {
    font-size: 3.5rem;
  }
}

@media (max-width: 768px) {
  .services-section {
    padding: 80px 20px;
  }

  .services-grid {
    grid-template-columns: 1fr;
  }

  .services-title {
    font-size: 2.5rem;
  }

  .service-card {
    transform: none !important;
  }
}

.director-section {
  padding: 4rem 2rem;
  background: #f6f6e5;
  min-height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: Georgia, serif;
}

.director-container {
  max-width: 1200px;
  margin: 0 auto;
}

.director-title {
  text-align: center;
  color: #48825d;
  font-size: 2.5rem;
  margin-bottom: 3rem;
}

.director-card {
  background: white;
  border-radius: 20px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.image-container {
  position: relative;
  width: 200px;
  height: 200px;
  margin: 0 auto 2rem;
}

.image-border {
  position: absolute;
  top: -10px;
  left: -10px;
  right: -10px;
  bottom: -10px;
  border: 3px solid #48825d;
  border-radius: 50%;
  transform: rotate(-5deg);
}

.image-border-2 {
  position: absolute;
  top: -10px;
  left: -10px;
  right: -10px;
  bottom: -10px;
  border: 3px solid #b8cec0;
  border-radius: 50%;
  transform: rotate(5deg);
}

.director-image {
  position: relative;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid white;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.director-name {
  font-size: 2rem;
  color: #48825d;
  margin-bottom: 0.5rem;
}

.director-role {
  color: #666;
  font-size: 1.2rem;
  margin-bottom: 2rem;
}

.director-bio {
  max-width: 800px;
  margin: 0 auto 2rem;
  line-height: 1.8;
  color: #333;
  font-size: 1.1rem;
}

.credentials {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: center;
}

.credential-tag {
  background: #48825d;
  color: white;
  padding: 0.8rem 1.5rem;
  border-radius: 50px;
  font-size: 0.9rem;
  transition: transform 0.3s ease;
}

.credential-tag:hover {
  transform: scale(1.05);
}

@media (max-width: 768px) {
  .director-section {
    padding: 2rem 1rem;
  }

  .director-card {
    padding: 2rem 1rem;
  }

  .director-title {
    font-size: 2rem;
  }

  .director-name {
    font-size: 1.8rem;
  }

  .image-container {
    width: 150px;
    height: 150px;
  }

  .director-image {
    width: 150px;
    height: 150px;
  }

  .credentials {
    flex-direction: column;
    align-items: center;
  }

  .credential-tag {
    width: 100%;
    text-align: center;
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

/* Smooth Scroll Behavior */
html {
  scroll-behavior: smooth;
}

/* Back to Top Button */
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

.back-to-top.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Arrow Icon */
.back-to-top::before {
  content: \'\';
  width: 12px;
  height: 12px;
  border-left: 3px solid white;
  border-top: 3px solid white;
  transform: rotate(45deg) translate(2px, 2px);
  transition: transform 0.3s ease;
}

/* Hover Effects */
.back-to-top:hover {
  transform: translateY(-5px);
  box-shadow:
    0 6px 16px rgba(72, 130, 93, 0.4),
    0 12px 32px rgba(72, 130, 93, 0.3);
}

.back-to-top:hover::before {
  transform: rotate(45deg) translate(2px, -2px);
}

/* Active State */
.back-to-top:active {
  transform: translateY(-2px);
  box-shadow:
    0 2px 8px rgba(72, 130, 93, 0.4),
    0 4px 16px rgba(72, 130, 93, 0.3);
}

/* Progress Ring */
.progress-ring {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  transform: rotate(-90deg);
}

.progress-ring circle {
  fill: none;
  stroke-width: 3;
  stroke-linecap: round;
  transition: stroke-dashoffset 0.3s ease;
}

.progress-ring .background {
  stroke: rgba(255, 255, 255, 0.1);
}

.progress-ring .progress {
  stroke: rgba(255, 255, 255, 0.8);
  stroke-dasharray: 141.37;
  stroke-dashoffset: 141.37;
}

/* Ripple Effect */
.back-to-top::after {
  content: \'\';
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.2);
  opacity: 0;
  transform: scale(1);
  transition: all 0.5s ease-out;
}

.back-to-top:active::after {
  opacity: 1;
  transform: scale(1.5);
  transition: 0s;
}

/* Media Queries */
@media (max-width: 768px) {
  .back-to-top {
    width: 45px;
    height: 45px;
    bottom: 20px;
    right: 20px;
  }

  .back-to-top::before {
    width: 10px;
    height: 10px;
  }
}

@media (max-width: 480px) {
  .back-to-top {
    width: 40px;
    height: 40px;
    bottom: 15px;
    right: 15px;
  }
}

.partner-track {
  display: flex;
  gap: 2rem;
  animation: slidePartners 100s linear infinite;
  /* Duplicate the content for seamless loop */
  width: max-content;
}

/* Create a duplicate set of slides */
.partner-track {
  display: flex;
  gap: 2rem;
  animation: slidePartners 100s linear infinite;
}

.partner-track:hover {
  animation-play-state: paused;
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

.services-header {
  padding: 4rem 2rem;
  position: relative;
  overflow: hidden;
}

.services-subtitle {
  display: inline-block;
  padding: 8px 16px;
  background: rgba(72, 130, 93, 0.1);
  color: #48825d;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 1.5rem;
}

.highlight-heading {
  font-size: 3.5rem;
  font-weight: bold;
  text-align: center;
  background: linear-gradient(45deg, #48825d, #3a6b4a);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  position: relative;
  animation: glow 2s ease-in-out infinite;
}

@keyframes glow {

  0%,
  100% {
    text-shadow:
      0 0 10px rgba(72, 130, 93, 0.2),
      0 0 20px rgba(72, 130, 93, 0.2),
      0 0 30px rgba(72, 130, 93, 0.2);
    transform: scale(1);
  }

  50% {
    text-shadow:
      0 0 20px rgba(72, 130, 93, 0.4),
      0 0 30px rgba(72, 130, 93, 0.4),
      0 0 40px rgba(72, 130, 93, 0.4);
    transform: scale(1.02);
  }
}

.decorative-line {
  width: 100px;
  height: 4px;
  background: linear-gradient(90deg, #48825d, transparent);
  margin: 30px auto;
  border-radius: 2px;
  animation: lineGlow 2s ease-in-out infinite;
}

@keyframes lineGlow {

  0%,
  100% {
    opacity: 0.5;
    width: 100px;
  }

  50% {
    opacity: 1;
    width: 150px;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .highlight-heading {
    font-size: 2.5rem;
  }
}

@media (max-width: 480px) {
  .highlight-heading {
    font-size: 2rem;
  }
}

.floating-training-btn {
  position: fixed;
  bottom: 100px;
  right: -5px;
  z-index: 999;
  padding: 12px 20px 12px 25px;
  border-radius: 25px 0 0 25px;
  font-weight: 600;
  font-size: 15px;
  text-decoration: none;
  color: white;
  background: linear-gradient(135deg, #48825d, #3a6b4a);
  box-shadow: 0 4px 15px rgba(72, 130, 93, 0.2);
  transform: translateX(calc(100% - 45px));
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  align-items: center;
  gap: 8px;
}

.floating-training-btn:hover {
  transform: translateX(0);
  box-shadow: -4px 4px 15px rgba(72, 130, 93, 0.3);
}

.button-text {
  white-space: nowrap;
  opacity: 0.9;
}

.button-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 85px;
  height: 85px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  padding: 5px;
}

.notification-dot {
  position: absolute;
  top: 15px;
  left: 20px;
  width: 18px;
  height: 18px;
  background-color: #ff4444;
  border-radius: 50%;
  border: 2px solid #3a6b4a;
  animation: subtle-pulse 1s infinite;
}

@keyframes subtle-pulse {

  0%,
  100% {
    transform: scale(1);
    opacity: 1;
  }

  50% {
    transform: scale(1.3);
    opacity: 0.8;
  }
}

/* Show hint animation on page load */
@keyframes hint-animation {

  0%,
  100% {
    transform: translateX(calc(100% - 45px));
  }

  10%,
  90% {
    transform: translateX(0);
  }
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
  .floating-training-btn {
    bottom: 70px;
    padding: 10px 15px 10px 20px;
    font-size: 14px;
  }

  .button-icon {
    width: 20px;
    height: 20px;
  }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
  .floating-training-btn {
    transition: none;
  }

  .notification-dot {
    animation: none;
  }
}

/* Full-screen Hero Section Styles */
.hero-section-fullscreen {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.hero-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.bg-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.bg-image.active {
  opacity: 1;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right,
      rgba(0, 0, 0, 0.7) 0%,
      rgba(0, 0, 0, 0.5) 50%,
      rgba(0, 0, 0, 0.3) 100%);
}

.hero-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
  padding: 2rem 4rem;
  color: white;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  padding: 0.75rem 1.5rem;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 2rem;
  margin-bottom: 2rem;
  color: white;
  font-weight: 500;
}

.hero-badge i {
  margin-right: 0.75rem;
  color: var(--secondary);
}

.hero-content h1 {
  font-size: 4rem;
  line-height: 1.2;
  margin-bottom: 1.5rem;
  color: white;
}

.hero-content .highlight {
  color: var(--secondary);
}

.hero-content p {
  font-size: 1.3rem;
  margin-bottom: 2.5rem;
  color: rgba(255, 255, 255, 0.9);
  max-width: 600px;
  line-height: 1.6;
}

.hero-buttons {
  display: flex;
  gap: 1.5rem;
}

.cta-button {
  background: var(--primary);
  color: white;
  padding: 1rem 2.5rem;
  border-radius: 50px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
}

.secondary-button {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  color: white;
  padding: 1rem 2.5rem;
  border-radius: 50px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
}

.cta-button:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
}

.secondary-button:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateY(-2px);
}

.bg-controls {
  position: absolute;
  bottom: 2rem;
  right: 2rem;
  display: flex;
  gap: 1rem;
  z-index: 2;
}

.bg-dot {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: 2px solid white;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 0;
}

.bg-dot.active {
  background: white;
  transform: scale(1.2);
}

/* Responsive Design */
@media (max-width: 992px) {
  .hero-content {
    padding: 2rem;
    margin: 0 auto;
    text-align: center;
  }

  .hero-content h1 {
    font-size: 3rem;
  }

  .hero-buttons {
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .hero-content h1 {
    font-size: 2.5rem;
  }

  .hero-content p {
    font-size: 1.1rem;
  }

  .hero-buttons {
    flex-direction: column;
    gap: 1rem;
  }

  .cta-button,
  .secondary-button {
    width: 100%;
    text-align: center;
  }

  .bg-controls {
    bottom: 1rem;
    right: 50%;
    transform: translateX(50%);
  }
}

.mobile-menu {
  will-change: transform;
  transform: translateX(100%);
  transition: transform 0.3s ease;
}

.mobile-menu.active {
  transform: translateX(0);
}

/* Optimize animations */
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
</style>';
require_once 'includes/config.php';

// Fetch testimonials for the testimonials section if enabled
$show_testimonials = is_setting_enabled('show_testimonials', true);
$testimonials_count = (int)get_setting('testimonials_count', 8);

$testimonials_result = null;
if ($show_testimonials) {
    $testimonials_query = "SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order ASC LIMIT " . $testimonials_count;
    $testimonials_result = mysqli_query($conn, $testimonials_query);
}

// Fetch partners if enabled
$show_partners = is_setting_enabled('show_partners', true);
$partners_count = (int)get_setting('partners_count', 6);

$partners_result = null;
if ($show_partners) {
    $partners_query = "SELECT * FROM partners WHERE is_active = 1 ORDER BY display_order ASC LIMIT " . $partners_count;
    $partners_result = mysqli_query($conn, $partners_query);
}

// Include the header
include 'includes/header.php';
?>

  <body>

    <!-- Updated Hero Section -->
    <!-- Full-screen Hero Section -->
    <?php if (is_setting_enabled('show_hero_section', true)): ?>
    <section id="hero" class="hero-section-fullscreen">
      <div class="hero-background">
        <img src="images/hero1.webp" alt="School Background" class="bg-image" width="1920" height="1080"
          style="transition: opacity 1s ease-in-out;">
        <img src="images/hero2.webp" alt="Teaching Background" class="bg-image active" width="1920" height="1080"
          style="transition: opacity 1s ease-in-out;">
        <img src="images/hero3.webp" alt="Learning Background" class="bg-image" width="1920" height="1080"
          style="transition: opacity 1s ease-in-out;">
        <div class="overlay"></div>
      </div>

      <div class="hero-content">
        <div class="hero-badge">
          <i class="fas fa-star"></i>
          <span>Shaping the Future of Education Since 2016</span>
        </div>
        <h1>Transform Education with <span class="highlight"><?php the_setting('site_title', 'Kalpavriksha'); ?></span></h1>
        <p><?php the_setting('site_tagline', 'Empowering schools and teachers with expert training, consultation, and child-focused educational resources.'); ?></p>
        <div class="hero-buttons">
          <a href="#services" class="cta-button">Get Started</a>
          <a href="/consultation" class="secondary-button">Learn More</a>
        </div>
      </div>
      <div class="bg-controls">
        <button class="bg-dot active" data-index="0"></button>
        <button class="bg-dot" data-index="1"></button>
        <button class="bg-dot" data-index="2"></button>
      </div>
    </section>
    <?php endif; ?>
    <!-- Updated Features Section -->
    <!-- Mission & Vision Section -->
    <!-- Mission & Vision Section -->
    <section id="features" class="section features-section">
      <h2 class="section-title">Our Mission &amp; Vision</h2>

      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-star"></i>
          </div>
          <h3 class="feature-title">Our Mission</h3>
          <p class="feature-text">
            Providing child-centered and developmentally appropriate international quality education for all children of
            pre-primary and primary level.
          </p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-eye"></i>
          </div>
          <h3 class="feature-title">Our Vision</h3>
          <p class="feature-text">
            Supporting school administration to give importance on early years of children which is the foundation of
            their life.
          </p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-bullseye"></i>
          </div>
          <h3 class="feature-title">Our Goal</h3>
          <p class="feature-text">
            Equipping teachers and institutions with knowledge and skills to implement play-based activities and
            project-based teaching and learning.
          </p>
        </div>
      </div>
    </section>

    <!-- New Services Section -->
    <!-- Services Section -->
    <div class="services-wrapper">
      <div class="decorative-sphere sphere-1"></div>
      <div class="decorative-sphere sphere-2"></div>

      <section id="services" class="services-section">
        <div class="services-header">
          <div style="text-align: center;">
            <span class="services-subtitle">OUR EXPERTISE</span>
            <h2 class="highlight-heading">Transforming Education Through Innovation</h2>
            <div class="decorative-line"></div>
          </div>
        </div>

        <div class="services-grid">
          <!-- Consultation Card -->
          <div class="service-card fade-up" style="animation-delay: 0.2s">
            <div class="service-content">
              <div class="service-number">01</div>
              <h3 class="service-title">Consultation</h3>
              <ul class="service-links">
                <li class="service-link">
                  <a href="/school-consultation">School Consultation</a>
                </li>
                <li class="service-link">
                  <a href="/phonics">Phonics Consultation</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Training Card -->
          <div class="service-card fade-up" style="animation-delay: 0.4s">
            <div class="service-content">
              <div class="service-number">02</div>
              <h3 class="service-title">Training</h3>
              <ul class="service-links">
                <li class="service-link">
                  <a href="/training#montessori">Montessori &amp; ECD</a>
                </li>
                <li class="service-link">
                  <a href="/training#mastery">Mastery Training</a>
                </li>
                <li class="service-link">
                  <a href="/training#phonics">Phonics Training</a>
                </li>
                <li class="service-link">
                  <a href="/training#school">Trainings for School</a>
                </li>
                <li class="service-link">
                  <a href="/training#parenting">Parenting</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Resources Card -->
          <div class="service-card fade-up" style="animation-delay: 0.6s">
            <div class="service-content">
              <div class="service-number">03</div>
              <h3 class="service-title">Resources</h3>
              <ul class="service-links">
                <li class="service-link">
                  <a href="/Resources#teaching">Teaching Resources</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="services-section" style="background-color: var(--white);">
      <div class="container">
        <h2 class="section-title">Awards & Recognition</h2>
        <div class="services-grid" style="grid-template-columns: 1fr;">
          <div class="service-card" style="display: flex; flex-direction: column; align-items: center; text-align: center; max-width: 800px; margin: 0 auto;">
            <div class="service-icon" style="width: 80px; height: 80px; margin-bottom: 1.5rem;">
              <i class="fas fa-trophy" style="font-size: 2.5rem; color: var(--primary);"></i>
            </div>
            <h3 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 1rem;">Gijjubhai Badheka ECCE Award for Most Promising Curriculum Development! 🏆</h3>
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-gfBki1Wa7ymdyC54e2wyKArdLXic16.png" alt="Gijjubhai Badheka ECCE Award" style="max-width: 30%; height: auto; border-radius: 10px; margin-bottom: 1.5rem;">
            <p style="color: var(--text); line-height: 1.6; margin-bottom: 1rem;">
              A moment of immense pride and joy for Kalpavriksha Education Foundation! ✨
            </p>
            <p style="color: var(--text); line-height: 1.6; margin-bottom: 1rem;">
              Bright Kinderworld, one of the schools under our consultation, has been honored with the Gijjubhai Badheka ECCE Award for Most Promising Curriculum Development!
            </p>
            <p style="color: var(--text); line-height: 1.6; margin-bottom: 1rem;">
              This award is not just a recognition—it's a testament to the dedication, passion, and belief in the curriculum that fuels holistic, child-centric learning every single day. Seeing our vision come to life at Bright Kinderworld and being celebrated on such a platform is truly heartwarming!
            </p>
            <p style="color: var(--text); line-height: 1.6; margin-bottom: 1rem;">
              A huge congratulations to the entire Bright Kinderworld team for embracing and executing our curriculum with such commitment. This is a win for every child who experiences the joy of learning through our work. Here's to many more milestones ahead! ✨🎉
            </p>
            <div style="margin-top: 1.5rem;">
              <span style="font-weight: bold; color: var(--primary);">Awarded at:</span>
              <span style="color: var(--text);">International Conference on Early Childhood Care Education and Research in 2.0</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About the Director -->
    <section class="director-section">
      <div class="director-container">
        <h2 class="director-title">Meet Our Director</h2>
        <div class="director-card">
          <div class="leadership-featured">
            <div class="leadership-featured-img">
                <img src="/images/pr.webp" alt="Pratiksha Gautam">
                <div class="leadership-social">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="leadership-featured-content">
                <h2>Pratiksha Gautam</h2>
                <span class="leadership-role">Founder &amp; Director</span>
                <p>Pratiksha Gautam is the visionary leader and Founding Director of Kalpavriksha Education Foundation, a
                  pioneering organization dedicated to redefining early childhood and primary education in Nepal. With a
                  strong passion for holistic learning, she has played a pivotal role in establishing a foundation that
                  creates innovative, theme-based curricula and hands-on materials, offering schools a creative and practical
                  approach to education.
                  Her leadership has been significant in fostering a collaborative environment where educators, parents, and
                  children thrive. She has consistently advocated for child-centered learning approaches, ensuring that every
                  program and material designed by the foundation is aligned with the developmental needs of children.
      
                  Under her guidance, Kalpavriksha has become synonymous with quality education, blending academic excellence
                  with creativity and critical thinking. Her vision continues to inspire educators across Nepal, setting new
                  standards for nurturing learners.
      </p>
            </div>
        </div>
        </div>
      </div>
    </section>
    <section class="testimonials-section">
    <div class="testimonials-decor">
        <div class="decor-circle decor-circle-1"></div>
        <div class="decor-circle decor-circle-2"></div>
    </div>

    <h2 class="section-title">Voices of Our Stakeholders</h2>
    <p class="section-subtitle">Hear from the schools and educators we collaborate with</p>

    <div class="testimonials-container">
        <div class="testimonials-track">
            <?php if (mysqli_num_rows($testimonials_result) > 0): ?>
                <?php while ($testimonial = mysqli_fetch_assoc($testimonials_result)): ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <span class="quote-icon quote-left">"</span>
                            <p class="testimonial-text">
                                <?php echo htmlspecialchars($testimonial['content']); ?>
                            </p>
                            <span class="quote-icon quote-right">"</span>
                            <div class="testimonial-author">
                                <img src="<?php echo htmlspecialchars($testimonial['image_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($testimonial['name']); ?>" 
                                     class="author-image" width="60" height="60">
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
                <?php endwhile; ?>
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
            $testimonial_count = mysqli_num_rows($testimonials_result);
            for ($i = 0; $i < $testimonial_count; $i++): 
            ?>
                <div class="dot <?php echo ($i === 0) ? 'active' : ''; ?>"></div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php
// This code goes where you're handling partners in index.php

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
    <!-- Updated CTA Section -->
    <section class="contact-section">
      <h2 class="section-title">Get in Touch</h2>
      <form class="contact-form" action="https://formspree.io/f/mnnqgvey" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <select id="subject" name="subject" required>
            <option value="">Select a subject</option>
            <option value="Training Programs">Training Programs</option>
            <option value="English Phonics Training">English Phonics Training</option>
            <option value="Consultation Services">Consultation Services</option>
            <option value="Other Inquiry">Other Inquiry</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="submit-button">
          <span class="button-text">Send Message</span>
          <span class="button-loader"></span>
        </button>
      </form>
    </section>

    <!-- Footer remains largely the same but with updated contact info -->
    <?php
// Include the footer
include 'includes/footer.php';
?>

    <script defer src="script.js?v=1.0"></script>
    <script defer src="optimization.js?v=1.0"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const heading = document.querySelector('.highlight-heading');

        // Optional: Add intersection observer to start animation when in view
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              heading.style.visibility = 'visible';
            }
          });
        }, {
          threshold: 0.1
        });

        observer.observe(heading);
      });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const button = document.querySelector('.floating-training-btn');

        // Add initial hint animation after a delay
        setTimeout(() => {
          button.style.animation = 'hint-animation 3s ease';
        }, 2000);

        // Handle visibility near footer
        const handleScroll = () => {
          const footer = document.querySelector('footer');
          const footerTop = footer.getBoundingClientRect().top;
          const buttonBottom = button.getBoundingClientRect().bottom;

          if (footerTop - buttonBottom < 20) {
            button.style.opacity = '0';
            button.style.pointerEvents = 'none';
          } else {
            button.style.opacity = '1';
            button.style.pointerEvents = 'auto';
          }
        };

        window.addEventListener('scroll', handleScroll);
        handleScroll();

        // Remove hint animation after it plays
        button.addEventListener('animationend', () => {
          button.style.animation = 'none';
        });
      });
    </script>
    <script>document.addEventListener('DOMContentLoaded', function () {
        // Initialize slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll('.bg-image');
        const dots = document.querySelectorAll('.bg-dot');
        const totalSlides = slides.length;
        let slideInterval;

        // Function to show a specific slide
        function showSlide(index) {
          // Remove active class from all slides and dots
          slides.forEach(slide => slide.classList.remove('active'));
          dots.forEach(dot => dot.classList.remove('active'));

          // Add active class to current slide and dot
          slides[index].classList.add('active');
          dots[index].classList.add('active');
          currentSlide = index;
        }

        // Function to advance to next slide
        function nextSlide() {
          currentSlide = (currentSlide + 1) % totalSlides;
          showSlide(currentSlide);
        }

        // Start automatic slideshow
        function startSlideshow() {
          slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }

        // Stop automatic slideshow
        function stopSlideshow() {
          clearInterval(slideInterval);
        }

        // Add click handlers to dots
        dots.forEach((dot, index) => {
          dot.addEventListener('click', () => {
            showSlide(index);
            stopSlideshow();
            startSlideshow(); // Restart the interval
          });
        });

        // Add fade transition to slides
        slides.forEach(slide => {
          slide.style.transition = 'opacity 1s ease-in-out';
        });

        // Initialize slideshow
        showSlide(0);
        startSlideshow();

        // Optional: Pause slideshow on hover
        const heroSection = document.querySelector('.hero-section-fullscreen');
        heroSection.addEventListener('mouseenter', stopSlideshow);
        heroSection.addEventListener('mouseleave', startSlideshow);
      });</script>
    <script>//Testimonials Slider
      document.addEventListener('DOMContentLoaded', function () {
        const track = document.querySelector('.testimonials-track');
        const slides = document.querySelectorAll('.testimonial-card');
        const dots = document.querySelectorAll('.dot');
        const prevButton = document.querySelector('.prev-arrow');
        const nextButton = document.querySelector('.next-arrow');

        let currentSlide = 0;
        let slideInterval;
        const slideDelay = 12000; // 12 seconds between automatic slides

        // Initialize slider
        function initSlider() {
          // Set initial positions
          updateSlidePosition();
          // Start automatic slideshow
          startSlideShow();
        }

        // Update slide position
        function updateSlidePosition() {
          track.style.transform = `translateX(-${currentSlide * 100}%)`;

          // Update dots
          dots.forEach(dot => dot.classList.remove('active'));
          dots[currentSlide].classList.add('active');
        }

        // Next slide function
        function nextSlide() {
          currentSlide = (currentSlide + 1) % slides.length;
          updateSlidePosition();
        }

        // Previous slide function
        function prevSlide() {
          currentSlide = (currentSlide - 1 + slides.length) % slides.length;
          updateSlidePosition();
        }

        // Start automatic slideshow
        function startSlideShow() {
          stopSlideShow(); // Clear any existing interval
          slideInterval = setInterval(nextSlide, slideDelay);
        }

        // Stop automatic slideshow
        function stopSlideShow() {
          if (slideInterval) {
            clearInterval(slideInterval);
          }
        }

        // Event Listeners
        prevButton.addEventListener('click', () => {
          prevSlide();
          stopSlideShow();
          startSlideShow(); // Reset the interval
        });

        nextButton.addEventListener('click', () => {
          nextSlide();
          stopSlideShow();
          startSlideShow(); // Reset the interval
        });

        // Dot navigation
        dots.forEach((dot, index) => {
          dot.addEventListener('click', () => {
            currentSlide = index;
            updateSlidePosition();
            stopSlideShow();
            startSlideShow(); // Reset the interval
          });
        });

        // Pause on hover
        track.addEventListener('mouseenter', stopSlideShow);
        track.addEventListener('mouseleave', startSlideShow);

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
          if (Math.abs(difference) > 50) { // Minimum swipe distance
            if (difference > 0) {
              nextSlide();
            } else {
              prevSlide();
            }
          }
          startSlideShow();
        });

        // Initialize the slider
        initSlider();
      });</script>
  </body>

</html>