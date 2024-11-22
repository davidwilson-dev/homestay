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
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Đơn hàng</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$count_order}}</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$time_now->format('d') . '/' . $time_now->format('m') . '/' . $time_now->format('Y')}}
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
                    <h2 class="mb-0"><span data-plugin="counterup">{{$count_user}}</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$time_now->format('d') . '/' . $time_now->format('m') . '/' . $time_now->format('Y')}}
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
                    <h2 class="mb-0"><span data-plugin="counterup">{{$count_staff}}</span><i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$time_now->format('d') . '/' . $time_now->format('m') . '/' . $time_now->format('Y')}}
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
                    <h2 class="mb-0"><span data-plugin="counterup">0</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    <p class="text-muted mt-2 m-0">
                        <span class="font-weight-medium">
                            Cập nhật:
                        </span> 
                        {{$time_now->format('d') . '/' . $time_now->format('m') . '/' . $time_now->format('Y')}}
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
                        @foreach($staffs as $staff)
                        <tr>
                            <th>{{$i}}</th>
                            <td>
                                @if($staff->avatar == null)
                                    <img src="{{asset('frontend/admin/images/staffs/avatar.png')}}" alt="user" class="avatar-sm rounded-circle" />
                                @else
                                    <img src="{{asset('frontend/admin/images/staffs/' . $staff->avatar)}}" alt="user" class="avatar-sm rounded-circle" />
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
                        @foreach($orders as $order)
                        <tr>
                            <th>{{$i}}</th>
                            <td>{{$order->order_code}}</td>
                            <td>
                                <h5 class="m-0 font-15">{{$order->name_customer}}</h5>
                                <p class="m-0 text-muted"><small>{{$order->phone_number}}</small></p>
                            </td>
                            <td>{{$order->id_passport}}</td>
                            <td>{{$order->checkin}}</td>
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
