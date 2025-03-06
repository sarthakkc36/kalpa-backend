<!-- Footer -->
 <?php 
 $additional_styles='/* Back to Top Button */
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
}';
?>
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

    <script defer src="script.js?v=1.0"></script>
    <script defer src="optimization.js?v=1.0"></script>
    <?php if (isset($additional_js)): ?>
        <?php echo $additional_js; ?>
    <?php endif; ?>
</body>
</html>