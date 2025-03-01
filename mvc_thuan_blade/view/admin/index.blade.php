@extends('layouts.admin')

@section('content')
    <h3>Quản lý cửa hàng</h3>
    <a href="/admin/create" class="btn btn-success">Tạo</a>
    <table class="table table-bordered table-hover mt-3 text-center">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên cửa hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    <th scope="row">{{ $shop['id'] }}</th>
                    <td>{{ $shop['name'] }}</td>
                    <td>{{ $shop['address'] }}</td>
                    <td>{{ $shop['phone'] }}</td>
                    <td>
                        <a href="/admin/update/{{ $shop['id'] }}" class="btn btn-primary">Sửa</a>
                        <a href="/admin/delete/{{ $shop['id'] }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
