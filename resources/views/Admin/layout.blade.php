<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Administrator">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
        @section('title')
        @show
    </title>
    <!--Core CSS -->
    <link href="{{asset('packages/admin/bs3/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/js/jquery-ui/jquery-ui-1.10.1.custom.min.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/css/bootstrap-reset.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/js/jvector-map/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/css/clndr.css')}}" rel="stylesheet" />

    <!--clock css-->
    <link href="{{asset('packages/admin/js/css3clock/css/style.css')}}" rel="stylesheet" />
    <!--lightbox css-->
    <link href="{{asset('packages/admin/css/ekko-lightbox.min.css')}}" rel="stylesheet" />
    <!--Morris Chart CSS -->
    <link href="{{asset('packages/admin/js/morris-chart/morris.css')}}" rel="stylesheet" />
    <!--dynamic table-->
    <link href="{{asset('packages/admin/js/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/js/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/js/data-tables/DT_bootstrap.css')}}" rel="stylesheet" />

    <link href="{{asset('packages/admin/js/bootstrap-datepicker/css/datepicker.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('js/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />


    <!-- Custom styles for this template -->
    <link href="{{asset('packages/admin/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('packages/admin/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('packages/admin/css/orange-theme.css')}}" rel="stylesheet"/>
    <link href="{{asset('packages/admin/css/additional.css')}}" rel="stylesheet"/>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{ route('admin.dash') }}" class="logo">
        <h1>Admin</h1>
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/avatar1_small.jpg">
                <span class="username">Administrator</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{ route('sentinel.logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ route('admin.dash') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Account</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('sentinel.profile.show') }}">Admin Profile</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\UserController@index') }}">All Users</a></li>
                        <li><a href="{{ route('sentinel.users.find') }}">Search User</a></li>

                        {{-- <li><a href="{{ route('sentinel.register.form') }}">Register User</a></li> --}}
                        <li><a href="{{ action('\App\Http\Controllers\Admin\GroupController@index') }}">User Groups</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Events</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('events.list') }}">All Events</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\EventController@create') }}">Create Event</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-bullseye"></i>
                        <span>Video Disks</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('videodisks.list') }}">All Disks</a></li>
                        <li><a href="{{ route('videodisks.list.type',array('dvd')) }}">DVDs</a></li>
                        <li><a href="{{ route('videodisks.list.type',array('vcd')) }}">VCDs</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\VideoDiskController@create') }}"><i class="fa fa-plus"></i> Add Video Disk</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-bullseye"></i>
                        <span>Audio Disks</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('audiodisks.list') }}">All Disks</a></li>
                        <li><a href="{{ route('audiodisks.list.type',array('acd')) }}">Audio CDs</a></li>
                        <li><a href="{{ route('audiodisks.list.type',array('mp3')) }}">MP3s</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\AudioDiskController@create') }}"><i class="fa fa-plus"></i> Add Audio Disk</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Books</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('books.list') }}">All Books</a></li>
                        <li><a href="{{ route('books.list.type',array('sobg')) }}">By School</a></li>
                        <li><a href="{{ route('books.list.type',array('other')) }}">By Others</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\BookController@create') }}"><i class="fa fa-plus"></i> Add Book</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>Magazine</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('magazines.list') }}">Magazine</a></li>
                        <li><a href="{{ action('\App\Http\Controllers\Admin\MagazineController@create') }}"><i class="fa fa-plus"></i> Add New Magazine</a></li>
                        <li><a href="{{ route('magazines.subscription.show') }}">Subscription Rate</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Eshop Orders</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('new.orders') }}">New Orders</a></li>
                        <li><a href="{{ route('unconfirmed.orders') }}">Awaiting Shipment</a></li>
                        <li><a href="{{ route('confirmed.orders') }}">Shipped Orders</a></li>
                        <li><a href="{{ route('all.orders') }}">All Orders</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>News Archives</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('archives.list') }}">All Archives</a></li>
                        <li><a href="{{ route('archives.create') }}"><i class="fa fa-plus"></i> Add New Archive</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Interviews &amp; Articles</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('articles.list') }}">All Articles</a></li>
                        <li><a href="{{ route('articles.create') }}"><i class="fa fa-plus"></i> New Article/Interview</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span>Photo Albums</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('album.list') }}">Albums</a></li>
                        <li><a href="{{ route('album.create') }}"><i class="fa fa-plus"></i> Add Album</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span>Yatras</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('yatra.list') }}">Yatras</a></li>
                        <li><a href="{{ route('yatra.create') }}"><i class="fa fa-plus"></i> Add Yatra</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span>Yatras Packages</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('package.list') }}">Packages</a></li>
                        <li><a href="{{ route('package.create') }}"><i class="fa fa-plus"></i> Add New Package</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{ route('sentinel.logout') }}">
                        <i class="fa fa-laptop"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
       </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

    <!-- Notifications -->
    @include('Sentinel::layouts/notifications')
    <!-- ./ notifications -->


    <!-- Notifications -->
    @yield('content')
    <!-- Notifications -->



    </section>
</section>
<!--main content end-->
<!--right sidebar start-->

<!--right sidebar end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="{{asset('packages/admin/js/jquery.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery-ui/jquery-ui-1.10.1.custom.min.js')}}"></script>
<script src="{{asset('packages/admin/bs3/js/bootstrap.min.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('packages/admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('packages/admin/js/skycons/skycons.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery.scrollTo/jquery.scrollTo.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{asset('packages/admin/js/calendar/clndr.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="{{asset('packages/admin/js/calendar/moment-2.2.1.js')}}"></script>
<script src="{{asset('packages/admin/js/evnt.calendar.init.js')}}"></script>
<script src="{{asset('packages/admin/js/jvector-map/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('packages/admin/js/jvector-map/jquery-jvectormap-us-lcc-en.js')}}"></script>
<script src="{{asset('packages/admin/js/dashboard.js')}}"></script>
<script src="{{asset('packages/admin/js/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('packages/admin/js/jQuery.print.js')}}"></script>
<script src="{{asset('packages/admin/js/jquery.customSelect.min.js')}}" ></script>
<script src="{{asset('packages/admin/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('packages/admin/js/bootbox.min.js')}}" type="text/javascript"></script>

<!--script for this page-->
<!--dynamic table-->
<script src="{{asset('packages/admin/js/advanced-datatable/js/jquery.dataTables.js')}}" type="text/javascript" language="javascript"></script>

<script src="{{asset('packages/admin/js/data-tables/DT_bootstrap.js')}}" type="text/javascript"></script>

<script src="{{asset('packages/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!--common script init for all pages-->
<script src="{{asset('packages/admin/js/scripts.js')}}"></script>

<!--dynamic table initialization -->
<script src="{{asset('packages/admin/js/dynamic_table_init.js')}}"></script>
</body>
</html>