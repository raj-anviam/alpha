// Global Form Submit Handler
// Disables submit buttons and shows "Submitting..." text during form submission
(function() {
  'use strict';

  // Wait for jQuery to be available
  function initFormSubmitHandler() {
    if (typeof jQuery === 'undefined') {
      setTimeout(initFormSubmitHandler, 100);
      return;
    }

    var $ = jQuery;

    // Handle all form submissions - only if not already handled
    $('form').on('submit', function(e) {
      const form = $(this);
      const submitBtn = form.find('button[type="submit"]');
      
      if (submitBtn.length > 0 && !submitBtn.data('handler-attached')) {
        const submitBtnText = submitBtn.find('span');
        const originalText = submitBtnText.length > 0 ? submitBtnText.text() : submitBtn.text();
        
        // Only disable if button is not already disabled (to avoid conflicts with specific handlers)
        if (!submitBtn.prop('disabled')) {
          // Disable button and show submitting state
          submitBtn.prop('disabled', true);
          if (submitBtnText.length > 0) {
            submitBtnText.text('Submitting...');
          } else {
            submitBtn.text('Submitting...');
          }
          
          // Store original text for potential re-enable
          submitBtn.data('original-text', originalText);
        }
      }
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFormSubmitHandler);
  } else {
    initFormSubmitHandler();
  }
})();

