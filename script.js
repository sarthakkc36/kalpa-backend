// Enhanced JavaScript Functionality

// Header Scroll Effect
const header = document.querySelector('header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    // Add/remove scrolled class for header styling
    if (currentScroll > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
});

// Smooth Scroll for Navigation Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Enhanced Card Reveal Animation
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.card').forEach(card => {
    observer.observe(card);
});

// Form Validation
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const requiredFields = form.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
                
                // Add error message
                let errorMsg = field.nextElementSibling;
                if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                    errorMsg = document.createElement('div');
                    errorMsg.classList.add('error-message');
                    field.parentNode.insertBefore(errorMsg, field.nextSibling);
                }
                errorMsg.textContent = `${field.getAttribute('placeholder')} is required`;
            } else {
                field.classList.remove('error');
                const errorMsg = field.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.remove();
                }
            }
        });
        
        if (isValid) {
            // Show success message
            const successMsg = document.createElement('div');
            successMsg.classList.add('success-message');
            successMsg.textContent = 'Form submitted successfully!';
            form.appendChild(successMsg);
            
            // Clear form after 2 seconds
            setTimeout(() => {
                form.reset();
                successMsg.remove();
            }, 2000);
        }
    });
});

// Image Lazy Loading
document.addEventListener('DOMContentLoaded', function() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.getAttribute('data-src');
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
});

// Mobile Menu Toggle
const mobileMenuButton = document.querySelector('.mobile-menu-button');
const mobileMenu = document.querySelector('.nav-links');

if (mobileMenuButton) {
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        mobileMenuButton.classList.toggle('active');
    });
}

// Package Selection
const packageCards = document.querySelectorAll('.package-card');
packageCards.forEach(card => {
    card.addEventListener('click', function() {
        packageCards.forEach(c => c.classList.remove('selected'));
        this.classList.add('selected');
    });
});


// Initialize testimonial slider if exists
const testimonialContainer = document.querySelector('.testimonial-slider');
if (testimonialContainer) {
    new TestimonialSlider(testimonialContainer);
}

// Download Progress Simulation
function simulateDownload(button) {
    const originalText = button.textContent;
    button.disabled = true;
    button.innerHTML = '<span class="loading-spinner"></span> Downloading...';
    
    setTimeout(() => {
        button.innerHTML = '✓ Downloaded';
        setTimeout(() => {
            button.innerHTML = originalText;
            button.disabled = false;
        }, 2000);
    }, 2000);
}

// Add this to download buttons
document.querySelectorAll('.download-button').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        simulateDownload(button);
    });
});
// Consultation Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize form handling
    initializeForm();
    
    // Initialize animations
    initializeAnimations();
});

function initializeForm() {
    const bookingForm = document.querySelector('.booking-form');
    if (!bookingForm) return;

    // Set minimum date for date picker
    const dateInput = document.getElementById('date');
    if (dateInput) {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        dateInput.min = tomorrow.toISOString().split('T')[0];
    }

    // Form submission handler
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm(this)) {
            handleFormSubmission(this);
        }
    });
}

function validateForm(form) {
    clearMessages();
    const errors = [];
    
    // Name validation
    const name = form.querySelector('#name').value.trim();
    if (name.length < 2) {
        errors.push('Please enter a valid name (minimum 2 characters)');
    }
    
    // Email validation
    const email = form.querySelector('#email').value.trim();
    if (!isValidEmail(email)) {
        errors.push('Please enter a valid email address');
    }
    
    // Phone validation
    const phone = form.querySelector('#phone').value.trim();
    if (!isValidPhone(phone)) {
        errors.push('Please enter a valid phone number');
    }
    
    // Date validation
    const date = form.querySelector('#date').value;
    if (!date || !isValidDate(date)) {
        errors.push('Please select a future date');
    }
    
    // Time validation
    const time = form.querySelector('#time').value;
    if (!time) {
        errors.push('Please select a time slot');
    }
    
    if (errors.length > 0) {
        showMessage('error', errors);
        return false;
    }
    
    return true;
}


function setFormLoading(form, isLoading) {
    const elements = form.querySelectorAll('input, select, textarea, button');
    elements.forEach(element => {
        element.disabled = isLoading;
    });
}

function showMessage(type, messages) {
    const messageContainer = document.createElement('div');
    messageContainer.className = `message message-${type}`;
    
    const messageContent = messages.map(msg => `<p>${msg}</p>`).join('');
    messageContainer.innerHTML = messageContent;
    
    const form = document.querySelector('.booking-form');
    form.insertBefore(messageContainer, form.firstChild);
    
    setTimeout(() => {
        messageContainer.remove();
    }, 5000);
}

