@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Sửa thông tin phòng</b></h4>

            <form class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Tên phòng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{$room->name}}" readonly>
                            </div>

                            <label class="col-md-2 control-label">Tầng</label>
                            <div class="col-md-4">
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="floor_number" 
                                    step="1" 
                                    min="1" 
                                    max="50"  
                                    value="{{$room->floor_number}}"
                                    readonly
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Giá ngày thường</label>
                            <div class="col-md-4">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="price_weekday" 
                                    oninput="formatPrice(this)" 
                                    value="{{number_format($room->price_weekday, 0, ',', '.')}}"
                                    readonly
                                >
                            </div>

                            <label class="col-md-2 control-label">Giá cuối tuần</label>
                            <div class="col-md-4">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="price_weekend" 
                                    oninput="formatPrice(this)" 
                                    value="{{number_format($room->price_weekend, 0, ',', '.')}}"
                                    readonly
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Mô tả phòng</label>
                            <div class="col-md-12">
                                <textarea name="description" class="form-control" rows="10" readonly>{{$room->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary waves-effect width-md waves-light" href="{{route('admin_room.index')}}">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
