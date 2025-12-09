<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verify Email - Alpha Gold Trading</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;700&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
  <!-- jquery-toast-plugin CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  <style>
    .otp-input {
      width: 60px;
      height: 60px;
      text-align: center;
      font-size: 24px;
      font-weight: 600;
      color: #000;
      background-color: #fff;
    }
    .login-card .alert {
      margin-top: 0 !important;
      margin-bottom: 20px;
      width: 100%;
      border-radius: 8px;
    }
    .login-card .alert svg {
      flex-shrink: 0;
    }
  </style>

</head>
<body>

  <!-- Loader -->
  <div id="loader" style="display: none;">
    <img src="<?php echo base_url('assets/images/media/loader.svg'); ?>" alt="">
  </div>
  <!-- Loader -->

  <div class="login-page">
    <div class="login-container">
      <?php if ($showForm == 1) { ?>
        <!-- Verification Card -->
        <div class="modal login-card">
          <!-- Logo -->
          <div class="modal-header">
            <div class="logo">
              <img src="<?php echo base_url('assets/icons/alpha-logo.svg'); ?>" alt="Alpha Gold Trading Logo" />
            </div>
            <h1 class="modal-title">Verification Code</h1>
            <p class="text-muted text-center" style="margin-top: 8px; font-size: 14px;">Enter the 4 digit code sent to your email id.</p>
          </div>

          <!-- Form -->
          <form class="login-form" action="<?php echo site_url('auth/confirm_otp/' . $uri3); ?>" method="post" id="verifyemailform">
            <div class="modal-body">
              <!-- OTP Input Fields -->
              <div class="otp-container" style="display: flex; gap: 12px; justify-content: center; margin-bottom: 24px;">
                <input 
                  type="text" 
                  class="otp-input" 
                  id="one" 
                  maxlength="1" 
                  onkeyup="clickEvent(this,'two')" 
                  name="one" 
                  required
                  style="width: 60px; height: 60px; text-align: center; font-size: 24px; color: #fff; font-weight: 600; border: 2px solid var(--border-color, #e0e0e0); border-radius: 8px; background: var(--bg-primary, #fff);"
                />
                <input 
                  type="text" 
                  class="otp-input" 
                  id="two" 
                  maxlength="1" 
                  onkeyup="clickEvent(this,'three')" 
                  name="two" 
                  required
                  style="width: 60px; height: 60px; text-align: center; font-size: 24px; font-weight: 600; color: #fff; border: 2px solid var(--border-color, #e0e0e0); border-radius: 8px; background: var(--bg-primary, #fff);"
                />
                <input 
                  type="text" 
                  class="otp-input" 
                  id="three" 
                  maxlength="1" 
                  onkeyup="clickEvent(this,'four')" 
                  name="three" 
                  required
                  style="width: 60px; height: 60px; text-align: center; font-size: 24px; font-weight: 600; color: #fff; border: 2px solid var(--border-color, #e0e0e0); border-radius: 8px; background: var(--bg-primary, #fff);"
                />
                <input 
                  type="text" 
                  class="otp-input" 
                  id="four" 
                  maxlength="1" 
                  name="four" 
                  required
                  style="width: 60px; height: 60px; text-align: center; font-size: 24px; font-weight: 600; color: #fff;border: 2px solid var(--border-color, #e0e0e0); border-radius: 8px; background: var(--bg-primary, #fff);"
                />
              </div>

              <!-- Resend Code -->
              <div class="form-options" style="margin-bottom: 24px;">
                <label class="checkbox-wrapper">
                  <input type="checkbox" id="defaultCheck1" name="defaultCheck1" class="checkbox-input">
                  <span class="checkbox-label">Didn't receive a code? <a href="mail.html" class="text-primary" style="text-decoration: none;">Resend</a></span>
                </label>
              </div>

              <!-- Verify Button -->
              <button type="submit" class="btn btn-primary btn-icon">
                <span>Verify</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </form>
        </div>
      <?php } else { ?>
        <!-- Token Expired Message -->
        <div class="modal login-card">
          <div class="modal-body">
            <div class="alert alert-danger d-flex align-items-center" role="alert" style="padding: 16px; border-radius: 8px; background: #fee; border: 1px solid #fcc;">
              <svg class="flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" fill="#dc3545" style="margin-right: 12px;">
                <g>
                  <rect fill="none" height="24" width="24" />
                </g>
                <g>
                  <g>
                    <g>
                      <path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z" />
                      <rect height="6" width="2" x="11" y="7" />
                      <rect height="2" width="2" x="11" y="15" />
                    </g>
                  </g>
                </g>
              </svg>
              <div style="color: #dc3545; font-weight: 500;">Token Expired.</div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer Start -->
  <footer class="footer mt-auto py-3 text-center">
  </footer>
  <!-- Footer End -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- jquery-toast-plugin JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
  <script>
    // OTP input focus function
    function clickEvent(first, last) {
      if (first.value.length) {
        document.getElementById(last).focus();
      }
    }

    // Form submission
    $("#verifyemailform").submit(function(e) {
      e.preventDefault();
      $('#loader').show();
      var form = $(this);
      var actionUrl = form.attr('action');

      $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(),
        success: function(data) {
          var myData = JSON.parse(data);
          var status = myData.status;
          var msg = myData.msg;
          if (status == 'error') {
            toastmessage(msg, 'error', 'error');
          } else {
            var redirecturl = myData.url;
            toastmessagesuccess(msg, 'Success', 'success', redirecturl);
          }
          $('#loader').hide();
        }
      });
    });

    function toastmessagesuccess(msg, head, icon, url = '') {
      $.toast({
        text: msg,
        heading: head,
        icon: icon,
        showHideTransition: 'slide',
        allowToastClose: true,
        hideAfter: 5000,
        stack: false,
        position: 'bottom-left',
        textAlign: 'left',
        loader: true,
        loaderBg: '#9EC600',
        afterHidden: function() {
          window.location.href = url;
        }
      });
    }

    function toastmessage(msg, head, icon) {
      $.toast({
        text: msg,
        heading: head,
        icon: icon,
        showHideTransition: 'slide',
        allowToastClose: true,
        hideAfter: 5000,
        stack: false,
        position: 'bottom-left',
        textAlign: 'left',
        loader: true,
        loaderBg: '#9EC600',
      });
    }
  </script>
</body>
</html>
