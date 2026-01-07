@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="mb-4">Cập nhật thông tin người dùng</h4>
            <div class="row">
                <!-- Avatar Input -->
                <div class="col-xl-3 col-md-4">
                    <div class="text-center card-box shadow-none border border-secoundary">
                        <div class="member-card">
                            <div class="mb-3 mx-auto d-block">
                                <img 
                                    src="{{asset('storage/' . $user->employee->avatar)}}" 
                                    data-default-avatar="{{ asset('assets/admin/images/employee/avatar-default.png') }}"
                                    id="image-avatar" 
                                    class="rounded-circle" 
                                    alt="profile-image"
                                    width="200px" height="200px"
                                >
                            </div>
                            <input type="file" id="input-avatar" class="d-none" name="avatar">
                            <label for="input-avatar" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light m-0">Upload</label>
                            <button type="button" id="btn-clear-avatar" class="btn btn-danger btn-sm width-sm waves-effect mt-2 waves-light m-0">Clear</button>
                        </div>

                    </div>
                </div>

                <!-- Text Input -->
                <div class="col-xl-9 col-md-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">Tài khoản</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="salary-tab" data-toggle="pill" href="#salary" role="tab" aria-controls="salary" aria-selected="false">Lương</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="homestay-tab" data-toggle="pill" href="#homestay" role="tab" aria-controls="homestay" aria-selected="false">Homestay</a>
                                        </li>
                                    </ul>
                                    <hr />
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="userName">
                                                        Email
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input class="form-control required" type="text" value="{{$user->email}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="userName">
                                                        Chức vụ 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select name="position" class="form-control" style="width: 100%" disabled>
                                                            <option value="manager" {{ $user->employee->position == 'manager' ? 'selected' : '' }}>Quản lý</option>
                                                            <option value="accountant" {{ $user->employee->position == 'accountant' ? 'selected' : '' }}>Kế toán</option>
                                                            <option value="receptionist" {{ $user->employee->position == 'receptionist' ? 'selected' : '' }}>Lễ tân</option>
                                                            <option value="chef" {{ $user->employee->position == 'chef' ? 'selected' : '' }}>Đầu bếp</option>
                                                            <option value="cleaner" {{ $user->employee->position == 'cleaner' ? 'selected' : '' }}>Tạp vụ</option>
                                                            <option value="security" {{ $user->employee->position == 'security' ? 'selected' : '' }}>Bảo vệ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" for="name"> 
                                                        Họ tên
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" value="{{$user->employee->name}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="surname"> 
                                                        CCCD
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" value="{{$user->employee->citizen}}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" > 
                                                        Giới tính
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <span class="radio radio-primary mr-3">
                                                            <input name="gender" type="radio" id="male" value="1" {{ $user->employee->gender === 1 ? 'checked' : '' }}>
                                                            <label for="male">Nam</label>
                                                        </span>
                                                        <span class="radio radio-primary">
                                                            <input name="gender" type="radio" id="female" value="0" {{ $user->employee->gender === 0 ? 'checked' : '' }}>
                                                            <label for="female">Nữ</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label">
                                                        Ngày sinh
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9 input-group">
                                                        <input 
                                                            type="text" 
                                                            class="form-control input-date" 
                                                            value="{{\Carbon\Carbon::createFromFormat('Y-m-d', $user->employee->dateOfBirth)->format('d/m/Y')}}"
                                                            disabled
                                                        >                             
                                                        <div class="input-group-append">
                                                            <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" > 
                                                        Điện thoại
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" value="{{$user->employee->phone}}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label">
                                                        Nhận việc
                                                    </label>
                                                    <div class="col-md-9 input-group">
                                                        <input 
                                                            type="text" 
                                                            class="form-control input-date" 
                                                            name="start_date"
                                                            value="{{\Carbon\Carbon::createFromFormat('Y-m-d', $user->employee->start_date)->format('d/m/Y')}}"
                                                        >                             
                                                        <div class="input-group-append">
                                                            <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" > 
                                                        Nghỉ việc
                                                    </label>
                                                    <div class="col-md-9 input-group">
                                                        <input 
                                                            type="text" 
                                                            class="form-control input-date" 
                                                            name="end_date"
                                                            value="{{ $user->employee->end_date ? \Carbon\Carbon::createFromFormat('Y-m-d', $user->employee->end_date)->format('d/m/Y') : ''}}"
                                                        >                        
                                                        <div class="input-group-append">
                                                            <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-1 control-label" for="address">
                                                    Địa chỉ 
                                                </label>
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" value="{{$user->employee->address}}" readonly>
                                                </div>
                                            </div>    
                                            
                                            <div class="form-group row">
                                                <label class="col-md-1 control-label" for="note">
                                                    Ghi chú 
                                                </label>
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" value="{{$user->employee->note}}" readonly>
                                                </div>
                                            </div>                                              
                                        </div>

                                        <div class="tab-pane" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" for=""> 
                                                        Lương cơ bản
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" oninput="formatCurrency(this)" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for=""> 
                                                        Phụ cấp
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" oninput="formatCurrency(this)" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" for=""> 
                                                        Xăng xe
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" oninput="formatCurrency(this)" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for=""> 
                                                        Điện thoại
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="required form-control" oninput="formatCurrency(this)" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="homestay" role="tabpanel" aria-labelledby="homestay-tab">
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-8">
                                                    <div>
                                                        <label class="control-label " for=""> 
                                                            Cơ sở
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input 
                                                            class="form-control required" 
                                                            type="text" 
                                                            value="{{$user->employee->facility_id ? $user->employee->facility->name : ''}}" 
                                                            readonly
                                                        >
                                                    </div>
                                                    <div>
                                                        <label class="control-label " for=""> 
                                                            Địa chỉ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="">
                                                            <input 
                                                                type="text" 
                                                                class="required form-control" 
                                                                value="{{$user->employee->facility_id ? $user->employee->facility->address : ''}}" 
                                                                readonly
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <img 
                                                        src="{{asset('assets/admin/images/facilities/avatar-default-homestay.png')}}" 
                                                        default-avatar="{{asset('assets/admin/images/facilities/avatar-default-homestay.png')}}"
                                                        alt="homestay" 
                                                        class="img-thumbnail"
                                                        id="facility-avatar"
                                                        style="width: 100%; height: 250px;"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a 
                                    class="btn btn-secondary width-sm waves-effect waves-light text-white" 
                                    href="javascript:history.back()"
                                >
                                    Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
