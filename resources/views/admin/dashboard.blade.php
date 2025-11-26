@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-lg-6 col-xl-3">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="float-right mt-2">
                    <i class="mdi mdi-chart-areaspline display-3 m-0"></i>
                </div>
                <div class="overflow-hidden">
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Bookings</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$totalBookings}}</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$timenow->format('d') . '/' . $timenow->format('m') . '/' . $timenow->format('Y')}}
                    </p>
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
                    <h2 class="mb-0"><span data-plugin="counterup">{{$totalUsers}}</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$timenow->format('d') . '/' . $timenow->format('m') . '/' . $timenow->format('Y')}}
                    </p>
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
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Nhân viên</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$totalStaffs}}</span><i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$timenow->format('d') . '/' . $timenow->format('m') . '/' . $timenow->format('Y')}}
                    </p>
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
                    <h2 class="mb-0"><span data-plugin="counterup">{{$totalRevenue}}</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$timenow->format('d') . '/' . $timenow->format('m') . '/' . $timenow->format('Y')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-4">Cộng tác viên mới</h4>

            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach($recentCollaborators as $staff)
                        <tr>
                            <th>{{$i}}</th>
                            <td>
                                @if($staff->avatar == null)
                                    <img src="{{asset('assets/admin/images/staffs/avatar.png')}}" alt="user" class="avatar-sm rounded-circle" />
                                @else
                                    <img src="{{asset('storage/' . $staff->avatar)}}" alt="user" class="avatar-sm rounded-circle" />
                                @endif
                            </td>
                            <td>
                                <h5 class="m-0 font-15">{{$staff->name}}</h5>
                                <p class="m-0 text-muted"><small>{{$staff->phone_number}}</small></p>
                            </td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->created_at->format('d') . '/' . $staff->created_at->format('m') . '/' . $staff->created_at->format('Y')}}</td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
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
            <h4 class="header-title mb-4">Đơn hàng gần đây</h4>

            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>CCCD/Hộ chiếu</th>
                            <th>Checkin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach($recentbookings as $booking)
                        <tr>
                            <th>{{$i}}</th>
                            <td>{{$booking->code}}</td>
                            <td>
                                <h5 class="m-0 font-15">{{$booking->name_customer}}</h5>
                                <p class="m-0 text-muted"><small>{{$booking->phone_number}}</small></p>
                            </td>
                            <td>{{$booking->id_passport}}</td>
                            <td>{{$booking->checkin}}</td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
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
@endsection
