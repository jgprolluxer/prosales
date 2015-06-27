<!DOCTYPE html>
<!--[if IE 8]>
<html ng-app="prosales-app" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html ng-app="prosales-app" class="no-js">
    <!--<![endif]-->
    <?php
    $titlePage = "";
    $webSite = "";
    $copyRight = "";
    if (isset($config))
    {
        if (!empty($config))
        {
            $titlePage = $config["Config"]["name"];
            $webSite = $config["Config"]["website"];
            $copyRight = $config["Config"]["copyright"];
        }
    }
    ?>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titlePage; ?></title>
        <meta name="description" content="<?php echo __('Prosales is a tool made by ' . $copyRight) ?>">
        <meta name="author" content="<?php echo$copyRight; ?>">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/template_assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="/template_assets/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="/template_assets/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="/template_assets/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="/template_assets/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="/template_assets/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="/template_assets/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="/template_assets/img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <!--<link rel="stylesheet" href="/template_assets/css/bootstrap.min.css">-->
        <!-- Related styles of various icon packs and plugins -->
        <!--<link rel="stylesheet" href="/template_assets/css/plugins.css">-->
        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <!--<link rel="stylesheet" href="/template_assets/css/main.css">-->
        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <!--<link rel="stylesheet" href="/template_assets/css/themes.css">-->
        <!-- END Stylesheets -->
        <?php
        echo $this->Html->css('/template_assets/css/bootstrap.min.css');
        echo $this->Html->css('/template_assets/css/plugins.css');
        echo $this->Html->css('/template_assets/css/main.css');
        echo $this->Html->css('/template_assets/css/themes.css');
        
        echo $this->Html->css('/bower_components/angular-motion/dist/angular-motion.min.css');
        ?>
        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <!--<script src="/template_assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>-->
        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        <!--<script>!window.jQuery && document.write(decodeURI('%3Cscript src="/template_assets/js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>-->
        <!--<script src="/template_assets/js/vendor/jquery-1.11.0.min.js"></script>-->
        <?php
        echo $this->Html->script("/template_assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js");
        echo $this->Html->script("/template_assets/js/vendor/jquery-1.11.1.min.js");
        echo $this->Html->script("/bower_components/datatables/media/js/jquery.dataTables.min.js");
        echo $this->Html->script("/bower_components/moment/moment.js");
        echo $this->Html->script("/bower_components/angular/angular.js");
        echo $this->Html->script("/bower_components/angular-animate/angular-animate.min.js");
        echo $this->Html->script("/bower_components/angular-strap/dist/angular-strap.min.js");
        echo $this->Html->script("/bower_components/angular-strap/dist/angular-strap.tpl.min.js");
        echo $this->Html->script("/bower_components/angular-route/angular-route.js");
        echo $this->Html->script("/bower_components/angular-translate/angular-translate.js");
        echo $this->Html->script("/bower_components/angular-translate-loader-url/angular-translate-loader-url.js");
        echo $this->Html->script("/bower_components/angular-translate-loader-static-files/angular-translate-loader-static-files.js");
        echo $this->Html->script("/bower_components/angular-datatables/dist/angular-datatables.min.js");
        echo $this->Html->script("/bower_components/angular-moment/angular-moment.js");
        //echo $this->Html->script("/bower_components/angular-animate/angular-animate.min.js");
        //echo $this->Html->script("/bower_components/angular-strap/dist/my-angular-strap.min.js");
        //echo $this->Html->script("/bower_components/angular-strap/dist/my-angular-strap.tpl.min.js");
        echo $this->Html->script("/js/ui-bootstrap-tpls-0.12.0.js");
        echo $this->Html->script("/js/front-app.js");
        ?>
        <style type="text/css">
            div.required label:after {
                content: ' *';
                display: inline;
                color: #990000;
            }

            /* Pre, Code */
            pre {
                background: #F6E3CE;
                overflow: scroll;
            }
        </style>
        <script type="text/javascript">
            var baseAppPath = '<?php echo $this->base; ?>';
            var baseViewPath = '<?php echo $this->base . "/" . $this->name . "/"; ?>';
        </script>
    </head>
    <body ng-controller="ApplicationController">
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><?php echo __('LOADING');?></h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
            -->
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations header-fixed-top footer-fixed">
                <?php echo $this->element('sidebar-alt'); ?>
                <?php echo $this->element('sidebar'); ?>
                <!-- Main Container -->
                <div id="main-container">
                    <?php echo $this->element('header'); ?>
                    <!-- Page content -->
                    <div id="page-content">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <!-- END Page Content -->
                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-left">
                            <a href="<?php echo $webSite ?>" target="blank"><?php echo $copyRight; ?></a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
            <?php echo $this->element('usersettingsmodal'); ?>
            <?php echo $this->App->loadingModal(); ?>
        <!-- Remember to include excanvas for IE8 chart support -->
        <!--[if IE 8]><script src="/template_assets/js/helpers/excanvas.min.js"></script><![endif]-->
        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <!--<script src="/template_assets/js/vendor/bootstrap.min.js"></script>-->
        <!--<script src="/template_assets/js/plugins.js"></script>-->
        <!--<script src="/template_assets/js/app.js"></script>-->
        <!-- Load and execute javascript code used only in this page -->
        <!--<script src="/template_assets/js/pages/uiProgress.js"></script>-->
        <?php
        echo $this->Html->script("/template_assets/js/vendor/bootstrap.min.js");
        echo $this->Html->script("/template_assets/js/plugins.js"); // esto carga imagenes y marca errores
        echo $this->Html->script("/template_assets/js/app.js");
        echo $this->Html->script("/template_assets/js/pages/uiProgress.js");
        echo $this->Html->script("/js/utilities.js");
        echo $this->Html->script("/js/controllers/reportsController.js");
        echo $this->Html->script("/js/controllers/storesController.js");
        echo $this->Html->script("/js/controllers/workstationsController.js");
        echo $this->Html->script("/js/controllers/lovsController.js");
        echo $this->Html->script("/js/controllers/adminAccountsController.js");
        echo $this->Html->script("/js/controllers/ordersController.js");
        ?>
        <?php
        /**
         * Mostrar la bienvenida una sola ves
         */
        $firsLog = CakeSession::read('firstLoadLogin');
        //debug($firsLog);
        ?>

        <?php
        $sessionMsg = $this->Session->flash();
        $classMessage = NULL;
        $classMessage = ($this->Session->read("Operation") ? $this->Session->read("Operation") : NULL );
        $classMessage = (NULL == $classMessage ? 'info' : $classMessage);

        if ($sessionMsg)
        {
            if ((strpos($sessionMsg, '<script>') !== FALSE))
            {
                echo $sessionMsg;
            } else
            {
                ?>
                <script type="text/javascript">
                            $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i> <p><?php echo $sessionMsg; ?></p>', {
                                type: '<?php echo $classMessage; ?>',
                                delay: 10000,
                                allow_dismiss: true,
                                from: "top",
                                align: "center"
                            });
                </script>

                <?php
            }
        }
        ?>
        <script>

                    var isfirst = '<?php echo $firsLog; ?>';
                    var welcomeisShowed = false;
                    if (welcomeisShowed === false && '1' === isfirst) {
                        $(function () {
                            $.bootstrapGrowl('<h4>Hi!</h4> <p>Bienvenido al punto de venta!</p>', {
                                type: 'info',
                                delay: 2500,
                                allow_dismiss: true
                            });
                            welcomeisShowed = true;
                        });
                    }

                    //console.log("<?php //echo $this->params['CURRENT_PAGE'];     ?>");
                    //console.log("<?php //echo $this->params['ACTIVE_MENU'];     ?>");


                    /*//////Active menu for intranet
                     if ("" !== "<?php //echo $this->params['CURRENT_PAGE'];  ?>")
                     {
                     $("#link_" + "<?php //echo $this->params['CURRENT_PAGE'];  ?>").addClass('active');
                     }
                     setTimeout(function ()
                     {
                     if ("" !== "<?php //echo $this->params['ACTIVE_MENU'];  ?>")
                     {
                     $("#" + "<?php //echo $this->params['ACTIVE_MENU'];  ?>").trigger('click');
                     }
                     if ("" !== "<?php //echo $this->params['ACTIVE_SUBMENU'];  ?>")
                     {
                     $("#" + "<?php //echo $this->params['ACTIVE_SUBMENU'];  ?>").trigger('click');
                     }

                     }, 1000);
                     */


        </script>

        <?php
        CakeSession::write('firstLoadLogin', null);
        $firsLog = null;
        $classMessage = NULL;
        CakeSession::write('Operation', $classMessage);
        ?>
        <input type="hidden" id = "txt_objectType" value="<?php echo $relObjType ?>" />
        <input type="hidden" id = "txt_objectID" value="<?php echo $relObjId ?>" />

    </body>
</html>
