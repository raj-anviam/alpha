<?php $this->load->view('user/common/header'); ?>
<!-- Main Content -->
<main class="refer-earn">
  <div class="refer-earn__container">
    <!-- Introduction Section -->
    <div class="refer-earn__intro">
      <h2 class="refer-earn__title">Refer & Earn Rewards</h2>
      <p class="refer-earn__description">Invite your friends and enhance your trading experience while earning rewards for every successful referral.</p>
    </div>

    <!-- Cards Grid -->
    <div class="refer-earn__cards">
      <!-- Referral Link Card -->
      <div class="refer-earn-card" id="referral-link-card">
        <div class="refer-earn-card__header">
          <div class="refer-earn-card__header-left">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="refer-earn-card__icon">
              <path d="M10 13C10.4295 13.5741 10.9774 14.0492 11.6066 14.3929C12.2357 14.7367 12.9315 14.9411 13.6467 14.9923C14.3618 15.0435 15.0796 14.9404 15.7513 14.6898C16.4231 14.4392 17.0331 14.0471 17.54 13.54L20.54 10.54C21.4508 9.59699 21.9548 8.33397 21.9434 7.02299C21.932 5.71201 21.4061 4.45794 20.4791 3.5309C19.5521 2.60386 18.298 2.07802 16.987 2.06663C15.676 2.05523 14.413 2.55921 13.47 3.47L11.75 5.18" stroke="#E0A130" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14.0002 11C13.5707 10.4259 13.0228 9.95083 12.3936 9.60707C11.7645 9.26331 11.0687 9.05889 10.3535 9.00768C9.63841 8.95646 8.92061 9.05964 8.24885 9.31023C7.5771 9.56082 6.96709 9.95294 6.4602 10.46L3.4602 13.46C2.54941 14.403 2.04544 15.666 2.05683 16.977C2.06822 18.288 2.59407 19.5421 3.52111 20.4691C4.44815 21.3961 5.70221 21.922 7.01319 21.9334C8.32418 21.9448 9.58719 21.4408 10.5302 20.53L12.2402 18.82" stroke="#E0A130" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h3 class="refer-earn-card__title">Your Referral Link</h3>
          </div>
        </div>
        <div class="refer-earn-card__content">
          <?php 
          $isApproved = false;
          $referralLink = 'Link will appear after approval!';
          $referralLinkUrl = '';
          
          if(!empty($refData)){
            $status = $refData[0]['status'];
            if($status == 1){
              $isApproved = true;
              $referralLinkUrl = site_url('auth/register/?sp=').$refData[0]['referal_code'];
              $referralLink = $referralLinkUrl;
            }
          }
          ?>
          
          <?php if(!$isApproved){ ?>
          <!-- Show lock icon and placeholder text when not approved -->
          <div class="refer-earn-card__icon-badge" id="referral-link-icon">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <mask id="path-1-inside-1_322_3345" fill="white">
                <path d="M0 10C0 4.47715 4.47715 0 10 0H38C43.5229 0 48 4.47715 48 10V38C48 43.5229 43.5228 48 38 48H10C4.47715 48 0 43.5228 0 38V10Z"/>
              </mask>
              <path d="M0 10C0 4.47715 4.47715 0 10 0H38C43.5229 0 48 4.47715 48 10V38C48 43.5229 43.5228 48 38 48H10C4.47715 48 0 43.5228 0 38V10Z" fill="#1E2939" fill-opacity="0.5"/>
              <path d="M10 0V1.18025H38V0V-1.18025H10V0ZM48 10H46.8198V38H48H49.1802V10H48ZM38 48V46.8198H10V48V49.1802H38V48ZM0 38H1.18025V10H0H-1.18025V38H0ZM10 48V46.8198C5.12899 46.8198 1.18025 42.871 1.18025 38H0H-1.18025C-1.18025 44.1747 3.82532 49.1802 10 49.1802V48ZM48 38H46.8198C46.8198 42.871 42.871 46.8198 38 46.8198V48V49.1802C44.1747 49.1802 49.1802 44.1747 49.1802 38H48ZM38 0V1.18025C42.871 1.18025 46.8198 5.12899 46.8198 10H48H49.1802C49.1802 3.82532 44.1747 -1.18025 38 -1.18025V0ZM10 0V-1.18025C3.82532 -1.18025 -1.18025 3.82532 -1.18025 10H0H1.18025C1.18025 5.12899 5.12899 1.18025 10 1.18025V0Z" fill="#364153" mask="url(#path-1-inside-1_322_3345)"/>
              <path d="M31 22.9964H17C15.8954 22.9964 15 23.8916 15 24.9958V31.9935C15 33.0977 15.8954 33.9929 17 33.9929H31C32.1046 33.9929 33 33.0977 33 31.9935V24.9958C33 23.8916 32.1046 22.9964 31 22.9964Z" stroke="#6A7282" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M19 22.9964V18.9977C19 17.6721 19.5268 16.4007 20.4645 15.4633C21.4021 14.526 22.6739 13.9994 24 13.9994C25.3261 13.9994 26.5979 14.526 27.5355 15.4633C28.4732 16.4007 29 17.6721 29 18.9977V22.9964" stroke="#6A7282" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="refer-earn-card__text">
            <p class="refer-earn-card__description" id="referral-link-text"><?php echo $referralLink; ?></p>
            <p class="refer-earn-card__subtext">Once your partner request is approved, your unique referral link will be displayed here.</p>
          </div>
          <?php } else { ?>
          <!-- Show referral link with copy button when approved -->
          <div class="refer-earn-card__text" style="width: 100%;">
            <div class="refer-earn-card__input-wrapper" id="referral-link-input-wrapper" style="display: flex;">
              <input type="text" class="refer-earn-card__input" id="referral-link-input" value="<?php echo htmlspecialchars($referralLinkUrl); ?>" readonly />
              <button type="button" class="refer-earn-card__copy-btn" id="copy-link-btn" aria-label="Copy link">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.667 6.66663H8.33366C7.41318 6.66663 6.66699 7.41282 6.66699 8.33329V16.6666C6.66699 17.5871 7.41318 18.3333 8.33366 18.3333H16.667C17.5875 18.3333 18.3337 17.5871 18.3337 16.6666V8.33329C18.3337 7.41282 17.5875 6.66663 16.667 6.66663Z" stroke="#00FF9C" stroke-width="1.33239" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3.33366 13.3333C2.41699 13.3333 1.66699 12.5833 1.66699 11.6666V3.33329C1.66699 2.41663 2.41699 1.66663 3.33366 1.66663H11.667C12.5837 1.66663 13.3337 2.41663 13.3337 3.33329" stroke="#00FF9C" stroke-width="1.33239" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Copy Link</span>
              </button>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- Total Revenue Card -->
      <div class="refer-earn-card">
        <div class="refer-earn-card__header">
          <div class="refer-earn-card__icon-badge">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 10C0 4.47715 4.47715 0 10 0H38C43.5229 0 48 4.47715 48 10V38C48 43.5229 43.5228 48 38 48H10C4.47715 48 0 43.5228 0 38V10Z" fill="#E0A130" fill-opacity="0.2"/>
              <path d="M24 14.0033V33.9968" stroke="#E0A130" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M28.9984 17.0023H21.5008C20.5729 17.0023 19.6829 17.3709 19.0267 18.0271C18.3706 18.6832 18.002 19.5732 18.002 20.5012C18.002 21.4291 18.3706 22.3191 19.0267 22.9752C19.6829 23.6314 20.5729 24 21.5008 24H26.4992C27.4271 24 28.3171 24.3686 28.9733 25.0248C29.6294 25.681 29.9981 26.5709 29.9981 27.4989C29.9981 28.4268 29.6294 29.3168 28.9733 29.973C28.3171 30.6291 27.4271 30.9977 26.4992 30.9977H18.002" stroke="#E0A130" stroke-width="1.99935" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="refer-earn-card__image-wrapper">
            <button class="refer-earn-card__image-wrapper-btn">
              <span>
                <svg width="18" height="18" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.33301 9.91666H12.833V6.41666" stroke="#E0A130" stroke-width="0.998907" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.8337 9.91668L7.87533 4.95834L4.95866 7.87501L1.16699 4.08334" stroke="#E0A130" stroke-width="0.998907" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
              <span>View Activity</span>
            </button>
          </div>
        </div>
        <div class="refer-earn-card__content refer-earn-card__content--revenue">
          <div class="refer-earn-card__text">
            <p class="refer-earn-card__label">TOTAL REVENUE</p>
            <p class="refer-earn-card__amount" id="total-revenue">$0</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Decorative coins image -->
  <div class="refer-earn__coins">
    <img src="<?php echo base_url('assets/images/coins.png');?>" alt="Decorative coins" class="refer-earn__coins-image">
  </div>
</main>

<script>
  // Handle Sidebar Toggle
  const sidebarToggle = document.querySelector('.sidebar__toggle');
  const sidebar = document.querySelector('.sidebar');
  const mainContent = document.querySelector('.refer-earn');
  const navbar = document.querySelector('.navbar');
  
  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', function() {
      const isCollapsed = sidebar.classList.toggle('sidebar--collapsed');
      
      // Update main content and navbar margins when sidebar is collapsed
      if (isCollapsed) {
        // Collapse: slide sidebar out and adjust content
        if (mainContent) {
          mainContent.style.transition = 'margin-left 0.3s ease-in-out';
          mainContent.style.marginLeft = '0';
        }
        if (navbar) {
          navbar.style.transition = 'left 0.3s ease-in-out, width 0.3s ease-in-out';
          navbar.style.left = '0';
          navbar.style.width = '100%';
        }
      } else {
        // Expand: slide sidebar in and adjust content
        if (mainContent) {
          mainContent.style.transition = 'margin-left 0.3s ease-in-out';
          mainContent.style.marginLeft = '280px';
        }
        if (navbar) {
          navbar.style.transition = 'left 0.3s ease-in-out, width 0.3s ease-in-out';
          navbar.style.left = '280px';
          navbar.style.width = 'calc(100% - 280px)';
        }
      }
    });
  }

  // Handle Copy Link button click (only if approved)
  const copyLinkBtn = document.getElementById('copy-link-btn');
  const referralLinkInput = document.getElementById('referral-link-input');
  
  if (copyLinkBtn && referralLinkInput) {
    copyLinkBtn.addEventListener('click', function(e) {
      e.stopPropagation(); // Prevent card click event
      
      referralLinkInput.select();
      referralLinkInput.setSelectionRange(0, 99999); // For mobile devices
      
      navigator.clipboard.writeText(referralLinkInput.value).then(() => {
        // Visual feedback - change icon to checkmark
        const originalHTML = copyLinkBtn.innerHTML;
        copyLinkBtn.innerHTML = `
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 4L6 11L3 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span>Copied!</span>
        `;
        setTimeout(() => {
          copyLinkBtn.innerHTML = originalHTML;
        }, 2000);
      }).catch(err => {
        console.error('Failed to copy:', err);
        alert('Failed to copy link. Please copy manually: ' + referralLinkInput.value);
      });
    });
  }
</script>
<?php $this->load->view('user/common/footer'); ?>
