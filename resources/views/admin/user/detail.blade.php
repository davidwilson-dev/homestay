@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Thông tin tài khoản</b></h4>

            <div action="#" method="POST" class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Họ tên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$user->name}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$user->Role->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  value="{{$user->phone_number}}" readonly>
                            </div>

                            <label class="col-md-1 control-label">Email</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control"  value="{{$user->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  value="{{$user->address}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            @if($user->avatar != null)
                                <img src="{{asset('frontend/admin/images/users/' . $user->avatar)}}" alt="avatar" width="200px" height="200px">
                            @else
                                <img src="{{asset('frontend/admin/images/users/avatar.png')}}" alt="avatar" width="200px" height="200px">
                            @endif
                            <label id="label-avatar" class="btn btn-info waves-effect width-md waves-light mt-2">Ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea name="additional_information" class="form-control" rows="10" readonly>{{$user->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary waves-effect width-md waves-light" href="{{route('admin_user.index')}}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
