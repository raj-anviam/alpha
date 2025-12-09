<?php $this->load->view('user/common/header'); ?>
<style>
.thanks-page {
  min-height: 100vh;
  background-color: #050B08;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 24px;
}

.thanks-card {
  background-color: #050B08;
  border: 1px solid #00FF9C;
  border-radius: 16px;
  padding: 48px 40px;
  max-width: 600px;
  width: 100%;
  text-align: center;
  box-shadow: 0 0 20px rgba(0, 255, 156, 0.1);
}

.thanks-title {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  margin-bottom: 24px;
}

.thanks-title h3 {
  font-size: 32px;
  font-weight: 700;
  color: #00FF9C;
  margin: 0;
  font-family: 'Eurostile-Bold', 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.thanks-title-icon {
  width: 40px;
  height: 40px;
  background-color: #00FF9C;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.thanks-title-icon svg {
  width: 24px;
  height: 24px;
}

.thanks-subtitle {
  font-size: 14px;
  font-weight: 600;
  color: #E0A130;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 20px;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.thanks-message {
  font-size: 18px;
  font-weight: 600;
  color: #FFFFFF;
  margin-bottom: 24px;
  line-height: 1.5;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.thanks-support {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: 32px;
  line-height: 1.6;
  font-family: 'Eurostile', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.thanks-button {
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

.thanks-button:hover {
  background-color: #004829;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 88, 41, 0.4);
}

.thanks-button svg {
  width: 16px;
  height: 16px;
}
</style>

<div class="thanks-page">
  <div class="thanks-card">
    <div class="thanks-title">
      <h3>Successful...👍</h3>
      <div class="thanks-title-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 6L9 17L4 12" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
    
    <p class="thanks-subtitle">THANK YOU FOR SHOWING INTEREST.</p>
    
    <p class="thanks-message">You will receive an email after verification</p>
    
    <p class="thanks-support">If you have any concerns, please get in touch with us. Our support team will reach out to you via your registered email.</p>
    
    <a href="<?php echo site_url('user/home');?>" class="thanks-button">
      <span>Back to Home Page</span>
      <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
  </div>
</div>

<?php $this->load->view('user/common/footer'); ?>
