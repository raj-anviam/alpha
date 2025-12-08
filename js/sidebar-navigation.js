// Sidebar Navigation Handler
(function() {
  'use strict';

  // Get current page path
  const currentPath = window.location.pathname;
  const currentPage = currentPath.split('/').pop() || 'index.html';

  // Page mapping for active states and parent navigation
  const pageMapping = {
    'dashboard.html': { parent: null, child: null, parentText: 'Dashboard' },
    'activation-create-account.html': { parent: 'Activation', child: 'create-account', firstChild: 'activation-create-account.html' },
    'activation-start-trading.html': { parent: 'Activation', child: 'start-trading', firstChild: 'activation-create-account.html' },
    'partner-program.html': { parent: 'Partner Program', child: 'affiliate', firstChild: 'partner-program.html' },
    'refer-earn.html': { parent: 'Partner Program', child: 'refer-earn', firstChild: 'partner-program.html' },
    'user-tree.html': { parent: 'Partner Program', child: 'user-tree', firstChild: 'partner-program.html' },
    'profile.html': { parent: null, child: null, parentText: 'Profile Settings' },
    'terms_and_conditions.html': { parent: 'Company Policy', child: 'terms', firstChild: 'terms_and_conditions.html' },
    'privacy.html': { parent: 'Company Policy', child: 'privacy', firstChild: 'terms_and_conditions.html' }
  };

  // Initialize sidebar navigation
  function initSidebarNavigation() {
    // Set active states based on current page
    setActiveStates();
    
    // Handle parent item clicks - find by text content
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
      const navLink = item.querySelector('.nav-link');
      if (!navLink) return;
      
      const linkText = navLink.querySelector('.nav-link__text')?.textContent.trim();
      const hasSubList = item.querySelector('.nav-sub-list');
      
      if (hasSubList) {
        // This is a parent item with children
        navLink.addEventListener('click', function(e) {
          const href = navLink.getAttribute('href');
          
          // If href is # or empty, redirect to first child
          if (!href || href === '#' || href === 'javascript:void(0)') {
            e.preventDefault();
            e.stopPropagation();
            const firstChild = item.querySelector('.nav-sub-list .nav-sub-link');
            if (firstChild) {
              const childHref = firstChild.getAttribute('href');
              if (childHref) {
                // Handle relative paths
                const basePath = currentPath.substring(0, currentPath.lastIndexOf('/'));
                const fullPath = childHref.startsWith('../') 
                  ? childHref 
                  : childHref.startsWith('/') 
                    ? childHref 
                    : basePath + '/' + childHref;
                window.location.href = fullPath;
              }
            }
          }
          // If href exists and is valid, let it work normally (don't prevent default)
        });
      }
      // For items without sub-list, links should work normally - no interference needed
    });
  }

  // Set active states for navigation
  function setActiveStates() {
    const pageInfo = pageMapping[currentPage];
    
    if (!pageInfo) {
      // Try to set active based on URL matching
      setActiveByUrl();
      return;
    }

    // Remove all active states first
    document.querySelectorAll('.nav-item').forEach(item => {
      item.classList.remove('nav-item--active');
      // Don't remove expanded if it should stay expanded
    });
    document.querySelectorAll('.nav-sub-item').forEach(item => {
      item.classList.remove('nav-sub-item--active');
    });

    // Set parent active and expanded
    if (pageInfo.parent) {
      // Find parent by text content
      const navItems = document.querySelectorAll('.nav-item');
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
      const childMapping = {
        'create-account': 'activation-create-account.html',
        'start-trading': 'activation-start-trading.html',
        'affiliate': 'partner-program.html',
        'refer-earn': 'refer-earn.html',
        'user-tree': 'user-tree.html',
        'terms': 'terms_and_conditions.html',
        'privacy': 'privacy.html'
      };

      const targetPage = childMapping[pageInfo.child];
      if (targetPage) {
        // Find child link by href - use exact match or end of path match
        const childLinks = document.querySelectorAll('.nav-sub-link');
        childLinks.forEach(link => {
          const href = link.getAttribute('href');
          if (href) {
            // Normalize the href - remove leading ../ or ./
            const normalizedHref = href.replace(/^\.\.\//, '').replace(/^\.\//, '');
            // Extract just the filename from the href
            const hrefFilename = normalizedHref.split('/').pop();
            // Check if the filename matches the target page exactly
            const matches = hrefFilename === targetPage;
            
            if (matches) {
              const childItem = link.closest('.nav-sub-item');
              if (childItem) {
                childItem.classList.add('nav-sub-item--active');
              }
            }
          }
        });
      }
    }
  }

  // Fallback: Set active by URL matching
  function setActiveByUrl() {
    const navLinks = document.querySelectorAll('.nav-link, .nav-sub-link');
    navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (href && (currentPath.includes(href) || href.includes(currentPage))) {
        const item = link.closest('.nav-item, .nav-sub-item');
        if (item) {
          item.classList.add('nav-item--active', 'nav-sub-item--active');
          // If it's a sub-item, also expand parent
          if (item.classList.contains('nav-sub-item')) {
            const parent = item.closest('.nav-item');
            if (parent) {
              parent.classList.add('nav-item--expanded');
            }
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