function clearMessages() {
    const messages = document.querySelectorAll('.message');
    messages.forEach(message => message.remove());
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
    return /^[\d\s-+()]{10,}$/.test(phone);
}

function isValidDate(date) {
    const selectedDate = new Date(date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    return selectedDate >= today;
}

function initializeAnimations() {
    const animatedElements = document.querySelectorAll('.benefit-card, .timeline-item, .faq-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '50px'
    });
    
    animatedElements.forEach(element => {
        observer.observe(element);
    });
}

// Utility function to prevent form double submission
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
// Enhanced Download Button Functionality
function simulateDownload(button) {
    if (button.classList.contains('downloading')) {
        return;
    }

    const originalText = button.innerHTML;
    button.classList.add('downloading');
    button.innerHTML = '<span class="loading-spinner"></span>Downloading...';

    // Simulate download progress
    setTimeout(() => {
        button.classList.remove('downloading');
        button.classList.add('success');
        button.innerHTML = '<i class="fas fa-check"></i>Downloaded';

        // Reset button after 2 seconds
        setTimeout(() => {
            button.classList.remove('success');
            button.innerHTML = originalText;
        }, 2000);
    }, 2000);
}

// Filter functionality for Resources page
const filterTags = document.querySelectorAll('.filter-tag');
filterTags.forEach(tag => {
    tag.addEventListener('click', () => {
        // Remove active class from all tags
        filterTags.forEach(t => t.classList.remove('active'));
        // Add active class to clicked tag
        tag.classList.add('active');
        
        // Here you would normally filter the resources
        // For now, we'll just add the visual feedback
        const filter = tag.getAttribute('data-filter');
        console.log('Filtering by:', filter);
    });
});

// Search functionality
const searchInput = document.getElementById('resourceSearch');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        // Here you would normally implement the search logic
        console.log('Searching for:', searchTerm);
    });
}
// Contact Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm(this)) {
                handleFormSubmission(this);
            }
        });
    }
});

function validateForm(form) {
    clearMessages();
    const errors = [];
    
    // Name validation
    const name = form.querySelector('#name').value.trim();
    if (name.length < 2) {
        addError(form.querySelector('#name'), 'Please enter a valid name (minimum 2 characters)');
        errors.push('Invalid name');
    }
    
    // Email validation
    const email = form.querySelector('#email').value.trim();
    if (!isValidEmail(email)) {
        addError(form.querySelector('#email'), 'Please enter a valid email address');
        errors.push('Invalid email');
    }
    
    // Phone validation (optional)
    const phone = form.querySelector('#phone').value.trim();
    if (phone && !isValidPhone(phone)) {
        addError(form.querySelector('#phone'), 'Please enter a valid phone number');
        errors.push('Invalid phone');
    }
    
    // Subject validation
    const subject = form.querySelector('#subject').value;
    if (!subject) {
        addError(form.querySelector('#subject'), 'Please select a subject');
        errors.push('Subject required');
    }
    
    // Message validation
    const message = form.querySelector('#message').value.trim();
    if (message.length < 10) {
        addError(form.querySelector('#message'), 'Please enter a message (minimum 10 characters)');
        errors.push('Message too short');
    }
    
    return errors.length === 0;
}

function handleFormSubmission(form) {
    const submitButton = form.querySelector('.submit-button');
    const originalText = submitButton.innerHTML;
    
    // Disable form and show loading state
    setFormLoading(form, true);
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    
    // Simulate API call
    setTimeout(() => {
        // Show success message
        const successMessage = document.createElement('div');
        successMessage.className = 'success-message';
        successMessage.innerHTML = '<i class="fas fa-check-circle"></i> Your message has been sent successfully! We\'ll get back to you soon.';
        form.insertBefore(successMessage, form.firstChild);
        
        // Reset form
        form.reset();
        
        // Reset button state
        setFormLoading(form, false);
        submitButton.innerHTML = originalText;
        
        // Remove success message after 5 seconds
        setTimeout(() => {
            successMessage.remove();
        }, 5000);
    }, 2000);
}

function setFormLoading(form, isLoading) {
    const elements = form.querySelectorAll('input, select, textarea, button');
    elements.forEach(element => {
        element.disabled = isLoading;
    });
}

function addError(element, message) {
    const formGroup = element.closest('.form-group');
    formGroup.classList.add('error');
    
    const errorMessage = document.createElement('div');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    
    formGroup.appendChild(errorMessage);
}

function clearMessages() {
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach(group => {
        group.classList.remove('error');
        const errorMessage = group.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    });
    
    const successMessage = document.querySelector('.success-message');
    if (successMessage) {
        successMessage.remove();
    }
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
    return /^[\d\s-+()]{10,}$/.test(phone);
}

