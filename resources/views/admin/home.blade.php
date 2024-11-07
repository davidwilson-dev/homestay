<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Vertical layout | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('frontend/admin/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('frontend/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('frontend/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('frontend/admin/images/users/avatar.png')}}" alt="user-image" class="rounded-circle">
                            <span class="d-none d-sm-inline-block ml-1">Nguyễn Huy Anh</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings-outline"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock-outline"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                            <i class="mdi mdi-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('frontend/admin/images/logo-light.png')}}" alt="" height="18">
                            <!-- <span class="logo-lg-text-light">Zircos</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">Z</span> -->
                            <img src="{{asset('frontend/admin/images/logo-sm.png')}}" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('frontend/admin/images/flags/us.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/germany.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/italy.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/spain.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/russia.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>


                </ul>
            </div>
            <!-- end Topbar --> 
            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                    <div class="slimscroll-menu">
    
                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
                            <ul class="metismenu" id="side-menu">
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect waves-light">
                                        <i class="mdi mdi-view-dashboard"></i>
                                        <span>  Bảng điều khiển  </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="waves-effect waves-light">
                                        <i class="fas fa-address-book"></i>
                                        <span>  Tài khoản </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="#">Danh sách</a></li>
                                        <li><a href="#">Thêm mới</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="waves-effect waves-light">
                                        <i class="fas fa-users"></i>
                                        <span>  Nhân viên </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="#">Danh sách</a></li>
                                        <li><a href="#">Thêm mới</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="waves-effect waves-light">
                                        <i class="fas fa-home"></i>
                                        <span>  Phòng </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="#">Danh sách</a></li>
                                        <li><a href="#">Thêm mới</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="waves-effect waves-light">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>  Đơn hàng </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="#">Danh sách</a></li>
                                        <li><a href="#">Thêm mới</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- End Sidebar -->
    
                        <div class="clearfix"></div>
    
                        <div class="help-box">
                            <h5 class="text-muted mt-0">For Help ?</h5>
                            <p class=""><span class="text-info">Name:</span>
                                <br> Nguyen Duong</p>
                            <p class="mb-0"><span class="text-info">Call:</span>
                                <br> 0789.354.886</p>
                        </div>
    
                    </div>
                    <!-- Sidebar -left -->
    
                </div>
                <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">dau-homestay</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Bảng điều khiển</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6 col-xl-3">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <i class="mdi mdi-chart-areaspline display-3 m-0"></i>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Đơn hàng</p>
                                            <h2 class="mb-0"><span data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 30.4k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6 col-xl-3">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <i class="mdi mdi-account-convert display-3 m-0"></i>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Tài khoản</p>
                                            <h2 class="mb-0"><span data-plugin="counterup">895</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                                            <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 1250</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6 col-xl-3">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <i class="mdi mdi-layers display-3 m-0"></i>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Cộng tác viên</p>
                                            <h2 class="mb-0"><span data-plugin="counterup">52410</span><i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6 col-xl-3">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <i class="mdi mdi-av-timer display-3 m-0"></i>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Doanh thu</p>
                                            <h2 class="mb-0"><span data-plugin="counterup">652</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                                            <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 956</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">

                                    <h4 class="header-title mb-4">Daily Sales</h4>

                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example" class="morris-charts" style="height: 245px;"></div>
                                        <ul class="list-inline chart-detail-list mb-0">
                                            <li class="list-inline-item">
                                                <h6 class="text-danger"><i class="fa fa-circle mr-2"></i>Series A</h6>
                                            </li>
                                            <li class="list-inline-item">
                                                <h6 class="text-success"><i class="fa fa-circle mr-2"></i>Series B</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card-box">

                                    <h4 class="header-title mb-4">Statistics</h4>
                                    <div id="morris-bar-example" class="text-center morris-charts" style="height: 280px;"></div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card-box">

                                    <h4 class="header-title mb-4">Total Revenue</h4>
                                    <div id="morris-line-example" class="text-center morris-charts" style="height: 280px;"></div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Recent Users</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User Name</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <img src="assets\images\users\avatar-1.jpg" alt="user" class="avatar-sm rounded-circle">
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Louis Hansen</h5>
                                                        <p class="m-0 text-muted"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+12 3456 789</td>
                                                    <td>USA</td>
                                                    <td>07/08/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="assets\images\users\avatar-2.jpg" alt="user" class="avatar-sm rounded-circle">
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Craig Hause</h5>
                                                        <p class="m-0 text-muted"><small>Programmer</small></p>
                                                    </td>
                                                    <td>+89 345 6789</td>
                                                    <td>Canada</td>
                                                    <td>29/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="assets\images\users\avatar-3.jpg" alt="user" class="avatar-sm rounded-circle">
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Edward Grimes</h5>
                                                        <p class="m-0 text-muted"><small>Founder</small></p>
                                                    </td>
                                                    <td>+12 29856 256</td>
                                                    <td>Brazil</td>
                                                    <td>22/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="assets\images\users\avatar-4.jpg" alt="user" class="avatar-sm rounded-circle">
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Bret Weaver</h5>
                                                        <p class="m-0 text-muted"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+00 567 890</td>
                                                    <td>USA</td>
                                                    <td>20/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="assets\images\users\avatar-5.jpg" alt="user" class="avatar-sm rounded-circle">
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Mark</h5>
                                                        <p class="m-0 text-muted"><small>Web design</small></p>
                                                    </td>
                                                    <td>+91 123 456</td>
                                                    <td>India</td>
                                                    <td>07/07/2016</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- table-responsive -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-6">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Recent Users</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User Name</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-success">L</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Louis Hansen</h5>
                                                        <p class="m-0 text-muted"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+12 3456 789</td>
                                                    <td>USA</td>
                                                    <td>07/08/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-primary">C</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Craig Hause</h5>
                                                        <p class="m-0 text-muted"><small>Programmer</small></p>
                                                    </td>
                                                    <td>+89 345 6789</td>
                                                    <td>Canada</td>
                                                    <td>29/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-brown">E</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Edward Grimes</h5>
                                                        <p class="m-0 text-muted"><small>Founder</small></p>
                                                    </td>
                                                    <td>+12 29856 256</td>
                                                    <td>Brazil</td>
                                                    <td>22/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-pink">B</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Bret Weaver</h5>
                                                        <p class="m-0 text-muted"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+00 567 890</td>
                                                    <td>USA</td>
                                                    <td>20/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-orange">M</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0 font-15">Mark</h5>
                                                        <p class="m-0 text-muted"><small>Web design</small></p>
                                                    </td>
                                                    <td>+91 123 456</td>
                                                    <td>India</td>
                                                    <td>07/07/2016</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- table-responsive -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2018 - 2020 &copy; Zircos theme by <a href="">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">
        
                <div class="p-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="assets\images\layouts\light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="assets\images\layouts\dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="assets\images\layouts\rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark-rtl.min.css">
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/eKY0g" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
        </a>

        <!-- Vendor js -->
        <script src="{{asset('frontend/admin/js/vendor.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/morris-js/morris.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/raphael/raphael.min.js')}}"></script>

        <script src="{{asset('frontend/admin/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('frontend/admin/js/app.min.js')}}"></script>

    </body>

</html>