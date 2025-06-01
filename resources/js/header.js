document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const menuToggle = document.getElementById('menuToggle');
    const mainMenu = document.getElementById('mainMenu');
    const siteHeader = document.querySelector('.site-header');
    
    // Toggle menu when the menu button is clicked
    menuToggle.addEventListener('click', function() {
        // Toggle active class on menu button and main menu
        this.classList.toggle('active');
        mainMenu.classList.toggle('active');
        
        // If menu is open, push content down
        if (mainMenu.classList.contains('active')) {
            // Get the menu height
            const menuHeight = mainMenu.offsetHeight;
            
            // Add padding to main content
            document.querySelector('main').style.paddingTop = menuHeight + 'px';
            
            // Add body class for potential style changes
            document.body.classList.add('menu-open');
        } else {
            // Reset padding when menu closes
            document.querySelector('main').style.paddingTop = '0';
            
            // Remove body class
            document.body.classList.remove('menu-open');
        }
    });
    
    // Close menu when clicking outside of it
    document.addEventListener('click', function(event) {
        const isMenuToggle = event.target.closest('#menuToggle');
        const isMainMenu = event.target.closest('#mainMenu');
        
        // If click is outside menu and toggle, and menu is open, close it
        if (!isMenuToggle && !isMainMenu && mainMenu.classList.contains('active')) {
            menuToggle.classList.remove('active');
            mainMenu.classList.remove('active');
            document.querySelector('main').style.paddingTop = '0';
            document.body.classList.remove('menu-open');
        }
        
        // Also close language selector if click is outside
        const langSelector = document.querySelector('.lang-selector');
        if (langSelector && !langSelector.contains(event.target)) {
            langSelector.classList.remove('open');
        }
    });
    
    // Handle window resize events
    window.addEventListener('resize', function() {
        // If menu is open and window is resized, adjust the content padding
        if (mainMenu.classList.contains('active')) {
            const menuHeight = mainMenu.offsetHeight;
            document.querySelector('main').style.paddingTop = menuHeight + 'px';
        }
    });
    
    // Hide menu on scroll down, show on scroll up
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        // If menu is open, don't change header visibility
        if (mainMenu.classList.contains('active')) {
            return;
        }
        
        const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Determine scroll direction
        if (currentScrollTop > lastScrollTop && currentScrollTop > siteHeader.offsetHeight) {
            // Scrolling down & past header height - hide header
            siteHeader.classList.add('header-hidden');
        } else {
            // Scrolling up or at top - show header
            siteHeader.classList.remove('header-hidden');
        }
        
        lastScrollTop = currentScrollTop;
    });
    
    // Language selector toggle on click (alternative to hover)
    const langSelector = document.querySelector('.lang-selector');
    const mainLangBtn = langSelector ? langSelector.querySelector('.lang-btn') : null;
    
    if (langSelector && mainLangBtn) {
        mainLangBtn.addEventListener('click', function(e) {
            // Allow default link behavior but also toggle the dropdown
            langSelector.classList.toggle('open');
            // Don't prevent default, so the link will still work
        });
    }
    
    // Add CSS for header hiding (not in CSS file to keep it grouped with relevant JS)
    const style = document.createElement('style');
    style.innerHTML = `
        .site-header {
            transition: transform 0.3s ease;
        }
        .header-hidden {
            transform: translateY(-100%);
        }
    `;
    document.head.appendChild(style);
}); 