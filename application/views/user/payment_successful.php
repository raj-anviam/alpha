<?php $this->load->view('user/common/header'); ?>
<style>
.payment-success-page {
  min-height: 100vh;
  background-color: #050B08;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 24px;
}

.payment-success-card {
  background-color: #050B08;
  border: 1px solid #00FF9C;
  border-radius: 16px;
  padding: 48px 40px;
  max-width: 600px;
  width: 100%;
  text-align: center;
  box-shadow: 0 0 20px rgba(0, 255, 156, 0.1);
}

.payment-success-title {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  margin-bottom: 24px;
}

.payment-success-title h3 {
  font-size: 32px;
  font-weight: 700;
  color: #00FF9C;
  margin: 0;
  font-family: 'Eurostile-Bold', 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.payment-success-title-icon {
  width: 40px;
  height: 40px;
  background-color: #00FF9C;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.payment-success-title-icon svg {
  width: 24px;
  height: 24px;
}

.payment-success-subtitle {
  font-size: 14px;
  font-weight: 600;
  color: #E0A130;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 20px;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.payment-success-message {
  font-size: 18px;
  font-weight: 600;
  color: #FFFFFF;
  margin-bottom: 24px;
  line-height: 1.5;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.payment-success-support {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: 32px;
  line-height: 1.6;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.payment-success-button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 24px;
  background-color: #005829;
  border: none;
  border-radius: 8px;
  color: #FFFFFF;
  font-size: 16px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.payment-success-button:hover {
  background-color: #004829;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 88, 41, 0.4);
}

.payment-success-button svg {
  width: 16px;
  height: 16px;
}
</style>

<div class="payment-success-page">
  <div class="payment-success-card">
    <div class="payment-success-title">
      <h3>Payment Successful...</h3>
      <div class="payment-success-title-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 6L9 17L4 12" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
    
    <p class="payment-success-subtitle">THANK YOU FOR CHOOSING US.</p>
    
    <p class="payment-success-message">You will get confirmation at your registered email address after payment success</p>
    
    <p class="payment-success-support">If you have any concerns, please get in touch with us. Our support team will reach out to you via your registered email.</p>
    
    <a href="<?php echo site_url('user/home');?>" class="payment-success-button">
      <span>Back to Home Page</span>
      <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
  </div>
</div>

<?php $this->load->view('user/common/footer'); ?>
