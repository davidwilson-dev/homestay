@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Tạo tài khoản</b></h4>

            <form action="{{route('admin_user.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Nhân viên</label>
                            <div class="col-md-4">
                                <select class="form-control" name="staff_id" style="text-transform: capitalize" id="staff-select">
                                        <option value="0">Chọn nhân viên</option>
                                    @foreach($staffs as $staff)
                                        <option 
                                            value="{{$staff->id}}"
                                            data-email="{{$staff->email}}"
                                            data-position="{{ucfirst($staff->Position->name)}}"
                                            data-address="{{$staff->address}}"
                                            data-additional="{{$staff->additional_information}}"
                                            data-avatar="{{$staff->avatar_image}}"
                                        >
                                            {{$staff->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <select class="form-control" name="role_id" style="text-transform: capitalize">
                                    @foreach($roles as $role)
                                        @if($role->name != 'admin')
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
                                <input type="text" class="form-control" id="email" name="email" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Xác nhận mật khẩu</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <label class="col-md-2 control-label">Chức vụ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="position" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="address" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="{{asset('frontend/admin/images/staffs/avatar.png')}}" id="image-avatar" width="200px" height="200px" />
                            <label id="label-avatar" class="btn btn-info waves-effect width-md waves-light mt-2">Ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea name="additional_information" class="form-control" rows="10" id="additional" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary waves-effect width-md waves-light" href="{{route('admin_user.index')}}">Quay lại</a>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit" style="margin-left: 5px">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('staff-select').addEventListener('change', function () {
        // Lấy option được chọn
        const selectedOption = this.options[this.selectedIndex];

        // Lấy dữ liệu từ thuộc tính data
        const email = selectedOption.getAttribute('data-email');
        const position = selectedOption.getAttribute('data-position');
        const address = selectedOption.getAttribute('data-address');
        const additional = selectedOption.getAttribute('data-additional');
        const avatar = selectedOption.getAttribute('data-avatar');

        // Gán dữ liệu vào các ô input
        document.getElementById('email').value = email || '';
        document.getElementById('position').value = position || '';
        document.getElementById('address').value = address || '';
        document.getElementById('additional').value = additional || '';
        document.getElementById("image-avatar").src = avatar || "{{asset('frontend/admin/images/staffs/avatar.png')}}";
    });
</script>
@endsection
