// Mobile Navbar Functionality
document.addEventListener('DOMContentLoaded', () => {
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileDotsBtn = document.getElementById('mobile-dots-btn');
  const mobileDropdown = document.getElementById('mobile-dropdown');
  const sidebar = document.querySelector('.sidebar');
  const mobileLogoutItem = document.getElementById('mobile-logout-item');
  const mobileProfileItem = document.getElementById('mobile-profile-item');

  // Function to adjust main content areas based on sidebar state
  function adjustMainContent(sidebarCollapsed) {
    // Only adjust on desktop/tablet (above 768px)
    if (window.innerWidth <= 768) {
      // On mobile, remove inline styles to let CSS media queries handle it
      const navbar = document.querySelector('.navbar');
      if (navbar) {
        navbar.style.left = '';
        navbar.style.width = '';
      }
      
      const mainContentSelectors = [
        '.activation-page',
        '.dashboard',
        '.container',
        'main.container',
        '.user-tree',
        '.partner-program',
        '.refer-earn'
      ];
      
      mainContentSelectors.forEach(selector => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(element => {
          element.style.marginLeft = '';
          element.style.transition = '';
        });
      });
      return;
    }
    
    // Desktop/Tablet adjustments
    const navbar = document.querySelector('.navbar');
    if (navbar) {
      if (sidebarCollapsed) {
        navbar.style.left = '0';
        navbar.style.width = '100%';
      } else {
        navbar.style.left = '280px';
        navbar.style.width = 'calc(100% - 280px)';
      }
    }
    
    // Adjust main content areas
    const mainContentSelectors = [
      '.activation-page',
      '.dashboard',
      '.container',
      'main.container',
      '.user-tree',
      '.partner-program',
      '.refer-earn'
    ];
    
    mainContentSelectors.forEach(selector => {
      const elements = document.querySelectorAll(selector);
      elements.forEach(element => {
        if (sidebarCollapsed) {
          element.style.marginLeft = '0';
          element.style.transition = 'margin-left 0.3s ease-in-out';
        } else {
          element.style.marginLeft = '280px';
          element.style.transition = 'margin-left 0.3s ease-in-out';
        }
      });
    });
  }

  // Handle hamburger menu click - toggle sidebar
  if (mobileMenuBtn && sidebar) {
    mobileMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      
      // Toggle sidebar for all screen sizes
      if (window.innerWidth <= 768) {
        // Mobile: use sidebar--open
        sidebar.classList.toggle('sidebar--open');
      } else {
        // Desktop/Tablet: use sidebar--collapsed
        sidebar.classList.toggle('sidebar--collapsed');
        
        // Adjust navbar and main content based on sidebar state
        const isCollapsed = sidebar.classList.contains('sidebar--collapsed');
        adjustMainContent(isCollapsed);
      }
      
      // Update hamburger visibility after toggle
      setTimeout(updateHamburgerVisibility, 50);
      
      // Close dropdown if open
      if (mobileDropdown) {
        mobileDropdown.classList.remove('navbar__mobile-dropdown--open');
      }
    });
  }
  
  // Handle bottom arrow button (sidebar toggle) - override page-specific handlers
  // Use setTimeout to ensure this runs after page-specific scripts
  setTimeout(() => {
    const sidebarToggle = document.querySelector('.sidebar__toggle');
    if (sidebarToggle && sidebar) {
      // Remove all existing event listeners by cloning and replacing the button
      const newToggle = sidebarToggle.cloneNode(true);
      if (sidebarToggle.parentNode) {
        sidebarToggle.parentNode.replaceChild(newToggle, sidebarToggle);
      }
      
      // Add our unified handler that works for both mobile and desktop
      // Use capture phase to ensure it runs first, then stop propagation
      newToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        e.preventDefault();
        
        if (window.innerWidth <= 768) {
          // Mobile: close sidebar by removing sidebar--open
          sidebar.classList.remove('sidebar--open');
          // Also ensure sidebar--collapsed is not set on mobile
          sidebar.classList.remove('sidebar--collapsed');
        } else {
          // Desktop/Tablet: toggle sidebar--collapsed
          const isCollapsed = sidebar.classList.toggle('sidebar--collapsed');
          adjustMainContent(isCollapsed);
          
          // Rotate icon when sidebar is collapsed/expanded (for desktop)
          const toggleIcon = newToggle.querySelector('svg');
          if (toggleIcon) {
            if (isCollapsed) {
              toggleIcon.style.transform = 'rotate(180deg)';
            } else {
              toggleIcon.style.transform = 'rotate(0deg)';
            }
          }
        }
        
        // Update hamburger visibility after toggle
        setTimeout(updateHamburgerVisibility, 50);
      }, true); // Use capture phase
    }
  }, 200); // Increased timeout to ensure it runs after all page scripts
  
  // Update hamburger visibility based on sidebar state
  function updateHamburgerVisibility() {
    if (mobileMenuBtn && sidebar) {
      let isOpen = false;
      
      if (window.innerWidth <= 768) {
        // Mobile: check sidebar--open - hide hamburger when sidebar is open
        isOpen = sidebar.classList.contains('sidebar--open');
      } else {
        // Desktop/Tablet: check sidebar--collapsed - hide hamburger when sidebar is open
        isOpen = !sidebar.classList.contains('sidebar--collapsed');
      }
      
      if (isOpen) {
        mobileMenuBtn.classList.add('hidden');
      } else {
        mobileMenuBtn.classList.remove('hidden');
      }
    }
  }
  
  // Watch for sidebar state changes and fix mobile behavior
  if (sidebar && mobileMenuBtn) {
    const observer = new MutationObserver((mutations) => {
      // On mobile, if sidebar--collapsed is added, remove it and use sidebar--open instead
      if (window.innerWidth <= 768) {
        if (sidebar.classList.contains('sidebar--collapsed')) {
          sidebar.classList.remove('sidebar--collapsed');
          // If sidebar was just collapsed, it means it should be closed, so don't add sidebar--open
        }
      }
      
      updateHamburgerVisibility();
      // Also adjust main content on desktop when sidebar state changes
      if (window.innerWidth > 768) {
        const isCollapsed = sidebar.classList.contains('sidebar--collapsed');
        adjustMainContent(isCollapsed);
      }
    });
    observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
    
    // Also check on window resize
    window.addEventListener('resize', () => {
      updateHamburgerVisibility();
      // Always call adjustMainContent on resize - it will handle mobile vs desktop internally
      if (window.innerWidth > 768) {
        const isCollapsed = sidebar.classList.contains('sidebar--collapsed');
        adjustMainContent(isCollapsed);
      } else {
        // On mobile, clear all inline styles
        adjustMainContent(false);
      }
    });
    
    // Initial check and setup
    updateHamburgerVisibility();
    
    // On page load, ensure proper state for mobile
    if (window.innerWidth <= 768) {
      // On mobile, ensure no inline styles are set and sidebar is hidden
      adjustMainContent(false);
      // Ensure sidebar is closed by default on mobile
      if (sidebar && !sidebar.classList.contains('sidebar--open')) {
        sidebar.classList.remove('sidebar--collapsed');
      }
    } else {
      // Desktop: check sidebar state
      const isCollapsed = sidebar.classList.contains('sidebar--collapsed');
      adjustMainContent(isCollapsed);
    }
  }

  // Handle three-dot menu click - toggle dropdown
  if (mobileDotsBtn && mobileDropdown) {
    mobileDotsBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      mobileDropdown.classList.toggle('navbar__mobile-dropdown--open');
    });
  }

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (mobileDropdown && mobileDotsBtn) {
      if (!mobileDropdown.contains(e.target) && !mobileDotsBtn.contains(e.target)) {
        mobileDropdown.classList.remove('navbar__mobile-dropdown--open');
      }
    }
  });

  // Handle logout from mobile dropdown
  if (mobileLogoutItem) {
    mobileLogoutItem.addEventListener('click', (e) => {
      e.preventDefault();
      // Redirect to login page
      window.location.href = 'login.html';
    });
  }

  // Handle profile click from mobile dropdown (if needed)
  if (mobileProfileItem) {
    mobileProfileItem.addEventListener('click', (e) => {
      e.preventDefault();
      // Close dropdown
      if (mobileDropdown) {
        mobileDropdown.classList.remove('navbar__mobile-dropdown--open');
      }
      // Close sidebar if open
      if (sidebar) {
        sidebar.classList.remove('sidebar--open');
      }
      // Redirect to profile page
      window.location.href = 'profile.html';
    });
  }

  // Create and manage backdrop for mobile sidebar
  let backdrop = null;
  if (sidebar) {
    // Create backdrop element for mobile
    backdrop = document.createElement('div');
    backdrop.className = 'sidebar-backdrop';
    document.body.appendChild(backdrop);
    
    // Function to update backdrop visibility
    function updateBackdrop() {
      if (window.innerWidth <= 768) {
        if (sidebar.classList.contains('sidebar--open')) {
          backdrop.classList.add('active');
        } else {
          backdrop.classList.remove('active');
        }
      } else {
        backdrop.classList.remove('active');
      }
    }
    
    // Show/hide backdrop when sidebar opens/closes
    const sidebarObserver = new MutationObserver(() => {
      updateBackdrop();
    });
    sidebarObserver.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
    
    // Close sidebar when clicking backdrop
    backdrop.addEventListener('click', () => {
      if (window.innerWidth <= 768 && sidebar.classList.contains('sidebar--open')) {
        sidebar.classList.remove('sidebar--open');
      }
    });
    
    // Update on resize
    window.addEventListener('resize', updateBackdrop);
    
    // Initial update
    updateBackdrop();
    
    // Prevent sidebar from closing when clicking on navigation links on mobile
    const navLinks = sidebar.querySelectorAll('.nav-link, .nav-sub-link');
    navLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        // On mobile, don't close sidebar when clicking navigation links
        // Only allow navigation to happen
        if (window.innerWidth <= 768) {
          e.stopPropagation(); // Prevent event from bubbling to document click handler
        }
      });
    });
    
    // Close sidebar when clicking outside on mobile
    // But NOT when clicking on navigation links or the sidebar toggle button
    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768) {
        // Check if click is on a navigation link or sub-link
        const isNavLink = e.target.closest('.nav-link, .nav-sub-link');
        // Check if click is on the sidebar toggle button (bottom arrow)
        const isSidebarToggle = e.target.closest('.sidebar__toggle');
        // Check if click is inside sidebar (should not close)
        const isInsideSidebar = sidebar.contains(e.target);
        
        // Only close if clicking outside sidebar, not on nav links, and not on toggle button
        // The bottom arrow button handler will close it separately
        if (!isInsideSidebar && 
            !mobileMenuBtn.contains(e.target) && 
            backdrop && !backdrop.contains(e.target) &&
            !isNavLink &&
            !isSidebarToggle) {
          if (sidebar.classList.contains('sidebar--open')) {
            sidebar.classList.remove('sidebar--open');
          }
        }
      }
    });
  }
});

