<?php $this->load->view('user/common/header'); ?>
<main class="partner-program">
  <div class="partner-program__container">
    <!-- Affiliate Program Card -->
    <div class="affiliate-card">
      <div class="affiliate-card__content">
        <div class="affiliate-card__left">
          <div class="affiliate-card__icon">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26.6663 34.9996V31.6662C26.6663 29.8981 25.964 28.2024 24.7137 26.9522C23.4635 25.702 21.7678 24.9996 19.9997 24.9996H9.99967C8.23156 24.9996 6.53587 25.702 5.28563 26.9522C4.03539 28.2024 3.33301 29.8981 3.33301 31.6662V34.9996" stroke="#E0A130" stroke-width="3.33328" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M26.666 5.21326C28.0956 5.58387 29.3617 6.4187 30.2655 7.58669C31.1693 8.75469 31.6597 10.1897 31.6597 11.6666C31.6597 13.1434 31.1693 14.5785 30.2655 15.7465C29.3617 16.9145 28.0956 17.7493 26.666 18.1199" stroke="#E0A130" stroke-width="3.33328" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M36.666 34.9996V31.6662C36.6649 30.1891 36.1733 28.7542 35.2683 27.5868C34.3633 26.4193 33.0962 25.5855 31.666 25.2162" stroke="#E0A130" stroke-width="3.33328" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14.9997 18.3333C18.6816 18.3333 21.6663 15.3486 21.6663 11.6667C21.6663 7.98477 18.6816 5 14.9997 5C11.3178 5 8.33301 7.98477 8.33301 11.6667C8.33301 15.3486 11.3178 18.3333 14.9997 18.3333Z" stroke="#E0A130" stroke-width="3.33328" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="affiliate-card__text">
            <?php 
            $isApproved = false;
            $affiliateHeading = 'Join our Affiliate Program!';
            $affiliateDescription = 'Unlock exclusive rewards, earn commissions, and grow your network with AlphaGold.';
            
            if(!empty($refData)){
              $status = $refData[0]['status'];
              if($status == 1){
                $isApproved = true;
                $affiliateHeading = 'Affiliate Program';
                $affiliateDescription = 'Get exclusive rewards, earn commissions, and grow your network with Alpha Gold.';
              }
            }
            ?>
            <h3 class="affiliate-card__heading" id="affiliate-heading"><?php echo $affiliateHeading; ?></h3>
            <p class="affiliate-card__description" id="affiliate-description"><?php echo $affiliateDescription; ?></p>
          </div>
          <?php if(empty($refData)){ ?>
          <a href="<?php echo site_url('user/apply_refferal');?>" class="affiliate-card__button" id="submit-request-btn">
            <span id="button-text">Submit Request</span>
            <svg id="button-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <?php } elseif($isApproved) { ?>
          <button class="affiliate-card__button" id="application-approved-btn" disabled style="cursor: not-allowed; opacity: 0.8;">
            <span id="button-text">Application Approved</span>
            <svg id="button-icon" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4384 0.561423L6.95041 9.04942L3.41441 5.51342C3.03912 5.13841 2.53024 4.92783 1.9997 4.92802C1.46916 4.92821 0.960422 5.13914 0.585405 5.51442C0.210389 5.88971 -0.000187411 6.39859 1.25155e-07 6.92913C0.000187662 7.45967 0.211124 7.96841 0.586405 8.34342L5.39441 13.1514C5.59871 13.3558 5.84128 13.518 6.10826 13.6286C6.37525 13.7392 6.66141 13.7962 6.95041 13.7962C7.2394 13.7962 7.52556 13.7392 7.79255 13.6286C8.05953 13.518 8.3021 13.3558 8.5064 13.1514L18.2664 3.38942C18.6307 3.01222 18.8323 2.50701 18.8278 1.98262C18.8232 1.45823 18.6129 0.956602 18.242 0.585786C17.8712 0.21497 17.3696 0.00463244 16.8452 7.56053e-05C16.3208 -0.00448123 15.8156 0.197107 15.4384 0.561423Z" fill="#00FF9C"/>
            </svg>
          </button>
          <?php } ?>
        </div>
      </div>
      <div class="affiliate-card__bg">
        <img src="<?php echo base_url('assets/images/partner-program-bg.svg');?>" alt="Background decoration" />
      </div>
    </div>

    <!-- Referral Code Card -->
    <div class="referral-card">
      <div class="referral-card__content">
        <div class="referral-card__icon" id="referral-icon">
          <?php if($isApproved){ ?>
          <!-- Checkmark icon for approved state -->
          <svg width="48" height="48" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M18.1426 1.16973C18.8506 0.462678 19.7979 0.0466376 20.7975 0.00368951C21.7972 -0.0392586 22.7766 0.294005 23.5426 0.937731L23.7986 1.17173L27.5986 4.96973H32.9706C33.9795 4.96992 34.9509 5.35127 35.6905 6.0374C36.43 6.72354 36.883 7.66376 36.9586 8.66973L36.9706 8.96973V14.3417L40.7706 18.1417C41.4783 18.8498 41.8946 19.7975 41.9376 20.7976C41.9806 21.7977 41.6469 22.7776 41.0026 23.5437L40.7686 23.7977L36.9686 27.5977V32.9697C36.969 33.9789 36.5878 34.9509 35.9016 35.6908C35.2155 36.4308 34.275 36.884 33.2686 36.9597L32.9706 36.9697H27.6006L23.8006 40.7697C23.0926 41.4773 22.1449 41.8937 21.1448 41.9367C20.1447 41.9796 19.1648 41.646 18.3986 41.0017L18.1446 40.7697L14.3446 36.9697H8.97064C7.96149 36.9701 6.98951 36.5889 6.24955 35.9027C5.50958 35.2166 5.05633 34.276 4.98064 33.2697L4.97064 32.9697V27.5977L1.17064 23.7977C0.463032 23.0897 0.0466391 22.142 0.00368679 21.1419C-0.0392655 20.1417 0.294346 19.1619 0.938644 18.3957L1.17064 18.1417L4.97064 14.3417V8.96973C4.97083 7.96092 5.35219 6.98944 6.03832 6.2499C6.72445 5.51036 7.66468 5.05739 8.67064 4.98173L8.97064 4.96973H14.3426L18.1426 1.16973Z" fill="#00FF9C"/>
            <g transform="translate(11.5, 14)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4384 0.561423L6.95041 9.04942L3.41441 5.51342C3.03912 5.13841 2.53024 4.92783 1.9997 4.92802C1.46916 4.92821 0.960422 5.13914 0.585405 5.51442C0.210389 5.88971 -0.000187411 6.39859 1.25155e-07 6.92913C0.000187662 7.45967 0.211124 7.96841 0.586405 8.34342L5.39441 13.1514C5.59871 13.3558 5.84128 13.518 6.10826 13.6286C6.37525 13.7392 6.66141 13.7962 6.95041 13.7962C7.2394 13.7962 7.52556 13.7392 7.79255 13.6286C8.05953 13.518 8.3021 13.3558 8.5064 13.1514L18.2664 3.38942C18.6307 3.01222 18.8323 2.50701 18.8278 1.98262C18.8232 1.45823 18.6129 0.956602 18.242 0.585786C17.8712 0.21497 17.3696 0.00463244 16.8452 7.56053e-05C16.3208 -0.00448123 15.8156 0.197107 15.4384 0.561423Z" fill="#00FF9C"/>
            </g>
          </svg>
          <?php } else { ?>
          <!-- Lock icon for pending state -->
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="path-1-inside-1_322_2772" fill="white">
              <path d="M0 10C0 4.47715 4.47715 0 10 0H38C43.5229 0 48 4.47715 48 10V38C48 43.5229 43.5228 48 38 48H10C4.47715 48 0 43.5228 0 38V10Z"/>
            </mask>
            <path d="M0 10C0 4.47715 4.47715 0 10 0H38C43.5229 0 48 4.47715 48 10V38C48 43.5229 43.5228 48 38 48H10C4.47715 48 0 43.5228 0 38V10Z" fill="#1E2939" fill-opacity="0.5"/>
            <path d="M10 0V1.18025H38V0V-1.18025H10V0ZM48 10H46.8198V38H48H49.1802V10H48ZM38 48V46.8198H10V48V49.1802H38V48ZM0 38H1.18025V10H0H-1.18025V38H0ZM10 48V46.8198C5.12899 46.8198 1.18025 42.871 1.18025 38H0H-1.18025C-1.18025 44.1747 3.82532 49.1802 10 49.1802V48ZM48 38H46.8198C46.8198 42.871 42.871 46.8198 38 46.8198V48V49.1802C44.1747 49.1802 49.1802 44.1747 49.1802 38H48ZM38 0V1.18025C42.871 1.18025 46.8198 5.12899 46.8198 10H48H49.1802C49.1802 3.82532 44.1747 -1.18025 38 -1.18025V0ZM10 0V-1.18025C3.82532 -1.18025 -1.18025 3.82532 -1.18025 10H0H1.18025C1.18025 5.12899 5.12899 1.18025 10 1.18025V0Z" fill="#364153" mask="url(#path-1-inside-1_322_2772)"/>
            <path d="M31 22.9964H17C15.8954 22.9964 15 23.8915 15 24.9957V31.9935C15 33.0977 15.8954 33.9928 17 33.9928H31C32.1046 33.9928 33 33.0977 33 31.9935V24.9957C33 23.8915 32.1046 22.9964 31 22.9964Z" stroke="#6A7282" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19 22.9964V18.9977C19 17.6721 19.5268 16.4007 20.4645 15.4633C21.4021 14.5259 22.6739 13.9993 24 13.9993C25.3261 13.9993 26.5979 14.5259 27.5355 15.4633C28.4732 16.4007 29 17.6721 29 18.9977V22.9964" stroke="#6A7282" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <?php } ?>
        </div>
        <div class="referral-card__text">
          <h3 class="referral-card__heading" id="referral-heading">Your Referral Code</h3>
          <?php 
          $referal_code_txt = 'Code will appear after approval.';
          if($isApproved){
            $referal_code_txt = $refData[0]['referal_code'];
          }
          ?>
          <p class="referral-card__description <?php echo $isApproved ? 'approved' : ''; ?>" id="referral-code"><?php echo $referal_code_txt;?></p>
        </div>
        <?php if($isApproved){ ?>
        <div class="referral-card__action">
          <button class="affiliate-card__button" id="copy-code-btn" onclick="copyReferralCode('<?php echo $refData[0]['referal_code']; ?>')">
            <span>Copy Code</span>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.3333 13.3333H15C15.5304 13.3333 16.0391 13.1226 16.4142 12.7475C16.7893 12.3724 17 11.8638 17 11.3333V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H8.66667C8.13623 3 7.62752 3.21071 7.25245 3.58579C6.87738 3.96086 6.66667 4.46957 6.66667 5V6.66667M11.3333 10H5C4.46957 10 3.96086 10.2107 3.58579 10.5858C3.21071 10.9609 3 11.4696 3 12V18.3333C3 18.8638 3.21071 19.3724 3.58579 19.7475C3.96086 20.1226 4.46957 20.3333 5 20.3333H11.3333C11.8638 20.3333 12.3724 20.1226 12.7475 19.7475C13.1226 19.3724 13.3333 18.8638 13.3333 18.3333V12C13.3333 11.4696 13.1226 10.9609 12.7475 10.5858C12.3724 10.2107 11.8638 10 11.3333 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</main>

<script>
function copyReferralCode(code) {
  navigator.clipboard.writeText(code).then(function() {
    // Show success feedback
    const btn = document.getElementById('copy-code-btn');
    const originalText = btn.querySelector('span').textContent;
    btn.querySelector('span').textContent = 'Copied!';
    btn.style.opacity = '0.8';
    
    setTimeout(function() {
      btn.querySelector('span').textContent = originalText;
      btn.style.opacity = '1';
    }, 2000);
  }).catch(function(err) {
    console.error('Failed to copy: ', err);
    alert('Failed to copy code. Please copy manually: ' + code);
  });
}
</script>
<?php $this->load->view('user/common/footer'); ?>
