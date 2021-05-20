<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en"> 		   <![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $template['title'].' - '.lang('cp:admin_title') ?></title>

	<base href="<?php echo base_url(); ?>" />

	<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>system/cms/themes/materialize/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>system/cms/themes/materialize/images/favicon/favicon-32x32.png">
    <link href="<?php echo base_url(); ?>system/cms/themes/materialize/css/fonts.css" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/cms/themes/materialize/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/cms/themes/materialize/css/themes/vertical-menu-nav-dark-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/cms/themes/materialize/css/themes/vertical-menu-nav-dark-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/cms/themes/materialize/css/pages/dashboard.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/cms/themes/materialize/css/custom/custom.css">
    <!-- END: Custom CSS-->
    <!-- Load up some favicons -->
	<link rel="shortcut icon" href="favicon.ico"> 

	<!-- metadata needs to load before some stuff --> 
 
</head>

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark preload-transitions 2-columns   " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">
 <!-- BEGIN: Header-->
 <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-purple-deep-orange gradient-shadow">
          <div class="nav-wrapper">
            <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
              <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
              <ul class="search-list collection display-none"></ul>
            </div>
            <ul class="navbar-list right">
              <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li>
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
              <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
              <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
              <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
            </ul>
            <!-- translation-button-->
            <ul class="dropdown-content" id="translation-dropdown">
              <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
              <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
              <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
              <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></li>
            </ul>
            <!-- notifications-dropdown-->
            <ul class="dropdown-content" id="notifications-dropdown">
              <li>
                <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
              </li>
              <li class="divider"></li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
              <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
              <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
              <li class="divider"></li>
              <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i> Lock</a></li>
              <li><a class="grey-text text-darken-1" href="user-login.html"><i class="material-icons">keyboard_tab</i> Logout</a></li>
            </ul>
          </div>
          <nav class="display-none search-sm">
            <div class="nav-wrapper">
              <form id="navbarForm">
                <div class="input-field search-input-sm">
                  <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                  <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                  <ul class="search-list collection search-list-sm display-none"></ul>
                </div>
              </form>
            </div>
          </nav>
        </nav>
      </div>
    </header>
    <!-- END: Header-->
<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="../../../app-assets/images/logo/materialize-logo.png" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
     
      <?php file_partial('navigation'); ?>
 
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

        <!-- BEGIN: Page Main-->
        <div id="main">
      <div class="row">
        <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6 breadcrumbs-left">
                <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>Blank Page</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Pages</a>
                  </li>
                  <li class="breadcrumb-item active">Blank Page
                  </li>
                </ol>
              </div> 
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section">
            <?php file_partial('shortcuts') ?>
                       

                      

                        
                       
                       <?php file_partial('notices'); ?>
                       <?php echo $template['body']; ?>
</div><!-- START RIGHT SIDEBAR NAV -->
 
<!-- END RIGHT SIDEBAR NAV -->
 
          </div>
          <div class="content-overlay"></div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/vendors/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/vendors/chartjs/chart.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/js/plugins.min.js"></script>
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/js/search.min.js"></script>
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/js/custom/custom-script.min.js"></script>
    <script src="<?php echo base_url(); ?>system/cms/themes/materialize/js/scripts/customizer.min.js"></script>
    <!-- END THEME  JS--> 
 <?php echo $template['metadata']; ?>
 
</body>
</html>