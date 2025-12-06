<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::row-1 -->
        <?php if ((int)$user_details[0]['is_email_verified'] != 1) { ?>
            <div class="row">
                <div class="col-xxl-5">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="top-left"></div>
                                <div class="bottom-left"></div>
                                <div class="bottom-right"></div>
                                <div class="top-right"></div>
                                <div class="card-body">
                                    <div class="row gap-3 gap-sm-0">
                                        <div class="col-sm-8 col-12">
                                            <div class="">
                                                <h5 class="fw-semibold mb-2">Email not verified! <span class="text-primary">Please Verify</span></h5>
                                                <?php if (empty($refData)) { ?>
                                                    <div class="btn-list">
                                                        <a href="<?php echo site_url('user/verify_mail'); ?>" class="btn btn-outline-primary btn-wave">Click here to verify email</a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Start:: row-2 -->
        <div class="row">
            <div class="col-xl-12 col-xxl-6">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="top-right"></div>
                    <div class="card-header">
                        <div class="card-title">Performance</div>
                    </div>
                    <div class="card-body">
                        <div id="performance"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card custom-card tilt">
                    <div class="top-left"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="top-right"></div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="mb-4">
                                <span class="avatar avatar-lg rounded bg-primary-transparent svg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                        <path d="M192,168a40,40,0,0,1-40,40H128V128h24A40,40,0,0,1,192,168ZM112,48a40,40,0,0,0,0,80h16V48Z" opacity="0.2"></path>
                                        <path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <h5 class="fw-semibold">$0</h5>
                                <span class="d-block text-muted mb-1">Total Profit</span>
                                <span class="d-block fs-12 text-success fw-medium"><i class="ti ti-arrow-narrow-up"></i>0% This Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card custom-card tilt">
                    <div class="top-left"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="top-right"></div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="mb-4">
                                <span class="avatar avatar-lg rounded bg-primary-transparent svg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                        <path d="M192,168a40,40,0,0,1-40,40H128V128h24A40,40,0,0,1,192,168ZM112,48a40,40,0,0,0,0,80h16V48Z" opacity="0.2"></path>
                                        <path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <h5 class="fw-semibold">$0</h5>
                                <span class="d-block text-muted mb-1">Profit This week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card custom-card tilt">
                    <div class="top-left"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="top-right"></div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="mb-4">
                                <span class="avatar avatar-lg rounded bg-primary-transparent svg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                        <path d="M192,168a40,40,0,0,1-40,40H128V128h24A40,40,0,0,1,192,168ZM112,48a40,40,0,0,0,0,80h16V48Z" opacity="0.2"></path>
                                        <path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <h5 class="fw-semibold">$0</h5>
                                <span class="d-block text-muted mb-1">Profit This Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End::row-1 -->
    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('user/common/footer'); ?>
<!-- Apex Charts JS -->
<script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>
<!-- CRM Dashboard --> 
    <script src="<?php echo base_url('assets/js/crm-dashboard.js'); ?>"></script>
<!-- CRM Dashboard --> 
    <script src="<?php echo base_url('assets/js/crm-dashboard.js'); ?>"></script>