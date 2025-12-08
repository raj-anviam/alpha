// Logout functionality
(function() {
  'use strict';
  
  // Initialize logout functionality
  function initLogout() {
    const logoutButtons = document.querySelectorAll('.btn-logout');
    
    logoutButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        // Redirect to login page
        window.location.href = 'login.html';
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