// Remove error messages on input
document.addEventListener('input', function(e) {
    if (e.target.closest('.form-group')) {
        const formGroup = e.target.closest('.form-group');
        formGroup.classList.remove('error');
        const errorMessage = formGroup.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
});
// Payment Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const paymentForm = document.getElementById('paymentForm');
    const cardNumberInput = document.getElementById('cardNumber');
    const expiryInput = document.getElementById('expiry');
    const cvvInput = document.getElementById('cvv');
    const packageSelect = document.getElementById('package');

    if (paymentForm) {
        // Initialize form handlers
        initializePaymentForm();
        
        // Handle form submission
        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (validatePaymentForm(this)) {
                handlePaymentSubmission(this);
            }
        });
    }

    // Package selection handler
    if (packageSelect) {
        packageSelect.addEventListener('change', updatePaymentSummary);
    }

    // Card number formatting
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';
            
            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += ' ';
                }
                formattedValue += value[i];
            }
            
            e.target.value = formattedValue;
            updateCardIcon(value);
        });
    }

    // Expiry date formatting
    if (expiryInput) {
        expiryInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 2) {
                value = value.substr(0, 2) + '/' + value.substr(2, 2);
            }
            
            e.target.value = value;
        });
    }

    // CVV validation
    if (cvvInput) {
        cvvInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '').substr(0, 4);
        });
    }
});

function initializePaymentForm() {
    // Set minimum date for expiry
    const today = new Date();
    const minMonth = (today.getMonth() + 1).toString().padStart(2, '0');
    const minYear = today.getFullYear().toString().slice(-2);
    
    const expiryInput = document.getElementById('expiry');
    if (expiryInput) {
        expiryInput.setAttribute('min', `${minMonth}/${minYear}`);
    }
}

function validatePaymentForm(form) {
    clearMessages();
    const errors = [];

    // Card Name validation
    const cardName = form.querySelector('#cardName').value.trim();
    if (cardName.length < 3) {
        addError(form.querySelector('#cardName'), 'Please enter a valid cardholder name');
        errors.push('Invalid card name');
    }

    // Card Number validation
    const cardNumber = form.querySelector('#cardNumber').value.replace(/\s/g, '');
    if (!isValidCardNumber(cardNumber)) {
        addError(form.querySelector('#cardNumber'), 'Please enter a valid card number');
        errors.push('Invalid card number');
    }

    // Expiry validation
    const expiry = form.querySelector('#expiry').value;
    if (!isValidExpiry(expiry)) {
        addError(form.querySelector('#expiry'), 'Please enter a valid expiry date');
        errors.push('Invalid expiry');
    }

    // CVV validation
    const cvv = form.querySelector('#cvv').value;
    if (!isValidCVV(cvv)) {
        addError(form.querySelector('#cvv'), 'Please enter a valid CVV');
        errors.push('Invalid CVV');
    }

    // Address validation
    const address = form.querySelector('#address').value.trim();
    if (address.length < 5) {
        addError(form.querySelector('#address'), 'Please enter a valid address');
        errors.push('Invalid address');
    }

    // City validation
    const city = form.querySelector('#city').value.trim();
    if (city.length < 2) {
        addError(form.querySelector('#city'), 'Please enter a valid city');
        errors.push('Invalid city');
    }

    // ZIP code validation
    const zipcode = form.querySelector('#zipcode').value.trim();
    if (!isValidZipCode(zipcode)) {
        addError(form.querySelector('#zipcode'), 'Please enter a valid ZIP code');
        errors.push('Invalid ZIP code');
    }

    // Terms checkbox validation
    const terms = form.querySelector('#terms');
    if (!terms.checked) {
        addError(terms, 'Please accept the terms and conditions');
        errors.push('Terms not accepted');
    }

    return errors.length === 0;
}

function handlePaymentSubmission(form) {
    const submitButton = form.querySelector('.submit-payment-button');
    const originalText = submitButton.innerHTML;
    
    // Disable form and show loading state
    setFormLoading(form, true);
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing Payment...';
    
    // Simulate payment processing
    setTimeout(() => {
        showPaymentSuccess();
        form.reset();
        setFormLoading(form, false);
        submitButton.innerHTML = originalText;
    }, 2000);
}

function showPaymentSuccess() {
    // Create modal elements
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay';
    
    const modal = document.createElement('div');
    modal.className = 'payment-success-modal';
    modal.innerHTML = `
        <i class="fas fa-check-circle success-icon"></i>
        <h2>Payment Successful!</h2>
        <p>Your payment has been processed successfully.</p>
        <p>A confirmation email will be sent to your registered email address.</p>
        <button class="pay-button" onclick="closePaymentModal()">Continue</button>
    `;
    
    // Add to DOM
    document.body.appendChild(overlay);
    document.body.appendChild(modal);
    
    // Show modal
    setTimeout(() => {
        overlay.classList.add('active');
        modal.classList.add('active');
    }, 100);
}

