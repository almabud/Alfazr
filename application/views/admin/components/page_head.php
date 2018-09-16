<!DOCTYPE html>
<html lang="en">
<!--================================================================================
Item Name: Materialize - Material Design Admin Template
Version: 4.0
Author: PIXINVENT
Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Materialize - Material Design Admin Template</title>
    <!-- Favicons-->
    <link rel="icon" href="<?php echo site_url('images/favicon/favicon-32x32.png'); ?>" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('images/favicon/apple-touch-icon-152x152.png'); ?>">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo site_url('images/favicon/mstile-144x144.png'); ?>">

    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="<?php echo site_url('css/themes/collapsible-menu/materialize.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('css/themes/collapsible-menu/style.css'); ?>" type="text/css" rel="stylesheet">
    <?php if(site_url()!='admin/dashboard/profile' && uri_string()!= 'admin/hotels' && uri_string()!= 'admin/rooms'){ ?>
    <link href="<?php echo site_url('css/layouts/page-center.css'); ?>" type="text/css" rel="stylesheet">
    <?php } ?>
    
   <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo site_url('vendors/prism/prism.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('vendors/perfect-scrollbar/perfect-scrollbar.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('vendors/magnific-popup/magnific-popup.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('vendors/jvectormap/jquery-jvectormap.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('vendors/jquery.nestable/nestable.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('vendors/flag-icon/css/flag-icon.min.css'); ?>" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--dropify-->
    <link href="<?php echo site_url('vendors/dropify/css/dropify.min.css'); ?>" type="text/css" rel="stylesheet">
    <!-- date picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link href="<?php echo site_url('vendors/sweetalert/dist/sweetalert.css'); ?>" type="text/css" rel="stylesheet">
    <?php if(uri_string()=='admin/hotels') { ?>
    <link href="<?php echo site_url('css/custom/pekeupload.css'); ?>" type="text/css" rel="stylesheet">
    <?php } ?>


    <!-- Froala edito --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <link href="<?php echo site_url('vendors/froala/css/froala_editor.pkgd.css'); ?>" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="<?php echo site_url('css/custom/custom_style.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo site_url('css/custom/preloader.css'); ?>" type="text/css" rel="stylesheet">


  </head>
<?php
$body_color=null;
$check_uri=rtrim('admin/user/login/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'/');
$check_uri2=rtrim('admin/user/re_send_email/'.$this->uri->segment(4),'/');
if(uri_string()=='admin/user/login' || uri_string()=='admin/user/register' || uri_string()==$check_uri ||uri_string()==$check_uri2)
    $body_color='cyan';
?>
<body class="<?php echo $body_color; ?>">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<?php if(uri_string()!='admin/user/login' && uri_string()!='admin/user/register' && uri_string()!=$check_uri && uri_string()!=$check_uri2) { ?>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">
                <div class="nav-wrapper">
                    <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
                        <i class="material-icons">search</i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                                <span class="flag-icon flag-icon-gb"></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                                <i class="material-icons">settings_overscan</i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                                <i class="material-icons">notifications_none
                                    <small class="notification-badge">5</small>
                                </i>
                            </a>
                        </li>
                        <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                            <span class="avatar-status avatar-online nav_bar_profile_photo">
                               <?php
                                $pro_photo=site_url('images/avatar/avatar-7.png');
                                 if($this->data['profile_photo']!='')
                                    $pro_photo=site_url('images/user_photo/').$this->data['profile_photo'];
                               ?>

                            <img src="<?php echo $pro_photo; ?>"  alt="">
                            <i></i>
                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                                <i class="material-icons">format_indent_increase</i>
                            </a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                    <ul id="translation-dropdown" class="dropdown-content">
                        <li>
                            <a href="#!" class="grey-text text-darken-1">
                                <i class="flag-icon flag-icon-gb"></i> English</a>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-1">
                                <i class="flag-icon flag-icon-fr"></i> French</a>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-1">
                                <i class="flag-icon flag-icon-cn"></i> Chinese</a>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-1">
                                <i class="flag-icon flag-icon-de"></i> German</a>
                        </li>
                    </ul>
                    <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                        <li>
                            <h6>NOTIFICATIONS
                                <span class="new badge">5</span>
                            </h6>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#!" class="grey-text text-darken-2">
                                <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-2">
                                <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-2">
                                <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-2">
                                <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                        </li>
                        <li>
                            <a href="#!" class="grey-text text-darken-2">
                                <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                        </li>
                    </ul>
                    <!-- profile-dropdown -->
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">face</i> Profile</a>
                        </li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">settings</i> Settings</a>
                        </li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">live_help</i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">lock_outline</i> Lock</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/user/logout'); ?>" class="grey-text text-darken-1">
                                <i class="material-icons">keyboard_tab</i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
<?php } ?>
<!-- END HEADER -->
