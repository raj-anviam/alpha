<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-vertical-style="detached" data-toggled="detached-close" data-card-style="style1" data-card-background="background1">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Alpha </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin panel, admin, admin template, dashboard template, dashboard template bootstrap, crm dashboard, stocks dashboard, projects dashboard, sales dashboard, html template, html css templates, html dashboard, dashboard, bootstrap dashboard, template dashboard">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/images/brand-logos/favicon.ico'); ?>" type="image/x-icon">

    <!-- Choices JS -->
    <script src="<?php echo base_url('assets/libs/choices.js/public/assets/scripts/choices.min.js'); ?>"></script>

   <!-- Main Theme Js -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Style Css -->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">

    <!-- Icons Css -->
    <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="<?php echo base_url('assets/libs/node-waves/waves.min.css'); ?>" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="<?php echo base_url('assets/libs/simplebar/simplebar.min.css'); ?>" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/@simonwep/pickr/themes/nano.min.css'); ?>">

    <!-- Choices Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/choices.js/public/assets/styles/choices.min.css'); ?>">
    <!-- jquery-toast-plugin CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
   
</head>

<body class="authentication-background">
    <!-- Loader -->
    <div id="loader" style="display: none;">
        <img src="<?php echo base_url('assets/images/media/loader.svg'); ?>" alt="">
    </div>
    <!-- Loader -->

    <div class="page"> <!--APP-CONTENT START-->
        <div class="container">
            
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
               
                <div class="col-xxl-5 col-xl-5 col-md-6 col-sm-8 col-12">
                    <?php $message = $this->session->flashdata('formMsg');
                    if ($message) {
                        echo $message;
                    }
                ?>
                <form class="row g-3 mt-0" action="<?php echo site_url('auth/signin'); ?>" method="post">
                    <div class="card custom-card my-4">
                        
                        <div class="top-left"></div>
                        <div class="top-right"></div>
                        <div class="bottom-left"></div>
                        <div class="bottom-right"></div>
                        <div class="card-body p-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="">
                                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="desktop-logo">
                                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-dark">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Sign In</p>
                            
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">UserName</label>
                                    <input type="text" class="form-control" id="signin-username" placeholder="Username Or Email" name="username">
                                    <span class="badge bg-outline-primary"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Password<a href="<?php echo site_url('auth/forgot_password')?>" class="float-end text-danger">Forgot password ?</a></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control create-password-input" id="signin-password" placeholder="password" name="password">
                                        <span class="badge bg-outline-primary"><?php echo form_error('password'); ?></span>
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0">Dont have an account? <a href="<?php echo site_url('auth/register')?>" class="text-primary">Sign Up</a></p>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0"><a href="<?php echo site_url('auth/forgot_password')?>" class="text-danger">Forgot Password ?</a></p>
                            </div>
                            <div class="btn-list text-center mt-3">
                                <button class="btn btn-icon btn-sm btn-wave authentication-social-btn">
                                    <i class="ri-facebook-line fw-bold"></i>
                                </button>
                                <button class="btn btn-icon btn-sm btn-wave authentication-social-btn">
                                    <i class="ri-twitter-x-line fw-bold"></i>
                                </button>
                                <button class="btn btn-icon btn-sm btn-wave authentication-social-btn">
                                    <i class="ri-instagram-line fw-bold"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--APP-CONTENT CLOSE-->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 text-center">
            <div class="col-xl-3" id="error_msg_div" style="display:none;">
                <div class="card border-0" id="validationDiv">
                    <div class="alert alert-primary border border-primary mb-0 p-2">
                        <div class="d-flex align-items-start">
                            <div class="me-2 svg-primary">
                                <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg>
                            </div>
                            <div class="text-primary w-100">
                                <div class="fw-medium d-flex justify-content-between">Error<button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>
                                <div class="fs-12 op-8 mb-1" id="error_msg"></div>
                                <div class="fs-12 d-inline-flex">
                                    <a href="javascript:void(0);" class="text-secondary fw-medium me-2 d-inline-block">cancel</a>
                                    <a href="javascript:void(0);" class="text-primary fw-medium">open</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year">2025</span> <a
                        href="javascript:void(0);" class="text-dark fw-medium">Alpha Gold Trading</a>. All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->


    </div>


    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="<?php echo base_url('assets/libs/@popperjs/core/umd/popper.min.js'); ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Node Waves JS-->
    <script src="<?php echo base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>

    <!-- Color Picker JS -->
    <script src="<?php echo base_url('assets/libs/@simonwep/pickr/pickr.es5.min.js'); ?>"></script>

    <!-- Show Password JS -->
    <script src="<?php echo base_url('assets/js/show-password.js'); ?>"></script>
    <!-- Form Validation JS -->
    <script src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jquery-toast-plugin JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
</body>
<script>
    $("#signupform").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $('#loader').removeClass('d-none');
        $('#loader').show();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                var myData = JSON.parse(data);
                var status = myData.status;
                var msg = myData.msg;
                if (status == 'error') {
                    toastmessage(msg, 'error', 'error');
                } else {
                    toastmessagesuccess(msg, 'Success', 'success');
                }
            $('#loader').hide();
                //$('#error_msg_div').html(data);


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
            afterHidden: function() {
                window.location.href = '<?php echo site_url('alpha/login'); ?>';
            }
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

</html>