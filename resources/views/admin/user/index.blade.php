@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">          
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách tài khoản {{isset($list_name )? $list_name : ''}}</b></h4>
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
                        <td>{{$user->staff ? $user->staff->full_name : ''}}</td>
                        <td>
                            @if($user->staff && $user->staff->avatar !== null)
                                <img src="{{asset('storage/' . $user->staff->avatar)}}" alt="avatar" class="avatar-sm">
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar-default.png')}}" alt="avatar" class="avatar-sm">
                            @endif
                        </td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->staff ? $user->staff->phone : ''}}</td>
                        <td>{{$user->facility ? $user->facility->name : ''}}</td>
                        <td>
                            <a class="mx-1 text-primary" href="{{route('admin.user.show', $user->id)}}">
                                <i class="mdi mdi-eye" style="font-size: 22px"></i>
                            </a>
                            <a class="mx-1 text-warning" href="{{route('admin.user.edit', $user->id)}}">
                                <i class="mdi mdi-pencil" style="font-size: 22px"></i>
                            </a>
                            <a 
                                class="mx-1 text-danger" 
                                data-toggle="modal"
                                data-target="#confirm-delete-modal"
                                href="javascript:void()"
                                data-id="{{$user->id}}"
                                data-name="{{$user->staff ? $user->staff->full_name : ''}}"
                                data-email="{{$user->email}}"
                            >
                                <i class="mdi mdi-delete" style="font-size: 22px"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content pb-3">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Xóa người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body d-flex flex-column">
                    <span>Bạn có muốn xóa nhân viên này?</span>
                    <span id="modal_delete-name"></span>
                    <span id="modal_delete-email"></span>                  
                </div>
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                    <button 
                        class="btn btn-danger btn-sm" 
                        id="btn-submit-delete"
                        style="margin-left: 5px"
                    >
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form delete -->
<form action="{{url('admin/user/delete')}}" method="POST" id="delete-form" class="d-none">
    @method('DELETE')
    @csrf
    <input type="hidden" id="input-delete-form" name="id">
</form>

<!-- Script delete -->
<script>
    $('#confirm-delete-modal').on('show.bs.modal', function (event) {
        // Button open modal
        const button = $(event.relatedTarget);

        const userId = button.data('id');
        const userName = button.data('name');
        const userEmail = button.data('email');

        // Update content in modal
        $(this).find('#modal_delete-name').text(`Họ tên: ${userName}`);
        $(this).find('#modal_delete-email').text(`Email: ${userEmail}`);

        // Update input hidden
        $('#input-delete-form').val(userId);
    });

    $('#confirm-delete-modal #btn-submit-delete').on('click', function() {
        $('#delete-form').submit();
    });
</script>
@endsection
