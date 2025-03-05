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
    <title>Educational Resources - Kalpavriksha Education Foundation</title>
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .resource-categories {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .category-section {
            margin-bottom: 4rem;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .category-title {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--secondary);
            font-size: 1.8rem;
        }

        .category-title i {
            color: var(--primary);
            font-size: 2rem;
        }

        .resources-list {
            display: grid;
            gap: 1.5rem;
        }

        .resource-item {
            background: var(--background);
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            transition: all 0.3s ease;
        }

        .resource-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .resource-details {
            flex: 1;
        }

        .resource-details h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .resource-meta {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .resource-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .download-button {
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 120px;
            justify-content: center;
        }

        .download-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .download-button i {
            font-size: 1.1rem;
        }

        /* Premium Resources Section */
        .premium-resources {
            background: var(--background);
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .premium-banner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .premium-content h3 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .premium-features {
            list-style: none;
            margin: 2rem 0;
        }

        .premium-features li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.1rem;
        }

        .premium-features i {
            color: var(--primary);
        }

        .premium-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .premium-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .premium-banner {
                grid-template-columns: 1fr;
                padding: 2rem;
                text-align: center;
            }

            .premium-features {
                display: inline-block;
                text-align: left;
            }

            .resource-item {
                flex-direction: column;
                text-align: center;
            }

            .resource-meta {
                justify-content: center;
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
                <li><a href="/Resources" class="active">Resources</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/gallery">Gallery</a></li>
            </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <ul>
                <li><a href="/index">Home</a></li>
                <li><a href="/school-consultation.html">School Consultation</a></li>
                <li><a href="/phonics.html">Phonics Consultation</a></li>
                <li><a href="/training">Training</a></li>
                <li><a href="/Resources" class="active">Resources</a></li>
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
            <h1>Educational Resources</h1>
            <p>Access our comprehensive collection of teaching materials and learning resources</p>
        </div>
    </section>

    <!-- Resource Categories -->

<!-- Product Grid Section -->
<section class="product-grid-section">
    <div class="container">
        <h2 class="section-title">Our Products</h2>
        <div class="product-grid">
            <!-- Habit Score Card -->
            <!-- Habit Score Card -->
<div class="product-card">
    <a href="https://www.daraz.com.np/products/habit-score-card-chore-chart-for-children-i159727025-s1143540652.html" target="_blank" class="product-link">
        <div class="product-image">
            <img src="/images/habitscore.webp" alt="Habit Score Card" class="img-hover">
        </div>
        <div class="product-info">
            <h3 class="product-title">Habit Score Card</h3>
            <p class="product-subtitle">Chore Chart for Children</p>
            <div class="product-price">
                <span class="price">Rs. 650</span>
            </div>
            <div class="product-location">
                <i class="fas fa-map-marker-alt"></i> Bagmati Province
            </div>
        </div>
    </a>
    <button class="add-to-cart" data-url="https://www.daraz.com.np/products/habit-score-card-chore-chart-for-children-i159727025-s1143540652.html">
        <i class="fas fa-shopping-cart"></i> Buy Now
    </button>
</div>

            <!-- Phonics Flashcards -->
            <div class="product-card">
                <a href="https://www.daraz.com.np/products/phonics-flashcards-collection-of-42-sounds-with-actions-i173038691-s1193784620.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store" target="_blank" class="product-link">
                    <div class="product-image">
                        <img src="/images/phonics-flashcard.webp" alt="Phonics Flashcards" class="img-hover">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Phonics Flashcards</h3>
                        <p class="product-subtitle">Collection of 42 Sounds with Actions</p>
                        <div class="product-price">
                            <span class="price">Rs. 1050</span>
                        </div>
                        <div class="product-location">
                            <i class="fas fa-map-marker-alt"></i> Bagmati Province
                        </div>
                    </div>
                </a>
                <button class="add-to-cart" data-url="https://www.daraz.com.np/products/phonics-flashcards-collection-of-42-sounds-with-actions-i173038691-s1193784620.html">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
            </div>

            <!-- Classroom Rule Pack -->
            <div class="product-card">
                <a href="https://www.daraz.com.np/products/classroom-rule-pack-i159766064-s1143769336.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store" target="_blank" class="product-link">
                    <div class="product-image">
                        <img src="/images/classroom-rule.webp" alt="Classroom Rule Pack" class="img-hover">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Classroom Rule Pack</h3>
                        <p class="product-subtitle">Essential classroom management tools</p>
                        <div class="product-price">
                            <span class="price">Rs. 325</span>
                        </div>
                        <div class="product-location">
                            <i class="fas fa-map-marker-alt"></i> Bagmati Province
                        </div>
                    </div>
                </a>
                <button class="add-to-cart" data-url="https://www.daraz.com.np/products/classroom-rule-pack-i159766064-s1143769336.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
            </div>

            <!-- Classroom Routine Pack -->
            <div class="product-card">
                <a href="https://www.daraz.com.np/products/classroom-routine-pack-i162061086-s1152435931.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store" target="_blank" class="product-link">
                    <div class="product-image">
                        <img src="/images/classroom-routine.webp" alt="Classroom Routine Pack" class="img-hover">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Classroom Routine Pack</h3>
                        <p class="product-subtitle">Organize daily classroom activities</p>
                        <div class="product-price">
                            <span class="price">Rs. 550</span>
                        </div>
                        <div class="product-location">
                            <i class="fas fa-map-marker-alt"></i> Bagmati Province
                        </div>
                    </div>
                </a>
                <button class="add-to-cart" data-url="https://www.daraz.com.np/products/classroom-routine-pack-i162061086-s1152435931.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
            </div>

            <!-- Series of Sano Bhalu -->
            <div class="product-card">
                <a href="https://www.daraz.com.np/products/series-of-sano-bhalu-a-collection-of-7-storybooks-i147423649-s1152425739.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store" target="_blank" class="product-link">
                    <div class="product-image">
                        <img src="/images/sanobhalu.webp" alt="Series of Sano Bhalu" class="img-hover">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Series of Sano Bhalu</h3>
                        <p class="product-subtitle">A Collection of 7 Storybooks</p>
                        <div class="product-price">
                            <span class="price">Rs. 1,050</span>
                        </div>
                        <div class="product-location">
                            <i class="fas fa-map-marker-alt"></i> Bagmati Province
                        </div>
                    </div>
                </a>
                <button class="add-to-cart" data-url="https://www.daraz.com.np/products/series-of-sano-bhalu-a-collection-of-7-storybooks-i147423649-s1152425739.html?spm=a2a0e.8553159.0.0.48fa6929wShyfE&search=store">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
            </div>
        </div>
    </div>
</section>

<style>
.product-grid-section {
    padding: 2rem 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.section-title {
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-size: 1.8rem;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.5rem;
    padding: 1rem 0;
}

.product-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-5px);
}

.product-link {
    text-decoration: none;
    color: inherit;
    flex: 1;
}

.product-image {
    position: relative;
    padding-top: 100%;
    overflow: hidden;
}

.product-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
}

.product-info {
    padding: 1rem;
}

.product-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-subtitle {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-price {
    margin: 0.5rem 0;
}

.price {
    color: #f57224;
    font-size: 1.2rem;
    font-weight: 700;
}

.product-location {
    font-size: 0.8rem;
    color: #666;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.add-to-cart {
    width: 100%;
    padding: 0.8rem;
    background: #48825d;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: background-color 0.3s ease;
}

.add-to-cart:hover {
    background: #d65b15;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .product-grid {
        grid-template-columns: 1fr;
    }
}
.add-to-cart {
    width: 100%;
    padding: 0.8rem;
    background: #48825d;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.add-to-cart:hover {
    background: #254c33;
    transform: translateY(-2px);
}

.add-to-cart:active {
    transform: translateY(0);
}
</style>


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
<script>// Add event listeners to all Buy Now buttons
    document.addEventListener('DOMContentLoaded', function() {
        const buyButtons = document.querySelectorAll('.add-to-cart');
        
        buyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                if (url) {
                    window.open(url, '_blank');
                }
            });
        });
    });</script>
</body>
</html>