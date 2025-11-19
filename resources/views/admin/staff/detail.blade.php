@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Thông tin nhân viên</b></h4>

            <div action="#" method="POST" class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Họ tên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$staff->name}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Chức vụ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{ucfirst($staff->Position->name)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">CCCD/CMND</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  value="{{$staff->id_card}}" readonly>
                            </div>                        

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control"  value="{{$staff->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Ngày sinh</label>
                            <div class="col-md-4">
                                @if($staff->birthday != null)
                                <input 
                                    type="text" 
                                    class="form-control"  
                                    value="{{date('d', strtotime($staff->birthday)) . '/' . date('m', strtotime($staff->birthday)) . '/' . date('Y', strtotime($staff->birthday))}}" 
                                    readonly
                                >
                                @else
                                    <input type="text" class="form-control" readonly>
                                @endif
                            </div>

                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  value="{{$staff->phone_number}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  value="{{$staff->address}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            @if($staff->avatar != null)
                                <img src="{{asset('storage/' . $staff->avatar)}}" alt="avatar" width="200px" height="200px">
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" alt="avatar" width="200px" height="200px">
                            @endif
                            <label class="mt-2">Ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea class="form-control" rows="10" readonly>{{$staff->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary waves-effect width-md waves-light" href="{{route('admin_staff.index')}}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
