@extends('layouts.app')

@section('content')
    <style>
        :root {
            --primary: #7c5a3a;
            --primary-hover: #5a3e2b;
            --border: #e0d6cc;
            --bg: #faf6f2;
            --white: #fff;
        }

        body {
            background: var(--bg);
            font-family: Arial, sans-serif;
        }

        h4 {
            color: var(--primary);
            font-weight: 700;
        }

        /* ALERT */
        .alert-success {
            background: #f3e8dc;
            border: none;
            color: var(--primary);
        }

        /* FILTER BAR (GIỐNG HỆ THỐNG) */
        .filter-bar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            background: #fff;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
        }

        .filter-bar input {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline: none;
            min-width: 48.5%;
        }

        .filter-bar input:focus {
            border-color: var(--primary);
        }

        .filter-bar button {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        .filter-bar button:hover {
            background: var(--primary-hover);
        }

        .btn-create {
            background: var(--primary);
            color: #fff;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
        }

        .btn-create:hover {
            background: var(--primary-hover);
            color: #fff;
        }

        .reset-btn {
            padding: 8px 12px;
            background: #eee;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
        }

        .reset-btn:hover {
            background: #ddd;
        }

        /* TABLE WRAPPER (GIỐNG HỆ THỐNG) */
        .table-wrapper {
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            background: var(--white);
            box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);
        }

        /* TABLE */
        .table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table thead th {
            background: var(--primary);
            color: #fff;
            padding: 12px;
            font-weight: 600;
            border: 1px solid var(--border);
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            padding: 12px !important;
            border: 1px solid var(--border);
            text-align: center;
            vertical-align: middle;
            word-break: break-word;
        }

        .table tbody tr:nth-child(even) {
            background: #fcf7f2;
        }

        .table tbody tr:hover {
            background: #f3e8dc;
        }

        /* BUTTONS */
        .btn {
            border-radius: 8px !important;
        }

        .btn-success {
            background: #a67c52 !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-success:hover {
            background: var(--primary-hover) !important;
        }

        .btn-warning {
            background: #d2b48c !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-danger {
            background: #8b5e3c !important;
            border: none !important;
            color: #fff !important;
        }

        /* ACTION BUTTONS */
        .action-btns {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        /* PAGINATION (GIỐNG HỆ THỐNG) */
        .pagination {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
            padding-left: 0;
        }

        .pagination .page-link {
            border-radius: 10px !important;
            border: 1px solid var(--border);
            color: var(--primary);
        }

        .pagination .page-link:hover {
            background: var(--primary);
            color: #fff;
        }

        .pagination .active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }
    </style>

    <h4 class="mb-4">💼 Quản lý Dịch vụ</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- FILTER -->
    <form method="GET" class="filter-bar">

        <a href="{{ route('services.create') }}" class="btn-create">
            ➕ Thêm dịch vụ
        </a>

        <input type="text" name="search" placeholder="🔎 Tìm dịch vụ..." value="{{ request('search') }}">
        <select name="price_range" class="form-control" style="max-width: 200px;">
            <option value="">💰 Tất cả giá</option>

            <option value="low" {{ request('price_range') == 'low' ? 'selected' : '' }}>
                Dưới 100.000đ
            </option>

            <option value="mid" {{ request('price_range') == 'mid' ? 'selected' : '' }}>
                100.000 - 300.000đ
            </option>

            <option value="high" {{ request('price_range') == 'high' ? 'selected' : '' }}>
                Trên 300.000đ
            </option>
        </select>
        <button type="submit">Tìm</button>

        <a href="{{ route('services.index') }}" class="reset-btn">Reset</a>

    </form>

    <!-- TABLE -->
    <div class="table-wrapper">
        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên dịch vụ</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ number_format($service->price, 0, ',', '.') }}đ</td>
                        <td>{{ $service->description }}</td>

                        <td>
                            <div class="action-btns">

                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">
                                    Sửa
                                </a>

                                <form method="POST" action="{{ route('services.destroy', $service->id) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa dịch vụ này?')">
                                        Xóa
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">Chưa có dịch vụ</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center mt-3">
        {{ $services->links() }}
    </div>
@endsection
