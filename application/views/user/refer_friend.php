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
                                            <h4 class="fw-semibold mb-2">Invite your <span class="text-primary">friends</span> and enhance your trading experience while earning rewards.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card custom-card">
                            <div class="top-left"></div>
                            <div class="top-right"></div>
                            <div class="bottom-left"></div>
                            <div class="bottom-right"></div>
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="mb-3">
                                        <span class="avatar avatar-lg avatar-rounded bg-primary-transparent svg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                                <path d="M192,168a40,40,0,0,1-40,40H128V128h24A40,40,0,0,1,192,168ZM112,48a40,40,0,0,0,0,80h16V48Z" opacity="0.2"></path>
                                                <path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="fw-semibold">$0</h5>
                                        <span class="d-block mb-1">Total Revenue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <h4 class="fw-semibold mb-2">Referral Link</h4>
                                            <div class="btn-list">
                                                <?php 
                                                    $showcopybtn = 0;
                                                    $referal_code_txt = 'Link will appear after approval.'; 
                                                    if(!empty($refData)){
                                                        $status = $refData[0]['status'];
                                                        if($status == 1){
                                                            $showcopybtn = 1;
                                                            $referal_code_txt = site_url('auth/register/?sp=').$refData[0]['referal_code'];
                                                        }
                                                    } 
                                                ?>
                                                <p id="myInput"><?php echo $referal_code_txt;?></p>
                                                <?php if($showcopybtn == 1){?>
                                                    <button class="btn btn-primary-light btn-wave" id="copyLinkBtn">Copy Link</button>
                                                <?php }?>    
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
<script>
$(document).ready(function() {
  $('#copyLinkBtn').click(function() {
    const text = $('#myInput').text();
    navigator.clipboard.writeText(text)
      .then(() => alert('Copied to clipboard!'))
      .catch(err => alert('Failed to copy: ' + err));
  });
});
</script>