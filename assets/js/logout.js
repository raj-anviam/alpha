// Logout functionality
(function() {
  'use strict';
  
  // Initialize logout functionality
  function initLogout() {
    // Only handle button elements, not anchor tags
    const logoutButtons = document.querySelectorAll('button.btn-logout');
    
    logoutButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        // Get the logout URL from the button's data attribute or use default
        const logoutUrl = button.getAttribute('data-logout-url') || '/auth/logout';
        window.location.href = logoutUrl;
      });
    });
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLogout);
  } else {
    initLogout();
  }
})();

