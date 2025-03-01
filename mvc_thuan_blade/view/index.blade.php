@extends('layouts.master')

@section('content')
    <h5>Cửa hàng trên toàn quốc & quốc tế (1 cửa hàng tại Thái Lan)</h5>

    <!-- Search and Filter Form -->
    <form method="GET" action="/filter" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ $_GET['search'] ?? '' }}" class="form-control"
                placeholder="Tìm kiếm cửa hàng...">
        </div>
        <div class="col-md-4">
            <select name="area" class="form-select">
                <option value="">Tỉnh/Thành phố</option>
                @foreach ($shops as $shop)
                    <option value="{{ $shop['address'] }}"
                        {{ ($_GET['area'] ?? '') == $shop['address'] ? 'selected' : '' }}>{{ $shop['address'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select name="sort" class="form-select">
                <option value="id" {{ ($_GET['sort'] ?? '') == 'id' ? 'selected' : '' }}>Mặc định</option>
                <option value="name" {{ ($_GET['sort'] ?? '') == 'name' ? 'selected' : '' }}>Tên</option>
                <option value="address" {{ ($_GET['sort'] ?? '') == 'address' ? 'selected' : '' }}>Địa chỉ</option>
            </select>
        </div>
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary">Lọc</button>
            <a href="/" class="btn btn-primary">Xoá lọc</a>
        </div>
    </form>

    <!-- Store List -->
    <div class="list-group">
        @if (!empty($shops))
            @foreach ($shops as $shop)
                <div class="list-group-item p-3 border rounded shadow-sm">
                    <h6 class="mb-1">{{ $shop['name'] }}</h6>
                    <p class="mb-1 text-muted">{{ $shop['address'] }}</p>
                    <p class="mb-1"><strong>Giờ mở cửa:</strong> {{ $shop['open_time'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-secondary">🚗 Chỗ đỗ ô tô</span>
                        <div>
                            <span class="me-3">📞 {{ $shop['phone'] }}</span>
                            <button class="btn btn-outline-primary btn-sm">📍 Chỉ đường</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">Không tìm thấy cửa hàng nào.</p>
        @endif
    </div>
@endsection
