<?php
// Get user data for header
$user_id = get_user_id();
$CI = &get_instance();
$CI->load->model('user/user_model');
$user_details = $CI->user_model->getUserDetails($user_id);
$userData = !empty($user_details) ? $user_details[0] : array();

// Get user name and profile image
$userName = !empty($userData['full_name']) ? $userData['full_name'] : get_user_name();
$userProfileImage = base_url('assets/images/profile-image.jpg');
if (!empty($userData['profile_image']) && file_exists('./uploads/profile/' . $userData['profile_image'])) {
    $userProfileImage = base_url('uploads/profile/' . $userData['profile_image']);
} elseif ($this->session->userdata('user_profile_image') && file_exists('./uploads/profile/' . $this->session->userdata('user_profile_image'))) {
    $userProfileImage = base_url('uploads/profile/' . $this->session->userdata('user_profile_image'));
}

// Get current page title based on URL
$currentPath = $this->uri->segment(2);
$pageTitles = array(
    'home' => array('title' => 'Dashboard', 'subtitle' => 'Welcome to your dashboard'),
    'create_account' => array('title' => 'Create Account', 'subtitle' => 'Connect your trading account'),
    'start_trading' => array('title' => 'Start Trading', 'subtitle' => 'Connect your trading account'),
    'partner_program' => array('title' => 'Partner Program', 'subtitle' => 'Join our exclusive affiliate network'),
    'refer_friend' => array('title' => 'Refer Friend', 'subtitle' => 'Invite friends and earn rewards'),
    'profile_settings' => array('title' => 'Profile Settings', 'subtitle' => 'Manage your profile information'),
    'user_profile' => array('title' => 'Profile', 'subtitle' => 'View your profile'),
    'tnc' => array('title' => 'Terms & Conditions', 'subtitle' => 'Company Policy'),
    'user_tree' => array('title' => 'User Tree', 'subtitle' => 'View your referral tree'),
    'refer_earn' => array('title' => 'Refer & Earn', 'subtitle' => 'Refer friends and earn rewards'),
    'privacy' => array('title' => 'Privacy Policy', 'subtitle' => 'Privacy Policy'),
    'terms' => array('title' => 'Terms & Conditions', 'subtitle' => 'Terms & Conditions'),
    'thanks' => array('title' => 'Thank You', 'subtitle' => 'Application submitted'),
    'thanksforapplying' => array('title' => 'Thank You', 'subtitle' => 'Application submitted'),
    'payment_successful' => array('title' => 'Payment Successful', 'subtitle' => 'Transaction completed')
);
$currentPage = !empty($pageTitles[$currentPath]) ? $pageTitles[$currentPath] : array('title' => 'Dashboard', 'subtitle' => 'Welcome');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $currentPage['title']; ?> - Alpha Gold Trading</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">       
  <link rel="stylesheet" href="<?php echo base_url('assets/css/pages/profile.css');?>">   
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="<?php  echo base_url('assets/js/sidebar-navigation.js');?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <script src="<?php echo base_url('assets/js/sidebar-navigation.js');?>"></script>
  <script src="<?php echo base_url('assets/js/logout.js');?>"></script>
  <script src="<?php echo base_url('assets/js/mobile-navbar.js');?>"></script>
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar__header">
      <div class="logo">
        <img src="<?php  echo base_url('assets/icons/alpha-logo.svg');?>" alt="Alpha Gold Trading Logo" />
      </div>
    </div>
    
    <nav class="sidebar__nav">
      <ul class="nav-list">
        <li class="nav-item">
          <a href="<?php echo site_url('user/home');?>" class="nav-link">
            <span class="nav-link__icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="2" width="6" height="6" rx="1" stroke="currentColor" stroke-width="1.5"/>
                <rect x="12" y="2" width="6" height="6" rx="1" stroke="currentColor" stroke-width="1.5"/>
                <rect x="2" y="12" width="6" height="6" rx="1" stroke="currentColor" stroke-width="1.5"/>
                <rect x="12" y="12" width="6" height="6" rx="1" stroke="currentColor" stroke-width="1.5"/>
              </svg>
            </span>
            <span class="nav-link__text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('user/create_account');?>" class="nav-link">
            <span class="nav-link__icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.78013 11.5996C3.63301 11.6001 3.48876 11.5577 3.36414 11.4772C3.23953 11.3967 3.13967 11.2816 3.07616 11.145C3.01265 11.0085 2.98811 10.8562 3.00537 10.7059C3.02264 10.5556 3.08101 10.4135 3.1737 10.2959L10.8708 2.13805C10.9285 2.06949 11.0072 2.02316 11.0939 2.00667C11.1806 1.99017 11.2702 2.00449 11.3479 2.04727C11.4257 2.09006 11.487 2.15876 11.5218 2.24211C11.5566 2.32545 11.5628 2.41849 11.5394 2.50595L10.0466 7.3207C10.0026 7.44189 9.98785 7.57225 10.0036 7.7006C10.0193 7.82896 10.065 7.95148 10.1369 8.05765C10.2088 8.16382 10.3046 8.25047 10.4162 8.31017C10.5277 8.36987 10.6517 8.40084 10.7775 8.40042H16.2199C16.367 8.3999 16.5112 8.44234 16.6359 8.5228C16.7605 8.60327 16.8603 8.71845 16.9238 8.85497C16.9873 8.9915 17.0119 9.14375 16.9946 9.29406C16.9774 9.44436 16.919 9.58654 16.8263 9.70408L9.12922 17.862C9.07148 17.9305 8.9928 17.9768 8.9061 17.9933C8.81939 18.0098 8.72981 17.9955 8.65205 17.9527C8.5743 17.9099 8.513 17.8412 8.4782 17.7579C8.44341 17.6745 8.4372 17.5815 8.46058 17.494L9.95335 12.6793C9.99737 12.5581 10.0122 12.4278 9.99643 12.2994C9.98071 12.171 9.93496 12.0485 9.86309 11.9424C9.79123 11.8362 9.6954 11.7495 9.58383 11.6898C9.47226 11.6301 9.34828 11.5992 9.22252 11.5996H3.78013Z" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="nav-link__text">Activation</span>
            <span class="nav-link__arrow">
              <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46428 10.5925L3.75011 15.3067L2.57178 14.1283L6.69678 10.0033L2.57178 5.87835L3.75011 4.70001L8.46428 9.41418C8.6205 9.57045 8.70827 9.78238 8.70827 10.0033C8.70827 10.2243 8.6205 10.4362 8.46428 10.5925Z" fill="#CACACA"/>
              </svg>
            </span>
          </a>
          <ul class="nav-sub-list">
            <li class="nav-sub-item">
              <a href="<?php echo site_url('user/create_account');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_317_3451_dash)">
                      <g filter="url(#filter0_d_317_3451_dash)">
                        <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                        <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                      </g>
                    </g>
                    <defs>
                      <filter id="filter0_d_317_3451_dash" x="-1.25" y="-1.25" width="22.5" height="22.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="2.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.890196 0 0 0 0 0.717647 0 0 0 0 0.372549 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_317_3451"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_317_3451" result="shape"/>
                      </filter>
                      <clipPath id="clip0_317_3451_dash">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Create an Account</span>
              </a>
            </li>
            <li class="nav-sub-item">
              <a href="<?php echo site_url('user/start_trading');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                    <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Start Trading</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('user/partner_program');?>" class="nav-link">
            <span class="nav-link__icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.3332 17.5V15.8333C13.3332 14.9493 12.982 14.1014 12.3569 13.4763C11.7317 12.8512 10.8839 12.5 9.99984 12.5H4.99984C4.11578 12.5 3.26794 12.8512 2.64281 13.4763C2.01769 14.1014 1.6665 14.9493 1.6665 15.8333V17.5" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.3335 2.60666C14.0483 2.79197 14.6813 3.20938 15.1332 3.79338C15.5851 4.37738 15.8303 5.0949 15.8303 5.83333C15.8303 6.57175 15.5851 7.28927 15.1332 7.87327C14.6813 8.45727 14.0483 8.87468 13.3335 9.05999" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.3335 17.5V15.8333C18.3329 15.0948 18.0871 14.3773 17.6346 13.7936C17.1821 13.2099 16.5486 12.793 15.8335 12.6083" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.49984 9.16667C9.34079 9.16667 10.8332 7.67428 10.8332 5.83333C10.8332 3.99238 9.34079 2.5 7.49984 2.5C5.65889 2.5 4.1665 3.99238 4.1665 5.83333C4.1665 7.67428 5.65889 9.16667 7.49984 9.16667Z" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="nav-link__text">Partner Program</span>
            <span class="nav-link__arrow">
              <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46428 10.5925L3.75011 15.3067L2.57178 14.1283L6.69678 10.0033L2.57178 5.87835L3.75011 4.70001L8.46428 9.41418C8.6205 9.57045 8.70827 9.78238 8.70827 10.0033C8.70827 10.2243 8.6205 10.4362 8.46428 10.5925Z" fill="#CACACA"/>
              </svg>
            </span>
          </a>
          <ul class="nav-sub-list">
          <li class="nav-sub-item">
              <a href="<?php echo site_url('user/partner_program');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_317_3451_refer)">
                      <g filter="url(#filter0_d_317_3451_refer)">
                        <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                        <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                      </g>
                    </g>
                    <defs>
                      <filter id="filter0_d_317_3451_refer" x="-1.25" y="-1.25" width="22.5" height="22.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="2.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.890196 0 0 0 0 0.717647 0 0 0 0 0.372549 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_317_3451"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_317_3451" result="shape"/>
                      </filter>
                      <clipPath id="clip0_317_3451_refer">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Partner Program</span>
              </a>
            </li>
            <li class="nav-sub-item">
              <a href="<?php echo site_url('user/refer_friend');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_317_3451_refer)">
                      <g filter="url(#filter0_d_317_3451_refer)">
                        <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                        <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                      </g>
                    </g>
                    <defs>
                      <filter id="filter0_d_317_3451_refer" x="-1.25" y="-1.25" width="22.5" height="22.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="2.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.890196 0 0 0 0 0.717647 0 0 0 0 0.372549 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_317_3451"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_317_3451" result="shape"/>
                      </filter>
                      <clipPath id="clip0_317_3451_refer">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Refer Friend</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('user/profile_settings');?>" class="nav-link">
            <span class="nav-link__icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6668 10.8333C16.6668 15 13.7502 17.0833 10.2835 18.2917C10.102 18.3532 9.90478 18.3502 9.72516 18.2833C6.25016 17.0833 3.3335 15 3.3335 10.8333V5C3.3335 4.77898 3.42129 4.56702 3.57757 4.41074C3.73385 4.25446 3.94582 4.16666 4.16683 4.16666C5.8335 4.16666 7.91683 3.16666 9.36683 1.9C9.54338 1.74916 9.76796 1.66629 10.0002 1.66629C10.2324 1.66629 10.457 1.74916 10.6335 1.9C12.0918 3.175 14.1668 4.16666 15.8335 4.16666C16.0545 4.16666 16.2665 4.25446 16.4228 4.41074C16.579 4.56702 16.6668 4.77898 16.6668 5V10.8333Z" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.5 9.99998L9.16667 11.6666L12.5 8.33331" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="nav-link__text">Profile Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('user/tnc');?>" class="nav-link">
            <span class="nav-link__icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5002 1.66669H5.00016C4.55814 1.66669 4.13421 1.84228 3.82165 2.15484C3.50909 2.4674 3.3335 2.89133 3.3335 3.33335V16.6667C3.3335 17.1087 3.50909 17.5326 3.82165 17.8452C4.13421 18.1578 4.55814 18.3334 5.00016 18.3334H15.0002C15.4422 18.3334 15.8661 18.1578 16.1787 17.8452C16.4912 17.5326 16.6668 17.1087 16.6668 16.6667V5.83335L12.5002 1.66669Z" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.6665 1.66669V5.00002C11.6665 5.44205 11.8421 5.86597 12.1547 6.17853C12.4672 6.49109 12.8911 6.66669 13.3332 6.66669H16.6665" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.33317 7.5H6.6665" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.3332 10.8333H6.6665" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.3332 14.1667H6.6665" stroke="#CACACA" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="nav-link__text">Company Policy</span>
            <span class="nav-link__arrow">
              <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46428 10.5925L3.75011 15.3067L2.57178 14.1283L6.69678 10.0033L2.57178 5.87835L3.75011 4.70001L8.46428 9.41418C8.6205 9.57045 8.70827 9.78238 8.70827 10.0033C8.70827 10.2243 8.6205 10.4362 8.46428 10.5925Z" fill="#CACACA"/>
              </svg>
            </span>
          </a>
          <ul class="nav-sub-list">
            <li class="nav-sub-item">
              <a href="<?php echo site_url('user/tnc');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_317_3451_terms_prof)">
                      <g filter="url(#filter0_d_317_3451_terms_prof)">
                        <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                        <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                      </g>
                    </g>
                    <defs>
                      <filter id="filter0_d_317_3451_terms_prof" x="-1.25" y="-1.25" width="22.5" height="22.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="2.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.890196 0 0 0 0 0.717647 0 0 0 0 0.372549 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_317_3451"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_317_3451" result="shape"/>
                      </filter>
                      <clipPath id="clip0_317_3451_terms_prof">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Terms & Conditions</span>
              </a>
            </li>
            <li class="nav-sub-item">
              <a href="<?php echo site_url('user/privacy_policy');?>" class="nav-sub-link">
                <span class="nav-sub-link__icon">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_317_3451_privacy_prof)">
                      <g filter="url(#filter0_d_317_3451_privacy_prof)">
                        <path opacity="0.2" d="M16.25 10C16.25 11.2361 15.8834 12.4445 15.1967 13.4723C14.5099 14.5001 13.5338 15.3012 12.3918 15.7742C11.2497 16.2473 9.99307 16.3711 8.78069 16.1299C7.56831 15.8887 6.45466 15.2935 5.58058 14.4194C4.70651 13.5453 4.11125 12.4317 3.87009 11.2193C3.62894 10.0069 3.75271 8.75027 4.22576 7.60823C4.6988 6.46619 5.49988 5.49007 6.52769 4.80332C7.55549 4.11656 8.76387 3.75 10 3.75C11.6576 3.75 13.2473 4.40848 14.4194 5.58058C15.5915 6.75268 16.25 8.3424 16.25 10Z" fill="#CACACA"/>
                        <path d="M12.5 10C12.5 10.4945 12.3534 10.9778 12.0787 11.3889C11.804 11.8 11.4135 12.1205 10.9567 12.3097C10.4999 12.4989 9.99723 12.5484 9.51227 12.452C9.02732 12.3555 8.58187 12.1174 8.23223 11.7678C7.8826 11.4181 7.6445 10.9727 7.54804 10.4877C7.45157 10.0028 7.50108 9.50011 7.6903 9.04329C7.87952 8.58648 8.19995 8.19603 8.61108 7.92133C9.0222 7.64662 9.50555 7.5 10 7.5C10.663 7.5 11.2989 7.76339 11.7678 8.23223C12.2366 8.70107 12.5 9.33696 12.5 10Z" fill="#CACACA"/>
                      </g>
                    </g>
                    <defs>
                      <filter id="filter0_d_317_3451_privacy_prof" x="-1.25" y="-1.25" width="22.5" height="22.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="2.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.890196 0 0 0 0 0.717647 0 0 0 0 0.372549 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_317_3451"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_317_3451" result="shape"/>
                      </filter>
                      <clipPath id="clip0_317_3451_privacy_prof">
                        <rect width="20" height="20" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <span class="nav-sub-link__text">Privacy Policy</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    
    <button class="sidebar__toggle" aria-label="Toggle sidebar">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.5 15L7.5 10L12.5 5" stroke="#E0A130" stroke-width="1.66587" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </aside>

  <!-- Navbar -->
  <header class="navbar">
    <div class="navbar__title">
      <h1 class="navbar__heading"><?php echo htmlspecialchars($currentPage['title']); ?></h1>
      <p class="navbar__subtitle"><?php echo htmlspecialchars($currentPage['subtitle']); ?></p>
    </div>
    
    <div class="navbar__user">
      <div class="user-profile">
        <div class="user-profile__info">
          <div class="user-profile__name"><?php echo htmlspecialchars($userName); ?></div>
          <div class="user-profile__badge">Pro Account</div>
        </div>
        <div class="user-profile__avatar">
          <img src="<?php echo $userProfileImage;?>" alt="<?php echo htmlspecialchars($userName); ?>" />
        </div>
      </div>
      
      <div class="navbar__separator"></div>
      
      <a href="<?php echo site_url('auth/logout');?>" class="btn-logout">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.1345 10.0177H8.72863M8.72863 10.0177C8.72863 10.3777 10.0897 11.5884 10.0897 11.5884M8.72863 10.0177C8.72863 9.64758 10.0897 8.46084 10.0897 8.46084M6.8181 7.47053V12.5232M16 10C16 7.17179 16 5.75705 15.1215 4.87853C14.2429 4 12.8288 4 10 4C7.17179 4 5.75705 4 4.87853 4.87853C4 5.75705 4 7.17116 4 10C4 12.8282 4 14.2429 4.87853 15.1215C5.75705 16 7.17116 16 10 16C12.8282 16 14.2429 16 15.1215 15.1215C16 14.2429 16 12.8288 16 10Z" stroke="#FF3B30" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Logout</span>
      </a>
    </div>
  </header>