// Popup modal functionality for Cheerio Studio website

document.addEventListener('DOMContentLoaded', function() {
    initializePopupModal();
    initializeMaintenanceModal();
});

// Initialize popup modal functionality
function initializePopupModal() {
    const modal = document.getElementById('popup-modal');
    const closeButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
    const showButtons = document.querySelectorAll('[data-modal-show="popup-modal"]');
    
    if (!modal) return;
    
    // Show modal functions
    showButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            showModal();
        });
    });
    
    // Hide modal functions
    closeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            hideModal();
        });
    });
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            hideModal();
        }
    });
    
    function showModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Add animation
        setTimeout(() => {
            modal.querySelector('.relative').classList.add('animate-modal-in');
        }, 10);
        
        // Track modal view
        if (window.CheerioStudio && window.CheerioStudio.trackEvent) {
            window.CheerioStudio.trackEvent('modal_view', { modal_name: 'maintenance_popup' });
        }
    }
    
    function hideModal() {
        const modalContent = modal.querySelector('.relative');
        modalContent.classList.add('animate-modal-out');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
            modalContent.classList.remove('animate-modal-in', 'animate-modal-out');
        }, 300);
        
        // Track modal close
        if (window.CheerioStudio && window.CheerioStudio.trackEvent) {
            window.CheerioStudio.trackEvent('modal_close', { modal_name: 'maintenance_popup' });
        }
    }
}

// Initialize maintenance notification modal
function initializeMaintenanceModal() {
    // Check if user has already seen the maintenance modal
    const hasSeenMaintenance = localStorage.getItem('cheerio_maintenance_seen');
    const maintenanceDate = localStorage.getItem('cheerio_maintenance_date');
    const today = new Date().toDateString();
    
    // Show maintenance modal if not seen today
    if (!hasSeenMaintenance || maintenanceDate !== today) {
        setTimeout(() => {
            showMaintenanceModal();
        }, 2000); // Show after 2 seconds
    }
}

function showMaintenanceModal() {
    const modal = document.getElementById('popup-modal');
    if (!modal) return;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
    
    // Add animation
    setTimeout(() => {
        modal.querySelector('.relative').classList.add('animate-modal-in');
    }, 10);
    
    // Mark as seen for today
    const today = new Date().toDateString();
    localStorage.setItem('cheerio_maintenance_seen', 'true');
    localStorage.setItem('cheerio_maintenance_date', today);
    
    // Track maintenance modal view
    if (window.CheerioStudio && window.CheerioStudio.trackEvent) {
        window.CheerioStudio.trackEvent('maintenance_modal_view');
    }
}

// Generic modal system for future use
class ModalManager {
    constructor() {
        this.activeModals = new Set();
        this.init();
    }
    
    init() {
        // Initialize all modals with data attributes
        document.addEventListener('click', (e) => {
            const showTrigger = e.target.closest('[data-modal-show]');
            const hideTrigger = e.target.closest('[data-modal-hide]');
            
            if (showTrigger) {
                e.preventDefault();
                const modalId = showTrigger.getAttribute('data-modal-show');
                this.show(modalId);
            }
            
            if (hideTrigger) {
                e.preventDefault();
                const modalId = hideTrigger.getAttribute('data-modal-hide');
                this.hide(modalId);
            }
        });
        
        // Close modals with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.activeModals.size > 0) {
                const lastModal = Array.from(this.activeModals).pop();
                this.hide(lastModal);
            }
        });
    }
    
    show(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) {
            console.warn(`Modal with ID "${modalId}" not found`);
            return;
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        this.activeModals.add(modalId);
        
        // Prevent body scroll when modal is open
        if (this.activeModals.size === 1) {
            document.body.style.overflow = 'hidden';
        }
        
        // Add click outside to close
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                this.hide(modalId);
            }
        });
        
        // Animation
        setTimeout(() => {
            const content = modal.querySelector('.relative, .modal-content');
            if (content) {
                content.classList.add('animate-modal-in');
            }
        }, 10);
        
        // Dispatch custom event
        modal.dispatchEvent(new CustomEvent('modal:show', { detail: { modalId } }));
    }
    
    hide(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        
        const content = modal.querySelector('.relative, .modal-content');
        if (content) {
            content.classList.add('animate-modal-out');
        }
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            this.activeModals.delete(modalId);
            
            // Restore body scroll when no modals are open
            if (this.activeModals.size === 0) {
                document.body.style.overflow = '';
            }
            
            if (content) {
                content.classList.remove('animate-modal-in', 'animate-modal-out');
            }
        }, 300);
        
        // Dispatch custom event
        modal.dispatchEvent(new CustomEvent('modal:hide', { detail: { modalId } }));
    }
    
    hideAll() {
        this.activeModals.forEach(modalId => this.hide(modalId));
    }
    
    isOpen(modalId) {
        return this.activeModals.has(modalId);
    }
}

// Initialize modal manager
const modalManager = new ModalManager();

// Add CSS animations for modals
const style = document.createElement('style');
style.textContent = `
    @keyframes modalIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(-10px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    @keyframes modalOut {
        from {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        to {
            opacity: 0;
            transform: scale(0.95) translateY(-10px);
        }
    }
    
    .animate-modal-in {
        animation: modalIn 0.3s ease-out forwards;
    }
    
    .animate-modal-out {
        animation: modalOut 0.3s ease-in forwards;
    }
    
    /* Custom scrollbar for modal content */
    .modal-content::-webkit-scrollbar {
        width: 6px;
    }
    
    .modal-content::-webkit-scrollbar-track {
        background: transparent;
    }
    
    .modal-content::-webkit-scrollbar-thumb {
        background: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }
    
    .modal-content::-webkit-scrollbar-thumb:hover {
        background: rgba(156, 163, 175, 0.7);
    }
`;
document.head.appendChild(style);

// Export modal manager for global use
window.ModalManager = modalManager;

// Utility functions for common modal operations
window.showModal = (modalId) => modalManager.show(modalId);
window.hideModal = (modalId) => modalManager.hide(modalId);
window.toggleModal = (modalId) => {
    if (modalManager.isOpen(modalId)) {
        modalManager.hide(modalId);
    } else {
        modalManager.show(modalId);
    }
};
