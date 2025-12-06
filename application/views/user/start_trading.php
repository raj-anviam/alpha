<?php $this->load->view('user/common/header'); ?>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-2 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Activation Center
                        </div>
                    </div>
                    <div class="card-body p-0" id ="activation-div">
                        <form class="wizard wizard-tab horizontal" method="POST" action="<?php echo site_url('user/get_qrcode')?>" id="tradingForm">
                            <aside class="wizard-content container">
                                <div class=" wizard-step " data-title="STEP 1"
                                    data-id="2e8WqSV3slGIpTbnjcJzmDwBQaHrfh0Z">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <div class="register-page">
                                                <h6 class="mb-3">Enter the account details you received from the broker :</h6>
                                                <div class="row gy-3">
                                                    <div class="col-xl-12">
                                                        <label for="Customer" class="form-label">Server Name</label>
                                                        <input type="text" class="form-control " id="Customer"
                                                            placeholder="Enter Server Name" name="server_name" required>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="last-name" class="form-label">Trading Id</label>
                                                        <input type="text" class="form-control " id="last-name"
                                                            placeholder="Enter Trading" name="trading_id" required>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="Trading Password" class="form-label">Trading Password</label>
                                                        <input type="password" class="form-control " id="Email"
                                                            placeholder="Trading Password" name="trading_password" required>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="Email" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" name="email_id" id="Email"
                                                            placeholder="Enter Email Adress" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" wizard-step active" data-title="STEP 2"
                                    data-id="2e8WqSV3slGIpTbnjcJzmDwBQaHrfh0Z">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <div class="register-page">
                                                <h5 class="mb-3">Subscribe to AlphaXAU Miner :</h5>
                                                <h6 class="mb-3">You have to pay $19 for 12 MONTHS. This includes full access to the AlphaXAU Miner updates, customer support, and educational resources.</h6>
                                                <div class="row gy-3 mb-3">
                                                    <div class="col-xl-12">
                                                        <label for="gender" class="form-label">Select Method</label>
                                                        <select class="form-select" aria-label="Default select example" id="method" name="method_id">
                                                            <option value="" selected>Select
                                                            </option>
                                                            <?php foreach($payment_method as $val){ ?>
                                                                <option value="<?php echo base64e($val['payment_method_id']);?>"><?php echo $val['payment_method'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row gy-3" id="scanner-div">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-2 -->

    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('user/common/footer'); ?>
<script>
    $('#method').on('change', function() {
       // e.preventDefault(); // avoid to execute the actual submit of the form.
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
                } else {
                    $('#scanner-div').html('');
                    toastmessage(msg, 'error', 'error');
                }
                $('#loader').hide();
            }
        });
    });

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
    </script> 