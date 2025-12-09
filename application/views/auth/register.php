<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up - Alpha Gold Trading</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;700&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
  <!-- jquery-toast-plugin CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  <style>
    .signup-card .alert {
      margin-top: 0 !important;
      margin-bottom: 20px;
      width: 100%;
      border-radius: 8px;
    }
    .signup-card .alert svg {
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

  <div class="signup-page">
    <div class="signup-container">
      <!-- Sign Up Card -->
      <div class="signup-card">
        <!-- Logo -->
        <div class="signup-header">
          <div class="signup-logo">
            <img src="<?php echo base_url('assets/icons/alpha-logo.svg'); ?>" alt="Alpha Gold Trading Logo" />
          </div>
          <h1 class="signup-title">Register</h1>
        </div>

        <!-- Form -->
        <form class="signup-form" action="<?php echo site_url('auth/sign_up'); ?>" method="post" id="signupform">
          <div class="signup-body">
            <!-- Row 1: Username, Full Name, Email (3 columns) -->
            <div class="input-wrapper">
              <label for="username" class="input-label">Username</label>
              <div class="input-container">
                <input 
                  type="text" 
                  id="username" 
                  name="username" 
                  placeholder="Username" 
                  class="input-field"
                />
              </div>
            </div>

            <div class="input-wrapper">
              <label for="name" class="input-label">Full Name</label>
              <div class="input-container">
                <input 
                  type="text" 
                  id="name" 
                  name="name" 
                  placeholder="Enter your full name" 
                  class="input-field"
                />
              </div>
            </div>

            <div class="input-wrapper">
              <label for="mailid" class="input-label">Email Address</label>
              <div class="input-container">
                <input 
                  type="email" 
                  id="mailid" 
                  name="mailid" 
                  placeholder="Enter your email address" 
                  class="input-field"
                />
              </div>
            </div>

            <!-- Row 2: Password and Confirm Password (2 columns) -->
            <div class="input-wrapper">
              <label for="authentication_password" class="input-label">Password</label>
              <div class="input-container">
                <input 
                  type="password" 
                  id="authentication_password" 
                  name="authentication_password" 
                  placeholder="Enter your password" 
                  class="input-field create-password-input"
                />
                <button type="button" class="input-toggle show-password-button" onclick="togglePassword('authentication_password', this)" aria-label="Toggle password visibility">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="password-icon">
                    <path d="M10 4C6 4 2.73 6.11 1 9.5C2.73 12.89 6 15 10 15C14 15 17.27 12.89 19 9.5C17.27 6.11 14 4 10 4ZM10 12.5C8.07 12.5 6.5 10.93 6.5 9C6.5 7.07 8.07 5.5 10 5.5C11.93 5.5 13.5 7.07 13.5 9C13.5 10.93 11.93 12.5 10 12.5ZM10 7C8.62 7 7.5 8.12 7.5 9.5C7.5 10.88 8.62 12 10 12C11.38 12 12.5 10.88 12.5 9.5C12.5 8.12 11.38 7 10 7Z" fill="currentColor"/>
                    <line x1="2" y1="2" x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </button>
              </div>
            </div>

            <div class="input-wrapper">
              <label for="confirm_password" class="input-label">Confirm Password</label>
              <div class="input-container">
                <input 
                  type="password" 
                  id="confirm_password" 
                  name="confirm_password" 
                  placeholder="Re-type your password" 
                  class="input-field create-password-input"
                />
                <button type="button" class="input-toggle show-password-button" onclick="togglePassword('confirm_password', this)" aria-label="Toggle password visibility">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="password-icon">
                    <path d="M10 4C6 4 2.73 6.11 1 9.5C2.73 12.89 6 15 10 15C14 15 17.27 12.89 19 9.5C17.27 6.11 14 4 10 4ZM10 12.5C8.07 12.5 6.5 10.93 6.5 9C6.5 7.07 8.07 5.5 10 5.5C11.93 5.5 13.5 7.07 13.5 9C13.5 10.93 11.93 12.5 10 12.5ZM10 7C8.62 7 7.5 8.12 7.5 9.5C7.5 10.88 8.62 12 10 12C11.38 12 12.5 10.88 12.5 9.5C12.5 8.12 11.38 7 10 7Z" fill="currentColor"/>
                    <line x1="2" y1="2" x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </button>
              </div>
            </div>

            <!-- Row 3: Address (full width) -->
            <div class="input-wrapper signup-full-width">
              <label for="address" class="input-label">Address</label>
              <div class="input-container">
                <input 
                  type="text" 
                  id="address" 
                  name="address" 
                  placeholder="Enter address" 
                  class="input-field"
                />
              </div>
            </div>

            <!-- Row 4: Mobile and Referral Code (2 columns) -->
            <div class="input-wrapper">
              <label for="phone" class="input-label">Mobile</label>
              <div class="input-container">
                <input 
                  type="tel" 
                  id="phone" 
                  name="phone" 
                  placeholder="Enter your mobile number" 
                  class="input-field"
                />
              </div>
            </div>

            <div class="input-wrapper">
              <label for="code" class="input-label">Referral Code (Optional)</label>
              <div class="input-container">
                <input 
                  type="text" 
                  id="code" 
                  name="code" 
                  placeholder="Enter referral code" 
                  class="input-field"
                />
              </div>
            </div>

            <!-- Checkbox -->
            <label class="checkbox-wrapper">
              <input type="checkbox" id="gridCheck3" name="gridCheck3" class="checkbox-input">
              <span class="checkbox-label">Check me out</span>
            </label>

            <!-- Sign Up Button and Sign In Link Container -->
            <div class="signup-actions">
              <button type="submit" class="btn btn-primary btn-icon">
                <span>Sign Up</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>

              <!-- Sign In Link -->
              <div class="signup-prompt">
                <span class="signup-text">Already have an account?</span>
                <a href="<?php echo site_url('auth/signin'); ?>" class="signup-link">Sign In</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

 
  <!-- Footer End -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- jquery-toast-plugin JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
  <script>
    // Password toggle function
    function togglePassword(inputId, button) {
      const input = document.getElementById(inputId);
      const svg = button.querySelector('svg');
      
      if (input.type === 'password') {
        input.type = 'text';
        // Eye open icon - show password (visible) - no slash
        svg.innerHTML = '<path d="M10 3C5 3 1.73 5.11 0 8.5C1.73 11.89 5 14 10 14C15 14 18.27 11.89 20 8.5C18.27 5.11 15 3 10 3ZM10 12.5C7.93 12.5 6.25 10.82 6.25 8.75C6.25 6.68 7.93 5 10 5C12.07 5 13.75 6.68 13.75 8.75C13.75 10.82 12.07 12.5 10 12.5ZM10 6.5C8.62 6.5 7.5 7.62 7.5 9C7.5 10.38 8.62 11.5 10 11.5C11.38 11.5 12.5 10.38 12.5 9C12.5 7.62 11.38 6.5 10 6.5Z" fill="currentColor"/>';
      } else {
        input.type = 'password';
        // Eye closed icon - hide password (with slash)
        svg.innerHTML = '<path d="M10 4C6 4 2.73 6.11 1 9.5C2.73 12.89 6 15 10 15C14 15 17.27 12.89 19 9.5C17.27 6.11 14 4 10 4ZM10 12.5C8.07 12.5 6.5 10.93 6.5 9C6.5 7.07 8.07 5.5 10 5.5C11.93 5.5 13.5 7.07 13.5 9C13.5 10.93 11.93 12.5 10 12.5ZM10 7C8.62 7 7.5 8.12 7.5 9.5C7.5 10.88 8.62 12 10 12C11.38 12 12.5 10.88 12.5 9.5C12.5 8.12 11.38 7 10 7Z" fill="currentColor"/><line x1="2" y1="2" x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>';
      }
    }
  </script>
  <script>
    $("#signupform").submit(function(e) {
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
<?php $this->load->view('user/common/footer'); ?>

