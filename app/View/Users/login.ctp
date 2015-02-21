<!-- Login Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="/template_assets/img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
<!-- END Login Full Background -->
<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Block -->
    <div class="block push-bit">
        <!-- Login Title -->
        <div class="login-title text-center">
            <h1>
                <i class="gi gi-flash"></i><strong>Pro Sales</strong><br>
            </h1>
        </div>
        <!-- END Login Title -->
        <!-- Login Form -->
        <!-- <form action="index.html" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">-->
        <?php
        echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'login'),
                'class' => 'form-horizontal',
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
<script type="text/javascript">
    $(document).ready(function ()
    {
//$('#page-container').removeClass('sidebar-visible-xs');
//$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
    });
</script>
