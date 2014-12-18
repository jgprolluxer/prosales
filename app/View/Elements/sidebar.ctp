<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="<?php echo Router::url("/Dashboards/"); ?>" class="sidebar-brand">
                <i class="gi gi-flash"></i>
                <span class="sidebar-nav-mini-hide"><?php echo $config["Config"]["name"]; ?></span>
            </a>
            <!-- END Brand -->
            <?php
            $userImg = $signedUser["User"]["avatar"];
            if ($userImg == "" || $userImg == null)
            {
                $userImg = "/files/uploads/avatars/no-avatar.png";
            }
            ?>
            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="<?php echo $userImg; ?>" data-toggle="lightbox-image">
                        <img src="<?php echo $userImg; ?>" >
                    </a>
                </div>
                <div class="sidebar-user-name"><?php echo $signedUser["User"]["firstname"]; ?> <?php echo $signedUser["User"]["lastname"]; ?></div>
                <div class="sidebar-user-links">
                    <a href="<?php echo Router::url("/Users/viewprofile/" . CakeSession::read('Auth.User.id')); ?>" data-toggle="tooltip" data-placement="bottom" title="Perfil"><i class="gi gi-user"></i></a>
                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Mensajes"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Configuración"><i class="gi gi-cogwheel"></i></a>
                    <a href="<?php echo Router::url("/Users/logout/"); ?>" data-toggle="tooltip" data-placement="bottom" title="Salir"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
<!--            <ul class="sidebar-nav">
                <?php //echo $this->App->drawMainMenu($config); ?>
            </ul>-->

            <?php
            echo $this->MenuBuilder->build('sidebar-nav');
            //echo $this->MenuBuilder->build('left-menu');
            ?>
            <!-- END Sidebar Navigation -->

            <!-- Sidebar Notifications -->
            <div class="sidebar-header sidebar-nav-mini-hide">
                <span class="sidebar-header-options clearfix">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                </span>
                <span class="sidebar-header-title">Activity</span>
            </div>
            <div class="sidebar-section sidebar-nav-mini-hide">
                <div class="alert alert-success alert-alt">
                    <small>5 min ago</small><br>
                    <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                </div>
                <div class="alert alert-info alert-alt">
                    <small>10 min ago</small><br>
                    <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                </div>
                <div class="alert alert-warning alert-alt">
                    <small>3 hours ago</small><br>
                    <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                </div>
                <div class="alert alert-danger alert-alt">
                    <small>Yesterday</small><br>
                    <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                </div>
            </div>
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->