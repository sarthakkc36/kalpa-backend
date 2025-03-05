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
    <meta name="title" content="Kalpavriksha Education Foundation">
    <meta name="description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources.">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kalpaeducation.com">
    <meta property="og:title" content="Kalpavriksha Education Foundation">
    <meta property="og:description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources.">
    <meta property="og:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://kalpaeducation.com">
    <meta name="twitter:title" content="Kalpavriksha Education Foundation">
    <meta name="twitter:description" content="Empowering schools and teachers with expert training, consultation, and child-focused educational resources.">
    <meta name="twitter:image" content="https://kalpaeducation.com/images/android-chrome-512x512.png">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Kalpavriksha Education Foundation</title>
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gallery-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .gallery-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-button {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--primary);
            border-radius: 25px;
            background: none;
            color: var(--primary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-button.active,
        .filter-button:hover {
            background: var(--primary);
            color: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
            aspect-ratio: 16/9;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(72, 130, 93, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .overlay {
            opacity: 1;
        }

        .overlay-content {
            color: white;
            text-align: center;
            padding: 1rem;
        }

        .overlay-content h3 {
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .overlay-content p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            padding: 2rem;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90vh;
            position: relative;
        }

        .modal-content img,
        .modal-content video {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }

        .modal-close {
            position: absolute;
            top: -2rem;
            right: -2rem;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0.5rem;
        }

        .modal-caption {
            color: white;
            text-align: center;
            margin-top: 1rem;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin: 4rem 0 2rem;
        }

        .section-header h2 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .section-header p {
            color: var(--text);
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .modal {
                padding: 1rem;
            }

            .modal-close {
                top: -1.5rem;
                right: -1rem;
            }
        }
        .gallery-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.section-header {
    text-align: center;
    margin: 3rem 0 2rem;
}

.section-header h2 {
    color: #48825d;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.filter-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 2rem;
}

.filter-btn {
    padding: 0.8rem 1.5rem;
    border: 2px solid #48825d;
    border-radius: 25px;
    background: none;
    color: #48825d;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-btn.active,
.filter-btn:hover {
    background: #48825d;
    color: white;
    transform: translateY(-2px);
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.video-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    aspect-ratio: 16/9;
    transition: transform 0.3s ease;
}

.video-item:hover {
    transform: translateY(-5px);
}

.video-item iframe {
    border: none;
    width: 100%;
    height: 100%;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(72, 130, 93, 0.9);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-align: center;
    padding: 1rem;
    color: white;
}

.video-item:hover .overlay {
    opacity: 1;
}

.overlay h3 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.overlay p {
    font-size: 0.9rem;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }

    .filter-btn {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
    }

    .section-header h2 {
        font-size: 2rem;
    }
}
    </style>
<link rel="stylesheet" href="optimization.css">
    <link rel="stylesheet" href="scroll-to-top.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/index" class="logo">
            <img src="images/logo.webp" alt="Kalpavriksha Logo" width="auto" height="auto" />
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <ul class="nav-links">
                <li><a href="/index">Home</a></li>
                <li><a href="/school-consultation.html">School Consultation</a></li>
                <li><a href="/phonics.html">Phonics Consultation</a></li>
                <li><a href="/training">Training</a></li>
                <li><a href="/Resources">Resources</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/gallery" class="active">Gallery</a></li>
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
              <li><a href="/index" class="active">Home</a></li>
              <li><a href="/school-consultation.html">School Consultation</a></li>
              <li><a href="/phonics.html">Phonics Consultation</a></li>
              <li><a href="/training">Training</a></li>
              <li><a href="/Resources">Resources</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/about-us">About Us</a></li>
              <li><a href="/gallery" class="active">Gallery</a></li>
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
                 <a href="tel:01-4547300">01-4547300</a>
              </div>
              <div class="info-slide">
                <i class="fas fa-envelope"></i>
                <a href="mailto:kalpavriksha.efn@gmail.com">kalpavriksha.efn@gmail.com</a>
              </div>
              <div class="info-slide">
                <i class="far fa-clock"></i>
                Office Hour: 9am - 6pm
              </div>
              <div class="info-slide">
                <i class="fas fa-map-marker-alt"></i>
                Maharajgunj, Kathmandu, Nepal || Ghorahi, Dang, Nepal
              </div>
            </div>
          </div>
        </div>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Our Gallery</h1>
            <p>Explore our training sessions, workshops, and educational activities</p>
        </div>
    </section>
    <div class="gallery-container">
        <div class="section-header">
            <h2>Video Gallery</h2>
            <p>Watch our educational activities in action</p>
        </div>
    
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All Videos</button>
            <button class="filter-btn" data-filter="consultation">School Consultation</button>
            <button class="filter-btn" data-filter="physical">Physical Training</button>
            <button class="filter-btn" data-filter="virtual">Virtual Training</button>
            <button class="filter-btn" data-filter="parenting">Parenting Sessions</button>
            <button class="filter-btn" data-filter="olympiad">Kids Olympiad</button>
            <button class="filter-btn" data-filter="games">Fun Games</button>
        </div>
    
        <div class="gallery-grid" id="videoGallery">
            <div class="gallery-item video-item" data-category="virtual">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/rGYu3Ht6RsM" 
                    title="Training Session" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Nepali Alphabets</h3>
                    <p>Learn Nepali Alphabets</p>
                </div>
            </div>
            <!-- Existing Videos -->
            <div class="gallery-item video-item" data-category="games">
                <iframe width="100%" height="100%" 
                    src="https://www.youtube.com/embed/gviJ0ZMM0qA?si=MUQgezUCwLUxtD6a" 
                    title="Domino Games" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Domino Games</h3>
                    <p>Fun way to Learn and Play</p>
                </div>
            </div>
            <div class="gallery-item video-item" data-category="games">
                <iframe width="100%" height="100%" 
                    src="https://www.youtube.com/embed/778MTckHVJA?si=EtZbddc5Pr1OFY9T" 
                    title="Lotto Game Guide" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Fun & Easy Lotto Game Guide for Kids</h3>
                    <p>Play & Learn with Joy! 🌈</p>
                </div>
            </div>
    
            <div class="gallery-item video-item" data-category="parenting">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/9wfxVHUQw-E" 
                    title="Shaikshik Bahas" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Educational Debate</h3>
                    <p>Shaikshik Bahas with experts</p>
                </div>
            </div>
    
            <div class="gallery-item video-item" data-category="olympiad">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/mPa6DFSO1wE" 
                    title="Kids Olympiad" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Kids Olympiad</h3>
                    <p>Annual educational competition</p>
                </div>
            </div>
    
            <div class="gallery-item video-item" data-category="parenting">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/q6vayKYc2nA" 
                    title="Tips on Effective Parenting" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Parenting Tips</h3>
                    <p>5 Effective Parenting Tips</p>
                </div>
            </div>
    
            <div class="gallery-item video-item" data-category="physical">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/Qhyz1HD86Yk" 
                    title="Motivational Video for Teachers" 
                    allowfullscreen>
                </iframe>
                <div class="overlay">
                    <h3>Teacher Motivation</h3>
                    <p>Inspiring educational excellence</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-container">
        <div class="section-header">
            <h2>Photo Gallery</h2>
            <p>Capturing moments of learning and growth</p>
        </div>
    
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All Photos</button>
            <button class="filter-btn" data-filter="consultation">School Consultation</button>
            <button class="filter-btn" data-filter="physical">Physical Training</button>
            <button class="filter-btn" data-filter="virtual">Virtual Training</button>
            <button class="filter-btn" data-filter="parenting">Parenting Sessions</button>
            <button class="filter-btn" data-filter="olympiad">Kids Olympiad</button>
            <button class="filter-btn" data-filter="exhibition">Exhibition</button>
        </div>
    
        <div class="gallery-grid" id="photoGallery">
            <!-- School Consultation -->
            <div class="gallery-item" data-category="consultation">
                <img src="images/7-days-phonics.jpg" alt="School Consultation Session" loading="lazy">
                <div class="overlay">
                    <h3>School Visit Program</h3>
                    <p>Expert consultation with school management</p>
                </div>
            </div>
    
            <!-- Physical Training -->
            <div class="gallery-item" data-category="physical">
                <img src="images/training.webp" alt="Physical Training Workshop" loading="lazy">
                <div class="overlay">
                    <h3>Teacher Training Workshop</h3>
                    <p>Interactive learning session</p>
                </div>
            </div>
    
            <!-- Virtual Training -->
            <div class="gallery-item" data-category="virtual">
                <img src="images/virtual-session.jpg" alt="Virtual Training Program" loading="lazy">
                <div class="overlay">
                    <h3>Online Workshop</h3>
                    <p>Remote learning excellence</p>
                </div>
            </div>
    
            <!-- Kids Olympiad -->
            <div class="gallery-item" data-category="olympiad">
                <img src="images/Kids-Olympiad.jpg" alt="Kids Olympiad Event" loading="lazy">
                <div class="overlay">
                    <h3>Kids Olympiad 2023</h3>
                    <p>Annual educational competition</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal for Image Preview -->
    <div class="modal">
        <span class="close-modal">&times;</span>
        <img class="modal-content" id="modalImg">
        <div class="modal-caption"></div>
    </div>
    
    <!-- Modal -->
    <div class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-body"></div>
            <div class="modal-caption"></div>
        </div>
    </div>

    <!-- Modal for Media Display -->
    <div class="modal" id="mediaModal">
        <button class="modal-close">&times;</button>
        <div class="modal-content">
            <!-- Content will be dynamically inserted here -->
        </div>
        <div class="modal-caption"></div>
    </div>

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
                    <li><a href="/index">Home</a></li>
                    <li><a href="/training">Our Trainings</a></li>
                    <li><a href="/Resources">Resources</a></li>
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
            <p>&copy; 2024 Kalpavriksha Education Foundation. All rights reserved.</p>
        </div>
    </footer>

    <script defer src="script.js?v=1.0"></script>
    <script defer src="optimization.js?v=1.0"></script>
<!-- Back to Top Button -->
<div class="back-to-top" role="button" aria-label="Back to top">
    <svg class="progress-ring" width="50" height="50">
        <circle class="background" cx="25" cy="25" r="22.5"/>
        <circle class="progress" cx="25" cy="25" r="22.5"/>
    </svg>
</div>
<script>document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('mediaModal');
    const modalContent = modal.querySelector('.modal-content');
    const modalCaption = modal.querySelector('.modal-caption');
    const closeButton = modal.querySelector('.modal-close');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    // Function to extract YouTube video ID from URL
    function getYouTubeVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    // Function to open modal
    function openModal(content, caption) {
        modalContent.innerHTML = content;
        modalCaption.textContent = caption;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    }

    // Function to close modal
    function closeModal() {
        modal.classList.remove('active');
        modalContent.innerHTML = ''; // Clear content
        document.body.style.overflow = ''; // Restore scrolling
    }

    // Add click event listeners to gallery items
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const overlay = item.querySelector('.overlay-content');
            const caption = overlay ? overlay.querySelector('h3').textContent : '';
            
            if (item.querySelector('iframe')) {
                // Handle YouTube videos
                const iframe = item.querySelector('iframe');
                const videoSrc = iframe.src;
                const videoId = getYouTubeVideoId(videoSrc);
                
                // Create a new iframe with increased size for modal
                const modalIframe = `
                    <iframe
                        width="auto"
                        height="auto"
                        src="https://www.youtube.com/embed/${videoId}?autoplay=1"
                        title="${caption}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>`;
                
                openModal(modalIframe, caption);
            } else {
                // Handle images
                const img = item.querySelector('img');
                if (img) {
                    const modalImg = `<img src="${img.src}" alt="${img.alt}" />`;
                    openModal(modalImg, caption);
                }
            }
        });
    });

    // Close modal when clicking the close button
    closeButton.addEventListener('click', closeModal);

    // Close modal when clicking outside the content
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.querySelector('.modal');
            const modalImg = document.getElementById('modalImg');
            const modalCaption = document.querySelector('.modal-caption');
            const closeModal = document.querySelector('.close-modal');
        
            // Filter functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');
                    
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
        
                    galleryItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                            setTimeout(() => item.style.opacity = '1', 0);
                        } else {
                            item.style.opacity = '0';
                            setTimeout(() => item.style.display = 'none', 300);
                        }
                    });
                });
            });
    
        });
        </script>
</body>
</html>