<!DOCTYPE html>
<html lang="en">

<head>
<?php
$page_title = "Contact Us";
$current_page = "contact";
include 'includes/header.php';
?>
    <style>
        .alert {
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

        .expert-profile {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 2rem;
            align-items: start;
        }

        .expert-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #48825d;
        }

        .expert-info h2 {
            color: #48825d;
            margin-bottom: 0.5rem;
        }

        .expert-title {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .expert-credentials {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .expert-credentials li {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .expert-credentials i {
            color: #48825d;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .contact-card {
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .contact-card i {
            font-size: 2rem;
            color: #48825d;
            margin-bottom: 1rem;
        }

        .contact-links {
            margin-top: 1rem;
        }

        .contact-links a {
            display: block;
            padding: 0.5rem;
            color: #48825d;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-links a:hover {
            color: #3a6b4a;
        }

        .contact-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #48825d;
            outline: none;
        }

        .submit-button {
            width: 100%;
            padding: 1rem;
            background: #48825d;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-button:hover {
            background: #3a6b4a;
        }

        @media (max-width: 768px) {
            .expert-profile {
                flex-direction: column;
                text-align: center;
            }

            .expert-image {
                margin: 0 auto;
            }
        }

        .alert {
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

        .contact-form button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
    </style>
    <link rel="stylesheet" href="optimization.css">
<link rel="stylesheet" href="scroll-to-top.css">
</head>

<body>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Get in touch with our expert team</p>
        </div>
    </section>

    <!-- Contact Information -->
    <div class="contact-grid">
        <div class="contact-card">
            <i class="fas fa-phone-alt"></i>
            <h3>Call Us</h3>
            <p>Our support team is available for assistance</p>
            <div class="contact-links">
                <a href="tel:+9779851364262">+977 9851364262</a>
                <a href="tel:+9779840056656">+977 9840056656</a>
            </div>
        </div>

        <div class="contact-card">
            <i class="fas fa-envelope"></i>
            <h3>Email Us</h3>
            <p>Send us your queries anytime</p>
            <div class="contact-links">
                <i class="fas fa-envelope"></i>
                <a href="mailto:kalpavriksha.efn@gmail.com">kalpavriksha.efn@gmail.com</a>
            </div>
        </div>

        <div class="contact-card">
            <i class="fas fa-clock"></i>
            <h3>Business Hours</h3>
            <p>Sunday - Friday</p>
            <div class="contact-links">
                <span>9:00 AM - 5:00 PM</span>
            </div>
        </div>
    </div>
    <!-- Google Map Section -->
    <section class="map-section">
        <div class="map-container">
            <div class="map-card">
                <div class="map-header">
                    <div class="map-info">
                        <div class="map-title">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Our Location</h3>
                        </div>
                        <p>Kalpavriksha Education Foundation, Madhur Marg, Kathmandu</p>
                    </div>
                    <div class="map-contact">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+977 9851364262 | 9840056656</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>kalpavriksha.efn@gmail.com
                        </div>
                    </div>
                </div>
                <div class="map-frame-container">
                    <iframe id="contact-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.36972741325!2d85.33915669999999!3d27.736739999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19004faf0233%3A0xdbc2d75753d59dd5!2sKalpavriksha%20Education%20Foundation!5e0!3m2!1sen!2snp!4v1731578433006!5m2!1sen!2snp"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="map-overlay">
                        <div class="map-actions">
                            <a href="https://maps.app.goo.gl/7YBEzH2ifte2T4P46" class="directions-button"
                                target="_blank">
                                <i class="fas fa-directions"></i> Get Directions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="map-footer">
                    <div class="business-hours">
                        <i class="far fa-clock"></i>
                        <div class="hours-info">
                            <span class="hours-label">Business Hours:</span>
                            <span class="hours-time">Sun - Fri: 8:45 AM - 5:15 PM</span>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="https://www.facebook.com/kalpavrikshaeducation" class="social-button facebook"
                            target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.tiktok.com/@kalpaedu" class="social-button tiktok" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form -->
    <form action="https://formspree.io/f/xvgowpyl" method="POST" class="contact-form">
        <div id="successAlert" class="alert alert-success" style="display: none;">
            Your message has been sent successfully! We'll get back to you soon.
        </div>

        <div id="errorAlert" class="alert alert-error" style="display: none;">
            There was an error sending your message. Please try again.
        </div>

        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <div id="nameError" class="form-error"></div>
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <div id="emailError" class="form-error"></div>
        </div>

        <div class="form-group">
            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
            <div id="phoneError" class="form-error"></div>
        </div>

        <div class="form-group">
            <select id="subject" name="subject" required>
                <option value="">Select a subject</option>
                <option value="training">Training Programs</option>
                <option value="phonics">English Phonics Training</option>
                <option value="consultation">Consultation Services</option>
                <option value="other">Other Inquiry</option>
            </select>
            <div id="subjectError" class="form-error"></div>
        </div>

        <div class="form-group">
            <textarea id="message" name="message" placeholder="Your Message" rows="5" required></textarea>
            <div id="messageError" class="form-error"></div>
        </div>

        <button type="submit" class="submit-button">
            <span class="button-text">Send Message</span>
            <span class="button-loader" style="display: none;">
                <i class="fas fa-spinner fa-spin"></i>
            </span>
        </button>
    </form>

    <!-- Footer -->
<?php include 'includes/footer.php'; ?>
    <script defer src="script.js?v=1.0"></script>
    <script defer src="optimization.js?v=1.0"></script>
</body>

</html>