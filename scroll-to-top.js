document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('.back-to-top');
    const progressRing = button.querySelector('.progress');
    const circumference = 2 * Math.PI * 22.5; // r = 22.5
    
    // Set initial dash array
    progressRing.style.strokeDasharray = circumference;

    // Smooth scroll function
    function smoothScrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Update progress ring and button visibility
    function updateScroll() {
        const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
        const scrollProgress = window.scrollY;
        const scrollPercentage = scrollProgress / scrollTotal;
        
        // Update progress ring
        const offset = circumference - (scrollPercentage * circumference);
        progressRing.style.strokeDashoffset = offset;

        // Update button visibility
        if (scrollProgress > 300) {
            button.classList.add('visible');
        } else {
            button.classList.remove('visible');
        }
    }

    // Click event
    button.addEventListener('click', smoothScrollToTop);

    // Scroll event with throttle
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

    // Touch events for mobile
    let touchStartY;
    button.addEventListener('touchstart', (e) => {
        touchStartY = e.touches[0].clientY;
        button.classList.add('active');
    });

    button.addEventListener('touchend', (e) => {
        const touchEndY = e.changedTouches[0].clientY;
        if (touchStartY > touchEndY) {
            smoothScrollToTop();
        }
        button.classList.remove('active');
    });

    // Initial update
    updateScroll();
});