@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Chỉnh sửa nhân viên</b></h4>

            <form action="{{route('admin_staff.update', $staff->id)}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Họ tên</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{$staff->name}}" required>
                            </div>

                            <label class="col-md-2 control-label">Chức vụ</label>
                            <div class="col-md-4">
                                <select class="form-control" name="position_id">
                                    @foreach($positions as $position)
                                        @if($staff->position_id == $position->id)
                                            <option value="{{$position->id}}" selected>{{ucfirst($position->name)}}</option>
                                        @else
                                            <option value="{{$position->id}}">{{ucfirst($position->name)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">CCCD/CMND</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="id_card" value="{{$staff->id_card}}">
                            </div>

                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{$staff->email}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Ngày sinh</label>
                            <div class="col-md-4 input-group">
                                @php
                                    $date_birthday = \Carbon\Carbon::parse($staff->birthday);
                                @endphp
                                <input type="text" class="form-control" value="{{$date_birthday->format('m/d/Y')}}" id="datepicker-autoclose" name="birthday">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>

                            <label class="col-md-2 control-label">Số điện thoại</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone_number" value="{{$staff->phone_number}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="address" value="{{$staff->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            @if($staff->avatar != null)
                                <img src="{{asset('storage/' . $staff->avatar)}}" alt="avatar" width="200px" height="200px" id="image-avatar">
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" alt="avatar" width="200px" height="200px" id="image-avatar">
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
                                <textarea name="additional_information" class="form-control" rows="10">{{$staff->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary waves-effect width-md waves-light" href="{{route('admin_staff.index')}}">Quay lại</a>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit" style="margin-left: 5px">Cập nhật</button>
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
