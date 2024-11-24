@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Thông tin đơn hàng</b></h4>

            <div class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Tên khách hàng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name_customer" value="{{$order->name_customer}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">CCCD/Hộ chiếu</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="id_passport" value="{{$order->id_passport}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number" value="{{$order->phone_number}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{$order->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Trạng thái</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{$order->status}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Giảm giá</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="discount" value="{{$order->discount}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkin_estimate" value="{{$order->checkin_estimate}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Đặt cọc</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="deposit" value="0" value="{{$order->deposit}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin thực tế</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkin" value="{{$order->checkin}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Checkout dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkout_estimate" value="{{$order->checkout_estimate}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Phí tiện ích</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="utility_fee" value="{{$order->utility_fee}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Phí phạt</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="penalty_fee" value="{{$order->penalty_fee}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-box">
                            <h4 class="header-title">Phòng đã đặt</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    @foreach($rooms as $room)
                                        @if($order->room_id == $room->id)
                                            <div class="radio radio-primary">
                                                <input type="radio" name="room_id" value="{{$room->id}}" id="{{'room-' . $room->id}}" checked disabled>
                                                <label for="{{'room-' . $room->id}}">
                                                    {{$room->name}}
                                                </label>
                                            </div>
                                        @else
                                            <div class="radio radio-primary">
                                                <input type="radio" name="room_id" value="{{$room->id}}" id="{{'room-' . $room->id}}" disabled>
                                                <label for="{{'room-' . $room->id}}">
                                                    {{$room->name}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin thêm</label>
                            <div class="col-md-12">
                                <textarea name="description" class="form-control" rows="10" readonly>{{$order->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary waves-effect width-md waves-light" href="{{route('admin_order.index')}}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
