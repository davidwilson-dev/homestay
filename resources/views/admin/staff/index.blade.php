@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">          
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách nhân viên</b></h4>
                <a 
                    type="button" 
                    class="btn btn-primary waves-effect width-md waves-light"
                    href="{{route('admin.staff.create')}}"
                >
                    Tạo nhân viên
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
                        <th>Chức vụ</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($staffs as $key => $staff)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$staff->name}}</td>
                        <td>
                            @if($staff->avatar != null)
                                <img src="{{asset('storage/' . $staff->avatar)}}" alt="avatar" class="avatar-sm">
                            @else
                                <img src="{{asset('assets/admin/images/staffs/avatar.png')}}" alt="avatar" class="avatar-sm">
                            @endif
                        </td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->phone_number}}</td>
                        <td>{{ucfirst($staff->Position->name)}}</td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" href="{{route('admin.staff.show', $staff->id)}}">Chi tiết</a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('admin.staff.edit', $staff->id)}}">Sửa</a>
                            <a 
                                class="btn btn-danger btn-sm text-white"
                                data-toggle="modal"
                                data-target=".bs-modal"
                                href="javascript:void()"
                                data-id="{{$staff->id}}"
                                data-name="{{$staff->name}}"
                                data-email="{{$staff->email}}"
                            >
                                Xóa
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
<div class="modal fade bs-modal" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content pb-3">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Xóa nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="delete-form">
                @method('DELETE')
                @csrf
                <div class="modal-body d-flex flex-column">
                    <span>Bạn có muốn xóa nhân viên này?</span>
                    <span id="delete-name-span"></span>
                    <span id="delete-email-span"></span>
                    <span>Nếu nhân viên này sở hữu tài khoản thì sẽ bị xóa đồng thời</span>
                </div>
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                    <button 
                        class="btn btn-danger btn-sm" 
                        style="margin-left: 5px"
                        type="submit"
                    >
                        Xóa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('confirm-delete-modal');
    const deleteForm = document.getElementById('delete-form'); 

    deleteModal.addEventListener('show.bs.modal', (event) => {
        console.log('show modal');
        const button = event.relatedTarget; 
        const staffId = button.getAttribute('data-id'); 
        const staffName = button.getAttribute('data-name'); 
        const staffEmail = button.getAttribute('data-email'); 

        // Update modal content
        const deleteNameSpan = deleteModal.querySelector('#delete-name-span');
        const deleteEmailSpan = deleteModal.querySelector('#delete-email-span');
        deleteNameSpan.textContent = `Họ tên: ${staffName}`;
        deleteEmailSpan.textContent = `Email: ${staffEmail}`;

    });
</script>
@endsection
