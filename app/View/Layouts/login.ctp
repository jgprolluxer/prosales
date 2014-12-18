<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Pro Sales - Login</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
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
        <link rel="stylesheet" href="/template_assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="/template_assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="/template_assets/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="/template_assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="/template_assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="/template_assets/img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->
        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1>
                    <i class="gi gi-flash"></i><strong>Pro Sales</strong><br>
                </h1>
                <?php
                $sessionMsg = $this->Session->flash();
                if (false !== $sessionMsg) {
                    
                    ?>
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-exclamation-circle"></i><?php echo $sessionMsg; ?></h4>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <!-- <form action="index.html" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">-->
                <?php
                echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'login'),
                    'class' => 'form-horizontal form-bordered form-control-borderless',
                    'id' => 'form-login',
                    'inputDefaults' => array('label' => false))
                );
                ?>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            <!-- <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">-->
                            <?php echo $this->Form->input('User.username', array('id' => 'login-email', 'class' => 'form-control input-lg', 'placeholder' => 'Usuario'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                             <!-- <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">-->
                            <?php echo $this->Form->input('User.password', array('id' => 'login-password', 'class' => 'form-control input-lg', 'placeholder' => __("Contraseña")));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-xs-4">
                        <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                            <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                            <span></span>
                        </label>
                    </div>
                    <div class="col-xs-8 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Ingresar</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 text-center">
                        <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
                    </div>
                </div>
                </form>
                <!-- END Login Form -->

                <!-- Reminder Form -->
                <form action="login_full.html#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->

            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="/template_assets/js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="/template_assets/js/vendor/bootstrap.min.js"></script>
        <script src="/template_assets/js/plugins.js"></script>
        <script src="/template_assets/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="/template_assets/js/pages/login.js"></script>
        <script>
            $(function() {
                Login.init();
            });
        </script>
    </body>
</html>