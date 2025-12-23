@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">          
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách tài khoản đã xóa</b></h4>
            </div>

            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Homestay</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>                  
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->employee ? $user->employee->name : ''}}</td>
                        <td>
                            @if($user->employee && $user->employee->avatar !== null)
                                <img src="{{asset('storage/' . $user->employee->avatar)}}" alt="avatar" class="avatar-sm">
                            @else
                                <img src="{{asset('assets/admin/images/employees/avatar-default.png')}}" alt="avatar" class="avatar-sm">
                            @endif
                        </td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->employee ? $user->employee->phone : ''}}</td>
                        <td>{{$user->employee->facility ? $user->employee->facility->name : ''}}</td>
                        <td>
                            <a 
                                class="mx-1 text-success" 
                                data-toggle="modal"
                                data-target="#confirm-small-modal"
                                href="javascript:void()"
                                data-name="{{$user->employee ? $user->employee->name : ''}}"
                                data-email="{{$user->email}}"
                                data-title="Phục hồi tài khoản"
                                data-message="Bạn có chắc chắn muốn phục hồi tài khoản này không?"
                                data-btntext="Phục hồi"
                                data-action="{{route('admin.user.restore', $user->id)}}"
                                data-method="PATCH"
                            >
                                <i class="mdi mdi-refresh" style="font-size: 22px"></i>
                            </a>
                            <a 
                                class="mx-1 text-danger" 
                                data-toggle="modal"
                                data-target="#confirm-small-modal"
                                href="javascript:void()"
                                data-name="{{$user->employee ? $user->employee->name : ''}}"
                                data-email="{{$user->email}}"
                                data-title="Xóa vĩnh viễn tài khoản"
                                data-message="Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này không?"
                                data-btntext="Xóa"
                                data-action="{{route('admin.user.force', $user->id)}}"
                                data-method="DELETE"
                            >
                                <i class="mdi mdi-delete-forever" style="font-size: 22px"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
