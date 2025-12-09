// Sidebar Navigation Handler
(function() {
  'use strict';

  // Get current page path - handle CodeIgniter URLs
  const currentPath = window.location.pathname;
  const currentUrl = window.location.href;
  
  // Extract controller and method from CodeIgniter URL
  // Format: /alpha/user/home or /alpha/index.php/user/home
  function getCurrentRoute() {
    const pathParts = currentPath.split('/').filter(part => part && part !== 'index.php');
    const userIndex = pathParts.indexOf('user');
    if (userIndex !== -1 && pathParts.length > userIndex + 1) {
      return {
        controller: 'user',
        method: pathParts[userIndex + 1] || 'home',
        fullPath: pathParts.slice(userIndex).join('/')
      };
    }
    return { controller: 'user', method: 'home', fullPath: 'user/home' };
  }

  const currentRoute = getCurrentRoute();

  // Page mapping for CodeIgniter routes
  const pageMapping = {
    'home': { parent: null, child: null, parentText: 'Dashboard' },
    'create_account': { parent: 'Activation', child: 'create_account' },
    'start_trading': { parent: 'Activation', child: 'start_trading' },
    'partner_program': { parent: 'Partner Program', child: 'partner_program' },
    'refer_friend': { parent: 'Partner Program', child: 'refer_friend' },
    'user_tree': { parent: 'Partner Program', child: 'user_tree' },
    'profile_settings': { parent: null, child: null, parentText: 'Profile Settings' },
    'tnc': { parent: 'Company Policy', child: 'tnc' },
    'privacy_policy': { parent: 'Company Policy', child: 'privacy_policy' }
  };

  // Initialize sidebar navigation
  function initSidebarNavigation() {
    // Set active states based on current page
    setActiveStates();
    
    // Handle parent item clicks - toggle expansion
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
      const navLink = item.querySelector('.nav-link');
      if (!navLink) return;
      
      const hasSubList = item.querySelector('.nav-sub-list');
      
      if (hasSubList) {
        // This is a parent item with children - make it toggleable
        navLink.addEventListener('click', function(e) {
          // Don't toggle if clicking on a sub-link
          if (e.target.closest('.nav-sub-link')) {
            return;
          }
          
          // Prevent default navigation for parent items with sub-lists
          e.preventDefault();
          e.stopPropagation();
          
          // Check if this item is already expanded
          const isCurrentlyExpanded = item.classList.contains('nav-item--expanded');
          
          // Close all other expanded items (accordion behavior)
          navItems.forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('nav-item--expanded')) {
              otherItem.classList.remove('nav-item--expanded');
              // Clear localStorage for closed items
              const otherParentText = otherItem.querySelector('.nav-link__text')?.textContent.trim();
              if (otherParentText) {
                localStorage.setItem('sidebar_expanded_' + otherParentText, false);
              }
            }
          });
          
          // Toggle expanded state for clicked item
          if (isCurrentlyExpanded) {
            item.classList.remove('nav-item--expanded');
          } else {
            item.classList.add('nav-item--expanded');
          }
          
          // Save expanded state to localStorage
          const parentText = item.querySelector('.nav-link__text')?.textContent.trim();
          if (parentText) {
            localStorage.setItem('sidebar_expanded_' + parentText, item.classList.contains('nav-item--expanded'));
          }
        });
        
        // Restore expanded state from localStorage
        const parentText = item.querySelector('.nav-link__text')?.textContent.trim();
        if (parentText && localStorage.getItem('sidebar_expanded_' + parentText) === 'true') {
          item.classList.add('nav-item--expanded');
        }
      }
    });
  }

  // Set active states for navigation
  function setActiveStates() {
    const currentMethod = currentRoute.method;
    const pageInfo = pageMapping[currentMethod];
    
    // Remove all active states first
    document.querySelectorAll('.nav-item').forEach(item => {
      item.classList.remove('nav-item--active');
    });
    document.querySelectorAll('.nav-sub-item').forEach(item => {
      item.classList.remove('nav-sub-item--active');
    });

    if (!pageInfo) {
      // Fallback: try to match by URL
      setActiveByUrl();
      return;
    }

    // Set parent active and expanded
    if (pageInfo.parent) {
      // Find parent by text content
      const navItems = document.querySelectorAll('.nav-item');
      
      // Close all expanded items first (accordion behavior)
      navItems.forEach(item => {
        if (item.classList.contains('nav-item--expanded')) {
          item.classList.remove('nav-item--expanded');
        }
      });
      
      // Then expand and activate the current parent
      navItems.forEach(item => {
        const linkText = item.querySelector('.nav-link__text')?.textContent.trim();
        if (linkText === pageInfo.parent) {
          item.classList.add('nav-item--active', 'nav-item--expanded');
        }
      });
    } else if (pageInfo.parentText) {
      // For pages without parent (dashboard, profile)
      const navItems = document.querySelectorAll('.nav-item');
      navItems.forEach(item => {
        const linkText = item.querySelector('.nav-link__text')?.textContent.trim();
        if (linkText === pageInfo.parentText) {
          item.classList.add('nav-item--active');
        }
      });
    }

    // Set child active
    if (pageInfo.child) {
      const childLinks = document.querySelectorAll('.nav-sub-link');
      childLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href) {
          // Check if href contains the current method
          const hrefMethod = extractMethodFromUrl(href);
          if (hrefMethod === currentMethod || hrefMethod === pageInfo.child) {
            const childItem = link.closest('.nav-sub-item');
            if (childItem) {
              childItem.classList.add('nav-sub-item--active');
            }
          }
        }
      });
    }
  }

  // Extract method from CodeIgniter URL
  function extractMethodFromUrl(url) {
    if (!url) return null;
    // Handle both relative and absolute URLs
    try {
      const urlObj = new URL(url, window.location.origin);
      const pathParts = urlObj.pathname.split('/').filter(part => part && part !== 'index.php');
      const userIndex = pathParts.indexOf('user');
      if (userIndex !== -1 && pathParts.length > userIndex + 1) {
        return pathParts[userIndex + 1];
      }
    } catch (e) {
      // If URL parsing fails, try string matching
      const match = url.match(/user\/([^\/\?]+)/);
      if (match && match[1]) {
        return match[1];
      }
    }
    return null;
  }

  // Fallback: Set active by URL matching
  function setActiveByUrl() {
    const navLinks = document.querySelectorAll('.nav-link, .nav-sub-link');
    const currentMethod = currentRoute.method;
    
    navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (!href) return;
      
      const hrefMethod = extractMethodFromUrl(href);
      if (hrefMethod === currentMethod) {
        const item = link.closest('.nav-item, .nav-sub-item');
        if (item) {
          if (item.classList.contains('nav-sub-item')) {
            item.classList.add('nav-sub-item--active');
            // Expand parent and close all other expanded items
            const parent = item.closest('.nav-item');
            if (parent) {
              // Close all other expanded items
              document.querySelectorAll('.nav-item').forEach(otherItem => {
                if (otherItem !== parent && otherItem.classList.contains('nav-item--expanded')) {
                  otherItem.classList.remove('nav-item--expanded');
                }
              });
              parent.classList.add('nav-item--expanded', 'nav-item--active');
            }
          } else {
            // Close all expanded items when activating a standalone item
            document.querySelectorAll('.nav-item').forEach(otherItem => {
              if (otherItem !== item && otherItem.classList.contains('nav-item--expanded')) {
                otherItem.classList.remove('nav-item--expanded');
              }
            });
            item.classList.add('nav-item--active');
          }
        }
      }
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSidebarNavigation);
  } else {
    initSidebarNavigation();
  }
})();

