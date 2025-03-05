<!-- Footer -->
<footer class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="footer-map">
                    <iframe 
                        id="footer-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.36972741325!2d85.33915669999999!3d27.736739999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19004faf0233%3A0xdbc2d75753d59dd5!2sKalpavriksha%20Education%20Foundation!5e0!3m2!1sen!2snp!4v1731578433006!5m2!1sen!2snp"
                        width="100%" 
                        height="200" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <a href="https://maps.app.goo.gl/7YBEzH2ifte2T4P46" 
                    class="footer-directions-button" 
                    target="_blank">
                        <i class="fas fa-directions"></i> Get Directions
                    </a>
                </div>
                <div class="contact-info">
                    <p>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:kalpavriksha.efn@gmail.com">kalpavriksha.efn@gmail.com</a>
                    </p>
                    <p>
                        <i class="fas fa-phone"></i>
                        <span>+977 9851364262 | 9840056656</span>
                    </p>
                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/training.php">Our Trainings</a></li>
                    <li><a href="/Resources.php">Resources</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="https://www.facebook.com/kalpavrikshaeducation"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.tiktok.com/@kalpaedu"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Kalpavriksha Education Foundation. All rights reserved.</p>
        </div>
    </footer>

    <div class="back-to-top" role="button" aria-label="Back to top">
        <svg class="progress-ring" width="50" height="50">
            <circle class="background" cx="25" cy="25" r="22.5"/>
            <circle class="progress" cx="25" cy="25" r="22.5"/>
        </svg>
    </div>

    <script defer src="script.js?v=1.0"></script>
    <script defer src="optimization.js?v=1.0"></script>
    <?php if (isset($additional_js)): ?>
        <?php echo $additional_js; ?>
    <?php endif; ?>
</body>
</html>