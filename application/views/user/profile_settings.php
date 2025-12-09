<?php 
$this->load->view('user/common/header'); 
$userData = !empty($recById) ? $recById[0] : array();
// Check for profile image - first from database, then from session, then default
$profileImage = base_url('assets/images/profile-image.jpg');
if (!empty($userData['profile_image']) && file_exists('./uploads/profile/' . $userData['profile_image'])) {
    $profileImage = base_url('uploads/profile/' . $userData['profile_image']);
} elseif ($this->session->userdata('user_profile_image') && file_exists('./uploads/profile/' . $this->session->userdata('user_profile_image'))) {
    $profileImage = base_url('uploads/profile/' . $this->session->userdata('user_profile_image'));
}
$fullName = !empty($userData['full_name']) ? $userData['full_name'] : '';
$username = !empty($userData['username']) ? $userData['username'] : '';
$email = !empty($userData['email']) ? $userData['email'] : '';
$mobile = !empty($userData['mobile']) ? $userData['mobile'] : '';
$address = !empty($userData['address']) ? $userData['address'] : '';
$dob = !empty($userData['dob']) ? $userData['dob'] : '';
$genderId = !empty($userData['gender_id']) ? $userData['gender_id'] : '';
$countryId = !empty($userData['country_id']) ? $userData['country_id'] : '';

// Get gender name
$genderName = '';
if (!empty($gendersRec) && $genderId > 0) {
    foreach ($gendersRec as $gnd) {
        if ($gnd['id'] == $genderId) {
            $genderName = $gnd['gender_name'];
            break;
        }
    }
}

// Get country name
$countryName = '';
if (!empty($countriesRec) && $countryId > 0) {
    foreach ($countriesRec as $cnt) {
        if ($cnt['id'] == $countryId) {
            $countryName = $cnt['country_name'];
            break;
        }
    }
}

