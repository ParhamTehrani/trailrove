<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.fontcdn.ir/Font/Persian/Yekan/Yekan.css" rel="stylesheet" type="text/css" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/images/idehtech.png">
    <title> پنل مدیریت - @yield('title') </title>
    <!-- Custom CSS -->
    <link href="/admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/admin/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/admin/dist/css/style.min.css" rel="stylesheet">
    <link href="/css/persian-datepicker.min.css" rel="stylesheet">

    @yield('style')
    <style>
        * {
            font-family: 'Yekan', sans-serif !important;
            /*font-size: 15px;*/
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-brand">
                    <a href="/admin/home" class="logo">
                        <!-- Logo icon -->
                        <span>تیم نرم افزاری ایده تک</span>
                        <!--End Logo icon -->
                    </a>
                    <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <!-- <li class="nav-item d-none d-md-block">
                        <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-menu font-24"></i>
                        </a>
                    </li> -->
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ auth()->user()->full_name }} <i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                            <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                <div class="m-l-10">
                                    <h4 class="m-b-0">{{ auth()->user()->full_name }}</h4>
                                    <p class=" m-b-0">{{ auth()->user()->mobile }}</p>
                                </div>
                            </div>
                            <div class="profile-dis scrollable">

                                <a class="dropdown-item" href="/">
                                    <i class="ti-wallet m-r-5 m-l-5"></i>ارجاع به سایت</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5">
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </i>خروج</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('Admin.index.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    @yield('content')
    <footer class="footer d-flex justify-content-center text-center">
         طراحی و توسعه توسط تیم نرم افزاری
        <a href="https://idehtech.com"> &nbsp;&nbsp;ایده تک </a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->
<div class="chat-windows"></div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="/admin/dist/js/app.min.js"></script>
<script src="/admin/dist/js/app.init.js"></script>
<script src="/admin/dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/admin/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="/admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="/admin/dist/js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="/admin/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 charts -->
<script src="/admin/assets/extra-libs/c3/d3.min.js"></script>
<script src="/admin/assets/extra-libs/c3/c3.min.js"></script>
<script src="/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admin/dist/js/pages/dashboards/dashboard1.js"></script>
<!-- datepicker -->
<script src="/js/persian-date.min.js"></script>
<script src="/js/persian-datepicker.min.js"></script>
<script>
    $(function (){
        $(':input').removeAttr('placeholder');
    })
</script>
<script>
    $(document).ready(function() {
        $(".datepicker").pDatepicker({
            format: 'YYYY/MM/DD',
        });
    });



</script>
@yield('script')
</body>

</html>
