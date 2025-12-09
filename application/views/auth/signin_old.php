<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign In - Alpha Gold Trading</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;700&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
  <!-- jquery-toast-plugin CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  <style>
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
      <!-- Login Card -->
      <div class="modal login-card">
        <!-- Logo -->
        <div class="modal-header">
          <div class="logo">
            <img src="<?php echo base_url('assets/icons/alpha-logo.svg'); ?>" alt="Alpha Gold Trading Logo" />
          </div>
          <h1 class="modal-title">Sign In</h1>
        </div>

        <!-- Form -->
        <form class="login-form" action="<?php echo site_url('auth/signin'); ?>" method="post" id="signinform">
          <div class="modal-body">
            <?php $message = $this->session->flashdata('formMsg');
              if ($message) {
                echo '<div style="margin-bottom: 20px; width: 100%;">' . $message . '</div>';
              }
            ?>
            <!-- Username Input -->
            <div class="input-wrapper">
              <label for="username" class="input-label">Username</label>
              <div class="input-container">
                <input 
                  type="text" 
                  id="username" 
                  name="username" 
                  placeholder="Enter username or email address" 
                  class="input-field"
                />
              </div>
              <span class="badge bg-outline-primary"><?php echo form_error('username'); ?></span>
            </div>

            <!-- Password Input -->
            <div class="input-wrapper">
              <label for="password" class="input-label">Password</label>
              <div class="input-container">
                <input 
                  type="password" 
                  id="password" 
                  name="password" 
                  placeholder="Enter your password" 
                  class="input-field create-password-input"
                />
                <button type="button" class="input-toggle show-password-button" onclick="togglePassword('password', this)" aria-label="Toggle password visibility">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="password-icon">
                    <path d="M10 4C6 4 2.73 6.11 1 9.5C2.73 12.89 6 15 10 15C14 15 17.27 12.89 19 9.5C17.27 6.11 14 4 10 4ZM10 12.5C8.07 12.5 6.5 10.93 6.5 9C6.5 7.07 8.07 5.5 10 5.5C11.93 5.5 13.5 7.07 13.5 9C13.5 10.93 11.93 12.5 10 12.5ZM10 7C8.62 7 7.5 8.12 7.5 9.5C7.5 10.88 8.62 12 10 12C11.38 12 12.5 10.88 12.5 9.5C12.5 8.12 11.38 7 10 7Z" fill="currentColor"/>
                    <line x1="2" y1="2" x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </button>
              </div>
              <span class="badge bg-outline-primary"><?php echo form_error('password'); ?></span>
            </div>

            <!-- Remember Password & Forgot Password -->
            <div class="form-options">
              <label class="checkbox-wrapper">
                <input type="checkbox" id="remember" name="remember" class="checkbox-input">
                <span class="checkbox-label">Remember password?</span>
              </label>
              <a href="<?php echo site_url('auth/forgot_password'); ?>" class="forgot-password-link">Forgot Password?</a>
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn btn-primary btn-icon">
              <span>Sign In</span>
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <!-- Sign Up Link -->
            <div class="signup-prompt">
              <span class="signup-text">Don't have an account?</span>
              <a href="<?php echo site_url('auth/register'); ?>" class="signup-link">Sign Up</a>
            </div>

            <!-- Social Media Icons -->
            <div class="social-login">
              <button type="button" class="btn-social" aria-label="Login with Facebook">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 6C0 2.68629 2.68629 0 6 0H34C37.3137 0 40 2.68629 40 6V34C40 37.3137 37.3137 40 34 40H6C2.68629 40 0 37.3137 0 34V6Z" fill="#E0A130" fill-opacity="0.1"/>
                  <path d="M22.2167 11C21.0082 11 19.8492 11.4806 18.9947 12.3361C18.1402 13.1915 17.6601 14.3518 17.6601 15.5616V18.1014H15.2217C15.0995 18.1014 15 18.2 15 18.3233V21.6767C15 21.799 15.0985 21.8986 15.2217 21.8986H17.6601V28.7781C17.6601 28.9004 17.7586 29 17.8818 29H21.2315C21.3537 29 21.4532 28.9014 21.4532 28.7781V21.8986H23.9133C24.0148 21.8986 24.1034 21.8296 24.1281 21.731L24.9655 18.3775C24.9738 18.3448 24.9744 18.3106 24.9675 18.2776C24.9606 18.2446 24.9462 18.2136 24.9255 18.187C24.9048 18.1603 24.8783 18.1388 24.848 18.1239C24.8177 18.1091 24.7844 18.1014 24.7507 18.1014H21.4532V15.5616C21.4532 15.4613 21.473 15.3619 21.5113 15.2691C21.5497 15.1764 21.6059 15.0921 21.6768 15.0211C21.7477 14.9502 21.8319 14.8939 21.9246 14.8554C22.0172 14.817 22.1165 14.7973 22.2167 14.7973H24.7783C24.9005 14.7973 25 14.6986 25 14.5753V11.2219C25 11.0996 24.9015 11 24.7783 11H22.2167Z" fill="white"/>
                </svg>
              </button>
              <button type="button" class="btn-social" aria-label="Login with X">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 6C0 2.68629 2.68629 0 6 0H34C37.3137 0 40 2.68629 40 6V34C40 37.3137 37.3137 40 34 40H6C2.68629 40 0 37.3137 0 34V6Z" fill="#E0A130" fill-opacity="0.1"/>
                  <mask id="mask0_323_4123" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="11" y="11" width="18" height="18">
                    <path d="M11 11H29V29H11V11Z" fill="white"/>
                  </mask>
                  <g mask="url(#mask0_323_4123)">
                    <path d="M25.175 11.8434H27.9354L21.9054 18.7529L29 28.1566H23.4457L19.0923 22.4544L14.1166 28.1566H11.3536L17.8027 20.7637L11 11.8447H16.6957L20.6249 17.0557L25.175 11.8434ZM24.2043 26.5006H25.7343L15.86 13.4133H14.2194L24.2043 26.5006Z" fill="white"/>
                  </g>
                </svg>
              </button>
              <button type="button" class="btn-social" aria-label="Login with Instagram">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 6C0 2.68629 2.68629 0 6 0H34C37.3137 0 40 2.68629 40 6V34C40 37.3137 37.3137 40 34 40H6C2.68629 40 0 37.3137 0 34V6Z" fill="#E0A130" fill-opacity="0.1"/>
                  <path d="M24.806 14.114C24.5924 14.114 24.3836 14.1773 24.206 14.296C24.0284 14.4147 23.89 14.5834 23.8082 14.7807C23.7265 14.978 23.7051 15.1952 23.7468 15.4047C23.7884 15.6142 23.8913 15.8066 24.0423 15.9577C24.1934 16.1087 24.3858 16.2116 24.5953 16.2532C24.8048 16.2949 25.022 16.2735 25.2193 16.1918C25.4166 16.11 25.5853 15.9716 25.704 15.794C25.8227 15.6164 25.886 15.4076 25.886 15.194C25.886 14.9076 25.7722 14.6329 25.5697 14.4303C25.3671 14.2278 25.0924 14.114 24.806 14.114ZM28.946 16.292C28.9283 15.5453 28.7885 14.8065 28.532 14.105C28.3042 13.5043 27.9479 12.9606 27.488 12.512C27.0423 12.0507 26.4976 11.6968 25.895 11.477C25.1954 11.2125 24.4558 11.0695 23.708 11.054C22.754 11 22.448 11 20 11C17.552 11 17.246 11 16.292 11.054C15.5442 11.0695 14.8046 11.2125 14.105 11.477C13.5038 11.6995 12.9596 12.0531 12.512 12.512C12.0507 12.9577 11.6968 13.5024 11.477 14.105C11.2125 14.8046 11.0695 15.5442 11.054 16.292C11 17.246 11 17.552 11 20C11 22.448 11 22.754 11.054 23.708C11.0695 24.4558 11.2125 25.1954 11.477 25.895C11.6968 26.4976 12.0507 27.0423 12.512 27.488C12.9596 27.9469 13.5038 28.3005 14.105 28.523C14.8046 28.7875 15.5442 28.9305 16.292 28.946C17.246 29 17.552 29 20 29C22.448 29 22.754 29 23.708 28.946C24.4558 28.9305 25.1954 28.7875 25.895 28.523C26.4976 28.3032 27.0423 27.9493 27.488 27.488C27.949 27.0403 28.3055 26.4964 28.532 25.895C28.7885 25.1935 28.9283 24.4547 28.946 23.708C28.946 22.754 29 22.448 29 20C29 17.552 29 17.246 28.946 16.292ZM27.326 23.6C27.3196 24.1713 27.2161 24.7374 27.02 25.274C26.8763 25.6657 26.6455 26.0196 26.345 26.309C26.0529 26.6062 25.6998 26.8365 25.31 26.984C24.7734 27.1801 24.2073 27.2836 23.636 27.29C22.736 27.335 22.403 27.344 20.036 27.344C17.669 27.344 17.336 27.344 16.436 27.29C15.8428 27.3017 15.252 27.2103 14.69 27.02C14.3176 26.8646 13.9807 26.6349 13.7 26.345C13.4013 26.0559 13.1734 25.7017 13.034 25.31C12.8135 24.7659 12.6916 24.1868 12.674 23.6C12.674 22.7 12.62 22.367 12.62 20C12.62 17.633 12.62 17.3 12.674 16.4C12.6773 15.8159 12.7839 15.2369 12.989 14.69C13.1474 14.3101 13.3906 13.9715 13.7 13.7C13.9726 13.3897 14.3108 13.1438 14.69 12.98C15.2385 12.7815 15.8167 12.678 16.4 12.674C17.3 12.674 17.633 12.62 20 12.62C22.367 12.62 22.7 12.62 23.6 12.674C24.1713 12.6804 24.7374 12.7839 25.274 12.98C25.683 13.1318 26.0501 13.3786 26.345 13.7C26.639 13.9772 26.8694 14.315 27.02 14.69C27.2202 15.238 27.3237 15.8166 27.326 16.4C27.371 17.3 27.38 17.633 27.38 20C27.38 22.367 27.371 22.7 27.326 23.6ZM20 15.383C19.0872 15.3848 18.1955 15.6571 17.4374 16.1655C16.6793 16.6739 16.0889 17.3956 15.7409 18.2394C15.3928 19.0832 15.3027 20.0112 15.4818 20.9062C15.661 21.8013 16.1014 22.6231 16.7475 23.2679C17.3935 23.9127 18.2162 24.3515 19.1116 24.5289C20.0069 24.7064 20.9348 24.6144 21.7779 24.2647C22.621 23.915 23.3416 23.3232 23.8485 22.5641C24.3554 21.8051 24.626 20.9128 24.626 20C24.6272 19.3926 24.5083 18.7909 24.2761 18.2297C24.0439 17.6684 23.7031 17.1585 23.2732 16.7294C22.8433 16.3004 22.3328 15.9605 21.771 15.7294C21.2093 15.4984 20.6074 15.3806 20 15.383ZM20 22.997C19.4072 22.997 18.8278 22.8212 18.335 22.4919C17.8421 22.1626 17.458 21.6945 17.2311 21.1469C17.0043 20.5993 16.9449 19.9967 17.0606 19.4153C17.1762 18.834 17.4617 18.2999 17.8808 17.8808C18.2999 17.4617 18.834 17.1762 19.4153 17.0606C19.9967 16.9449 20.5993 17.0043 21.1469 17.2311C21.6945 17.458 22.1626 17.8421 22.4919 18.335C22.8212 18.8278 22.997 19.4072 22.997 20C22.997 20.3936 22.9195 20.7833 22.7689 21.1469C22.6183 21.5105 22.3975 21.8409 22.1192 22.1192C21.8409 22.3975 21.5105 22.6183 21.1469 22.7689C20.7833 22.9195 20.3936 22.997 20 22.997Z" fill="white"/>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer Start
  <footer class="footer mt-auto py-3 text-center">
    <div class="col-xl-3" id="error_msg_div" style="display:none;">
      <div class="card border-0" id="validationDiv">
        <div class="alert alert-primary border border-primary mb-0 p-2">
          <div class="d-flex align-items-start">
            <div class="me-2 svg-primary">
              <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
              </svg>
            </div>
            <div class="text-primary w-100">
              <div class="fw-medium d-flex justify-content-between">Error<button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>
              <div class="fs-12 op-8 mb-1" id="error_msg"></div>
              <div class="fs-12 d-inline-flex">
                <a href="javascript:void(0);" class="text-secondary fw-medium me-2 d-inline-block">cancel</a>
                <a href="javascript:void(0);" class="text-primary fw-medium">open</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer> -->
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
    $("#signinform").submit(function() {
      $('#loader').show();
    });
  </script>
<?php $this->load->view('user/common/footer'); ?>

