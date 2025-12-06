<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="card custom-card shadow-none">
            <div class="top-left"></div>
            <div class="top-right"></div>
            <div class="bottom-left"></div>
            <div class="bottom-right"></div>
            <div class="card-body p-0 product-checkout">
                <div class="tab-pane border-0 p-0" id="delivery-tab-pane" role="tabpanel"
                    aria-labelledby="delivery-tab-pane" tabindex="0">
                    <div class="p-5 checkout-payment-success my-3">
                        <div class="mb-5">
                            <h5 class="text-success fw-medium">Payment Successful...&#129309;</h5>
                        </div>
                        <div class="mb-4">
                            <p class="text-muted mb-2">THANK YOU FOR CHOOSING US.</p>
                            <h3 class="fw-semibold mb-2">You will get confirmation at your registered email address after payment success</h3>
                            <p class="mb-1 fs-14">If you have any concerns, please get in touch with us. Our support team will reach out to you via your registered email.</p>
                        </div>
                        <a href="<?php echo site_url('user/home');?>" class="btn btn-success">Back to home page<i class="bi bi-cart ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->
    <?php $this->load->view('user/common/footer'); ?>