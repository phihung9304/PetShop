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

        /* FILTER BAR (ĐỒNG BỘ) */
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

        .filter-bar input,
        .filter-bar select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline: none;
            width: 200px;
        }

        .filter-bar input:focus,
        .filter-bar select:focus {
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

        /* TABLE WRAPPER */
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
            text-align: center;
            border: 1px solid var(--border);
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

        /* ACTION BUTTONS */
        .action-btns {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

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

        /* SERVICES BADGE */
        .services-col {
            max-width: 220px;
            white-space: normal;
        }

        .badge-service {
            display: inline-block;
            margin: 2px;
            padding: 3px 6px;
            border-radius: 6px;
            background: #eee;
            font-size: 12px;
        }

        /* =========================
       PAGINATION (SYSTEM STYLE)
    ========================= */
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

    <h4 class="mb-4">🐶 Quản lý Thú cưng</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- FILTER -->
    <form method="GET" class="filter-bar">

        <a href="{{ route('pets.create') }}" class="btn-create">
            ➕ Thêm thú cưng
        </a>

        <input type="text" name="search" placeholder="🔎 Tìm tên thú cưng..." value="{{ request('search') }}">

        <select name="species">
            <option value="">🐾 Tất cả loài</option>
            <option value="Chó">Chó</option>
            <option value="Mèo">Mèo</option>
            <option value="Hamster">Hamster</option>
            <option value="Thỏ">Thỏ</option>
        </select>
        <select name="age_range"  style="max-width: 180px;">
            <option value="">🎂 Tất cả tuổi</option>

            <option value="baby" {{ request('age_range') == 'baby' ? 'selected' : '' }}>
                Con nhỏ (≤ 1 tuổi)
            </option>

            <option value="young" {{ request('age_range') == 'young' ? 'selected' : '' }}>
                Trẻ (2 - 5 tuổi)
            </option>

            <option value="adult" {{ request('age_range') == 'adult' ? 'selected' : '' }}>
                Trưởng thành (6 - 10 tuổi)
            </option>

            <option value="old" {{ request('age_range') == 'old' ? 'selected' : '' }}>
                Già (> 10 tuổi)
            </option>
        </select>
        <button type="submit">Tìm</button>

        <a href="{{ route('pets.index') }}" class="reset-btn">Reset</a>

    </form>

    <!-- TABLE -->
    <div class="table-wrapper">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Loài</th>
                    <th>Giống</th>
                    <th>Tuổi</th>
                    <th>Cân nặng</th>
                    <th>Chủ</th>
                    <th>Dịch vụ</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->id }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->species }}</td>
                        <td>{{ $pet->breed }}</td>
                        <td>{{ $pet->age }}</td>
                        <td>{{ $pet->weight }}</td>
                        <td>{{ $pet->customer->name ?? '---' }}</td>

                        <td class="services-col">
                            @forelse($pet->services as $service)
                                <span class="badge-service">
                                    {{ $service->name }}
                                </span>
                            @empty
                                <span>---</span>
                            @endforelse
                        </td>

                        <td>
                            <div class="action-btns">

                                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning btn-sm">
                                    Sửa
                                </a>

                                <form method="POST" action="{{ route('pets.destroy', $pet->id) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa thú cưng?')">
                                        Xóa
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $pets->links() }}
    </div>
@endsection
