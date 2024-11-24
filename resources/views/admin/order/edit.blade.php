@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Thông tin đơn hàng</b></h4>

            <form action="{{route('admin_order.update', $order->id)}}" method="POST" class="form-horizontal mt-4">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Tên khách hàng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name_customer" value="{{$order->name_customer}}" required>
                            </div>

                            <label class="col-md-2 control-label">CCCD/Hộ chiếu</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="id_passport" value="{{$order->id_passport}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number" value="{{$order->phone_number}}">
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{$order->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Trạng thái</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$order->status}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Giảm giá</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="discount" value="{{$order->discount}}" oninput="formatPrice(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkin_estimate" value="{{$order->checkin_estimate}}">
                            </div>

                            <label class="col-md-2 control-label">Đặt cọc</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="deposit" value="0" value="{{$order->deposit}}" oninput="formatPrice(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin thực tế</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" value="{{$order->checkin}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Checkout dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" value="{{$order->checkout_estimate}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Phí tiện ích</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="utility_fee" value="{{$order->utility_fee}}" oninput="formatPrice(this)">
                            </div>

                            <label class="col-md-2 control-label">Phí phạt</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="penalty_fee" value="{{$order->penalty_fee}}" oninput="formatPrice(this)">
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
                @if($order->status == 'checkin')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group row">
                                <h6 class="col-md-2 text-primary">Đơn giá</h6>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="order_price" oninput="formatPrice(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin thêm</label>
                            <div class="col-md-12">
                                <textarea name="description" class="form-control" rows="6">{{$order->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    @if($order->status == 'booked')
                        <a 
                            class="btn btn-danger waves-effect width-md waves-light" 
                            data-toggle="modal"
                            data-target=".{{'bs-modal-'.$order->id}}"
                            href="javascript:void()"
                            style="margin-right: 5px"
                        >
                            Hủy đặt phòng
                        </a>                                             
                        <button 
                            class="btn btn-primary waves-effect width-md waves-light" 
                            type="submit"
                        >
                            Nhận phòng
                        </button>
                    @endif
                    @if($order->status == 'checkin')
                        <a class="btn btn-secondary waves-effect width-md waves-light" href="javascript:history.back()">Quay lại</a>
                        <button 
                            class="btn btn-success waves-effect width-md waves-light" 
                            style="margin-left: 5px"
                            type="submit"
                        >
                            Trả phòng
                        </button>
                    @endif
                    @if($order->status == 'checkout')
                        <a class="btn btn-primary waves-effect width-md waves-light" href="javascript:history.back()">Quay lại</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    @if($order->status == 'booked')
    <!-- Modal destroy order -->
    <div class="modal fade {{'bs-modal-'.$order->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content pb-3">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Xóa đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column">
                    <span>Bạn có muốn xóa đơn hàng này?</span>
                    <span>Họ tên: {{$order->name_customer}}</span>
                    <span>Email: {{$order->email}}</span>
                </div>
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                    <button 
                        class="btn btn-danger btn-sm" 
                        style="margin-left: 5px"
                        type="button"
                        onclick="document.getElementById('{{'form-delete-'.$order->id}}').submit()"
                    >
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form destroy order -->
    <form action="{{route('admin_order.destroy', $order->id)}}" method="POST" id="{{'form-delete-'.$order->id}}" class="d-none">
        @method('DELETE')
        @csrf
    </form>
    @endif
</div>

<script>
    function formatPrice(input) {
        let value = input.value.replace(/\./g, '').replace(/[^0-9.]/g, '');

        if (!isNaN(value) && value.length > 0) {
            value = parseFloat(value).toLocaleString('de-DE');
            input.value = value;
        } else {
            input.value = ''; 
        }
    }
</script>
@endsection