// Format DOB
$dobFormatted = '';
if (!empty($dob) && $dob != '0000-00-00') {
    $dobFormatted = date('M d, Y', strtotime($dob));
    $dobInput = date('Y-m-d', strtotime($dob));
} else {
    $dobInput = '';
}
?>
  <!-- Main Content -->
  <main class="container">
    <!-- Profile View Card -->
    <div class="profile-card" id="profileView">
      <div class="profile-header">
        <div class="profile-avatar-wrapper">
          <img src="<?php echo $profileImage;?>" 
               alt="Profile Picture" 
               class="profile-avatar"
               id="profileAvatarView">
        </div>
        <div class="profile-info">
          <h1 class="profile-name"><?php echo htmlspecialchars($fullName);?></h1>
          <p class="profile-username"><?php echo htmlspecialchars($username);?></p>
        </div>
        <button class="btn-edit-profile" onclick="toggleEditMode()">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
          </svg>
          Edit Profile
        </button>
      </div>

      <div class="profile-section">
        <h3 class="section-label">Contact Information:</h3>
        <div class="info-grid contact-grid">
          <div class="info-item">
            <svg class="info-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H22C25.3137 0 28 2.68629 28 6V22C28 25.3137 25.3137 28 22 28H6C2.68629 28 0 25.3137 0 22V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <path d="M8 12.038V17C8 17.5304 8.21071 18.0391 8.58579 18.4142C8.96086 18.7893 9.46957 19 10 19H18C18.5304 19 19.0391 18.7893 19.4142 18.4142C19.7893 18.0391 20 17.5304 20 17V11C20 10.4696 19.7893 9.96086 19.4142 9.58579C19.0391 9.21071 18.5304 9 18 9H10C9.46957 9 8.96086 9.21071 8.58579 9.58579C8.21071 9.96086 8 10.4696 8 11V12.038ZM10 10H18C18.2652 10 18.5196 10.1054 18.7071 10.2929C18.8946 10.4804 19 10.7348 19 11V11.74L14 14.432L9 11.74V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM9 12.876L13.763 15.44C13.8358 15.4792 13.9173 15.4997 14 15.4997C14.0827 15.4997 14.1642 15.4792 14.237 15.44L19 12.876V17C19 17.2652 18.8946 17.5196 18.7071 17.7071C18.5196 17.8946 18.2652 18 18 18H10C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V12.876Z" fill="white"/>
            </svg>
            <span><?php echo htmlspecialchars($email);?></span>
          </div>
          <div class="info-item">
            <svg class="info-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H22C25.3137 0 28 2.68629 28 6V22C28 25.3137 25.3137 28 22 28H6C2.68629 28 0 25.3137 0 22V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82234 7.36199C10.6337 6.55533 11.9697 6.69866 12.649 7.60666L13.4903 8.72933C14.0437 9.46799 13.9943 10.5 13.3377 11.1527L13.179 11.3113C13.161 11.3779 13.1592 11.4479 13.1737 11.5153C13.2157 11.7873 13.443 12.3633 14.395 13.31C15.347 14.2567 15.927 14.4833 16.203 14.526C16.2726 14.54 16.3444 14.5379 16.413 14.52L16.685 14.2493C17.269 13.6693 18.165 13.5607 18.8877 13.9533L20.161 14.6467C21.2523 15.2387 21.5277 16.7213 20.6343 17.61L19.687 18.5513C19.3883 18.848 18.987 19.0953 18.4977 19.1413C17.291 19.254 14.4797 19.11 11.5243 16.172C8.76634 13.4293 8.23701 11.0373 8.16968 9.85866C8.13634 9.26266 8.41768 8.75866 8.77634 8.40266L9.82234 7.36199ZM11.849 8.20599C11.511 7.75466 10.8817 7.71866 10.527 8.07133L9.48034 9.11133C9.26034 9.32999 9.15501 9.57133 9.16834 9.80199C9.22168 10.7387 9.64834 12.8967 12.2297 15.4633C14.9377 18.1553 17.4383 18.236 18.405 18.1453C18.6023 18.1273 18.7983 18.0247 18.9817 17.8427L19.9283 16.9007C20.3137 16.518 20.229 15.8207 19.6837 15.5247L18.4103 14.832C18.0583 14.6413 17.6463 14.704 17.3903 14.9587L17.087 15.2607L16.7337 14.906C17.087 15.2607 17.0863 15.2613 17.0857 15.2613L17.085 15.2627L17.083 15.2647L17.0783 15.2687L17.0683 15.278C17.0402 15.3041 17.0099 15.3278 16.9777 15.3487C16.9243 15.384 16.8537 15.4233 16.765 15.456C16.585 15.5233 16.3463 15.5593 16.0517 15.514C15.4737 15.4253 14.7077 15.0313 13.6897 14.0193C12.6723 13.0073 12.275 12.246 12.1857 11.6687C12.1397 11.374 12.1763 11.1353 12.2443 10.9553C12.2818 10.854 12.3354 10.7595 12.403 10.6753L12.4243 10.652L12.4337 10.642L12.4377 10.638L12.4397 10.636L12.441 10.6347L12.633 10.444C12.9183 10.1593 12.9583 9.68799 12.6897 9.32866L11.849 8.20599Z" fill="white"/>
            </svg>
            <span><?php echo htmlspecialchars($mobile);?></span>
          </div>
          <div class="info-item">
            <svg class="info-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H22C25.3137 0 28 2.68629 28 6V22C28 25.3137 25.3137 28 22 28H6C2.68629 28 0 25.3137 0 22V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <path d="M9.89576 9.04532C10.9876 7.97231 12.4591 7.374 13.99 7.38064C15.5209 7.38728 16.9871 7.99832 18.0697 9.08076C19.1522 10.1632 19.7633 11.6294 19.7701 13.1603C19.7769 14.6911 19.1787 16.1627 18.1058 17.2547L17.3138 18.0373C16.7306 18.6098 15.9738 19.346 15.0431 20.246C14.7633 20.5164 14.3894 20.6674 14.0003 20.6673C13.6112 20.6672 13.2374 20.5159 12.9578 20.2453L10.6304 17.9813C10.338 17.6942 10.0931 17.452 9.89576 17.2547C8.80757 16.1658 8.19629 14.6894 8.19629 13.15C8.19629 11.6106 8.80757 10.1342 9.89576 9.04532ZM17.3978 9.75332C16.9527 9.30217 16.4228 8.94352 15.8386 8.69801C15.2544 8.45251 14.6273 8.325 13.9936 8.32284C13.3599 8.32068 12.732 8.4439 12.1462 8.68542C11.5603 8.92693 11.0279 9.28196 10.5798 9.73007C10.1317 10.1782 9.7767 10.7105 9.53518 11.2964C9.29367 11.8823 9.17045 12.5102 9.17261 13.1439C9.17477 13.7776 9.30227 14.4046 9.54778 14.9888C9.79328 15.5731 10.1519 16.103 10.6031 16.548L11.5944 17.526C12.2787 18.1946 12.965 18.8613 13.6531 19.526C13.7463 19.6162 13.871 19.6666 14.0008 19.6666C14.1305 19.6666 14.2552 19.6162 14.3484 19.526L16.6111 17.326C16.9244 17.0193 17.1866 16.76 17.3978 16.548C18.2988 15.6469 18.8049 14.4249 18.8049 13.1507C18.8049 11.8764 18.2988 10.6544 17.3978 9.75332ZM14.0011 11C14.3076 11.0001 14.611 11.0605 14.8941 11.1779C15.1772 11.2952 15.4344 11.4672 15.651 11.684C15.8677 11.9007 16.0395 12.158 16.1567 12.4412C16.2739 12.7244 16.3342 13.0279 16.3341 13.3343C16.334 13.6408 16.2736 13.9442 16.1562 14.2273C16.0388 14.5104 15.8669 14.7676 15.6501 14.9843C15.4333 15.2009 15.176 15.3727 14.8929 15.4899C14.6097 15.6071 14.3062 15.6674 13.9998 15.6673C13.3808 15.6671 12.7873 15.4211 12.3498 14.9833C11.9123 14.5456 11.6666 13.9519 11.6668 13.333C11.6669 12.7141 11.913 12.1206 12.3507 11.683C12.7885 11.2455 13.3822 10.9998 14.0011 11ZM14.0004 12C13.6468 12 13.3077 12.1405 13.0576 12.3905C12.8076 12.6406 12.6671 12.9797 12.6671 13.3333C12.6671 13.6869 12.8076 14.0261 13.0576 14.2761C13.3077 14.5262 13.6468 14.6667 14.0004 14.6667C14.354 14.6667 14.6932 14.5262 14.9432 14.2761C15.1933 14.0261 15.3338 13.6869 15.3338 13.3333C15.3338 12.9797 15.1933 12.6406 14.9432 12.3905C14.6932 12.1405 14.354 12 14.0004 12Z" fill="white"/>
            </svg>
            <span><?php echo htmlspecialchars($countryName);?></span>
          </div>
        </div>
      </div>

      <div class="profile-section">
        <h3 class="section-label">Other Information:</h3>
        <div class="info-grid other-grid">
          <div class="info-item">
              <svg class="info-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H26C29.3137 0 32 2.68629 32 6V26C32 29.3137 29.3137 32 26 32H6C2.68629 32 0 29.3137 0 26V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <path d="M23 23V24H8V23H9V18.5C9 18.1562 9.0651 17.8333 9.19531 17.5312C9.32552 17.2292 9.5026 16.9661 9.72656 16.7422C9.95052 16.5182 10.2161 16.3385 10.5234 16.2031C10.8307 16.0677 11.1562 16 11.5 16H15V13.25C15 13.2031 15.0182 13.1641 15.0547 13.1328C15.0911 13.1016 15.138 13.0755 15.1953 13.0547C15.2526 13.0339 15.3099 13.0208 15.3672 13.0156C15.4245 13.0104 15.4688 13.0052 15.5 13C15.5312 13 15.5755 13.0026 15.6328 13.0078C15.6901 13.013 15.7448 13.026 15.7969 13.0469C15.849 13.0677 15.8958 13.0938 15.9375 13.125C15.9792 13.1562 16 13.1979 16 13.25V16H19.5C19.8438 16 20.1667 16.0651 20.4688 16.1953C20.7708 16.3255 21.0339 16.5052 21.2578 16.7344C21.4818 16.9635 21.6615 17.2292 21.7969 17.5312C21.9323 17.8333 22 18.1562 22 18.5V23H23ZM11.5 17C11.3073 17 11.125 17.0339 10.9531 17.1016C10.7812 17.1693 10.6302 17.263 10.5 17.3828C10.3698 17.5026 10.2604 17.6432 10.1719 17.8047C10.0833 17.9661 10.0286 18.1432 10.0078 18.3359C10.2005 18.5495 10.4245 18.7135 10.6797 18.8281C10.9349 18.9427 11.2083 19 11.5 19C11.8438 19 12.1406 18.9323 12.3906 18.7969C12.6406 18.6615 12.8776 18.4635 13.1016 18.2031C13.1589 18.1406 13.2161 18.0911 13.2734 18.0547C13.3307 18.0182 13.4062 18 13.5 18C13.5885 18 13.6615 18.0182 13.7188 18.0547C13.776 18.0911 13.8359 18.1406 13.8984 18.2031C14.1172 18.4583 14.3516 18.6536 14.6016 18.7891C14.8516 18.9245 15.151 18.9948 15.5 19C15.8438 19 16.1406 18.9323 16.3906 18.7969C16.6406 18.6615 16.8776 18.4635 17.1016 18.2031C17.1589 18.1406 17.2161 18.0911 17.2734 18.0547C17.3307 18.0182 17.4062 18 17.5 18C17.5885 18 17.6615 18.0182 17.7188 18.0547C17.776 18.0911 17.8359 18.1406 17.8984 18.2031C18.1172 18.4583 18.3516 18.6536 18.6016 18.7891C18.8516 18.9245 19.151 18.9948 19.5 19C19.7865 19 20.0573 18.9427 20.3125 18.8281C20.5677 18.7135 20.7943 18.5495 20.9922 18.3359C20.9714 18.1484 20.9193 17.974 20.8359 17.8125C20.7526 17.651 20.6432 17.5078 20.5078 17.3828C20.3724 17.2578 20.2188 17.1641 20.0469 17.1016C19.875 17.0391 19.6927 17.0052 19.5 17H11.5ZM10 23H21V19.6016C20.75 19.7266 20.5078 19.8229 20.2734 19.8906C20.0391 19.9583 19.7812 19.9948 19.5 20C19.125 20 18.7682 19.9375 18.4297 19.8125C18.0911 19.6875 17.7812 19.4974 17.5 19.2422C17.2188 19.4922 16.9089 19.6797 16.5703 19.8047C16.2318 19.9297 15.875 19.9948 15.5 20C15.125 20 14.7682 19.9375 14.4297 19.8125C14.0911 19.6875 13.7812 19.4974 13.5 19.2422C13.2188 19.4922 12.9089 19.6797 12.5703 19.8047C12.2318 19.9297 11.875 19.9948 11.5 20C11.2188 20 10.9609 19.9661 10.7266 19.8984C10.4922 19.8307 10.25 19.7318 10 19.6016V23ZM15.5 12C15.3646 12 15.2474 11.9505 15.1484 11.8516C15.0495 11.7526 15 11.6354 15 11.5C15 11.4375 15.0208 11.3568 15.0625 11.2578C15.1042 11.1589 15.151 11.0547 15.2031 10.9453C15.2552 10.8359 15.3099 10.7318 15.3672 10.6328C15.4245 10.5339 15.4688 10.4557 15.5 10.3984C15.5312 10.4557 15.5729 10.5339 15.625 10.6328C15.6771 10.7318 15.7318 10.8359 15.7891 10.9453C15.8464 11.0547 15.8958 11.1589 15.9375 11.2578C15.9792 11.3568 16 11.4375 16 11.5C16 11.6354 15.9505 11.7526 15.8516 11.8516C15.7526 11.9505 15.6354 12 15.5 12Z" fill="white"/>
            </svg>
            
            <div class="info-stacked">
              <span class="info-label">DOB</span>
              <span class="info-value"><?php echo $dobFormatted ? $dobFormatted : 'Not set';?></span>
            </div>
          </div>
          <div class="info-item">
          <svg class="info-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H26C29.3137 0 32 2.68629 32 6V26C32 29.3137 29.3137 32 26 32H6C2.68629 32 0 29.3137 0 26V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <path d="M20.667 21.8333C20.8438 21.8333 21.0134 21.7631 21.1384 21.6381C21.2634 21.513 21.3337 21.3435 21.3337 21.1667V20.336C21.3363 18.4653 18.6843 17 16.0003 17C13.3163 17 10.667 18.4653 10.667 20.336V21.1667C10.667 21.3435 10.7372 21.513 10.8623 21.6381C10.9873 21.7631 11.1568 21.8333 11.3337 21.8333H20.667ZM18.403 12.5693C18.403 12.8848 18.3408 13.1973 18.2201 13.4888C18.0994 13.7803 17.9224 14.0452 17.6993 14.2683C17.4762 14.4914 17.2113 14.6684 16.9198 14.7891C16.6283 14.9098 16.3158 14.972 16.0003 14.972C15.6848 14.972 15.3724 14.9098 15.0809 14.7891C14.7894 14.6684 14.5245 14.4914 14.3014 14.2683C14.0783 14.0452 13.9013 13.7803 13.7806 13.4888C13.6598 13.1973 13.5977 12.8848 13.5977 12.5693C13.5977 11.9321 13.8508 11.321 14.3014 10.8704C14.752 10.4198 15.3631 10.1667 16.0003 10.1667C16.6376 10.1667 17.2487 10.4198 17.6993 10.8704C18.1499 11.321 18.403 11.9321 18.403 12.5693Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          
            <div class="info-stacked">
              <span class="info-label">Gender</span>
              <span class="info-value"><?php echo htmlspecialchars($genderName);?></span>
            </div>
          </div>
          <div class="info-item">
          <svg class="info-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 6C0 2.68629 2.68629 0 6 0H26C29.3137 0 32 2.68629 32 6V26C32 29.3137 29.3137 32 26 32H6C2.68629 32 0 29.3137 0 26V6Z" fill="#E0A130" fill-opacity="0.1"/>
              <g clip-path="url(#clip0_335_6690)">
                <path d="M23.8392 12.132L21.9392 10.668C21.8101 10.5851 21.6697 10.5213 21.5224 10.4784C21.3758 10.4305 21.223 10.4041 21.0688 10.4H15.6L16.2408 14.4H21.0688C21.2 14.4 21.364 14.3704 21.5216 14.3216C21.6792 14.2728 21.8312 14.2056 21.9384 14.1328L23.8384 12.6672C23.9464 12.5944 24 12.4976 24 12.4C24 12.3024 23.9464 12.2056 23.8392 12.132ZM14.8 8.79999H14C13.8939 8.79999 13.7922 8.84213 13.7172 8.91715C13.6421 8.99216 13.6 9.0939 13.6 9.19999V12H10.9312C10.7984 12 10.6352 12.0296 10.4776 12.0792C10.3192 12.1272 10.168 12.1936 10.0608 12.268L8.1608 13.732C8.0528 13.8048 8 13.9024 8 14C8 14.0968 8.0528 14.1936 8.1608 14.268L10.0608 15.7336C10.168 15.8064 10.3192 15.8736 10.4776 15.9216C10.6352 15.9704 10.7984 16 10.9312 16H13.6V22.8C13.6 22.9061 13.6421 23.0078 13.7172 23.0828C13.7922 23.1578 13.8939 23.2 14 23.2H14.8C14.9061 23.2 15.0078 23.1578 15.0828 23.0828C15.1579 23.0078 15.2 22.9061 15.2 22.8V9.19999C15.2 9.0939 15.1579 8.99216 15.0828 8.91715C15.0078 8.84213 14.9061 8.79999 14.8 8.79999Z" fill="white"/>
              </g>
              <defs>
                <clipPath id="clip0_335_6690">
                  <rect width="16" height="16" fill="white" transform="translate(8 8)"/>
                </clipPath>
              </defs>
            </svg>
            <div class="info-stacked">
              <span class="info-label">Full Address</span>
              <span class="info-value"><?php echo htmlspecialchars($address);?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile Edit Card -->
    <div class="profile-card edit-card hidden" id="profileEdit">
      <div class="edit-header">
        <div class="profile-avatar-wrapper">
            <img src="<?php echo $profileImage;?>" 
               alt="Profile Picture" 
               class="profile-avatar"
               id="profileAvatarEdit">
        </div>
        <button type="button" class="btn-upload" onclick="document.getElementById('profileImageInput').click();">Upload Profile Picture</button>
      </div>

      <form class="edit-form" id="profileSettingsForm" method="POST" action="<?php echo site_url('user/save_profile_settings');?>" enctype="multipart/form-data">
        <input type="file" name="profileImageInput" id="profileImageInput" accept="image/*" style="display: none;">
        <div class="form-row three-col">
          <div class="form-group">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-input" name="full_name" id="full_name" value="<?php echo htmlspecialchars($fullName);?>" required>
            <span class="error-message" id="error_full_name"></span>
          </div>
          <div class="form-group">
            <label class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-input" name="username" id="username" value="<?php echo htmlspecialchars($username);?>" required>
            <span class="error-message" id="error_username"></span>
          </div>
          <div class="form-group">
            <label class="form-label">Email Address</label>
            <div class="input-with-icon">
              <input type="email" class="form-input disabled" value="<?php echo htmlspecialchars($email);?>" disabled>
              <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
            </div>
          </div>
        </div>

        <div class="form-row two-col">
          <div class="form-group">
            <label class="form-label">Gender</label>
            <div class="select-wrapper">
              <select class="form-select" name="gender" id="gender">
                <option value="">Select Gender</option>
                <?php if (!empty($gendersRec)) {
                    foreach ($gendersRec as $gnd) {
                        $selected = ($gnd['id'] == $genderId) ? 'selected' : '';
                        echo '<option value="' . base64e($gnd['id']) . '" ' . $selected . '>' . htmlspecialchars($gnd['gender_name']) . '</option>';
                    }
                } ?>
              </select>
              <svg class="select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"/>
              </svg>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Date of Birth</label>
            <div class="date-input-wrapper">
              <input type="date" class="form-input date-input" name="dob" id="dob" value="<?php echo $dobInput;?>">
            </div>
          </div>
        </div>

        <div class="form-row two-col">
          <div class="form-group">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-input" name="mobile" id="mobile" value="<?php echo htmlspecialchars($mobile);?>" maxlength="15">
            <span class="error-message" id="error_mobile"></span>
          </div>
          <div class="form-group">
            <label class="form-label">Country</label>
            <div class="select-wrapper">
              <select class="form-select" name="country" id="country">
                <option value="">Select Country</option>
                <?php if (!empty($countriesRec)) {
                    foreach ($countriesRec as $cnt) {
                        $selected = ($cnt['id'] == $countryId) ? 'selected' : '';
                        echo '<option value="' . base64e($cnt['id']) . '" ' . $selected . '>' . htmlspecialchars($cnt['country_name']) . '</option>';
                    }
                } ?>
              </select>
              <svg class="select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"/>
              </svg>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group full-width">
            <label class="form-label">Full Address</label>
            <textarea class="form-input" name="address" id="address" rows="3"><?php echo htmlspecialchars($address);?></textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="button" class="btn-cancel" onclick="toggleEditMode()">Cancel</button>
          <button type="submit" class="btn-save" id="submitBtn">
            <span id="submitBtnText">Save Changes</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </main>

  <style>
    .error-message {
      color: #ff3b30;
      font-size: 12px;
      margin-top: 4px;
      display: block;
    }
    .form-input.error,
    .form-select.error {
      border-color: #ff3b30;
    }
    .text-danger {
      color: #ff3b30;
    }
    #submitBtn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
  <script>
    function toggleEditMode() {
      const viewCard = document.getElementById('profileView');
      const editCard = document.getElementById('profileEdit');
      viewCard.classList.toggle('hidden');
      editCard.classList.toggle('hidden');
      
      // Reset form errors when toggling
      document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    }

    // Image upload preview
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        if (file.type.match('image.*')) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('profileAvatarEdit').src = e.target.result;
            document.getElementById('profileAvatarView').src = e.target.result;
          };
          reader.readAsDataURL(file);
        } else {
          alert('Please select a valid image file.');
          e.target.value = '';
        }
      }
    });

    // Form submission with AJAX
    $('#profileSettingsForm').submit(function(e) {
      e.preventDefault();
      
      const form = $(this);
      const formData = new FormData(this);
      const submitBtn = $('#submitBtn');
      const submitBtnText = $('#submitBtnText');
      
      // Clear previous errors
      $('.error-message').text('');
      $('.form-input, .form-select').removeClass('error');
      
      // Disable submit button
      submitBtn.prop('disabled', true);
      submitBtnText.text('Saving...');
      
      $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'text',
        success: function(data) {
          try {
            var response = typeof data === 'string' ? JSON.parse(data) : data;
            
            if (response.status === 'success') {
              toastmessagesuccess(response.msg, 'Success', 'success', response.url);
            } else {
              toastmessage(response.msg, 'Error', 'error');
              // Show validation errors if any
              if (response.errors) {
                $.each(response.errors, function(key, value) {
                  $('#error_' + key).text(value);
                  $('#' + key).addClass('error');
                });
              }
            }
          } catch (e) {
            console.error('Error parsing response:', e);
            toastmessage('An error occurred. Please try again.', 'Error', 'error');
          }
        },
        error: function(xhr, status, error) {
          toastmessage('Something went wrong. Please try again.', 'Error', 'error');
        },
        complete: function() {
          submitBtn.prop('disabled', false);
          submitBtnText.text('Save Changes');
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
        hideAfter: 3000,
        stack: false,
        position: 'bottom-left',
        textAlign: 'left',
        loader: true,
        loaderBg: '#9EC600',
        afterHidden: function() {
          if (url) {
            window.location.href = url;
          } else {
            location.reload();
          }
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
        loaderBg: '#9EC600'
      });
    }
  </script>

<?php $this->load->view('user/common/footer'); ?>
