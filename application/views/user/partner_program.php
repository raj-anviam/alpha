<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::row-1 -->
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
                                            <h4 class="fw-semibold mb-2">JOIN OUR AFFILIATE PROGRAM!</h4>
                                            <?php if(empty($refData)){ ?>
                                            <div class="btn-list">
                                                <a href="<?php echo site_url('user/apply_refferal');?>" class="btn btn-outline-primary btn-wave">Submit a request to join our Partner Program</a>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($refData)){ 
                        $status = $refData[0]['status'];
                        if($status == 0){
                            $appStatus = 'Under Review';
                        }elseif($status == 1){
                            $appStatus = 'Approved';
                        }else{
                            $appStatus = 'Rejected';
                        }
                    ?>
                        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="top-left"></div>
                                <div class="bottom-left"></div>
                                <div class="bottom-right"></div>
                                <div class="top-right"></div>
                                <div class="card-body">
                                    <div class="row gap-3 gap-sm-0">
                                        <div class="col-sm-8 col-12">
                                            <div class="">
                                                <h4 class="fw-semibold mb-2">Application Status</h4>
                                                <div class="btn-list">
                                                    <p><?php echo $appStatus;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="top-left"></div>
                            <div class="bottom-left"></div>
                            <div class="bottom-right"></div>
                            <div class="top-right"></div>
                            <div class="card-body">
                                <div class="row gap-3 gap-sm-0">
                                    <div class="col-sm-8 col-12">
                                        <div class="">
                                            <h4 class="fw-semibold mb-2">Your Referral Code</h4>
                                            <div class="btn-list">
                                                <?php $referal_code_txt = 'Code will appear after approval.'; if(!empty($refData)){
                                                    $status = $refData[0]['status'];
                                                    if($status == 1){
                                                        $referal_code_txt = $refData[0]['referal_code'];
                                                    }
                                                } ?>
                                                <p><?php echo $referal_code_txt;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('user/common/footer'); ?>