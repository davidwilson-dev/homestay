@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Sửa tài khoản</b></h4>

            <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Nhân viên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$user->Staff->name}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <select class="form-control" name="role_id" style="text-transform: capitalize">
                                    @foreach($roles as $role)
                                        @if($user->role_id == $role->id)
                                            <option value="{{$role->id}}" select>{{$role->name}}</option>
                                        @else
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Mật khẩu</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password">
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="email" value="{{$user->Staff->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Xác nhận mật khẩu</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="phone_number" value="{{$user->Staff->phone_number}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="address" value="{{$user->Staff->address}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            @if($user->Staff->avatar != null)
                                <img src="{{asset('storage/' . $user->Staff->avatar)}}" width="200px" height="200px" />
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" width="200px" height="200px" />
                            @endif
                            <label class="mt-2" style="cursor: default;">Ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea name="additional_information" class="form-control" rows="10" id="additional" readonly>{{$user->Staff->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary waves-effect width-md waves-light" href="{{route('admin.user.index')}}">Quay lại</a>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit" style="margin-left: 5px">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
