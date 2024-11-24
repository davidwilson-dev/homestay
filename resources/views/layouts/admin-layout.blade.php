<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dau's homestay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('frontend/admin/images/favicon.ico')}}" />

        <!-- Table datatable css -->
        <link href="{{asset('frontend/admin/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/datatables/fixedColumns.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Date picker -->
        <link href="{{asset('frontend/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/admin/libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Modal -->
        <link href="{{asset('frontend/admin/libs/custombox/custombox.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{asset('frontend/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('frontend/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frontend/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="{{asset('frontend/admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">                         
                            @if(Auth::user()->avatar !== null)
                                <img src="{{asset('frontend/admin/images/staffs/'.Auth::user()->Staff->avatar)}}" alt="user-image" class="rounded-circle" />
                            @else
                                <img src="{{asset('frontend/admin/images/staffs/avatar.png')}}" alt="user-image" class="rounded-circle" />
                            @endif
                            <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->Staff->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a 
                                class="dropdown-item notify-item"
                                href="#custom-modal"                                 
                                data-animation="fadein" 
                                data-plugin="custommodal" 
                                data-overlayspeed="200" 
                                data-overlaycolor="#36404a"
                            >
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a 
                                class="dropdown-item notify-item"
                                href="#custom-modal"                                 
                                data-animation="fadein" 
                                data-plugin="custommodal" 
                                data-overlayspeed="200" 
                                data-overlaycolor="#36404a"
                            >
                                <i class="mdi mdi-settings-outline"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a 
                                class="dropdown-item notify-item"
                                href="#custom-modal"                                 
                                data-animation="fadein" 
                                data-plugin="custommodal" 
                                data-overlayspeed="200" 
                                data-overlaycolor="#36404a"
                            >
                                <i class="mdi mdi-lock-outline"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item notify-item"
                                href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                            >
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
                            <img src="{{asset('frontend/admin/images/logo-light.png')}}" alt="" height="18" />
                            <!-- <span class="logo-lg-text-light">Zircos</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">Z</span> -->
                            <img src="{{asset('frontend/admin/images/logo-sm.png')}}" alt="" height="24" />
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
                            <img src="{{asset('frontend/admin/images/flags/vietnam.jpg')}}" alt="user-image" class="mr-1" height="12" /> <span class="align-middle">Vietnamese <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/us.jpg')}}" alt="user-image" class="mr-1" height="12" /> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/italy.jpg')}}" alt="user-image" class="mr-1" height="12" /> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/spain.jpg')}}" alt="user-image" class="mr-1" height="12" /> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('frontend/admin/images/flags/russia.jpg')}}" alt="user-image" class="mr-1" height="12" /> <span class="align-middle">Russian</span>
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
                                <a href="{{route('home')}}" class="waves-effect waves-light">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Bảng điều khiển </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="fas fa-address-book"></i>
                                    <span> Tài khoản </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('admin_user.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin_user.create')}}">Tạo tài khoản</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="fas fa-users"></i>
                                    <span> Nhân viên </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('admin_staff.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin_staff.create')}}">Tạo nhân viên</a></li>
                                    <li>
                                        <a
                                            href="#custom-modal"                                 
                                            data-animation="fadein" 
                                            data-plugin="custommodal" 
                                            data-overlayspeed="200" 
                                            data-overlaycolor="#36404a"
                                        >
                                            Chức vụ
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="fas fa-home"></i>
                                    <span> Phòng </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('admin_room.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin_room.create')}}">Tạo phòng</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span> Đơn hàng </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('admin_order.index')}}">Tổng hợp</a></li>
                                    <li><a href="{{url('admin/order-booked')}}">Đã đặt phòng</a></li>
                                    <li><a href="{{url('admin/order-checkin')}}">Đang thuê phòng</a></li>   
                                    <li><a href="{{url('admin/order-checkout')}}">Đã trả phòng</a></li>                                
                                    <li><a href="{{route('admin_order.create')}}">Tạo đơn hàng</a></li>
                                </ul>
                            </li>
                            <li>
                                <a 
                                    class="waves-effect waves-light"
                                    href="#custom-modal"                                 
                                    data-animation="fadein" 
                                    data-plugin="custommodal" 
                                    data-overlayspeed="200" 
                                    data-overlaycolor="#36404a"
                                >
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    <span> Thống kê </span>
                                </a>
                            </li>
                            <li>
                                <a 
                                    class="waves-effect waves-light"
                                    href="#custom-modal"                                 
                                    data-animation="fadein" 
                                    data-plugin="custommodal" 
                                    data-overlayspeed="200" 
                                    data-overlaycolor="#36404a"
                                >
                                    <i class="fas fa-cog"></i>
                                    <span> Cài đặt </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted mt-0">Hỗ trợ</h5>
                        <p class="">
                            <span class="text-info">Name:</span> <br />
                            Nguyen Duong
                        </p>
                        <p class="mb-0">
                            <span class="text-info">Call:</span> <br />
                            0789.354.886
                        </p>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Trang quản trị</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                         
                        @yield('content')
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">2024 &copy; Dau's homestay <a href="#">- Nguyen Huy Anh</a></div>
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

        <!-- Alert -->
        @if($errors->any())
            <div class="alert-notification">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $error }}
                    </div>
                @endforeach  
            </div>  
        @endif
        
        @if(session('error'))
            <div class="alert-notification">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if(session('status'))
            <div class="alert-notification">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Cài đặt bổ sung</h4>
            </div>
            <div class="slimscroll-menu">
                <div class="p-4">
                    <div class="alert alert-warning" role="alert"><strong>Tùy chỉnh: </strong> tính năng này đang cập nhật...</div>
                    <div class="mb-2">
                        <img src="{{asset('frontend/admin/images/layouts/light.png')}}" class="img-fluid img-thumbnail" alt="" />
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="" />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset('frontend/admin/images/layouts/dark.png')}}" class="img-fluid img-thumbnail" alt="" />
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input 
                            type="checkbox" 
                            class="custom-control-input theme-choice" 
                            id="dark-mode-switch" 
                        />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <!-- <div class="mb-2">
                        <img src="assets\images\layouts\rtl.png" class="img-fluid img-thumbnail" alt="" />
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\dark-rtl.png" class="img-fluid img-thumbnail" alt="" />
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div> -->

                    <a href="#" class="btn btn-danger btn-block mt-3"><i class="mdi mdi-download mr-1"></i> IT Support</a>
                </div>
            </div>
            <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Modal -->
        <div id="custom-modal" class="modal-demo">

            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Thông báo hỏa tốc</h4>
            <div class="custom-modal-text">
                Tính năng này đang phát triển. <br />
                Cần bao đi ăn nhậu, chơi bi-a để nâng cấp.
            </div>
        </div>

        <!-- <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn"> <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos </a> -->

        <!-- Vendor js -->
        <script src="{{asset('frontend/admin/js/vendor.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/morris-js/morris.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('frontend/admin/js/pages/dashboard.init.js')}}"></script>

        <!-- Datatable plugin js -->
        <script src="{{asset('frontend/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/buttons.bootstrap4.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/buttons.print.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/datatables/dataTables.fixedColumns.min.js')}}"></script>

        <script src="{{asset('frontend/admin/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/pdfmake/vfs_fonts.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('frontend/admin/js/pages/datatables.init.js')}}"></script>

        <!-- Date picker -->
        <script src="{{asset('frontend/admin/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('frontend/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{asset('frontend/admin/js/pages/form-pickers.init.js')}}"></script>

        <!-- Modal -->
        <script src="{{asset('frontend/admin/libs/custombox/custombox.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('frontend/admin/js/app.min.js')}}"></script>
        <script src="{{asset('frontend/admin/js/script.js')}}"></script>
    </body>
</html>
