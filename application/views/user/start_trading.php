 <!-- Main Content -->
 <?php $this->load->view('user/common/header'); ?>
 <main class="activation-page">
    <div class="activation-page__container">
      <div class="activation-page__content">
        <!-- Trading Form -->
        <form method="POST" action="<?php echo site_url('user/get_qrcode')?>" id="tradingForm" class="trading-form">
          <!-- Step Indicator -->
          <div class="step-indicator">
            <div class="step-item step-item--active" id="step-01">
              <div class="step-circle step-circle--active">
                <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" id="step-01-icon">
                  <g filter="url(#filter0_d_320_486)">
                    <rect x="15" y="15" width="28" height="28" rx="14" fill="black" shape-rendering="crispEdges"/>
                    <rect x="15.5" y="15.5" width="27" height="27" rx="13.5" stroke="#00FF9C" shape-rendering="crispEdges"/>
                    <path opacity="0.2" d="M38 29C38 30.78 37.4722 32.5201 36.4832 34.0001C35.4943 35.4802 34.0887 36.6337 32.4442 37.3149C30.7996 37.9961 28.99 38.1743 27.2442 37.8271C25.4984 37.4798 23.8947 36.6226 22.636 35.364C21.3774 34.1053 20.5202 32.5016 20.1729 30.7558C19.8257 29.01 20.0039 27.2004 20.6851 25.5558C21.3663 23.9113 22.5198 22.5057 23.9999 21.5168C25.4799 20.5278 27.22 20 29 20C31.387 20 33.6761 20.9482 35.364 22.636C37.0518 24.3239 38 26.613 38 29Z" fill="#00FF9C"/>
                    <path d="M32.375 29C32.375 29.6675 32.1771 30.32 31.8062 30.875C31.4354 31.4301 30.9083 31.8626 30.2916 32.1181C29.6749 32.3735 28.9963 32.4404 28.3416 32.3102C27.6869 32.1799 27.0855 31.8585 26.6135 31.3865C26.1415 30.9145 25.8201 30.3131 25.6899 29.6584C25.5596 29.0037 25.6265 28.3251 25.8819 27.7084C26.1374 27.0917 26.5699 26.5646 27.125 26.1938C27.68 25.8229 28.3325 25.625 29 25.625C29.8951 25.625 30.7535 25.9806 31.3865 26.6135C32.0194 27.2464 32.375 28.1049 32.375 29Z" fill="#00FF9C"/>
                  </g>
                  <defs>
                    <filter id="filter0_d_320_486" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                      <feOffset/>
                      <feGaussianBlur stdDeviation="7.5"/>
                      <feComposite in2="hardAlpha" operator="out"/>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 1 0 0 0 0 0.611765 0 0 0 0.3 0"/>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_320_486"/>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_320_486" result="shape"/>
                    </filter>
                  </defs>
                </svg>
                <!-- Completed Icon (hidden by default) -->
                <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" id="step-01-completed-icon" style="display: none;">
                  <g filter="url(#filter0_d_321_1188)">
                    <rect x="15" y="15" width="28" height="28" rx="14" fill="#00FF9C" shape-rendering="crispEdges"/>
                    <rect x="15.5" y="15.5" width="27" height="27" rx="13.5" stroke="#00FF9C" shape-rendering="crispEdges"/>
                    <path d="M35 24.5L26.75 32.75L23 29" stroke="black" stroke-width="2.99903" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <filter id="filter0_d_321_1188" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                      <feOffset/>
                      <feGaussianBlur stdDeviation="7.5"/>
                      <feComposite in2="hardAlpha" operator="out"/>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 1 0 0 0 0 0.611765 0 0 0 0.3 0"/>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_321_1188"/>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_321_1188" result="shape"/>
                    </filter>
                  </defs>
                </svg>
              </div>
              <span class="step-label">Step 01</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item step-item--inactive" id="step-02">
              <div class="step-circle step-circle--inactive" id="step-02-circle">
                <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" id="step-02-icon">
                  <g filter="url(#filter0_d_320_486_inactive)">
                    <rect x="15" y="15" width="28" height="28" rx="14" fill="black" shape-rendering="crispEdges"/>
                    <rect x="15.5" y="15.5" width="27" height="27" rx="13.5" stroke="#00FF9C" stroke-opacity="0.3" shape-rendering="crispEdges"/>
                    <path opacity="0.1" d="M38 29C38 30.78 37.4722 32.5201 36.4832 34.0001C35.4943 35.4802 34.0887 36.6337 32.4442 37.3149C30.7996 37.9961 28.99 38.1743 27.2442 37.8271C25.4984 37.4798 23.8947 36.6226 22.636 35.364C21.3774 34.1053 20.5202 32.5016 20.1729 30.7558C19.8257 29.01 20.0039 27.2004 20.6851 25.5558C21.3663 23.9113 22.5198 22.5057 23.9999 21.5168C25.4799 20.5278 27.22 20 29 20C31.387 20 33.6761 20.9482 35.364 22.636C37.0518 24.3239 38 26.613 38 29Z" fill="#00FF9C"/>
                    <path d="M32.375 29C32.375 29.6675 32.1771 30.32 31.8062 30.875C31.4354 31.4301 30.9083 31.8626 30.2916 32.1181C29.6749 32.3735 28.9963 32.4404 28.3416 32.3102C27.6869 32.1799 27.0855 31.8585 26.6135 31.3865C26.1415 30.9145 25.8201 30.3131 25.6899 29.6584C25.5596 29.0037 25.6265 28.3251 25.8819 27.7084C26.1374 27.0917 26.5699 26.5646 27.125 26.1938C27.68 25.8229 28.3325 25.625 29 25.625C29.8951 25.625 30.7535 25.9806 31.3865 26.6135C32.0194 27.2464 32.375 28.1049 32.375 29Z" fill="#00FF9C" fill-opacity="0.3"/>
                  </g>
                  <defs>
                    <filter id="filter0_d_320_486_inactive" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                      <feOffset/>
                      <feGaussianBlur stdDeviation="7.5"/>
                      <feComposite in2="hardAlpha" operator="out"/>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 1 0 0 0 0 0.611765 0 0 0 0.15 0"/>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_320_486_inactive"/>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_320_486_inactive" result="shape"/>
                    </filter>
                  </defs>
                </svg>
                <!-- Active Icon (hidden by default) -->
                <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" id="step-02-active-icon" style="display: none;">
                  <g filter="url(#filter0_d_320_486_step02)">
                    <rect x="15" y="15" width="28" height="28" rx="14" fill="black" shape-rendering="crispEdges"/>
                    <rect x="15.5" y="15.5" width="27" height="27" rx="13.5" stroke="#00FF9C" shape-rendering="crispEdges"/>
                    <path opacity="0.2" d="M38 29C38 30.78 37.4722 32.5201 36.4832 34.0001C35.4943 35.4802 34.0887 36.6337 32.4442 37.3149C30.7996 37.9961 28.99 38.1743 27.2442 37.8271C25.4984 37.4798 23.8947 36.6226 22.636 35.364C21.3774 34.1053 20.5202 32.5016 20.1729 30.7558C19.8257 29.01 20.0039 27.2004 20.6851 25.5558C21.3663 23.9113 22.5198 22.5057 23.9999 21.5168C25.4799 20.5278 27.22 20 29 20C31.387 20 33.6761 20.9482 35.364 22.636C37.0518 24.3239 38 26.613 38 29Z" fill="#00FF9C"/>
                    <path d="M32.375 29C32.375 29.6675 32.1771 30.32 31.8062 30.875C31.4354 31.4301 30.9083 31.8626 30.2916 32.1181C29.6749 32.3735 28.9963 32.4404 28.3416 32.3102C27.6869 32.1799 27.0855 31.8585 26.6135 31.3865C26.1415 30.9145 25.8201 30.3131 25.6899 29.6584C25.5596 29.0037 25.6265 28.3251 25.8819 27.7084C26.1374 27.0917 26.5699 26.5646 27.125 26.1938C27.68 25.8229 28.3325 25.625 29 25.625C29.8951 25.625 30.7535 25.9806 31.3865 26.6135C32.0194 27.2464 32.375 28.1049 32.375 29Z" fill="#00FF9C"/>
                  </g>
                  <defs>
                    <filter id="filter0_d_320_486_step02" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                      <feOffset/>
                      <feGaussianBlur stdDeviation="7.5"/>
                      <feComposite in2="hardAlpha" operator="out"/>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 1 0 0 0 0 0.611765 0 0 0 0.3 0"/>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_320_486_step02"/>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_320_486_step02" result="shape"/>
                    </filter>
                  </defs>
                </svg>
              </div>
              <span class="step-label step-label--inactive" id="step-02-label">Step 02</span>
            </div>
          </div>

          <!-- Instruction Text -->
          <div class="start-trading-instruction">
            <p>Follow This Link To Register with the Broker</p>
          </div>
          <div class="trading-form__grid">
            <!-- Server Name -->
            <div class="input-wrapper">
              <label class="input-label">Server Name</label>
              <div class="input-container">
                <input type="text" class="input-field" name="server_name" placeholder="Enter Server Name" required />
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_320_402)">
                      <path d="M15 1.50009H3C2.17157 1.50009 1.5 2.17166 1.5 3.00009V6.00009C1.5 6.82852 2.17157 7.50009 3 7.50009H15C15.8284 7.50009 16.5 6.82852 16.5 6.00009V3.00009C16.5 2.17166 15.8284 1.50009 15 1.50009Z" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M15 10.5H3C2.17157 10.5 1.5 11.1716 1.5 12V15C1.5 15.8284 2.17157 16.5 3 16.5H15C15.8284 16.5 16.5 15.8284 16.5 15V12C16.5 11.1716 15.8284 10.5 15 10.5Z" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4.5 4.5H4.5075" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4.5 13.5H4.5075" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_320_402">
                        <rect width="18" height="18" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </div>
            </div>

            <!-- Trading ID -->
            <div class="input-wrapper">
              <label class="input-label">Trading ID</label>
              <div class="input-container">
                <input type="text" class="input-field" name="trading_id" placeholder="Enter Trading" required />
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.25 15.7492V14.2492C14.25 13.4536 13.9339 12.6905 13.3713 12.1279C12.8087 11.5653 12.0456 11.2492 11.25 11.2492H6.75C5.95435 11.2492 5.19129 11.5653 4.62868 12.1279C4.06607 12.6905 3.75 13.4536 3.75 14.2492V15.7492" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 8.24985C10.6569 8.24985 12 6.9067 12 5.24985C12 3.59299 10.6569 2.24985 9 2.24985C7.34315 2.24985 6 3.59299 6 5.24985C6 6.9067 7.34315 8.24985 9 8.24985Z" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
              </div>
            </div>

            <!-- Trading Password -->
            <div class="input-wrapper">
              <label class="input-label">Trading Password</label>
              <div class="input-container">
                <input type="password" class="input-field input-field--password" id="trading-password" name="trading_password" placeholder="Trading Password" required />
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_320_442)">
                      <path d="M14.25 8.24942H3.75C2.92157 8.24942 2.25 8.92099 2.25 9.74942V14.9994C2.25 15.8278 2.92157 16.4994 3.75 16.4994H14.25C15.0784 16.4994 15.75 15.8278 15.75 14.9994V9.74942C15.75 8.92099 15.0784 8.24942 14.25 8.24942Z" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M5.24951 8.24991V5.24991C5.24951 4.25535 5.6446 3.30152 6.34786 2.59826C7.05112 1.895 8.00495 1.49991 8.99951 1.49991C9.99407 1.49991 10.9479 1.895 11.6512 2.59826C12.3544 3.30152 12.7495 4.25535 12.7495 5.24991V8.24991" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_320_442">
                        <rect width="17.9988" height="17.9988" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
                <button type="button" class="input-toggle input-toggle--password" id="password-toggle" aria-label="Toggle password visibility">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" id="eye-icon" style="display: none;">
                    <path d="M9 3.75C5.25 3.75 2.0475 6.1425 0.75 9.75C2.0475 13.3575 5.25 15.75 9 15.75C12.75 15.75 15.9525 13.3575 17.25 9.75C15.9525 6.1425 12.75 3.75 9 3.75Z" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 12.75C10.6569 12.75 12 11.4069 12 9.75C12 8.09315 10.6569 6.75 9 6.75C7.34315 6.75 6 8.09315 6 9.75C6 11.4069 7.34315 12.75 9 12.75Z" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" id="eye-off-icon">
                    <path d="M1.5 1.5L16.5 16.5" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.275 7.275C6.825 7.725 6.75 8.475 7.05 9C7.35 9.525 7.95 9.75 8.4 9.75" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.75 3.75C2.625 4.875 1.875 6.375 1.5 7.875C2.25 10.875 5.25 13.125 9 13.125C10.125 13.125 11.25 12.9 12.225 12.45" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.25 11.25C15.375 10.125 16.125 8.625 16.5 7.125C15.75 4.125 12.75 1.875 9 1.875C8.25 1.875 7.5 2.025 6.75 2.175" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 6.75C10.6569 6.75 12 8.09315 12 9.75" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
              </div>
            </div>

            <!-- Email Address -->
            <div class="input-wrapper">
              <label class="input-label">Email Address</label>
              <div class="input-container">
                <input type="email" class="input-field" name="email_id" placeholder="Enter Email Adress" required />
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_320_450)">
                      <path d="M16.499 5.24963L9.75618 9.54459C9.52737 9.67749 9.26747 9.74749 9.00286 9.74749C8.73825 9.74749 8.47835 9.67749 8.24954 9.54459L1.5 5.24963" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M14.7061 3.06616H2.70693C1.87856 3.06616 1.20703 3.73769 1.20703 4.56606V13.5654C1.20703 14.3938 1.87856 15.0653 2.70693 15.0653H14.7061C15.5345 15.0653 16.206 14.3938 16.206 13.5654V4.56606C16.206 3.73769 15.5345 3.06616 14.7061 3.06616Z" stroke="#717182" stroke-width="1.4999" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_320_450">
                        <rect width="17.9988" height="17.9988" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="trading-form__actions" id="step-01-actions">
            <button type="button" class="btn-back">Back</button>
            <button type="button" class="btn-connect" id="connect-account-btn">
              <span>Connect Account</span>
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>

          <!-- Step 02 Content (Hidden by default) -->
          <div class="step-02-content step-02-content--hidden" id="step-02-content">
            <!-- Subscription Heading -->
            <div class="subscription-heading">
              <h2 class="subscription-title">Subscribe to AlphaXAU Miner :</h2>
              <p class="subscription-description">
                You have to pay <span class="highlight">$19</span> for <span class="highlight">12 MONTHS</span>. This includes full access to the AlphaXAU Miner updates, customer support, and educational resources.
              </p>
            </div>

            <!-- Payment Method Selection -->
            <div class="payment-method-wrapper">
              <label class="input-label">Select Method</label>
              <div class="input-container">
                <select class="input-field input-field--select" id="payment-method" name="method_id">
                  <option value="">Select</option>
                  <?php foreach($payment_method as $val){ ?>
                    <option value="<?php echo base64e($val['payment_method_id']);?>"><?php echo $val['payment_method'];?></option>
                  <?php } ?>
                </select>
                <span class="select-arrow">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6L8 10L12 6" stroke="#717182" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
              </div>
            </div>

            <!-- Payment Details Section (Shown when payment method is selected) -->
            <div class="payment-details" id="payment-details" style="display: none;">
              <div class="payment-details__content" id="scanner-div">
                <!-- QR Code and payment details will be loaded here via AJAX -->
              </div>
            </div>

            <!-- Step 02 Action Buttons -->
            <div class="trading-form__actions">
              <button type="button" class="btn-back" id="previous-btn">Previous</button>
              <button type="button" class="btn-connect" id="submit-payment-btn">
                <span>Click After Payment</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- Footer
  <footer class="start-trading-footer">
    <p>Activation - Start Trading - Step 02</p>
  </footer> -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- jquery-toast-plugin JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  
  <script>
    $(document).ready(function() {
      // Step management
      let currentStep = 1;

      // Password toggle functionality
      $('#password-toggle').on('click', function() {
        const passwordInput = $('#trading-password');
        const eyeIcon = $('#eye-icon');
        const eyeOffIcon = $('#eye-off-icon');
        
        if (passwordInput.attr('type') === 'password') {
          passwordInput.attr('type', 'text');
          eyeIcon.hide();
          eyeOffIcon.show();
        } else {
          passwordInput.attr('type', 'password');
          eyeIcon.show();
          eyeOffIcon.hide();
        }
      });

      // Connect Account button - move to Step 02
      $('#connect-account-btn').on('click', function() {
        // Validate form fields (basic validation)
        const serverName = $('input[name="server_name"]').val();
        const tradingId = $('input[name="trading_id"]').val();
        const tradingPassword = $('input[name="trading_password"]').val();
        const email = $('input[name="email_id"]').val();

        if (!serverName || !tradingId || !tradingPassword || !email) {
          toastmessage('Please fill in all fields', 'Error', 'error');
          return;
        }

        // Move to Step 02
        currentStep = 2;
        
        // Hide Step 01 content
        $('.start-trading-instruction').hide();
        $('.trading-form__grid').hide();
        $('#step-01-actions').hide();

        // Show Step 02 content
        $('#step-02-content').removeClass('step-02-content--hidden');

        // Update Step 01 icon to completed
        $('#step-01-icon').hide();
        $('#step-01-completed-icon').show();

        // Update Step 02 to active
        $('#step-02').removeClass('step-item--inactive').addClass('step-item--active');
        $('#step-02-label').removeClass('step-label--inactive');
        $('#step-02-circle').removeClass('step-circle--inactive').addClass('step-circle--active');
        $('#step-02-icon').hide();
        $('#step-02-active-icon').show();

        // Update navbar subtitle
        const navbarSubtitle = $('.navbar__title .activation-page__subtitle');
        if (navbarSubtitle.length) {
          navbarSubtitle.text('Start Trading - Step 02');
        }
      });

      // Payment method selection - AJAX call to get QR code (same as old page)
      $('#payment-method').on('change', function() {
        var form = $('#tradingForm');
        var actionUrl = form.attr('action');
        $('#loader').removeClass('d-none');
        $('#loader').show();
        $.ajax({
          type: "POST",
          url: actionUrl,
          data: form.serialize(), // serializes the form's elements.
          success: function(data) {
            var myData = JSON.parse(data);
            var status = myData.status;
            var msg = myData.msg;
            if (status == 'success') {
              $('#scanner-div').html(msg);
              $('#payment-details').show();
            } else {
              $('#scanner-div').html('');
              $('#payment-details').hide();
              toastmessage(msg, 'error', 'error');
            }
            $('#loader').hide();
          }
        });
      });

      // Toast notification functions (same as old page)
      function toastmessagesuccess(msg, head, icon) {
        $.toast({
          text: msg, // Text that is to be shown in the toast
          heading: head, // Optional heading to be shown on the toast
          icon: icon, // Type of toast icon
          showHideTransition: 'slide', // fade, slide or plain
          allowToastClose: true, // Boolean value true or false
          hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
          stack: false, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
          position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
          textAlign: 'left', // Text alignment i.e. left, right or center
          loader: true, // Whether to show loader or not. True by default
          loaderBg: '#9EC600', // Background color of the toast loader
        });
      }

      function toastmessage(msg, head, icon) {
        $.toast({
          text: msg, // Text that is to be shown in the toast
          heading: head, // Optional heading to be shown on the toast
          icon: icon, // Type of toast icon
          showHideTransition: 'slide', // fade, slide or plain
          allowToastClose: true, // Boolean value true or false
          hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
          stack: false, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
          position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
          textAlign: 'left', // Text alignment i.e. left, right or center
          loader: true, // Whether to show loader or not. True by default
          loaderBg: '#9EC600', // Background color of the toast loader
        });
      }

      // Make toast functions global
      window.toastmessage = toastmessage;
      window.toastmessagesuccess = toastmessagesuccess;

      // Copy address functionality (will work with dynamically loaded content)
      $(document).on('click', '#copy-address-btn', function() {
        const cryptoAddress = document.getElementById('crypto-address');
        if (cryptoAddress) {
          cryptoAddress.select();
          cryptoAddress.setSelectionRange(0, 99999);
          navigator.clipboard.writeText(cryptoAddress.value).then(() => {
            const copyBtn = document.getElementById('copy-address-btn');
            if (copyBtn) {
              const originalHTML = copyBtn.innerHTML;
              copyBtn.innerHTML = `
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 4L6 11L3 8" stroke="#00FF9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              `;
              setTimeout(() => {
                copyBtn.innerHTML = originalHTML;
              }, 2000);
            }
          }).catch(err => {
            console.error('Failed to copy:', err);
          });
        }
      });

      // Previous button - go back to Step 01
      $('#previous-btn').on('click', function() {
        currentStep = 1;
        
        // Show Step 01 content
        $('.start-trading-instruction').show();
        $('.trading-form__grid').css('display', 'grid');
        $('#step-01-actions').css('display', 'flex');

        // Hide Step 02 content
        $('#step-02-content').addClass('step-02-content--hidden');

        // Update Step 01 icon back to active (not completed)
        $('#step-01-icon').show();
        $('#step-01-completed-icon').hide();

        // Update Step 02 to inactive
        $('#step-02').addClass('step-item--inactive').removeClass('step-item--active');
        $('#step-02-label').addClass('step-label--inactive');
        $('#step-02-circle').addClass('step-circle--inactive').removeClass('step-circle--active');
        $('#step-02-icon').show();
        $('#step-02-active-icon').hide();

        // Clear payment details
        $('#payment-details').hide();
        $('#scanner-div').html('');
        $('#payment-method').val('');

        // Update navbar subtitle
        const navbarSubtitle = $('.navbar__title .activation-page__subtitle');
        if (navbarSubtitle.length) {
          navbarSubtitle.text('Connect your trading account');
        }
      });
    });
  </script>
  <?php $this->load->view('user/common/footer'); ?>