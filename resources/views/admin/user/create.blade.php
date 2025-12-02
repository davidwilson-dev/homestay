@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="mb-4">Tạo User</h4>
            <div class="row">
                <!-- Avatar -->
                <div class="col-xl-3 col-md-4">
                    <div class="text-center card-box shadow-none border border-secoundary">
                        <div class="member-card">
                            <div class="mb-3 mx-auto d-block">
                                <img 
                                    src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" 
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

                <!-- Form Input -->
                <div class="col-xl-9 col-md-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <form id="basic-form" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h3>Tài khoản</h3>
                                        <section>
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="userName">
                                                        Email
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input class="form-control required" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="userName">
                                                        Thẩm quyền 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select name="role" class="form-control" style="width: 100%">
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->name}}">{{$role->display_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="password"> 
                                                        Mật khẩu
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="password" type="text" class="required form-control">
                                                    </div>
                                                </div>
    
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="confirm">
                                                        Xác nhận MK
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="password_confirmation" type="text" class="required form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </section>

                                        <h3>Profile</h3>
                                        <section>
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" for="name"> 
                                                        Họ tên
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="full_name" type="text" class="required form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for="surname"> 
                                                        CCCD
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="citizen" type="text" class="required form-control">
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
                                                        <input type="text" class="form-control input-date" placeholder="ngày/tháng/năm" name="birthday">                             
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
                                                        <input name="phone" type="text" class="required form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-1 control-label" for="address">
                                                    Địa chỉ 
                                                </label>
                                                <div class="col-md-11">
                                                    <input name="address" type="text" class="form-control">
                                                </div>
                                            </div>    
                                            
                                            <div class="form-group row">
                                                <label class="col-md-1 control-label" for="note">
                                                    Ghi chú 
                                                </label>
                                                <div class="col-md-11">
                                                    <input name="note" type="text" class="form-control">
                                                </div>
                                            </div>                                              
                                        </section>

                                        <h3>Lương</h3>
                                        <section>
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label" for=""> 
                                                        Lương cơ bản
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="salary_basic" type="text" class="required form-control" oninput="formatCurrency(this)">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for=""> 
                                                        Phụ cấp
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="" type="text" class="required form-control" oninput="formatCurrency(this)">
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
                                                        <input name="" type="text" class="required form-control" oninput="formatCurrency(this)">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 row">
                                                    <label class="col-md-3 control-label " for=""> 
                                                        Điện thoại
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input name="" type="text" class="required form-control" oninput="formatCurrency(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <h3>Homestay</h3>
                                        <section>
                                            <div class="row d-flex justify-content-between">
                                                <div class="form-group col-md-8">
                                                    <div>
                                                        <label class="control-label " for=""> 
                                                            Cơ sở
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="facility_id" class="form-control" id="selected-facility">
                                                                <option value="0">Chọn cơ sở</option>
                                                            @foreach($facilities as $facility)
                                                                <option value="{{$facility->id}}" data-address="{{$facility->address}}">{{$facility->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="control-label " for=""> 
                                                            Địa chỉ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="">
                                                            <input type="text" id="facility-address" class="required form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <img 
                                                        src="{{asset('assets/admin/images/facilities/avatar-default-homestay.png')}}" 
                                                        alt="homestay" 
                                                        class="img-thumbnail"
                                                        id="facility-avatar"
                                                    >
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form>
                                <!-- End #wizard-vertical -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
        </div>
    </div>
</div>

<!-- Handle Avatar -->
@push('scripts-change-avatar')
<script>
    const inputAvatar = document.getElementById("input-avatar");
    const imageAvatar = document.getElementById("image-avatar");
    const btnClearAvatar = document.getElementById("btn-clear-avatar");

    inputAvatar.addEventListener('change', function(){
        imageAvatar.src = window.URL.createObjectURL(inputAvatar.files[0]);
    })

    btnClearAvatar.addEventListener('click', function(){
        inputAvatar.value = null;
        imageAvatar.src = "{{asset('assets/admin/images/staffs/avatar-default.png')}}";
    })
</script>
@endpush

<!-- Get data Homestay -->
@push('scripts-selected-facility')
<script>
    document.getElementById('selected-facility').addEventListener('change', function () {
        // Get selected option
        const selectedOption = this.options[this.selectedIndex];
        
        // Get data from data attributes
        const address = selectedOption.getAttribute('data-address');
        const avatar = selectedOption.getAttribute('data-avatar');

        // Assign data to input fields
        document.getElementById('facility-address').value = address || '';
        document.getElementById("facility-avatar").src = avatar ? `{{asset('storage/${avatar}')}}` : "{{asset('assets/admin/images/facilities/avatar-default-homestay.png')}}";
    });
</script>
@endpush

@endsection
