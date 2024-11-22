@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title"><b>Danh sách phòng</b></h4>

            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên phòng</th>
                        <th>Tầng</th>
                        <th>Giá ngày thường</th>
                        <th>Giá cuối tuần</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($rooms as $key => $room)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$room->name}}</td>
                        <td>{{$room->floor_number}}</td>
                        <td>{{number_format($room->price_weekday, 0, ',', '.')}}</td>
                        <td>{{number_format($room->price_weekend, 0, ',', '.')}}</td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" href="{{route('admin_room.show', $room->id)}}">Chi tiết</a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('admin_room.edit', $room->id)}}">Sửa</a>
                            <a 
                                class="btn btn-danger btn-sm text-white"
                                data-toggle="modal"
                                data-target=".{{'bs-modal-'.$room->id}}"
                                href="javascript:void()"
                            >
                                Xóa
                            </a>
                            <div class="modal fade {{'bs-modal-'.$room->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content pb-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Xóa phòng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex flex-column">
                                            <span>Bạn có muốn xóa phòng này?</span>
                                            <span>Tên phòng: {{$room->name}}</span>
                                        </div>
                                        <div class="d-flex justify-content-end px-3">
                                            <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                                            <button 
                                                class="btn btn-danger btn-sm" 
                                                style="margin-left: 5px"
                                                type="button"
                                                onclick="document.getElementById('{{'form-delete-'.$room->id}}').submit()"
                                            >
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('admin_room.destroy', $room->id)}}" method="POST" id="{{'form-delete-'.$room->id}}" class="d-none">
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
