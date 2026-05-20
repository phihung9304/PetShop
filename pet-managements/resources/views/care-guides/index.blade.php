@extends('layouts.app')

@section('content')

<style>
    :root{
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

    /* =========================
        ALERT
    ========================= */
    .alert-success {
        background: #f3e8dc;
        border: none;
        color: var(--primary);
    }

    /* =========================
        FILTER BAR
    ========================= */
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
        box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    }

    .filter-bar input,
    .filter-bar select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        height: 42px;
        background: #fff;
        color: #333;
    }

    .filter-bar input {
        min-width: 55%;
    }

    .filter-bar select {
        min-width: 180px;
        cursor: pointer;
    }

    .filter-bar input:focus,
    .filter-bar select:focus {
        border-color: var(--primary);
    }

    .filter-bar button {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: 0 16px;
        height: 42px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
    }

    .filter-bar button:hover {
        background: var(--primary-hover);
    }

    /* CREATE BUTTON */
    .btn-create {
        background: var(--primary);
        color: #fff;
        padding: 9px 14px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 42px;
        transition: 0.2s;
        font-weight: 600;
    }

    .btn-create:hover {
        background: var(--primary-hover);
        color: #fff;
    }

    /* RESET BUTTON */
    .reset-btn {
        padding: 0 14px;
        background: #eee;
        border-radius: 8px;
        text-decoration: none;
        color: #333;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 42px;
    }

    .reset-btn:hover {
        background: #ddd;
        color: #000;
    }

    /* =========================
        TABLE WRAPPER
    ========================= */
    .table-wrapper {
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        background: var(--white);
        box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);
    }

    /* =========================
        TABLE
    ========================= */
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

    .table th,
    .table td {
        padding: 12px !important;
        vertical-align: middle;
        border: 1px solid var(--border);
        text-align: center;
        overflow-wrap: break-word;
    }

    .table tbody tr:nth-child(even) {
        background: #fcf7f2;
    }

    .table tbody tr:hover {
        background: #f3e8dc;
    }

    /* CONTENT COLUMN */
    .content-col {
        max-width: 300px;
        text-align: left !important;
    }

    /* =========================
        BUTTONS
    ========================= */
    .btn {
        border-radius: 8px !important;
    }

    .btn-success {
        background: #a67c52 !important;
        border: none !important;
        color: #fff !important;
    }

    .btn-success:hover {
        background: var(--primary) !important;
    }

    .btn-warning {
        background: #d2b48c !important;
        border: none !important;
        color: #fff !important;
    }

    .btn-warning:hover {
        opacity: 0.9;
    }

    .btn-danger {
        background: #8b5e3c !important;
        border: none !important;
        color: #fff !important;
    }

    .btn-danger:hover {
        opacity: 0.9;
    }

    /* =========================
        ACTION BUTTONS
    ========================= */
    .action-btns {
        display: flex;
        gap: 6px;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* =========================
        PAGINATION
    ========================= */
       .pagination{
        display:flex;
        gap:6px;
        justify-content:center;
        margin-top:20px;
        flex-wrap:wrap;
        padding-left:0;
    }

    .pagination .page-link{
        border-radius:10px !important;
        border:1px solid var(--border);
        color:var(--primary);
    }

    .pagination .page-link:hover{
        background:var(--primary);
        color:#fff;
    }

    .pagination .active .page-link{
        background:var(--primary);
        border-color:var(--primary);
        color:#fff;
    }

    /* EMPTY */
    .empty {
        padding: 20px;
        color: #999;
    }

    /* =========================
        RESPONSIVE
    ========================= */
    @media (max-width: 768px) {

        .filter-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-bar input,
        .filter-bar select,
        .filter-bar button,
        .btn-create,
        .reset-btn {
            width: 100%;
            text-align: center;
        }

        .table {
            table-layout: auto;
        }

        .btn {
            width: 100%;
            margin-bottom: 5px;
        }

        .content-col {
            min-width: 250px;
        }
    }
</style>

<h4 class="mb-4">📘 Quản lý Cách nuôi</h4>

@if (session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif

<!-- FILTER -->
<form method="GET" class="filter-bar">

    <a href="{{ route('care-guides.create') }}" class="btn-create">
        ➕ Thêm cách nuôi
    </a>

    <input
        type="text"
        name="search"
        placeholder="🔎 Tìm tiêu đề hoặc loài..."
        value="{{ request('search') }}"
    >

    <select name="species">

        <option value="">🐾 Tất cả loài</option>

        <option value="Chó"
            {{ request('species') == 'Chó' ? 'selected' : '' }}>
            Chó
        </option>

        <option value="Mèo"
            {{ request('species') == 'Mèo' ? 'selected' : '' }}>
            Mèo
        </option>

        <option value="Hamster"
            {{ request('species') == 'Hamster' ? 'selected' : '' }}>
            Hamster
        </option>

        <option value="Thỏ"
            {{ request('species') == 'Thỏ' ? 'selected' : '' }}>
            Thỏ
        </option>

    </select>

    <button type="submit">
        Tìm
    </button>

    <a href="{{ route('care-guides.index') }}" class="reset-btn">
        Reset
    </a>

</form>

<!-- TABLE -->
<div class="table-wrapper">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Loài</th>
                    <th>Giống</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Hành động</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($guides as $guide)

                    <tr>

                        <td>{{ $guide->id }}</td>

                        <td>{{ $guide->species }}</td>

                        <td>{{ $guide->breed ?? '---' }}</td>

                        <td>{{ $guide->title }}</td>

                        <td class="content-col">
                            {{ Str::limit($guide->content, 80) }}
                        </td>

                        <td>

                            <div class="action-btns">

                                <a
                                    href="{{ route('care-guides.edit', $guide->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Sửa
                                </a>

                                <form
                                    action="{{ route('care-guides.destroy', $guide->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xóa hướng dẫn này?')"
                                    >
                                        Xóa
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="empty text-center">
                            Chưa có hướng dẫn nào 📘
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- PAGINATION -->
<div class="d-flex justify-content-center mt-3">

    {{ $guides->links() }}

</div>

@endsection