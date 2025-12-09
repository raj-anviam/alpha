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
                    <?php if ($showForm == 1) { ?>
                        <form class="row g-3 mt-0" action="<?php echo site_url('auth/change_password/'.$uri3); ?>" method="post" id="changePwdform">
                            <div class="card custom-card my-4">

                                <div class="top-left"></div>
                                <div class="top-right"></div>
                                <div class="bottom-left"></div>
                                <div class="bottom-right"></div>
                                <div class="card-body p-5">
                                    <div class="mb-3 d-flex justify-content-center">
                                        <a href="index.html">
                                            <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="desktop-logo">
                                            <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-dark">
                                        </a>
                                    </div>
                                    <p class="h5 mb-2 text-center">Reset Password</p>

                                    <div class="row gy-3">
                                        <div class="col-xl-12">
                                            <label for="signin-username" class="form-label text-default">New Password</label>
                                            <input type="text" class="form-control" id="signin-username" placeholder="Please Enter Your New Password" name="password" required>
                                        </div>
                                        <div class="col-xl-12">
                                            <label for="signin-username" class="form-label text-default">Confirm Password</label>
                                            <input type="text" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
                                        </div>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-muted mt-3 mb-0">Dont have an account? <a href="<?php echo site_url('auth/register')?>" class="text-primary">Sign Up</a></p>
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
                    <?php } else { ?>
                        <div class="alert alert-danger d-flex align-items-center mt-5" role="alert">
                            <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                                <g>
                                    <rect fill="none" height="24" width="24" />
                                </g>
                                <g>
                                    <g>
                                        <g>
                                            <path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z" />
                                            <rect height="6" width="2" x="11" y="7" />
                                            <rect height="2" width="2" x="11" y="15" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <div>Token Expired.</div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--APP-CONTENT CLOSE-->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 text-center">
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
    $("#changePwdform").submit(function(e) {
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
                    var redirecturl = myData.url;
                    toastmessagesuccess(msg, 'Success', 'success', redirecturl);
                }
                $('#loader').hide();
                //$('#error_msg_div').html(data);


            }
        });

    });

    function toastmessagesuccess(msg, head, icon, url = '') {
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
                window.location.href = url;
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