function closePaymentModal() {
    const overlay = document.querySelector('.modal-overlay');
    const modal = document.querySelector('.payment-success-modal');
    
    if (overlay && modal) {
        overlay.classList.remove('active');
        modal.classList.remove('active');
        
        setTimeout(() => {
            overlay.remove();
            modal.remove();
        }, 300);
    }
}

function updatePaymentSummary() {
    const packageSelect = document.getElementById('package');
    const packagePriceElement = document.getElementById('packagePrice');
    const taxAmountElement = document.getElementById('taxAmount');
    const totalAmountElement = document.getElementById('totalAmount');
    
    if (!packageSelect || !packagePriceElement || !taxAmountElement || !totalAmountElement) return;
    
    const prices = {
        'basic': 299,
        'pro': 499,
        'enterprise': 999
    };
    
    const selectedPackage = packageSelect.value;
    const price = prices[selectedPackage] || 0;
    const tax = price * 0.1; // 10% tax
    const total = price + tax;
    
    packagePriceElement.textContent = `$${price.toFixed(2)}`;
    taxAmountElement.textContent = `$${tax.toFixed(2)}`;
    totalAmountElement.textContent = `$${total.toFixed(2)}`;
}

function updateCardIcon(cardNumber) {
    const iconElement = document.querySelector('.card-type-icon');
    if (!iconElement) return;
    
    // Remove existing card type classes
    iconElement.className = 'card-type-icon fas';
    
    // Determine card type based on first digits
    if (cardNumber.startsWith('4')) {
        iconElement.classList.add('fab', 'fa-cc-visa');
    } else if (cardNumber.startsWith('5')) {
        iconElement.classList.add('fab', 'fa-cc-mastercard');
    } else if (cardNumber.startsWith('3')) {
        iconElement.classList.add('fab', 'fa-cc-amex');
    } else if (cardNumber.startsWith('6')) {
        iconElement.classList.add('fab', 'fa-cc-discover');
    } else {
        iconElement.classList.add('fa-credit-card');
    }
}

// Validation Helper Functions
function isValidCardNumber(cardNumber) {
    return cardNumber.length >= 13 && cardNumber.length <= 19 && /^\d+$/.test(cardNumber);
}

function isValidExpiry(expiry) {
    if (!/^\d{2}\/\d{2}$/.test(expiry)) return false;
    
    const [month, year] = expiry.split('/').map(num => parseInt(num, 10));
    const today = new Date();
    const currentYear = parseInt(today.getFullYear().toString().slice(-2), 10);
    const currentMonth = today.getMonth() + 1;
    
    return month >= 1 && month <= 12 && 
           year >= currentYear && 
           (year > currentYear || month >= currentMonth);
}

function isValidCVV(cvv) {
    return /^\d{3,4}$/.test(cvv);
}

function isValidZipCode(zipcode) {
    return /^\d{5}(-\d{4})?$/.test(zipcode);
}

function setFormLoading(form, isLoading) {
    const elements = form.querySelectorAll('input, select, textarea, button');
    elements.forEach(element => {
        element.disabled = isLoading;
    });
}

function addError(element, message) {
    const formGroup = element.closest('.form-group') || element.parentElement;
    formGroup.classList.add('error');
    
    const errorMessage = document.createElement('div');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    
    formGroup.appendChild(errorMessage);
}

function clearMessages() {
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach(group => {
        group.classList.remove('error');
        const errorMessage = group.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    });
}

