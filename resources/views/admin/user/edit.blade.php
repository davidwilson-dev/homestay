@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Sửa thông tin tài khoản</b></h4>

            <form action="{{route('admin_user.update', $user->id)}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Họ tên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        @if($role->name != 'Admin')
                                            @if($user->role_id == $role->id)
                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                            @else
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number" value="{{$user->phone_number}}">
                            </div>

                            <label class="col-md-1 control-label">Email</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="address" value="{{$user->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 control-label">Mật khẩu mới</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 control-label">Xác nhận mật khẩu</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            @if($user->avatar != null)
                                <img src="{{asset('frontend/admin/images/users/' . $user->avatar)}}" alt="avatar" width="200px" height="200px" id="image-avatar">
                            @else
                                <img src="{{asset('frontend/admin/images/users/avatar.png')}}" alt="avatar" width="200px" height="200px" id="image-avatar">
                            @endif
                            <input type="file" name="avatar" class="form-control d-none" id="input-avatar" />
                            <label id="label-avatar" class="btn btn-info waves-effect width-md waves-light mt-2" for="input-avatar">Tải ảnh</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea name="additional_information" class="form-control" rows="10">{{$user->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary waves-effect width-md waves-light" href="{{route('admin_user.index')}}" style="margin-right: 5px">Hủy</a>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Process Image -->
<script>
    let inputAvatar = document.getElementById("input-avatar");
    let imageAvatar = document.getElementById("image-avatar");

    inputAvatar.addEventListener('change', function(){
        imageAvatar.src = window.URL.createObjectURL(inputAvatar.files[0]);
    })
</script>
@endsection
