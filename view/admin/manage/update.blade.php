@extends('layouts.admin')
@section('content')
    <div class="w-50 mx-auto">
        <h3>Tạo cửa hàng</h3>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="text">Name:</label>
                <input type="text" id="text" name="name" class="form-control" placeholder="Nhập tên cửa hàng"
                    value="{{ $shop['name'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="text">Address:</label>
                <input type="text" id="text" name="address" class="form-control" placeholder="Nhập điểm cửa hàng"
                    value="{{ $shop['address'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="text">Phone:</label>
                <input type="text" id="text" name="phone" class="form-control"
                    placeholder="Nhập số diện thoại cửa hàng" value="{{ $shop['phone'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="open_time" class="form-label">Open Time:</label>
                <input type="date" class="form-control" name="open_time">
                <small class="text-success">{{ $shop['open_time'] }}</small>
            </div>
            <div class="form-group mb-3">
                <label for="text">Vehical Type:</label>
                <input type="text" id="text" name="vehical_type" class="form-control"
                    placeholder="Nhập loại phương tiên" value="{{ $shop['vehical_type'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
