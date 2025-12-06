<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-toggled="close" data-vertical-style="default" data-card-style="style1" data-card-background="background1">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Alpha </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/images/brand-logos/favicon.ico'); ?>" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="<?php echo base_url('assets/js/authentication-main.js'); ?>"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Style Css -->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">

    <!-- Icons Css -->
    <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">
    <!-- jquery-toast-plugin CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

</head>

<body class="authentication-background">
<!-- Loader -->
    <div id="loader" style="display: none;">
        <img src="<?php echo base_url('assets/images/media/loader.svg'); ?>" alt="">
    </div>
    <!-- Loader -->
    <div class="container-lg">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-5 col-xl-5 col-md-6 col-sm-8 col-12">
                <?php if ($showForm == 1) { ?>
                    <div class="card custom-card my-4">
                        <div class="top-left"></div>
                        <div class="top-right"></div>
                        <div class="bottom-left"></div>
                        <div class="bottom-right"></div>
                        <div class="card-body p-5">
                            <form class="row g-3 mt-0" action="<?php echo site_url('auth/confirm_otp/' . $uri3); ?>" method="post" id="verifyemailform">
                                <div class="mb-3 d-flex justify-content-center">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png'); ?>" alt="logo" class="desktop-logo">
                                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png'); ?>" alt="logo" class="desktop-dark">
                                    </a>
                                </div>
                                <p class="h5 mb-2 text-center">Verification Code</p>
                                <p class="mb-4 text-muted op-7 fw-normal text-center fs-14">Enter the 4 digit code sent to your email id.</p>
                                <div class="row gy-3">
                                    <div class="col-xl-12 mb-2">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="one" maxlength="1" onkeyup="clickEvent(this,'two')" name="one" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="two" maxlength="1" onkeyup="clickEvent(this,'three')" name="two" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="three" maxlength="1" onkeyup="clickEvent(this,'four')" name="three" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="four" maxlength="1" name="four" required>
                                            </div>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label fs-14" for="defaultCheck1">
                                                Didn't recieve a code ?<a href="mail.html" class="text-primary ms-2 d-inline-block">Resend</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-primary">Verify</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Internal Two Step Verification JS -->
    <script src="<?php echo base_url('assets/js/two-step-verification.js'); ?>"></script>
    <!-- Form Validation JS -->
    <script src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jquery-toast-plugin JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
</body>
<script>
    $("#verifyemailform").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
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