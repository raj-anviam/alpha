<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap align-items-start gap-5 p-2 border-bottom-0">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <div class="lh-1">
                                        <span class="avatar avatar-xxl online me-3">
                                            <img src="../assets/images/faces/22.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill main-profile-info">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h5 class="fw-medium mb-1"><?php echo $recById[0]['full_name'];?></h5>
                                        </div>
                                        <p class="mb-1 text-muted op-7"><?php echo $recById[0]['username'];?></p>
                                        <p class="fs-12 mb-0 op-5">
                                            <span class=""><i class="ri-map-pin-line me-1 d-inline-block"></i><?php echo $recById[0]['state'];?></span>
                                            <span> <?php echo $recById[0]['country_name'];?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <a href="<?php echo site_url('user/profile_settings');?>" class="btn btn-outline-primary"><i class="ri-settings-3-line me-1 d-inline-block"></i>Profile Settings</a>
                            </div>
                        </div>
                        <div class="d-sm-flex flex-wrap align-items-top gap-5 justify-content-between p-2 border-bottom-0">
                            
                            <div>
                                <p class="fs-15 mb-3 me-4 fw-medium">Contact Information :</p>
                                <div class="text-muted">
                                    <p class="fs-14 mb-4">
                                        <span class="avatar avatar-sm me-2 bg-primary-transparent text-primary border text-muted">
                                            <i class="ri-mail-line align-middle fs-14"></i>
                                        </span>
                                        <?php echo $recById[0]['email'];?>
                                    </p>
                                    <p class="fs-14 mb-4">
                                        <span class="avatar avatar-sm me-2 bg-primary-transparent text-primary border text-muted">
                                            <i class="ri-phone-line align-middle fs-14"></i>
                                        </span>
                                        <?php echo $recById[0]['mobile'];?>
                                    </p>
                                    <p class="fs-14 mb-0">
                                        <span class="avatar avatar-sm me-2 bg-primary-transparent text-primary border text-muted">
                                            <i class="ri-map-pin-line align-middle fs-14"></i>
                                        </span>
                                        <?php echo $recById[0]['city'].' '.$recById[0]['city'].' '.$recById[0]['state'].' '.$recById[0]['country_name'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top border-block-start-dashed">
                        <div class="d-sm-flex flex-wrap align-items-top gap-5 border-bottom-0 justify-content-between">
                            <div class="d-sm-flex gap-4">
                                <div class="me-sm-3">
                                    <div class="d-flex gap-3">
                                        <span class="avatar avatar-md bg-light">
                                            <i class="ri-pages-line"></i>
                                        </span>
                                        <div>
                                            <p class="mb-0 fs-11 op-5">Age</p>
                                            <p class="fw-bold fs-18 text-shadow mb-0">
                                                <?php if($recById[0]['dob'] !=''){
                                                    echo calculate_age($recById[0]['dob']);
                                                }?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-sm-3">
                                    <div class="d-flex gap-3">
                                        <span class="avatar avatar-md bg-light">
                                            <i class="ri-group-line"></i>
                                        </span>
                                        <div>
                                            <p class="mb-0 fs-11 op-5">Gender</p>
                                            <p class="fw-bold fs-18 text-shadow mb-0"><?php echo $recById[0]['gender_name']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-0 me-sm-3">
                                    <div class="d-flex gap-3">
                                        <span class="avatar avatar-md bg-light">
                                            <i class="ri-user-follow-line"></i>
                                        </span>
                                        <div>
                                            <p class="mb-0 fs-11 op-5">Following</p>
                                            <p class="fw-bold fs-18 text-shadow mb-0">142</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-sm-flex justify-content-between gap-3 align-items-center">
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <h6 class="fw-medium">Follow :</h6>
                                    <div class="btn-list mb-0">
                                        <button class="btn btn-sm btn-icon btn-primary-light btn-wave waves-effect waves-light">
                                            <i class="ri-facebook-line fw-medium"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-secondary-light btn-wave waves-effect waves-light">
                                            <i class="ri-twitter-x-line fw-medium"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-warning-light btn-wave waves-effect waves-light">
                                            <i class="ri-instagram-line fw-medium"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-success-light btn-wave waves-effect waves-light">
                                            <i class="ri-github-line fw-medium"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-danger-light btn-wave waves-effect waves-light">
                                            <i class="ri-youtube-line fw-medium"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-1 -->
    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('user/common/footer'); ?>