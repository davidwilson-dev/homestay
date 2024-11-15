@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Đơn hàng</b></h4>

            <form class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Tên khách hàng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{$order->name_customer}}">
                            </div>

                            <label class="col-md-2 control-label">CCCD/Hộ chiếu</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="id_passport">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number">
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Trạng thái</label>
                            <div class="col-md-4">
                                <select name="status" class="form-control" onchange="statusChange(event.target.value)">
                                    <option value="Booked" selected>Booked</option>
                                    <option value="Checkin">Checkin</option>
                                </select>
                            </div>

                            <label class="col-md-2 control-label">Giảm giá</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="discount" value="0" oninput="formatPrice(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkin-estimate" id="input-checkin-estimate">
                            </div>

                            <label class="col-md-2 control-label">Đặt cọc</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="deposit" value="0" oninput="formatPrice(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Checkin thực tế</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkin" id="input-checkin" disabled>
                            </div>

                            <label class="col-md-2 control-label">Checkout dự kiến</label>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control" name="checkout-estimate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-box">
                            <h4 class="header-title">Danh sách phòng</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    @foreach($rooms as $room)
                                        <div class="radio radio-primary">
                                            <input type="radio" name="room_id" value="{{$room->id}}" id="{{'room-' . $room->id}}" checked>
                                            <label for="{{'room-' . $room->id}}">
                                                {{$room->name}}
                                            </label>
                                        </div>
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
                                <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Tạo đơn</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
