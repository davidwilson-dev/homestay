@extends('layouts.admin-layout') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title pb-2 border-bottom"><b>Tạo phòng</b></h4>

            <form action="{{route('admin_room.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Tên phòng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <label class="col-md-2 control-label">Tầng</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="floor_number" step="1" value="1" min="1" max="50" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Giá ngày thường</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="price_weekday" oninput="formatPrice(this)">
                            </div>

                            <label class="col-md-2 control-label">Giá cuối tuần</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="price_weekend" oninput="formatPrice(this)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-12 control-label">Mô tả phòng</label>
                            <div class="col-md-12">
                                <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function formatPrice(input) {
        let value = input.value.replace(/\./g, '').replace(/[^0-9.]/g, '');

        if (!isNaN(value) && value.length > 0) {
            value = parseFloat(value).toLocaleString('de-DE');
            input.value = value;
        } else {
            input.value = ''; 
        }
    }
</script>
@endsection