// Remove error messages on input
document.addEventListener('input', function(e) {
    if (e.target.closest('.form-group')) {
        const formGroup = e.target.closest('.form-group');
        formGroup.classList.remove('error');
        const errorMessage = formGroup.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
});
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-button');
    const navLinks = document.querySelector('.nav-links');
    const menuOverlay = document.querySelector('.menu-overlay');

    function toggleMenu() {
        mobileMenuBtn.classList.toggle('active');
        navLinks.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    }

    if (mobileMenuBtn && navLinks && menuOverlay) {
        mobileMenuBtn.addEventListener('click', toggleMenu);
        
        // Close menu when clicking overlay
        menuOverlay.addEventListener('click', toggleMenu);

        // Close menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    }
});
// Mobile Navigation
document.addEventListener('DOMContentLoaded', function() {
    // Get current page URL
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    
    // Set active class for both mobile and desktop navigation
    const allNavLinks = document.querySelectorAll('.nav-links a, .mobile-menu a');
    allNavLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });

    // Mobile menu functionality
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuOverlay = document.querySelector('.menu-overlay');

    function toggleMenu() {
        mobileMenu.classList.toggle('active');
        mobileMenuButton.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
    }

    // Toggle menu when button is clicked
    mobileMenuButton?.addEventListener('click', toggleMenu);

    // Close menu when overlay is clicked
    menuOverlay?.addEventListener('click', toggleMenu);

    // Close menu when a link is clicked
    const mobileMenuLinks = mobileMenu?.querySelectorAll('a');
    mobileMenuLinks?.forEach(link => {
        link.addEventListener('click', toggleMenu);
    });

    // Close menu when screen is resized to desktop size
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && mobileMenu?.classList.contains('active')) {
            toggleMenu();
        }
    });

    // Header scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header?.classList.add('scrolled');
        } else {
            header?.classList.remove('scrolled');
        }
    });
});
// Enhanced Map Functionality
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };

    // Initialize map observer
    const mapObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const map = entry.target;
                if (map.getAttribute('data-src')) {
                    map.src = map.getAttribute('data-src');
                    map.removeAttribute('data-src');
                    observer.unobserve(map);
                }
            }
        });
    }, observerOptions);

    // Observe maps for lazy loading
    const maps = document.querySelectorAll('#contact-map, #footer-map');
    maps.forEach(map => {
        if (map) {
            const src = map.src;
            map.removeAttribute('src');
            map.setAttribute('data-src', src);
            mapObserver.observe(map);
        }
    });

    // Map container hover effect
    const mapContainer = document.querySelector('.map-frame-container');
    if (mapContainer) {
        mapContainer.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.01)';
            this.style.transition = 'transform 0.3s ease';
        });

        mapContainer.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    }

    // Button click handlers
    const zoomButton = document.querySelector('.map-zoom-button');
    if (zoomButton) {
        zoomButton.addEventListener('click', function() {
            window.open('https://www.google.com/maps?q=M8RH+SH,+Kathmandu+44600', '_blank');
        });
    }

    // Smooth scroll for direction buttons
    const directionButtons = document.querySelectorAll('.directions-button');
    directionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.hasAttribute('target')) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href.startsWith('#')) {
                    const element = document.querySelector(href);
                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            }
        });
    });

    // Add loading animation
    const mapFrames = document.querySelectorAll('iframe');
    mapFrames.forEach(frame => {
        frame.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        frame.style.opacity = '0';
        frame.style.transition = 'opacity 0.5s ease';
    });

    // Handle map errors
    mapFrames.forEach(frame => {
        frame.addEventListener('error', function() {
            this.style.display = 'none';
            const errorMessage = document.createElement('div');
            errorMessage.className = 'map-error';
            errorMessage.innerHTML = `
                <i class="fas fa-exclamation-triangle"></i>
                <p>Map could not be loaded. Please try again later.</p>
            `;
            this.parentNode.appendChild(errorMessage);
        });
    });
});

