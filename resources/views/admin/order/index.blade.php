@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title"><b>Danh sách đơn hàng</b></h4>
                <a 
                    type="button" 
                    class="btn btn-primary waves-effect width-md waves-light"
                    href="{{route('admin_order.create')}}"
                >
                    Tạo đơn hàng
                </a>
            </div>

            <table 
                id="datatable-buttons" 
                class="table table-striped table-bordered dt-responsive nowrap" 
                style="border-collapse: collapse; border-spacing: 0; width: 100%;"
            >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã đơn hàng</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Trạng thái</th>
                        <th>Phòng</th>
                        <th>Thành tiền</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$order->order_code}}</td>
                        <td>{{$order->checkin}}</td>
                        <td>{{$order->checkout}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->Room->name}}</td>
                        <td>{{$order->order_price}}</td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" href="{{route('admin_order.show', $order->id)}}">Chi tiết</a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('admin_order.edit', $order->id)}}">Sửa</a>
                            <a 
                                class="btn btn-danger btn-sm text-white"
                                data-toggle="modal"
                                data-target=".{{'bs-modal-'.$order->id}}"
                                href="javascript:void()"
                            >
                                Xóa
                            </a>
                            <div class="modal fade {{'bs-modal-'.$order->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content pb-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Xóa đơn hàng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex flex-column">
                                            <span>Bạn có muốn xóa đơn hàng này?</span>
                                            <span>Tên đơn hàng: {{$order->order_code}}</span>
                                            <span>Tên đơn hàng: {{$order->order_room_id}}</span>
                                        </div>
                                        <div class="d-flex justify-content-end px-3">
                                            <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                                            <button 
                                                class="btn btn-danger btn-sm" 
                                                style="margin-left: 5px"
                                                type="button"
                                                onclick="document.getElementById('{{'form-delete-'.$order->id}}').submit()"
                                            >
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('admin_order.destroy', $order->id)}}" method="POST" id="{{'form-delete-'.$order->id}}" class="d-none">
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
