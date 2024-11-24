@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách đơn hàng</b></h4>
                <a 
                    type="button" 
                    class="btn btn-primary waves-effect width-md waves-light"
                    href="{{route('admin_order.create')}}"
                >
                    Tạo đơn hàng
                </a>
            </div>

            <table 
                id="datatable-buttons" 
                class="table table-striped table-bordered dt-responsive nowrap" 
                style="border-collapse: collapse; border-spacing: 0; width: 100%;"
            >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã đơn hàng</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Phòng</th>
                        <th>Nhận phòng</th>
                        <th>Trả phòng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>
                            <a href="{{route('admin_order.show', $order->id)}}">{{$order->order_code}}</a>
                        </td>
                        <td>{{$order->name_customer}}</td>
                        <td>{{$order->phone_number}}</td>
                        <td>{{$order->Room->name}}</td>
                        <td>{{$order->checkin}}</td>
                        <td>{{$order->checkout}}</td>
                        <td>{{number_format($order->order_price, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
