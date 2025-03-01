@extends('layouts.admin')
@section('content')
    <div class="w-50 mx-auto">
        <h1>Đăng nhập</h1>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="text">Username:</label>
                <input type="text" id="text" name="username" class="form-control" placeholder="Nhập tên tài khoản">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
@endsection
