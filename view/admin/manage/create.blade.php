@extends('layouts.admin')
@section('content')
    <div class="w-50 mx-auto">
        <h3>Tạo cửa hàng</h3>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="text">Name:</label>
                <input type="text" id="text" name="name" class="form-control" placeholder="Nhập tên cửa hàng">
                @if (isset($errors['name']))
                    <p class="text-danger">{{ $errors['name'] }}</p>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="text">Address:</label>
                <input type="text" id="text" name="address" class="form-control" placeholder="Nhập điểm cửa hàng">
                @if (isset($errors['address']))
                    <p class="text-danger">{{ $errors['address'] }}</p>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="text">Phone:</label>
                <input type="text" id="text" name="phone" class="form-control"
                    placeholder="Nhập số diện thoại cửa hàng">
                @if (isset($errors['phone']))
                    <p class="text-danger">{{ $errors['phone'] }}</p>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="open_time" class="form-label">Open Time:</label>
                <input type="date" class="form-control" name="open_time">
                @if (isset($errors['open_time']))
                    <p class="text-danger">{{ $errors['open_time'] }}</p>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="text">Vehical Type:</label>
                <input type="text" id="text" name="vehical_type" class="form-control"
                    placeholder="Nhập loại phương tiên">
                @if (isset($errors['vehical_type']))
                    <p class="text-danger">{{ $errors['vehical_type'] }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
