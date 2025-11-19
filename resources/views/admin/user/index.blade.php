@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">          
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách tài khoản</b></h4>
                <a 
                    type="button" 
                    class="btn btn-primary waves-effect width-md waves-light"
                    href="{{route('admin.user.create')}}"
                >
                    Tạo tài khoản
                </a>
            </div>

            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Loại tài khoản</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->Staff->name}}</td>
                        <td>
                            @if($user->Staff->avatar != null)
                                <img src="{{asset('storage/' . $user->Staff->avatar)}}" alt="avatar" class="avatar-sm">
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" alt="avatar" class="avatar-sm">
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->Staff->phone_number}}</td>
                        <td>{{ucfirst($user->Role->name)}}</td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" href="{{route('admin.user.show', $user->id)}}">Chi tiết</a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('admin.user.edit', $user->id)}}">Sửa</a>
                            <a 
                                class="btn btn-danger btn-sm text-white"
                                data-toggle="modal"
                                data-target=".{{'bs-modal-'.$user->id}}"
                                href="javascript:void()"
                            >
                                Xóa
                            </a>
                            <div class="modal fade {{'bs-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content pb-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Xóa tài khoản</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex flex-column">
                                            <span>Bạn có muốn xóa người dùng này?</span>
                                            <span>Họ tên: {{$user->name}}</span>
                                            <span>Email: {{$user->email}}</span>
                                        </div>
                                        <div class="d-flex justify-content-end px-3">
                                            <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                                            <button 
                                                class="btn btn-danger btn-sm" 
                                                style="margin-left: 5px"
                                                type="button"
                                                onclick="document.getElementById('{{'form-delete-'.$user->id}}').submit()"
                                            >
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('admin.user.destroy', $user->id)}}" method="POST" id="{{'form-delete-'.$user->id}}" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
