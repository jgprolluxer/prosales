<!-- User Profile Header -->
<!-- For an image header add the class 'content-header-media' and an image as in the following example -->
<div class="content-header content-header-media">
    <div class="header-section">
        <h1>
            <?php echo $user["User"]["firstname"] . ' ' . $user["User"]["lastname"]; ?><br>
            <small><?php echo $user["User"]["shortdescription"]; ?></small>
            <input type="hidden" value="<?php echo $user["User"]["id"]; ?>" id="txt_userID" />
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
        <section ng-app="storymvc" data-framework="angularjs">
        <section id="sectStories" ng-controller="StoryCtrl">
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
                <form class="block-content-full block-content-mini-padding" onsubmit="return false;" ng-submit="addStory()" >
                    <input type="hidden" name="data[Story][user_id]" ng-model="newStory.Story.user_id" class="form-control"  >
                    <input type="text" name="data[Story][title]" ng-model="newStory.Story.title" class="form-control" placeholder="Titulo de tu publicaci&oacute;n"  >
                    <textarea id="default-textarea" name="data[Story][description]" ng-model="newStory.Story.description" rows="2" class="form-control push-bit" placeholder="<?php echo __('Que estas pensando?'); ?>"></textarea>
                    <div class="clearfix">
                        <button type="submit" onclick="clearForm($(this).closest('form'));" class="btn btn-sm btn-primary pull-right btnjsaddstory"><i class="fa fa-pencil"></i> Post</button>
                        <label class="switch switch-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo __('Aparecer en Timeline?'); ?>" >
                            <input type="checkbox" name="data[Story][ontimeline]" ng-model="newStory.Story.ontimeline" checked=""><span></span>
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
                    <ul class="media-list media-feed media-feed-hover" ng-repeat="story in stories">
                        <!-- Story Published -->
                        <li class="media">
                            <a href="/Users/viewprofile/{{story.CreatedBy.id}}" class="pull-left">
                                <img src="{{story.CreatedBy.avatar}}" alt="Avatar" class="img-circle" width="64" height="64" >
                            </a>
                            <div class="media-body">
                                <p class="push-bit">
                                    <span class="text-muted pull-right">
                                        <small>{{story.Story.created}}</small>
                                    </span>
                                    <strong><a href="/Users/viewprofile/{{story.CreatedBy.id}}">{{story.CreatedBy.firstname}}&nbsp;{{story.CreatedBy.lastname}}</a> published a new story.</strong>
                                </p>
                                <h5><a href="/Stories/view/{{story.Story.id}}">{{story.Story.title}}</a></h5>
                                <p>{{story.Story.description}}</p>
                                <section ng-controller="StoryCommentCtrl"> 
                                    <!-- Comments -->
                                    <ul class="media-list push">
                                        <section ng-repeat="storycomment in storycomments" >
                                            <li class="media">
                                                <a href="/Users/viewprofile/{{storycomment.CreatedBy.id}}" class="pull-left">
                                                    <img src="{{storycomment.CreatedBy.avatar}}" alt="Avatar" class="img-circle" width="64" height="64">
                                                </a>
                                                <div class="media-body">
                                                    <a href="/Users/viewprofile/{{storycomment.CreatedBy.id}}"><strong>{{storycomment.CreatedBy.firstname}}&nbsp;{{storycomment.CreatedBy.lastname}}</strong></a>
                                                    <span class="text-muted"><small><em>{{storycomment.StoryComment.created}}</em></small></span><br/>
                                                    <a href="/Comments/view/{{storycomment.Comment.id}}"><strong>{{storycomment.Comment.title}}</strong></a>
                                                    <p>{{storycomment.Comment.description}}</p>
                                                </div>
                                            </li>
                                        </section>
                                            <li class="media" >
                                                <a href="<?php echo Router::url("/Users/viewprofile/".$signedUser["User"]["id"]); ?>" class="pull-left">
                                                    <img src="<?php echo $signedUser["User"]["avatar"]; ?>" alt="Avatar" class="img-circle" width="64" height="64">
                                                </a>
                                                <div class="media-body">
                                                    <form onsubmit="return false;" ng-submit="addStoryComment()">
                                                        <input type="text"class="form-control" placeholder="<?php echo __('Titulo'); ?>" ng-model="newStoryComment.Comment.title" value="" />
                                                        <textarea ng-model="newStoryComment.Comment.description" name="profile-newsfeed-comment1" class="form-control" rows="2" placeholder="<?php echo __('Comentario'); ?>"></textarea>
                                                        <button type="submit" onclick="clearForm($(this).closest('form'));" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Post Comment</button>
                                                    </form>
                                                </div>
                                            </li>
                                    </ul>
                                <!--  END Comments -->
                                </section> 
                            </div>
                        </li>
                        <!-- END Story Published -->
                    </ul>
                </div>
                <!-- END Newsfeed Content -->
            </div>
            <!-- END Newsfeed Block -->
        </section>
    </section>
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
//echo $this->Html->script("/js/angularjs-perf/bower_components/todomvc-common/base.js");
echo $this->Html->script("/js/angularjs-perf/bower_components/angular/angular.js");
echo $this->Html->script("/js/angularjs-perf/js/app.js");
echo $this->Html->script("/js/angularjs-perf/js/controllers/storyCtrl.js");
//echo $this->Html->script("/js/angularjs-perf/js/controllers/storycommentCtrl.js");
echo $this->Html->script("/js/angularjs-perf/js/services/storyStorage.js");
echo $this->Html->script("/js/angularjs-perf/js/directives/storyFocus.js");
echo $this->Html->script("/js/angularjs-perf/js/directives/storyEscape.js");
//echo $this->Html->script("/template_assets/js/pages/readyProfile.js");
?>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>