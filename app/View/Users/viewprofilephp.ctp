
<!-- User Profile Header -->
<!-- For an image header add the class 'content-header-media' and an image as in the following example -->
<div class="content-header content-header-media">
    <div class="header-section">
        <h1>
            <?php echo $user["User"]["firstname"] . ' ' . $user["User"]["lastname"]; ?><br>
            <small><?php echo $user["User"]["shortdescription"]; ?></small>
        </h1>
    </div>
    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    <img src="<?php echo ("" !== $user["User"]["coverimg"] ? $user["User"]["coverimg"] : "/template_assets/img/placeholders/headers/profile_header.jpg"); ?>" 
         alt="header image" class="animation-pulseSlow" >
</div>
<!-- END User Profile Header -->
<!-- User Profile Content -->
<div class="row">
    <!-- First Column -->
    <div class="col-md-6 col-lg-7">
        <!-- Updates Block -->
        <div class="block">
            <!-- Updates Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Privacy Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2><strong><?php echo __('Comparte'); ?></strong> <?php echo __('algo...'); ?></h2>
            </div>
            <!-- END Updates Title -->

            <!-- Update Status Form -->
            <form id="frmjsaddstory" action="" method="post" class="block-content-full block-content-mini-padding" onsubmit="return false;">
                <input type="hidden" name="data[Story][user_id]" value="<?php echo $user["User"]["id"]; ?>" class="form-control">
                <input type="text" name="data[Story][title]" class="form-control" placeholder="Titulo de tu publicaci&oacute;n">
                <textarea id="default-textarea" name="data[Story][description]" rows="2" class="form-control push-bit" placeholder="<?php echo __('Que estas pensando?'); ?>"></textarea>
                <div class="clearfix">
                    <button type="submit" class="btn btn-sm btn-primary pull-right btnjsaddstory"><i class="fa fa-pencil"></i> Post</button>
                    <label class="switch switch-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo __('Aparecer en Timeline?'); ?>" >
                        <input type="checkbox" name="data[Story][ontimeline]" checked=""><span></span>
                    </label>
                    <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo __('Agregar Foto'); ?>"><i class="fa fa-camera"></i></a>
                </div>
            </form>
            <!-- END Update Status Form -->
        </div>
        <!-- END Updates Block -->

        <!-- Newsfeed Block -->
        <div class="block">
            <!-- Newsfeed Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="label label-danger animation-pulse">Live Feed</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Customize Feed"><i class="fa fa-pencil"></i></a>
                </div>
                <h2><strong>Newsfeed</strong></h2>
            </div>
            <!-- END Newsfeed Title -->

            <!-- Newsfeed Content -->
            <div class="block-content-full">
                <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                <ul id="storiesfeed" class="media-list media-feed media-feed-hover">

                    <?php
                    foreach ($stories as $story) {
                        ?>
                        <!-- Story Published -->
                        <li class="media">
                            <a href="<?php echo Router::url('/Users/viewprofile/' . $story["CreatedBy"]["id"]); ?>" class="pull-left">
                                <img src="<?php echo $story["CreatedBy"]["avatar"] ?>" alt="Avatar" class="img-circle" width="64" height="64" >
                            </a>
                            <div class="media-body">
                                <!--width="66" height="44"-->
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small><?php echo $story["CreatedBy"]["created"]; ?></small>
                                    </span>
                                    <strong><a href="<?php echo Router::url('/Users/viewprofile/' . $story["CreatedBy"]["id"]); ?>"><?php echo $story["CreatedBy"]["firstname"] . ' ' . $story["CreatedBy"]["lastname"]; ?></a> published a new story.</strong>
                                </p>
                                <h5><a href="<?php echo Router::url('/Stories/view/' . $story["Story"]["id"]); ?>"><?php echo $story["Story"]["title"]; ?></a></h5>
                                <p><?php echo $story["Story"]["description"]; ?></p>
                                <p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i> You Like it</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>
                                </p>
                                <!-- Comments -->
                                <ul class="media-list push">
                                    <li class="media">
                                        <a href="page_ready_user_profile.html" class="pull-left">
                                            <img src="/template_assets/img/placeholders/avatars/avatar.jpg" alt="Avatar" class="img-circle">
                                        </a>
                                        <div class="media-body">
                                            <form action="page_ready_user_profile.html" method="post" onsubmit="return false;">
                                                <textarea id="profile-newsfeed-comment1" name="profile-newsfeed-comment1" class="form-control" rows="2" placeholder="Your comment.."></textarea>
                                                <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Post Comment</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                <!-- END Comments -->
                            </div>
                        </li>
                        <!-- END Story Published -->
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- END Newsfeed Content -->
        </div>
        <!-- END Newsfeed Block -->
    </div>
    <!-- END First Column -->

    <!-- Second Column -->
    <div class="col-md-6 col-lg-5">
        <!-- Info Block -->
        <div class="block">
            <!-- Info Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="<?php echo Router::url("/Users/editprofile/" . CakeSession::read('Auth.User.id')); ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Editar perfil"><i class="fa fa-pencil"></i></a>
                </div>
                <h2><?php echo __('Acerca de'); ?> <strong><?php echo $user["User"]["firstname"] . ' ' . $user["User"]["lastname"]; ?></strong> </h2>
            </div>
            <!-- END Info Title -->

            <!-- Info Content -->
            <table class="table table-borderless table-striped">
                <tbody>
                    <tr>
                        <td style="width: 20%;"><strong><?php echo __('Descripci&oacute;n'); ?></strong></td>
                        <td><?php echo $user["User"]["fulldescription"]; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Founder</strong></td>
                        <td><a href="javascript:void(0)">Company Inc</a></td>
                    </tr>
                    <tr>
                        <td><strong>Education</strong></td>
                        <td><a href="javascript:void(0)">University Name</a></td>
                    </tr>
                    <tr>
                        <td><strong>Projects</strong></td>
                        <td><a href="javascript:void(0)" class="label label-danger">168</a></td>
                    </tr>
                    <tr>
                        <td><strong>Best Skills</strong></td>
                        <td>
                            <a href="javascript:void(0)" class="label label-info">HTML</a>
                            <a href="javascript:void(0)" class="label label-info">CSS</a>
                            <a href="javascript:void(0)" class="label label-info">Javascript</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- END Info Content -->
        </div>
        <!-- END Info Block -->

        <!-- Photos Block -->
        <div class="block">
            <!-- Photos Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                </div>
                <h2>Best <strong>Photos</strong> <small>&bull; <a href="javascript:void(0)">25 Albums</a></small></h2>
            </div>
            <!-- END Photos Title -->

            <!-- Photos Content -->
            <div class="gallery" data-toggle="lightbox-gallery">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/phot12.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo12.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo15.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo15.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo3.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo3.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo4.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo4.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo5.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo5.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo6.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo6.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo20.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo20.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo17.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo17.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo14.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo14.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo9.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo9.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo11.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo11.jpg" alt="image">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <a href="/template_assets/img/placeholders/photos/photo10.jpg" class="gallery-link" title="Image Info">
                            <img src="/template_assets/img/placeholders/photos/photo10.jpg" alt="image">
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Photos Content -->
        </div>
        <!-- END Photos Block -->

        <!-- Twitter Block -->
        <div class="block full">
            <!-- Twitter Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                </div>
                <h2>Twitter <strong>Feed</strong></h2>
            </div>
            <!-- END Twitter Title -->

            <!-- Twitter Content -->
            <div class="block-top block-content-mini-padding">
                <form action="page_ready_user_profile.html" method="post" onsubmit="return false;">
                    <textarea id="profile-tweet" name="profile-tweet" class="form-control push-bit" rows="3" placeholder="Share something on Twitter.."></textarea>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-twitter"></i> Tweet</button>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Add Photo"><i class="fa fa-camera"></i></a>
                    </div>
                </form>
            </div>
            <ul class="media-list">
                <li class="media">
                    <a href="page_ready_user_profile.html" class="pull-left">
                        <img src="/template_assets/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>30 min ago</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>In hac <a href="javascript:void(0)">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. <a href="javascript:void(0)" class="text-danger"><strong>#dev</strong></a></p>
                    </div>
                </li>
                <li class="media">
                    <a href="page_ready_user_profile.html" class="pull-left">
                        <img src="/template_assets/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>3 hours ago</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                    </div>
                </li>
                <li class="media">
                    <a href="page_ready_user_profile.html" class="pull-left">
                        <img src="/template_assets/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>yesterday</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>In hac habitasse platea dictumst. Proin ac nibh rutrum <a href="javascript:void(0)">lectus</a> rhoncus eleifend <a href="javascript:void(0)" class="text-danger"><strong>#design</strong></a></p>
                    </div>
                </li>
                <li class="media">
                    <a href="page_ready_user_profile.html" class="pull-left">
                        <img src="/template_assets/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>2 days ago</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.</p>
                    </div>
                </li>
                <li class="media">
                    <a href="page_ready_user_profile.html" class="pull-left">
                        <img src="/template_assets/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>3 days ago</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.</p>
                    </div>
                </li>
            </ul>
            <!-- END Twitter Content -->
        </div>
        <!-- END Twitter Block -->
    </div>
    <!-- END Second Column -->
</div>
<!-- END User Profile Content -->
<!-- Load and execute javascript code used only in this page -->        
<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<?php
echo $this->Html->script("http://maps.google.com/maps/api/js?sensor=true");
echo $this->Html->script("/template_assets/js/helpers/gmaps.min.js");
echo $this->Html->script("/template_assets/js/pages/readyProfile.js");
?>
<script>
    $(document).ready(function() {
        $(function() {
            ReadyProfile.init();
        });
        $('.btnjsaddstory').click(function(e) {
            e.preventDefault();
            $('#modal-loading').modal('show');
            var input = $('#frmjsaddstory').serialize();
            $.ajax({
                type: "POST",
                url: qualifyURL("/Stories/addbyjs"),
                data: input,
                dataType: 'json',
                async: false,
                success: function(data)
                {

                    var success = Boolean(data["success"]);
                    if (!success) {
                        //console.log(jQuery.inArray("validationErrors", data));
                        if (data.hasOwnProperty("validationErrors")) {
                            for (var prop in data["validationErrors"]) {
                                //alert(data["validationErrors"][prop]);
                                $.bootstrapGrowl('<h4>Error!</h4> <p>' + data["validationErrors"][prop] + '</p>', {
                                    type: 'danger',
                                    delay: 2500,
                                    allow_dismiss: true
                                });
                            }
                        }
                        //console.log(data);
                        //console.log(JSON.stringify(data));
                    } else {
                        clearForm('#frmjsaddstory');
                        addStory(data);
                    }
                },
                error: function(xhr, textStatus, errorThrown)
                {
                    $('#modal-loading').modal('hide');
                    console.log('error: xhr: ' + JSON.stringify(xhr) + ' textStatus ' + textStatus + ' errorThrown ' + errorThrown);
                    if ('Forbidden' === xhr.statusText) {
                        window.history.back(-1);
                        //window.navigate(baseAppPath);
                    }
                }
            });
        });

        var addStory = function(data)
        {
            data = data["datasaved"];

            var strHTML = '';
            strHTML = '';
            strHTML += '<!-- Story Published -->';
            strHTML += '<li class="media">';
            strHTML += '<a href="' + qualifyURL("/Users/viewprofile/" + data["CreatedBy"]["id"]) + '" class="pull-left">';
            strHTML += '<img src="' + data["CreatedBy"]["avatar"] + '" alt="Avatar" class="img-circle" width="64" height="64">';
            strHTML += '</a>';
            strHTML += '<div class="media-body">';
            strHTML += '<p class="push-bit">';
            strHTML += '<span class="text-muted pull-right">';
            strHTML += '<small>' + data["Story"]["created"] + '</small>';
            strHTML += '</span>';
            strHTML += '<strong><a href="' + qualifyURL("/Users/viewprofile/" + data["CreatedBy"]["id"]) + '"> ' + data["CreatedBy"]["firstname"] + ' ' + data["CreatedBy"]["lastname"] + '</a> published a new story.</strong>';
            strHTML += '</p>';
            strHTML += '<h5><a href="' + qualifyURL("/Stories/view/" + data["Story"]["id"]) + '">' + data["Story"]["title"] + '</a></h5>';
            strHTML += '<p>' + data["Story"]["description"] + '</p>';
            strHTML += '<p>';
            strHTML += '<a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i> You Like it</a>';
            strHTML += '<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-share-square-o"></i> Share</a>';
            strHTML += '</p>';
strHTML += '<!-- Comments -->';
strHTML += '<ul class="media-list push">';
strHTML += '<li class="media">';
strHTML += '<a href="page_ready_user_profile.html" class="pull-left">';
strHTML += '<img src="/template_assets/img/placeholders/avatars/avatar.jpg" alt="Avatar" class="img-circle">';
strHTML += '</a>';
strHTML += '<div class="media-body">';
strHTML += '<form action="page_ready_user_profile.html" method="post" onsubmit="return false;">';
strHTML += '<textarea id="profile-newsfeed-comment1" name="profile-newsfeed-comment1" class="form-control" rows="2" placeholder="Your comment.."></textarea>';
strHTML += '<button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Post Comment</button>';
strHTML += '</form>';
strHTML += '</div>';
strHTML += '</li>';
strHTML += '</ul>';
strHTML += '<!-- END Comments -->';
            strHTML += '</div>';
            strHTML += '</li>';
            strHTML += '<!-- END Story Published -->';

            $('#storiesfeed').html(strHTML + $('#storiesfeed').html());
            //console.log(JSON.stringify(data));
            $('#modal-loading').modal('hide');
        };
    });
</script>
<?php echo json_encode($stories); ?>