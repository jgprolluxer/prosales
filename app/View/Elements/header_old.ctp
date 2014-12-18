<!-- Header -->
<!-- In the PHP version you can set the following options from inc/config.html file -->
<!--
    Available header.navbar classes:

    'navbar-default'            for the default light header
    'navbar-inverse'            for an alternative dark header

    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
-->
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
<header class="navbar navbar-default navbar-fixed-top">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Search Form -->
    <form class="navbar-form-custom" role="search">
        <div class="form-group">
            <div id="scrollable-dropdown-menu">
                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Buscar.." class="typeahead" autocomplete="false">
            </div>
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
                    <a href="<?php echo Router::url("/Users/viewprofile/" . CakeSession::read('Auth.User.id')); ?>">
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
                    <a href="<?php echo Router::url("/Users/logout/"); ?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>
<!-- END Header -->       
<?php
echo $this->Html->script('/template_assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js');
?>
<script type="text/javascript">

    var users;
    var map;
    var selectedUser;
    $('#top-search').typeahead({
        source: function (query, process) {
            var url = qualifyURL('/Users/jsfindUser/');
            var response;
            $.ajax({
                url: url,
                dataType: "json",
                async: false,
                data: {
                    'format': 'typeahead',
                },
                success: function (data) {
                    response = data;
                }
            });
            console.log('response typeahead');
            console.log(response);
            users = [];
            map = {};
            $.each(response, function (i, user) {
                map[user.value] = user;
                users.push(user.value);
            });

            console.log('process(users)');
            console.log(users);
            process(users);

            //process(response);
        }
        ,
        updater: function (item) {
            console.log('updater(item)');
            console.log(item);

            selectedUser = map[item].id;
            console.log('selected user');
            console.log(selectedUser);
            window.location = qualifyURL('/Users/viewprofile/' + selectedUser + '/');
            return item;
        },
        matcher: function (item) {
            console.log('matcher(item)');
            console.log(item);

            if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                return true;
            }
        },
        sorter: function (items) {
            console.log('sorter(items)');
            console.log(items);

            return items.sort();
        },
        highlighter: function (item) {
            console.log('high(item)');
            console.log(item);

            var regex = new RegExp('(' + this.query + ')', 'gi');
            return item.replace(regex, "<strong>$1</strong>");
        },
    });


</script>