// Main JavaScript functionality for Cheerio Studio website

document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme handling
    initializeTheme();
    
    // Initialize smooth scrolling
    initializeSmoothScrolling();
    
    // Initialize navbar behavior
    initializeNavbar();
    
    // Initialize service card interactions
    initializeServiceCards();
    
    // Initialize trust indicators counter animation
    initializeTrustCounters();
    
    // Initialize scroll animations
    initializeScrollAnimations();
    
    console.log('Cheerio Studio website loaded successfully!');
});

// Theme handling (dark/light mode)
function initializeTheme() {
    // Check for saved theme preference or default to 'light'
    const savedTheme = localStorage.getItem('theme') || 'light';
    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    const theme = savedTheme === 'system' ? systemTheme : savedTheme;
    
    // Apply the theme
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem('theme') === 'system') {
            if (e.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    });
}

// Toggle theme function (can be called from UI elements)
function toggleTheme() {
    const isDark = document.documentElement.classList.contains('dark');
    if (isDark) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
}

// Smooth scrolling for anchor links
function initializeSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Skip if it's just '#' or empty
            if (href === '#' || href === '') return;
            
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                const headerOffset = 80; // Account for fixed header
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Navbar scroll behavior
function initializeNavbar() {
    const navbar = document.querySelector('nav');
    let lastScrollTop = 0;
    
    if (!navbar) return;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add background when scrolled
        if (scrollTop > 50) {
            navbar.classList.add('backdrop-blur-md', 'bg-white/80', 'dark:bg-gray-900/80');
        } else {
            navbar.classList.remove('backdrop-blur-md', 'bg-white/80', 'dark:bg-gray-900/80');
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
}

// Service card interactions
function initializeServiceCards() {
    const serviceCards = document.querySelectorAll('[id^="branding-design"], [id^="web-design"], [id^="social-media"]');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('transform', 'scale-105', 'transition-transform', 'duration-300');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('transform', 'scale-105');
        });
    });
}

// Utility function to animate elements on scroll
function animateOnScroll() {
    const observers = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe elements that should animate
    const elementsToAnimate = document.querySelectorAll('section > div, .service-card, h2, h3');
    elementsToAnimate.forEach(el => {
        observers.observe(el);
    });
}

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', animateOnScroll);

// Form handling utility
function handleContactForm() {
    const contactForms = document.querySelectorAll('form');
    
    contactForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Add your form submission logic here
            console.log('Form submitted:', data);
            
            // Show success message
            showNotification('Thank you for your message! We\'ll get back to you soon.', 'success');
        });
    });
}

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white z-50 transition-all duration-300 ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 
        'bg-blue-500'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.add('translate-x-0');
    }, 100);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}

// Toast Notification System
function createToast(message, type = 'info', duration = 5000) {
    // Create toast container if it doesn't exist
    let container = document.querySelector('.toast-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'toast-container';
        document.body.appendChild(container);
    }
    
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="toast-icon mr-3">
                    ${getToastIcon(type)}
                </div>
                <div class="toast-message text-sm font-medium">
                    ${message}
                </div>
            </div>
            <button class="toast-close ml-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" onclick="this.parentElement.parentElement.remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `;
    
    // Add toast to container
    container.appendChild(toast);
    
    // Auto-remove after duration
    if (duration > 0) {
        setTimeout(() => {
            if (toast.parentElement) {
                toast.style.animation = 'slideOutRight 0.3s ease-in forwards';
                setTimeout(() => toast.remove(), 300);
            }
        }, duration);
    }
    
    return toast;
}

function getToastIcon(type) {
    const icons = {
        success: '<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
        error: '<svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
        warning: '<svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
        info: '<svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
    };
    return icons[type] || icons.info;
}

// Global toast functions
window.showToast = createToast;
window.showSuccess = (message, duration) => createToast(message, 'success', duration);
window.showError = (message, duration) => createToast(message, 'error', duration);
window.showWarning = (message, duration) => createToast(message, 'warning', duration);
window.showInfo = (message, duration) => createToast(message, 'info', duration);

// Analytics and tracking (placeholder)
function trackEvent(eventName, eventData = {}) {
    // Add your analytics tracking code here
    console.log('Track event:', eventName, eventData);
    
    // Example for Google Analytics 4
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventData);
    }
}

// Performance monitoring
function monitorPerformance() {
    // Monitor Core Web Vitals
    if ('PerformanceObserver' in window) {
        const observer = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                if (entry.entryType === 'largest-contentful-paint') {
                    console.log('LCP:', entry.startTime);
                }
                if (entry.entryType === 'first-input') {
                    console.log('FID:', entry.processingStart - entry.startTime);
                }
                if (entry.entryType === 'layout-shift') {
                    if (!entry.hadRecentInput) {
                        console.log('CLS:', entry.value);
                    }
                }
            }
        });
        
        observer.observe({entryTypes: ['largest-contentful-paint', 'first-input', 'layout-shift']});
    }
}

// Initialize performance monitoring
document.addEventListener('DOMContentLoaded', monitorPerformance);

// Export functions for global use
window.CheerioStudio = {
    toggleTheme,
    showNotification,
    trackEvent
};

// Trust indicators counter animation
function initializeTrustCounters() {
    const counters = [
        { id: 'projects-count', target: 150, suffix: '+' },
        { id: 'clients-count', target: 75, suffix: '+' },
        { id: 'years-count', target: 5, suffix: '+' }
    ];

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = counters.find(c => c.id === entry.target.id);
                if (counter && !entry.target.dataset.animated) {
                    animateCounter(entry.target, counter.target, counter.suffix);
                    entry.target.dataset.animated = 'true';
                }
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        const element = document.getElementById(counter.id);
        if (element) {
            observer.observe(element);
        }
    });
}

function animateCounter(element, target, suffix = '') {
    let current = 0;
    const increment = target / 60; // 60 frames for smooth animation
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + suffix;
    }, 50); // Update every 50ms
}

// Enhanced scroll animations with intersection observer
function initializeScrollAnimations() {
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Add visible class for CSS animations
                element.classList.add('animate-visible');
                
                // Trigger any specific animations based on element classes
                if (element.classList.contains('trust-card')) {
                    element.style.transform = 'translateY(0)';
                    element.style.opacity = '1';
                }
                
                // Unobserve after animation triggers
                animationObserver.unobserve(element);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -10% 0px'
    });

    // Observe all animated elements
    const animatedElements = document.querySelectorAll(
        '.animate-fade-in-up, .animate-fade-in-left, .animate-fade-in-right, .animate-scale-in, .trust-card'
    );
    
    animatedElements.forEach(element => {
        animationObserver.observe(element);
    });
}
