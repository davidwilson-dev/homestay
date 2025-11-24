@extends('layouts.auth')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="text-center account-logo-box">
                        <div class="">
                            <a href="#" class="text-white" style="font-size: 42px; font-weight: bold; padding: 0px;">
                                <span><img src="{{asset('admin/images/logo-sm-rmbg.png')}}" alt="" height="42"></span>
                                <span style="color: #ffffff;">Home</span>
                                <span style="color: rgb(37,124,203);">stay</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->has('user_inactive'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$errors->first('user_inactive')}}</strong>
                            </div>
                        @endif
                        @error('litmited_login')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input 
                                    class="form-control" 
                                    type="text" 
                                    id="username-input" 
                                    placeholder="Username or Email" 
                                    name="account" 
                                    value="{{ old('account') }}"
                                    
                                    autocomplete
                                    autofocus
                                >
                                @error('account')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input 
                                    class="form-control" 
                                    type="password" 
                                    id="password-input" 
                                    placeholder="Mật khẩu"
                                    name="password" 
                                    
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox checkbox-success">
                                    <input 
                                        type="checkbox" 
                                        class="custom-control-input" 
                                        id="checkbox-showpassword" 
                                    >
                                    <label class="custom-control-label" for="checkbox-showpassword">Hiện mật khẩu</label>
                                </div>
                            </div>

                            <div class="form-group text-center mt-4 pt-2">
                                <div class="col-sm-12">
                                    <a href="#" class="text-muted"><i class="fa fa-lock mr-1"></i> Quên mật khẩu?</a>
                                </div>
                            </div>

                            <div class="form-group account-btn text-center mt-2">
                                <div class="col-12">
                                    <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Đăng nhập</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Bạn chưa có tài khoản? <a href="#" class="text-primary ml-1"><b>Đăng ký</b></a></p>
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<script>
    document.getElementById('checkbox-showpassword').addEventListener('change', function() {
        let passwordInput = document.getElementById('password-input');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
@endsection
