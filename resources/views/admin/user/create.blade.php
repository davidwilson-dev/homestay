@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Tạo người dùng mới</b></h4>

            <form action="{{route('admin_user.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Họ tên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name">
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        @if($role->name != 'Admin')
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number">
                            </div>

                            <label class="col-md-1 control-label">Email</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 control-label">Mật khẩu</label>
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
                            <img src="{{asset('frontend/admin/images/users/avatar.png')}}" id="image-avatar" width="200px" height="200px" />
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
                                <textarea name="additional_information" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Thêm mới</button>
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
