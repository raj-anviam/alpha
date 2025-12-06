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
                        <li class="slide <?php if($uri2 == 'home'){ echo 'active'; }?>">
                            <a href="<?php echo site_url('user/home')?>" class="side-menu__item <?php if($uri2 == 'home'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" opacity="0.2"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub <?php if($uri2 == 'create_account' || $uri2 == 'start_trading'){ echo 'active open'; }?>">
                            <a href="javascript:void(0);" class="side-menu__item <?php if($uri2 == 'create_account' || $uri2 == 'start_trading'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polygon points="152 32 152 88 208 88 152 32" opacity="0.2"/><path d="M200,224H56a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h96l56,56V216A8,8,0,0,1,200,224Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="152 32 152 88 208 88" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Activation</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 pages-ul">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Activation</a>
                                </li>
                                
                                <li class="slide <?php if($uri2 == 'create_account'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/create_account');?>" class="side-menu__item <?php if($uri2 == 'create_account'){ echo 'active'; }?>">Create an Account</a>
                                </li>
                                <li class="slide <?php if($uri2 == 'start_trading'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/start_trading');?>" class="side-menu__item <?php if($uri2 == 'start_trading'){ echo 'active'; }?>">Start Trading</a>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub <?php if($uri2 == 'refer_friend' || $uri2 == 'partner_program'){ echo 'active open'; }?>">
                            <a href="javascript:void(0);" class="side-menu__item <?php if($uri2 == 'refer_friend' || $uri2 == 'partner_program'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><circle cx="128" cy="96" r="48" opacity="0.2"/><circle cx="128" cy="96" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="128" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="176 160 176 240 127.99 216 80 240 80 160.01" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Partner Program</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 pages-ul">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Partner Program</a>
                                </li>
                                
                                <li class="slide <?php if($uri2 == 'partner_program'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/partner_program');?>" class="side-menu__item <?php if($uri2 == 'partner_program'){ echo 'active'; }?>">Patner Program</a>
                                </li>
                                <li class="slide <?php if($uri2 == 'refer_friend'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/refer_friend');?>" class="side-menu__item <?php if($uri2 == 'refer_friend'){ echo 'active'; }?>">Refer & Earn</a>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- End::slide -->
                         <!-- Start::slide -->
                        <li class="slide has-sub <?php if($uri2 == 'user_profile' || $uri2 == 'profile_settings' || $uri2 == 'logout'){ echo 'active open'; }?>">
                            <a href="javascript:void(0);" class="side-menu__item <?php if($uri2 == 'user_profile' || $uri2 == 'profile_settings' || $uri2 == 'logout'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M128,32A96,96,0,0,0,63.8,199.38h0A72,72,0,0,1,128,160a40,40,0,1,1,40-40,40,40,0,0,1-40,40,72,72,0,0,1,64.2,39.37A96,96,0,0,0,128,32Z" opacity="0.2"/><circle cx="128" cy="120" r="40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M63.8,199.37a72,72,0,0,1,128.4,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="200 128 224 152 248 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="8 128 32 104 56 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M32,104v24a96,96,0,0,0,174,56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M224,152V128A96,96,0,0,0,50,72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Authentication</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Authentication</a>
                                </li>
                                <li class="slide <?php if($uri2 == 'user_profile'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/user_profile')?>" class="side-menu__item <?php if($uri2 == 'user_profile'){ echo 'active'; }?>">Profile</a>
                                </li>
                                <li class="slide <?php if($uri2 == 'profile_settings'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('user/profile_settings')?>" class="side-menu__item <?php if($uri2 == 'profile_settings'){ echo 'active'; }?>">Profile Settings</a>
                                </li>
                                <li class="slide <?php if($uri2 == 'logout'){ echo 'active'; }?>">
                                    <a href="<?php echo site_url('auth/logout')?>" class="side-menu__item">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide <?php if($uri2 == 'tnc'){ echo 'active'; }?>">
                            <a href="<?php echo site_url('user/tnc')?>" class="side-menu__item <?php if($uri2 == 'tnc'){ echo 'active'; }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polygon points="32 80 128 136 224 80 128 24 32 80" opacity="0.2"/><polyline points="32 176 128 232 224 176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="32 128 128 184 224 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polygon points="32 80 128 136 224 80 128 24 32 80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                <span class="side-menu__label">Terms & Conditions</span>
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

        


 