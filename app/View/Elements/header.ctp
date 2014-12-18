
    <style>
    #scrollable-dropdown-menu .tt-dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
    }
    </style>
    <?php
    $userImg = $signedUser["User"]["avatar"];
    if ($userImg == "" || $userImg == null) {
        $userImg = "/files/uploads/avatars/no-avatar.png";
    }
    ?>
    <!-- Header -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available header.navbar classes:

        'navbar-default'            for the default light header
        'navbar-inverse'            for an alternative dark header

        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
    -->
    <header class="navbar navbar-default">
        <!-- Left Header Navigation -->
        <ul class="nav navbar-nav-custom">
            <!-- Main Sidebar Toggle Button -->
            <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                    <i class="fa fa-bars fa-fw"></i>
                </a>
            </li>
            <!-- END Main Sidebar Toggle Button -->

            <!-- Template Options -->
            <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="gi gi-settings"></i>
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-options">
                    <li class="dropdown-header text-center">Header Style</li>
                    <li>
                        <div class="btn-group btn-group-justified btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                        </div>
                    </li>
                    <li class="dropdown-header text-center">Page Style</li>
                    <li>
                        <div class="btn-group btn-group-justified btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- END Template Options -->
        </ul>
        <!-- END Left Header Navigation -->
        <?php echo $this->MenuBuilder->build('h-menu-header');?>
        <!-- Search Form -->
        <form action="page_ready_search_results.html" method="post" class="navbar-form-custom" role="search">
            <div class="form-group">
                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
            </div>
        </form>
        <!-- END Search Form -->



        <!-- Right Header Navigation -->
        <ul class="nav navbar-nav-custom pull-right">
            <!-- Alternative Sidebar Toggle Button -->
            <li>
                <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                    <i class="gi gi-share_alt"></i>
                    <span class="label label-primary label-indicator animation-floating">4</span>
                </a>
            </li>
            <!-- END Alternative Sidebar Toggle Button -->

            <!-- User Dropdown -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo $userImg; ?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li class="dropdown-header text-center">Account</li>
                    <li>
                        <a href="page_ready_timeline.html">
                            <i class="fa fa-clock-o fa-fw pull-right"></i>
                            <span class="badge pull-right">10</span>
                            Updates
                        </a>
                        <a href="page_ready_inbox.html">
                            <i class="fa fa-envelope-o fa-fw pull-right"></i>
                            <span class="badge pull-right">5</span>
                            Messages
                        </a>
                        <a href="page_ready_pricing_tables.html"><i class="fa fa-magnet fa-fw pull-right"></i>
                            <span class="badge pull-right">3</span>
                            Subscriptions
                        </a>
                        <a href="page_ready_faq.html"><i class="fa fa-question fa-fw pull-right"></i>
                            <span class="badge pull-right">11</span>
                            FAQ
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="page_ready_user_profile.html">
                            <i class="fa fa-user fa-fw pull-right"></i>
                            Profile
                        </a>
                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                        <a href="#modal-user-settings" data-toggle="modal">
                            <i class="fa fa-cog fa-fw pull-right"></i>
                            Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="page_ready_lock_screen.html"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a>
                        <a href="login.html"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                    </li>
                    <li class="dropdown-header text-center">Activity</li>
                    <li>
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
                            <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New bug submitted</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- END User Dropdown -->
        </ul>
        <!-- END Right Header Navigation -->
    </header>
    <script type="text/javascript">
/*
    var response = [];

    var url = '/Users/jsfindUser/';
    $.ajax({
        url: url,
        dataType: "json",
        async: false,
        data: {
            'format': 'typeahead'
        },
        success: function (data) {
            response = data;
        }
    });
    var users;
    var map;
    var selectedUser;
    $('#top-search').typeahead({
        source: function (query, process) {
            users = [];
            map = {};
            $.each(response, function (i, user) {
                map[user.value] = user;
                users.push(user.value);
            });
            process(users);
            //process(response);
        }
        ,
        updater: function (item) {
            selectedUser = map[item].id;
            window.location = qualifyURL('/Users/viewprofile/' + selectedUser + '/');
            return item;
        },
        matcher: function (item) {
            if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1) {
                return true;
            }
        },
        sorter: function (items) {
            return items.sort();
        },
        highlighter: function (item) {
            var regex = new RegExp('(' + this.query + ')', 'gi');
            return item.replace(regex, "<strong>$1</strong>");
        },
    });
*/
</script>