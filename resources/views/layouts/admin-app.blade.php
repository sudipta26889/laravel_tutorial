<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | C4B</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('backend/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/iCheck/flat/blue.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ url('backend/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <script src="{{ url('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ url('backend/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ url('backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ url('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ url('backend/plugins/knob/jquery.knob.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ url('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ url('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('backend/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ url('backend/js/app.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span class="logo-mini">C<b>4</b>B</span>
            <span class="logo-lg">CODE<b> 4 </b>BALANCE</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ url('backend/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{ url('backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                <p>{{ Auth::user()->name }} - Administrator<!--<small>Member since Nov. 2012</small>--></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ url('backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="javascript:;"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.users.list') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            </ul>
        </section>
    </aside>
    @yield('content')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?=date('Y')?> <a href="javascript:;">C4B</a>.</strong> All rights reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li><a href="javascript:void(0)"><i class="menu-icon fa fa-birthday-cake bg-red"></i><div class="menu-info"><h4 class="control-sidebar-subheading">Langdon's Birthday</h4><p>Will be 23 on April 24th</p></div></a></li>
                </ul>
                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li><a href="javascript:void(0)"><h4 class="control-sidebar-subheading">Custom Template Design<span class="label label-danger pull-right">70%</span></h4><div class="progress progress-xxs"><div class="progress-bar progress-bar-danger" style="width: 70%"></div></div></a></li>
                </ul>
            </div>
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">Report panel usage <input type="checkbox" class="pull-right" checked></label>
                        <p>Some information about this general settings option</p>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
<script src="{{ url('backend/js/demo.js') }}"></script>
<script>
    $(document).ready(function(){
        $.validate({
            lang:'en'
        });
    });
</script>
</body>
</html>
