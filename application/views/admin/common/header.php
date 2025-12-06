<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-vertical-style="detached" data-toggled="detached-close" data-card-style="style1" data-card-background="background1" >

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
    <link rel="icon" href="<?php echo base_url('assets/images/brand-logos/favicon.ico');?>" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="<?php echo base_url('assets/libs/choices.js/public/assets/scripts/choices.min.js');?>"></script>

    <!-- Main Theme Js -->
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" >

    <!-- Style Css -->
    <link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="<?php echo base_url('assets/css/icons.css');?>" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="<?php echo base_url('assets/libs/node-waves/waves.min.css');?>" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="<?php echo base_url('assets/libs/simplebar/simplebar.min.css');?>" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/@simonwep/pickr/themes/nano.min.css');?>">

    <!-- Choices Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/choices.js/public/assets/styles/choices.min.css');?>">


<!-- Jsvector Maps -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/jsvectormap/css/jsvectormap.min.css');?>">
<!-- jquery-toast-plugin CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

</head>

<body>


    <!-- Loader -->
<div id="loader" style="display: none;" >
    <img src="<?php echo base_url('assets/images/media/loader.svg');?>" alt="">
</div>
<!-- Loader -->

    <div class="page">
         <!-- app-header -->
 <header class="app-header sticky"> 

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid"> 

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="<?php echo site_url('user/home');?>" class="header-logo">
                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-logo">
                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="toggle-dark">
                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-dark">
                        <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="toggle-logo">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element mx-lg-0 mx-2">
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header -->
                <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">
            
            <div class="top-left"></div>
            <div class="top-right"></div>
            <div class="bottom-left"></div>
            <div class="bottom-right"></div>
            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="<?php echo site_url('user/home')?>" class="header-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="toggle-dark">
                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_173X52.png');?>" alt="logo" class="desktop-dark">
                    <img src="<?php echo base_url('assets/images/brand-logos/Logo_52X52.png');?>" alt="logo" class="toggle-logo">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">
<?php $uri2 = $this->uri->segment(2);?>
                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>
                    <ul class="main-menu">

                        <!-- Start::slide -->
                        <li class="slide <?php if($uri2 == 'get_payment_requests'){ echo 'active'; }?>">
                            <a href="<?php echo site_url('admin/get_payment_requests')?>" class="side-menu__item <?php if($uri2 == 'get_payment_requests'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" opacity="0.2"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Payments</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                          <!-- Start::slide -->
                        <li class="slide <?php if($uri2 == 'get_introducing_requests'){ echo 'active'; }?>">
                            <a href="<?php echo site_url('admin/get_introducing_requests')?>" class="side-menu__item <?php if($uri2 == 'get_introducing_requests'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" opacity="0.2"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Ib requests</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                       

                        

                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->

        


 