// Additional helper functions
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Handle window resize
window.addEventListener('resize', function() {
    const maps = document.querySelectorAll('#contact-map, #footer-map');
    maps.forEach(map => {
        if (map && isInViewport(map)) {
            map.style.opacity = '1';
        }
    });
});
function openFullMap() {
    window.open('https://maps.app.goo.gl/7YBEzH2ifte2T4P46', '_blank');
}
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.info-slider');
    
    if (slider) {
        slider.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        slider.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
});
// Remove error messages on input
document.addEventListener('input', function(e) {
    if (e.target.closest('.form-group')) {
        const formGroup = e.target.closest('.form-group');
        formGroup.classList.remove('error');
        const errorMessage = formGroup.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
});

// Version checking functionality
let lastCheckedVersion = localStorage.getItem('lastCheckedVersion');
const currentDate = new Date().toDateString();

// Check version if not checked today
if (lastCheckedVersion !== currentDate) {
    checkVersion();
    localStorage.setItem('lastCheckedVersion', currentDate);
}

async function checkVersion() {
    try {
        const response = await fetch('/api/version');
        const data = await response.json();
        const currentVersion = localStorage.getItem('appVersion');
        
        if (currentVersion !== data.version) {
            localStorage.setItem('appVersion', data.version);
            showUpdateNotification();
        }
    } catch (error) {
        console.error('Version check failed:', error);
    }
}

function showUpdateNotification() {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: var(--primary);
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    `;
    
    notification.innerHTML = `
        <p style="margin: 0;">A new version is available!</p>
        <button onclick="location.reload()" 
                style="background: white; color: var(--primary); border: none; 
                       padding: 5px 15px; border-radius: 4px; cursor: pointer;">
            Refresh to Update
        </button>
    `;
    
    document.body.appendChild(notification);
    
    // Remove notification after 10 seconds
    setTimeout(() => notification.remove(), 10000);
}
document.addEventListener('DOMContentLoaded', function() {
    // Get all forms with Formspree
    const forms = document.querySelectorAll('form[action^="https://formspree.io"]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = form.querySelector('.submit-button');
            const btnText = submitBtn.querySelector('.button-text');
            const btnLoader = submitBtn.querySelector('.button-loader');
            
            btnText.style.display = 'none';
            btnLoader.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            // Clear previous alerts
            form.querySelector('#successAlert').style.display = 'none';
            form.querySelector('#errorAlert').style.display = 'none';

            // Send form to Formspree
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    // Show success message
                    form.querySelector('#successAlert').style.display = 'block';
                    form.reset();
                    
                    // Check if this is the training registration form
                    if (form.classList.contains('registration-form')) {
                        // Redirect to payment page after showing success message
                        setTimeout(() => {
                            window.location.href = '/payment';
                        }, 1500);
                    }
                    
                    // Close modal if it exists
                    const modal = form.closest('.modal');
                    if (modal) {
                        setTimeout(() => {
                            modal.style.display = 'none';
                        }, 1500);
                    }
                } else {
                    // Show error message
                    form.querySelector('#errorAlert').style.display = 'block';
                }
            })
            .catch(error => {
                // Show error message
                form.querySelector('#errorAlert').style.display = 'block';
            })
            .finally(() => {
                // Reset button state
                btnText.style.display = 'inline-block';
                btnLoader.style.display = 'none';
                submitBtn.disabled = false;
            });
        });
    });

    // Modal handling for training registration
    const registerBtns = document.querySelectorAll('[href="#register"]');
    const modal = document.getElementById('registrationModal');
    const closeBtns = document.querySelectorAll('.close');

    if (modal) {
        registerBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'block';
            });
        });

        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    // Get all forms with Formspree
    const forms = document.querySelectorAll('form[action^="https://formspree.io"]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Show loading state
            const submitBtn = form.querySelector('.submit-button');
            const btnText = submitBtn.querySelector('.button-text');
            const btnLoader = submitBtn.querySelector('.button-loader');
            
            btnText.style.display = 'none';
            btnLoader.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            // Clear previous alerts
            const successAlert = form.querySelector('#successAlert');
            const errorAlert = form.querySelector('#errorAlert');
            if (successAlert) successAlert.style.display = 'none';
            if (errorAlert) errorAlert.style.display = 'none';

            // Send form to Formspree
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    // Show success message
                    if (successAlert) successAlert.style.display = 'block';
                    form.reset();
                    
                    // If this is the training registration form, redirect to payment
                    if (form.classList.contains('registration-form')) {
                        setTimeout(() => {
                            window.location.href = '/payment';
                        }, 1500);
                    }
                    
                    // Close modal if it exists
                    const modal = form.closest('.modal');
                    if (modal) {
                        setTimeout(() => {
                            modal.style.display = 'none';
                        }, 1500);
                    }
                } else {
                    // Show error message
                    if (errorAlert) errorAlert.style.display = 'block';
                }
            })
            .catch(error => {
                // Show error message
                if (errorAlert) errorAlert.style.display = 'block';
            })
            .finally(() => {
                // Reset button state
                btnText.style.display = 'inline-block';
                btnLoader.style.display = 'none';
                submitBtn.disabled = false;
            });
        });
    });

    // Modal handling for training registration
    const registerBtns = document.querySelectorAll('[href="#register"]');
    const modal = document.getElementById('registrationModal');
    const closeBtns = document.querySelectorAll('.close');

    if (modal) {
        registerBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'block';
            });
        });

        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuOverlay = document.querySelector('.menu-overlay');

    function toggleMenu() {
        mobileMenuBtn.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', toggleMenu);
    }

    if (menuOverlay) {
        menuOverlay.addEventListener('click', toggleMenu);
    }

    // Close menu when clicking a link
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', toggleMenu);
    });
});
// Intersection Observer for animations
const aboutObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.2 });

// Elements to observe
document.querySelectorAll('.about-card, .about-director-image, .about-director-content, .about-stat, .about-timeline-item')
    .forEach(el => {
        el.classList.add('about-fade-up');
        aboutObserver.observe(el);
    });

document.querySelectorAll('.about-section-title')
    .forEach(el => {
        el.classList.add('about-fade-in');
        aboutObserver.observe(el);
    });

// Scroll down button functionality
document.querySelector('.about-scroll-down')?.addEventListener('click', () => {
    const firstSection = document.querySelector('.about-mission');
    firstSection?.scrollIntoView({ behavior: 'smooth' });
});

// Stats counter animation
function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        element.textContent = value.toLocaleString();
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

// Animate stats when they come into view
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = parseInt(entry.target.dataset.value);
            animateValue(entry.target, 0, target, 2000);
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.about-stat-number').forEach(stat => {
    statsObserver.observe(stat);
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.about-hero-content');
    
    if (scrolled < window.innerHeight && heroContent) {
        const translateY = scrolled * 0.4;
        const opacity = 1 - (scrolled / window.innerHeight);
        heroContent.style.transform = `translateY(${translateY}px)`;
        heroContent.style.opacity = opacity;
    }
});

// Add sequential animation delays
document.querySelectorAll('.about-card').forEach((card, index) => {
    card.style.transitionDelay = `${index * 0.2}s`;
});

document.querySelectorAll('.about-timeline-item').forEach((item, index) => {
    item.style.transitionDelay = `${index * 0.2}s`;
});

// Director image hover effect
const directorImage = document.querySelector('.about-director-image img');
if (directorImage) {
    directorImage.addEventListener('mousemove', (e) => {
        const { left, top, width, height } = directorImage.getBoundingClientRect();
        const x = (e.clientX - left) / width - 0.5;
        const y = (e.clientY - top) / height - 0.5;
        
        directorImage.style.transform = 
            `perspective(1000px) rotateY(${x * 10}deg) rotateX(${-y * 10}deg) scale(1.05)`;
    });

    directorImage.addEventListener('mouseleave', () => {
        directorImage.style.transform = 
            'perspective(1000px) rotateY(0) rotateX(0) scale(1)';
    });
}

// Initialize animations on page load
window.addEventListener('load', () => {
    // Add initial animations class
    document.querySelector('.about-page').classList.add('loaded');

    // Trigger animations with delay
    setTimeout(() => {
        document.querySelectorAll('.about-card').forEach(card => {
            card.classList.add('visible');
        });
    }, 500);
});

// Smooth scroll for all internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
// Fix mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuOverlay = document.querySelector('.menu-overlay');
    const body = document.body;

    function toggleMenu() {
        mobileMenu.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        mobileMenuBtn.classList.toggle('active');
        body.classList.toggle('menu-open');
    }

    if (mobileMenuBtn && mobileMenu && menuOverlay) {
        mobileMenuBtn.addEventListener('click', toggleMenu);
        menuOverlay.addEventListener('click', toggleMenu);
        
        // Close menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.2 });

    // Observe leadership featured and team cards
    const elements = document.querySelectorAll('.leadership-featured, .team-card');
    elements.forEach(el => {
        el.classList.add('fade-up');
        observer.observe(el);
    });

    // Add sequential animation delays to team cards
    document.querySelectorAll('.team-card').forEach((card, index) => {
        card.style.transitionDelay = `${index * 0.2}s`;
    });

    // 3D hover effect for featured image
    const featuredImage = document.querySelector('.leadership-featured-img');
    if (featuredImage) {
        featuredImage.addEventListener('mousemove', (e) => {
            const { left, top, width, height } = featuredImage.getBoundingClientRect();
            const x = (e.clientX - left) / width - 0.5;
            const y = (e.clientY - top) / height - 0.5;
            
            featuredImage.style.transform = 
                `perspective(1000px) rotateY(${x * 10}deg) rotateX(${-y * 10}deg)`;
        });

        featuredImage.addEventListener('mouseleave', () => {
            featuredImage.style.transform = 
                'perspective(1000px) rotateY(0) rotateX(0)';
        });
    }

    // Smooth social icons hover
    document.querySelectorAll('.leadership-social a, .team-social a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });

        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.2 });

    // Add animation classes and observe career cards
    document.querySelectorAll('.career-card').forEach((card, index) => {
        card.classList.add('career-fade-up');
        card.style.transitionDelay = `${index * 0.2}s`;
        observer.observe(card);
    });

    // Application button click handlers
    document.querySelectorAll('.apply-btn, .submit-resume-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get job title if it's a specific position
            const jobTitle = this.closest('.career-card')?.querySelector('h3')?.textContent || 'General Application';
            
            // Show application form (you can replace this with your actual form implementation)
            showApplicationForm(jobTitle);
        });
    });
});

// Function to show application form (placeholder - implement according to your needs)
function showApplicationForm(jobTitle) {
    // This is where you'd implement your application form logic
    // For example, showing a modal with a form, redirecting to an application page, etc.
    console.log(`Opening application form for: ${jobTitle}`);
    alert(`Application process started for: ${jobTitle}`);
}
document.querySelector('.explore-careers-btn').addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('#careers').scrollIntoView({
        behavior: 'smooth'
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.consultation-form');
    const submitButton = form.querySelector('.submit-button');
    const buttonText = submitButton.querySelector('.button-text');
    const buttonLoader = submitButton.querySelector('.button-loader');
  
    // Animate stats on scroll
    const stats = document.querySelectorAll('.stat-card h3');
    const observerOptions = {
      threshold: 0.5,
      rootMargin: '0px'
    };
  
    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          statsObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);
  
    stats.forEach(stat => statsObserver.observe(stat));
  
    // Form validation
    function validateForm() {
      let isValid = true;
      const inputs = form.querySelectorAll('input, textarea, select');
      
      inputs.forEach(input => {
        const errorDiv = document.getElementById(`${input.id}Error`);
        if (!input.value.trim()) {
          isValid = false;
          errorDiv.textContent = 'This field is required';
          errorDiv.style.display = 'block';
        } else {
          errorDiv.style.display = 'none';
        }
      });
  
      return isValid;
    }
  
    // Form submission handler
    form.addEventListener('submit', async function(e) {
      e.preventDefault();
  
      if (!validateForm()) return;
  
      submitButton.disabled = true;
      buttonText.style.opacity = '0';
      buttonLoader.style.display = 'inline-block';
  
      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: {
            'Accept': 'application/json'
          }
        });
  
        if (response.ok) {
          document.getElementById('successAlert').style.display = 'block';
          form.reset();
        } else {
          throw new Error('Network response was not ok');
        }
      } catch (error) {
        document.getElementById('errorAlert').style.display = 'block';
      } finally {
        submitButton.disabled = false;
        buttonText.style.opacity = '1';
        buttonLoader.style.display = 'none';
      }
    });
  
    // Clear error messages on input
    form.querySelectorAll('input, textarea, select').forEach(input => {
      input.addEventListener('input', function() {
        const errorDiv = document.getElementById(`${this.id}Error`);
        if (errorDiv) {
          errorDiv.style.display = 'none';
        }
      });
    });
  
    // Smooth scroll for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.consultation-form');
    const submitButton = form.querySelector('.submit-button');
    const buttonText = submitButton.querySelector('.button-text');
    const buttonLoader = submitButton.querySelector('.button-loader');
  
    // Animate stats on scroll
    const stats = document.querySelectorAll('.stat-card h3');
    const observerOptions = {
      threshold: 0.5,
      rootMargin: '0px'
    };
  
    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          statsObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);
  
    stats.forEach(stat => statsObserver.observe(stat));
  
    // Form validation
    function validateForm() {
      let isValid = true;
      const inputs = form.querySelectorAll('input, textarea, select');
      
      inputs.forEach(input => {
        const errorDiv = document.getElementById(`${input.id}Error`);
        if (!input.value.trim()) {
          isValid = false;
          errorDiv.textContent = 'This field is required';
          errorDiv.style.display = 'block';
        } else {
          errorDiv.style.display = 'none';
        }
      });
  
      return isValid;
    }
  
    // Form submission handler
    form.addEventListener('submit', async function(e) {
      e.preventDefault();
  
      if (!validateForm()) return;
  
      submitButton.disabled = true;
      buttonText.style.opacity = '0';
      buttonLoader.style.display = 'inline-block';
  
      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: {
            'Accept': 'application/json'
          }
        });
  
        if (response.ok) {
          document.getElementById('successAlert').style.display = 'block';
          form.reset();
        } else {
          throw new Error('Network response was not ok');
        }
      } catch (error) {
        document.getElementById('errorAlert').style.display = 'block';
      } finally {
        submitButton.disabled = false;
        buttonText.style.opacity = '1';
        buttonLoader.style.display = 'none';
      }
    });
  
    // Clear error messages on input
    form.querySelectorAll('input, textarea, select').forEach(input => {
      input.addEventListener('input', function() {
        const errorDiv = document.getElementById(`${this.id}Error`);
        if (errorDiv) {
          errorDiv.style.display = 'none';
        }
      });
    });
  
    // Smooth scroll for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  });
  import { initAnimations } from './animations.js';
import { initStats } from './stats.js';
import { FormHandler } from './form.js';

document.addEventListener('DOMContentLoaded', () => {
  // Initialize all premium features
  initAnimations();
  initStats();
  
  // Initialize form handling
  const consultationForm = document.querySelector('.consultation-form');
  if (consultationForm) {
    new FormHandler(consultationForm);
  }

  // Initialize smooth scrolling
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      e.preventDefault();
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
});
