<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="mb-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2 position-relative">
            <div class="top-left"></div>
            <div class="top-right"></div>
            <div class="bottom-left"></div>
            <div class="bottom-right"></div>
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Follow This Link To Register with the Broker</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="https://vtm.pro/eae2a2" target="_blank" id="myInput">https://vtm.pro/eae2a2</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="btn-list">
                <button class="btn btn-primary-light btn-wave" id="copyLinkBtn">Copy Link</button>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-body p-5">
                        <div class=" text-primary h5 fw-medium mb-4">Important note for registration
                        </div>
                        <div class="terms-conditions border p-3" id="terms-scroll">

                            <h5 class="fw-medium pb-3 text-danger"><span> You will be able to get our services only if you created a trading account with our given link.Otherwise no trading activity will be done by us in your account.</span></h5>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End::row-1 -->

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