<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en"> 		   <![endif]-->

<head>
	<meta charset="utf-8">

	<!-- You can use .htaccess and remove these lines to avoid edge case issues. -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $template['title'].' - '.lang('cp:admin_title') ?></title>

	<base href="<?php echo base_url(); ?>" />

	<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- CSS. No need to specify the media attribute unless specifically targeting a media type, leaving blank implies media=all -->
 
 
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/mytheme.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/skins/skin-master.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>system/cms/themes/admin/css/markdown.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>system/cms/themes/admin/css/miscellaneous/reactions/reactions.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>system/cms/themes/admin/css/miscellaneous/fullcalendar/fullcalendar.bundle.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>system/cms/themes/admin/css/miscellaneous/jqvmap/jqvmap.bundle.css" /> 
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/notifications/toastr/toastr.css">
    
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/notifications/sweetalert2/sweetalert2.bundle.css">
	<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/formplugins/select2/select2.bundle.css">
	<!-- End CSS-->
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/datagrid/datatables/datatables.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
	<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>system/cms/themes/admin/css/formplugins/dropzone/dropzone.css">
    
    <!-- Load up some favicons -->
	<link rel="shortcut icon" href="favicon.ico"> 

	<!-- metadata needs to load before some stuff --> 
 
</head>

<body class="mod-bg-1 mod-nav-link nav-function-fixed header-function-fixed   ">
<script>
    /**
     *	This script should be placed right after the body tag for fast execution
     *	Note: the script is written in pure javascript and does not depend on thirdparty library
     **/
    'use strict';  
    layouts.horizontalNavigation('on'); 
    var classHolder = document.getElementsByTagName("BODY")[0],
        /**
         * Load from localstorage
         **/
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
        {},
        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';
    /**
     * Load theme options
     **/
    if (themeSettings.themeOptions)
    {
        classHolder.className = themeSettings.themeOptions;
        console.log("%c✔ Theme settings loaded", "color: #148f32");
    }
    else
    {
        console.log("%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...", "color: #ed1c24");
    }
    if (themeSettings.themeURL && !document.getElementById('mytheme'))
    {
        var cssfile = document.createElement('link');
        cssfile.id = 'mytheme';
        cssfile.rel = 'stylesheet';
        cssfile.href = themeURL;
        document.getElementsByTagName('head')[0].appendChild(cssfile);

    }
    else if (themeSettings.themeURL && document.getElementById('mytheme'))
    {
        document.getElementById('mytheme').href = themeSettings.themeURL;
    }
    /**
     * Save to localstorage
     **/
    var saveSettings = function()
    {
        themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
        {
            return /^(nav|header|footer|mod|display)-/i.test(item);
        }).join(' ');
        if (document.getElementById('mytheme'))
        {
            themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
        };
        localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
    }
    /**
     * Reset settings
     **/
    var resetSettings = function()
    {
        localStorage.setItem("themeSettings", "");
    }

</script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="<?php echo base_url(); ?>assets/images/logo-small.png" alt="SmartAdmin for PHP" aria-roledescription="logo">
            <span class="page-logo-text mr-1"><?php echo $this->settings->site_name?></span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="<?php echo base_url(); ?>system/cms/themes/admin/img/demo/avatars/avatar-m.png" class="profile-image rounded-circle" alt="<?php echo $this->current_user->first_name?>">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block">
                        <?php echo $this->current_user->first_name?>
                    </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm"> <?php echo $this->current_user->group?></span>
            </div>
            <img src="<?php echo base_url(); ?>system/cms/themes/admin/img/card-backgrounds/cover-4-lg.png" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <?php file_partial('navigation'); ?>
                 
                <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div> <!-- END NAV FOOTER -->
</aside>

