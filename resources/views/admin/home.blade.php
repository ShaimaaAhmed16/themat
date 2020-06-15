<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>الثمار الوطنيه جده</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    {{-- for arabic version--}}
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/rtl/AdminLTE-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/rtl/bootstrap-rtl.min.css')}}">

    {{--// this for package confirm delete--}}

    <link rel="stylesheet" href="{{asset('jquery_confirm/jquery-confirm.min.css')}}">

     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header " >
        <!-- Logo -->

        <a href="" class="logo" style="background-color:   #00e600 !important;">
            <!-- logo for regular state and mobile devices -->
            <img src="{{asset('public/adminlte/dist/img/tt.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8" width="55">
            <span class="brand-text font-weight-light">الثمار الوطنيه جده</span>
        </a >
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="margin-left: 0;background-color:   #00e600 !important;">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <ul>
                <li class="nav-item  " style="list-style: none;margin-top: 15px ;display: inline ;float: right">
                      <a href="{{route('dashboard.index')}}" class="nav-link " style="color: white"><i class="fa fa-home "></i>   الرئسيه</a>
                </li>

                    <li class="nav-item dropdown " style="list-style: none;margin-top: 15px ;display: inline ;float: left;margin-left: 13% ;color: white">
                        <ul data-toggle="dropdown" class="dropdown-toggle  " href="#"  >
                            <span class="username ">{{auth()->guard('admin')->user()->name}}</span>
                            <b class="caret"></b>
                        </ul>
                        <ul class="dropdown-menu extended logout text-center " style="background-color:limegreen">
                           <li><a href="{{route('profile.user',auth()->guard('admin')->user()->id)}}"><i class="fa fa-user"></i> ملفي الشخصي</a></li>
                            <li><a href="{{route('change.password')}}"><i class="fa fa-key"></i>تعديل كلمه السر</a></li><hr>
                            <li><a href="{{route('logout.admin')}}"><i class="fa fa-arrow"></i>تسجيل خروج</a></li>
                        </ul>
                    </li>

            </ul>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview ">
                    <a href="{{route('dashboard.index')}}" >
                        <i class="fa fa-home"></i>
                        <span>  الرئسيه</span>
                    </a>
                </li>
                <br>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>  مستخدمين</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('client.index')}}" ><i class="fa fa-eye"></i>  عرض المستخدمين</a></li>
                      <li>  <a href="{{route('client.create')}}"><i class="fa fa-plus"></i>اضافه مستخدم</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-align-justify"></i>
                        <span>التصنيف</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.index')}}"><i class="fa fa-eye"></i>عرض التصنيف</a></li>
                        <li><a href="{{route('category.create')}}"><i class="fa fa-plus"></i>اضافه التصنيف</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>منتجات</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('product.index')}}" ><i class="fa fa-eye"></i>عرض المنتجات</a></li>
                        <li><a href="{{route('product.create')}}"><i class="fa fa-plus"></i>اضافه منتج</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>الطلبات</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('order.index')}}" ><i class="fa fa-eye"></i>عرض الطلبات</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-phone-square"></i>
                        <span>بيانات التواصل</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('link.index')}}"><i class="fa fa-eye"></i>عرض بيانات التواصل</a></li>
                        <li><a href="{{route('link.create')}}"><i class="fa fa-plus"></i>اضافه بيانات التواصل</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope-square"></i>
                        <span>التواصل بنا</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('contact.index')}}"><i class="fa fa-eye"></i>عرض رسائل التواصل بنا</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>الصفحات</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('page.index')}}"><i class="fa fa-eye"></i>عرض الصفحات</a></li>
                        <li><a href="{{route('page.create')}}"><i class="fa fa-plus"></i>اضافه صفحه</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>الاعدادات</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('setting.index')}}"><i class="fa fa-circle-o"></i>اعدادات الموقع</a></li>

                    </ul>
                </li>
                </ul>

                {{--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Settings</span></a></li>--}}

                {{--                @if(auth()->user()->can('show_post'))--}}
                {{--<li><a href="{{url(route('company.index'))}}"><i class="fa fa-book"></i> <span>company</span></a></li>--}}



        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0;">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>
                @yield('page_title')
                <small> @yield('small_title') </small>
            </h1>
            <div class="text-left">
                <a href='@yield('page')' ><i class="fa fa-circle-o" style="color: seagreen"></i>@yield('page')</a>
                <a class="active"> @yield('page_title')</a>
            </div>
        </section>


        @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('public/adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/adminlte/dist/js/demo.js')}}"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>--}}
<script src="{{asset('jquery_confirm/jquery-confirm.min.js')}}"></script>
<script src="{{asset('public/js/script.js')}}"></script>

{{--<script src="{{asset('js/admin.js')}}"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.sidebar-menu').tree()--}}
    {{--})--}}
{{--</script>--}}
{{--@stack('scripts')--}}
<script>
    // $(document).ready(function () {
    // // let id =$('[id^="department-"]').length+1;
    //
    //     $('[id^="delete-city-"]').click(function () {
    //         let approved = confirm('هل تريد تأكيد الحذف');
    //         console.log(approved);
    //         if (approved == true) {
    //             console.log(approved);
    //             $(this).parent().parent().remove();
    //         }
    //         //console.log($(id));
    //         console.log($(this).attr('id'));
    //     });
    //
    // });
</script>

</body>
</html>
