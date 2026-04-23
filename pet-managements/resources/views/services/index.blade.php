@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #faf6f2;
            font-family: Arial, sans-serif;
        }

        h4 {
            color: #7c5a3a;
            font-weight: 700;
        }

        /* =========================
           TABLE WRAPPER (GIỐNG PETS)
        ========================= */
        .table-wrapper {
            border: 1px solid #e0d6cc;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);
        }

        /* =========================
           TABLE CORE
        ========================= */
        .table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            table-layout: fixed;
        }

        /* HEADER */
        .table thead th {
            background: #7c5a3a;
            color: #fff;
            padding: 12px;
            font-weight: 600;
            border: 1px solid #e0d6cc;
            text-align: center !important;
            vertical-align: middle;

        }

        /* CELLS */
        .table th,
        .table td {
            padding: 12px;
            border: 1px solid #e0d6cc;
            vertical-align: middle;
            word-break: break-word;
        }

        /* =========================
           ZEBRA ROW (GIỐNG PETS)
        ========================= */
        .table tbody tr:nth-child(odd) {
            background: #fff;
        }

        .table tbody tr:nth-child(even) {
            background: #fcf7f2;
        }

        /* HOVER */
        .table tbody tr:hover {
            background: #f3e8dc;
        }

        .table thead th{
    text-align: center !important;
    vertical-align: middle;
}

.table tbody td{
    text-align: center !important;
    vertical-align: middle;
}

        /* =========================
           TEXT STYLE
        ========================= */
        .service-name {
            max-width: 180px;
        }

        .description {
            max-width: 300px;
        }

        .price {
            color: #7c5a3a;
            font-weight: 600;
        }

        /* =========================
           ACTION BUTTONS
        ========================= */
        .action-btns {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        /* BUTTONS */
        .btn {
            border-radius: 8px !important;
        }

        .btn-success {
            background: #a67c52 !important;
            border: none !important;
        }

        .btn-success:hover {
            background: #7c5a3a !important;
        }

        .btn-warning {
            background: #d2b48c !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-danger {
            background: #8b5e3c !important;
            border: none !important;color: #fff !important;
}

        /* ALERT */
        .alert-success {
            background: #f3e8dc;
            border: none;
            color: #7c5a3a;
        }

        /* EMPTY */
        .empty {
            padding: 20px;
            color: #999;
        }
    </style>

    <h4 class="mb-4">💼 Quản lý Dịch vụ</h4>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('services.create') }}" class="btn btn-success">
            ➕ Thêm dịch vụ
        </a>
    </div>

    <!-- WRAPPER TABLE -->
    <div class="table-wrapper">
        <div class="table-responsive table-wrapper">
            <table class="table align-middle">

                <thead>
                    <tr>
                        <th style="width:60px">ID</th>
                        <th style="width:180px">Tên dịch vụ</th>
                        <th style="width:120px">Giá</th>
                        <th>Mô tả</th>
                        <th style="width:140px">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>

                            <td class="service-name">
                                {{ $service->name }}
                            </td>

                            <td class="price">
                                {{ number_format($service->price, 0, ',', '.') }}đ
                            </td>

                            <td class="description">
                                {{ $service->description }}
                            </td>

                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">
                                        Sửa
                                    </a>

                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center empty">
                                Chưa có dịch vụ nào
                            </td>
                        </tr>
                    @endforelse</tbody>

            </table></div>
    </div>
@endsection