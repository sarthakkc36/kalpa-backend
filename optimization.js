// Initialize all functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeMobileMenu();
    initializeScrollToTop();
    initializeFormHandling();
    initializeAnimations();
    initializeSmoothScroll();
});

// Scroll to Top Functionality
function initializeScrollToTop() {
    const button = document.querySelector('.back-to-top');
    if (!button) return;

    const progressRing = button.querySelector('.progress');
    if (!progressRing) return;

    const circumference = 2 * Math.PI * 22.5;
    progressRing.style.strokeDasharray = circumference;

    function updateScroll() {
        const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
        const scrollProgress = window.scrollY;
        const scrollPercentage = scrollProgress / scrollTotal;
        
        const offset = circumference - (scrollPercentage * circumference);
        progressRing.style.strokeDashoffset = offset;

        button.classList.toggle('visible', scrollProgress > 300);
    }

    // Throttled scroll event handler
    let isScrolling = false;
    window.addEventListener('scroll', () => {
        if (!isScrolling) {
            window.requestAnimationFrame(() => {
                updateScroll();
                isScrolling = false;
            });
            isScrolling = true;
        }
    });

    button.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Initial update
    updateScroll();
}

// Single IntersectionObserver for all animations
const animationObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            
            // Handle stat counters
            if (entry.target.classList.contains('about-stat-number')) {
                animateValue(entry.target);
            }
            
            animationObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

// Animation initialization
function initializeAnimations() {
    // Observe elements for animations
    document.querySelectorAll('.fade-up, .fade-in, .scale-up, .about-stat-number')
        .forEach(el => animationObserver.observe(el));
}

// Helper function to animate number counters
function animateValue(element) {
    const end = parseInt(element.dataset.value);
    const duration = 2000;
    const start = 0;
    const increment = end / (duration / 16);
    let current = start;
    
    function update() {
        current += increment;
        if (current < end) {
            element.textContent = Math.floor(current);
            requestAnimationFrame(update);
        } else {
            element.textContent = end;
            if (element.classList.contains('plus')) {
                element.textContent += '+';
            }
        }
    }
    
    requestAnimationFrame(update);
}

// Form Handling
function initializeFormHandling() {
    const forms = document.querySelectorAll('form[action^="https://formspree.io"]');
    
    forms.forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = form.querySelector('.submit-button');
            const btnText = submitBtn?.querySelector('.button-text');
            const btnLoader = submitBtn?.querySelector('.button-loader');
            
            if (btnText) btnText.style.display = 'none';
            if (btnLoader) btnLoader.style.display = 'inline-block';
            if (submitBtn) submitBtn.disabled = true;

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json' }
                });
                
                const data = await response.json();
                
                if (data.ok) {
                    showAlert(form, 'success');
                    form.reset();
                } else {
                    showAlert(form, 'error');
                }
            } catch (error) {
                showAlert(form, 'error');
            } finally {
                if (btnText) btnText.style.display = 'inline-block';
                if (btnLoader) btnLoader.style.display = 'none';
                if (submitBtn) submitBtn.disabled = false;
            }
        });
    });
}

// Mobile Menu Functionality
function initializeMobileMenu() {
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuOverlay = document.querySelector('.menu-overlay');
    const body = document.body;

    if (!mobileMenuButton || !mobileMenu || !menuOverlay) return;

    function toggleMenu() {
        mobileMenuButton.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        body.classList.toggle('menu-open');
    }

    mobileMenuButton.addEventListener('click', toggleMenu);
    menuOverlay.addEventListener('click', toggleMenu);
    
    document.querySelectorAll('.mobile-menu a').forEach(link => {
        link.addEventListener('click', toggleMenu);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
            toggleMenu();
        }
    });
}

// Smooth scroll functionality
function initializeSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}