<!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
<!-- BEGIN Page Header -->
<header class="page-header" role="banner">
    <!-- we need this logo when user switches to nav-function-top -->
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="<?php echo base_url(); ?>assets/images/logo-small.png" alt="SmartAdmin for PHP" aria-roledescription="logo">
            
        </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
            <i class="ni ni-menu"></i>
        </a>
        <ul>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                    <i class="ni ni-minify-nav"></i>
                </a>
            </li>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                    <i class="ni ni-lock-nav"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
            <i class="ni ni-menu"></i>
        </a>
    </div>
    <div class="search">
       
    </div>
    <div class="ml-auto d-flex">
        <!-- activate app search icon (mobile) -->
        <div class="hidden-sm-up">
            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                <i class="fal fa-search"></i>
            </a>
        </div>
        <!-- app settings -->
         
        <!-- app message -->
       
        <!-- app notification -->
         
        <!-- app user menu -->
        <div>
            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                <img src="<?php echo base_url(); ?>system/cms/themes/admin/img/demo/avatars/avatar-m.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                        <span class="mr-2">
                            <img src="<?php echo base_url(); ?>system/cms/themes/admin/img/demo/avatars/avatar-admin.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                        </span>
                        <div class="info-card-text">
                            <div class="fs-lg text-truncate text-truncate-lg"><?php echo $this->current_user->first_name?></div>
                            <span class="text-truncate text-truncate-md opacity-80"><?php echo $this->current_user->group?> , ID: <?php echo $this->current_user->id?></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>
                <a href="admin/logout" class="dropdown-item" >
                    <span data-i18n="drpdwn.reset_layout">Logout</span>
                </a>
                 
                <div class="dropdown-divider m-0"></div>
               
            </div>
        </div>
    </div>
</header>
 

<!-- END Page Header -->
<!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    
                    
                    <main id="js-page-content" role="main" class="page-content">
                    <div class="subheader">
                            <h1 class="subheader-title">
                                <i class="subheader-icon fal fa-chart-area"></i> <?php echo $template['title']?> <span class="fw-300">Dashboard</span>
                            </h1>
                            <div class="subheader-block d-lg-flex align-items-center">
                               
                               
                            </div>
                        </div>
                        <?php file_partial('shortcuts') ?>
                       

                      

                        
                       
                        <?php file_partial('notices'); ?>
                        <?php echo $template['body']; ?>
                    </main>
                    <!-- END Page Content -->
                    <!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<!-- BEGIN Page Footer -->
<!-- BEGIN Page Footer -->
<footer class="page-footer" role="contentinfo">
    <div class="d-flex align-items-center flex-1 text-muted">
        <span class="hidden-md-down fw-700">2020 ©  V.1 </span>
    </div>
    <div>
        <ul class="list-table m-0">
            <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
            <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
            <li class="pl-3"><a href="docs_general.html" class="text-secondary fw-700">Documentation</a></li>
            <li class="pl-3 fs-xl"><a href="" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</footer>
<!-- END Page Footer -->
<!-- END Page Footer -->
<!-- BEGIN Shortcuts -->
<!-- BEGIN Shortcuts -->
<div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="app-list w-auto h-auto p-0 text-left">
                    <li>
                        <a href="admin" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Home
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/logout" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                <i class="ni ni-envelope icon-stack-1x text-white"></i>
                            </div>
                            <span class="app-list-name">
                                Logout
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Add More
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Shortcuts -->
<!-- END Shortcuts -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
 
<!-- END Quick Menu -->
<!-- END Quick Menu -->
<!-- BEGIN Colors -->
<!-- BEGIN Color profile -->
<!-- this area is hidden and will not be seen on screens or screen readers -->
<!-- we use this only for CSS color refernce for JS stuff -->
 
<!-- END Color profile -->
<!-- END Colors -->
<!-- BEGIN Messenger -->
<!-- BEGIN Messenger -->
 
<!-- END Messenger -->
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
<!-- BEGIN Page Settings -->
 

<!-- modal alert -->
<div class="modal  fade" id="main-modal"   role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary-700 ">
                                                            <h4 class="modal-title" id="main-title">
                                                                
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="main-body">
													  
															 
                                                        </div>
                                                        <div class="modal-footer">
														
													   <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url(); ?>system/cms/themes/admin/js/app.bundle.js"></script>
       
        <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/dependency/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/miscellaneous/fullcalendar/fullcalendar.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/statistics/sparkline/sparkline.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/statistics/easypiechart/easypiechart.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/statistics/flot/flot.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/miscellaneous/jqvmap/jqvmap.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/formplugins/select2/select2.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/function.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/notifications/toastr/toastr.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>system/cms/themes/admin/js/formplugins/dropzone/dropzone.js"></script>
        <?php echo $template['metadata']; ?>
<script>
  
    </script>
</body>
</html>