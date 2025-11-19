@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Tạo tài khoản</b></h4>

            <form action="{{route('admin.user.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Nhân viên</label>
                            <div class="col-md-4">
                                <select class="form-control" name="staff_id" id="staff-select" tabindex="1" required>
                                        <option value="0">Chọn nhân viên</option>
                                    @foreach($staffs as $staff)
                                        <option 
                                            value="{{$staff->id}}"
                                            data-email="{{$staff->email}}"
                                            data-position="{{ucfirst($staff->Position->name)}}"
                                            data-address="{{$staff->address}}"
                                            data-additional="{{$staff->additional_information}}"
                                            data-avatar="{{$staff->avatar}}"
                                        >
                                            {{$staff->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="email" name="email" tabindex="-1" readonly required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Mật khẩu</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" tabindex="1" required>
                            </div>

                            <label class="col-md-2 control-label">Chức vụ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="position" tabindex="-1" readonly required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Xác nhận mật khẩu</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password_confirmation" tabindex="1" required>
                            </div>

                            <label class="col-md-2 control-label">Quyền hạn tài khoản</label>
                            <div class="col-md-4">
                                <select class="form-control" name="role_id" tabindex="1" required>
                                        <option value="0" >Chọn quyền hạn tài khoản</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"> {{$role->description}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="address" tabindex="-1" readonly required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" id="image-avatar" width="200px" height="200px" />
                            <label class="mt-2" style="cursor: default;">Ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Thông tin bổ sung</label>
                            <div class="col-md-12">
                                <textarea name="additional_information" class="form-control" rows="10" id="additional" tabindex="-1" readonly required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary waves-effect width-md waves-light" href="{{route('admin.user.index')}}">Quay lại</a>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit" style="margin-left: 5px">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('staff-select').addEventListener('change', function () {
        // Get selected option
        const selectedOption = this.options[this.selectedIndex];

        // Get data from data attributes
        const email = selectedOption.getAttribute('data-email');
        const position = selectedOption.getAttribute('data-position');
        const address = selectedOption.getAttribute('data-address');
        const additional = selectedOption.getAttribute('data-additional');
        const avatar = selectedOption.getAttribute('data-avatar');

        // Assign data to input fields
        document.getElementById('email').value = email || '';
        document.getElementById('position').value = position || '';
        document.getElementById('address').value = address || '';
        document.getElementById('additional').value = additional || '';
        document.getElementById("image-avatar").src = avatar ? `{{asset('storage/${avatar}')}}` : "{{asset('assets/admin/images/staffs/avatar-default.png')}}";
    });
</script>
@endsection
