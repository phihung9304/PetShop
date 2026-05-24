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
        background: var(--white);
        padding: 14px;
        border-radius: 12px;
        margin-bottom: 18px;
        border: 1px solid var(--border);
        box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    }

    .filter-bar select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        min-width: 5%;
        background: #fff;
    }
    .filter-bar input{
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        background: #fff;
        width: 14%;
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
        transition: 0.2s;
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
        transition: 0.2s;
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
        transition: 0.2s;
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
    }

    .table th,
    .table td {
        padding: 12px;
        border: 1px solid var(--border);
        vertical-align: middle;
        text-align: center;
        overflow-wrap: break-word;
    }

    .table tbody tr:nth-child(even) {
        background: #fcf7f2;
    }

    .table tbody tr:hover {
        background: #f3e8dc;
    }

    /* =========================
        ACTION BUTTONS
    ========================= */
    .action-btns {
        display: flex;
        gap: 6px;
        justify-content: center;
    }

    .action-btns .btn {
        border-radius: 8px !important;
        font-size: 13px;
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
        STATUS
    ========================= */
    .status-completed {
        color: #2e7d32;
        font-weight: bold;
    }

    .status-cancelled {
        color: #c62828;
        font-weight: bold;
    }

    /* =========================
        PAGINATION
    ========================= */
    .pagination {
        display: flex;
        gap: 6px;
        justify-content: center;
        margin-top: 20px;
        padding-left: 0;
        flex-wrap: wrap;
    }

    .pagination .page-link {
        border-radius: 10px !important;
        border: 1px solid var(--border);
        color: var(--primary);
        transition: 0.2s;
    }

    .pagination .page-link:hover {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
    }

    .pagination .active .page-link {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
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

        .action-btns {
            flex-direction: column;
        }
    }
</style>

<h4 class="mb-4">🧾 Quản lý hóa đơn</h4>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>
@endif

<!-- FILTER -->
<form method="GET" class="filter-bar">

    <a href="{{ route('invoices.create') }}" class="btn-create">
        ➕ Thêm hóa đơn
    </a>

    <input
        type="text"
        name="search"
        placeholder="🔎 Tìm tên hoặc ID..."
        value="{{ request('search') }}"
    >

    <select name="payment_method">
        <option value="">💳 Payment</option>

        <option value="cash"
            {{ request('payment_method') == 'cash' ? 'selected' : '' }}>
            Cash
        </option>

        <option value="momo"
            {{ request('payment_method') == 'momo' ? 'selected' : '' }}>
            Momo
        </option>

        <option value="banking"
            {{ request('payment_method') == 'banking' ? 'selected' : '' }}>
            Transfer
        </option>
    </select>

    <select name="status">

        <option value="">📌 Status</option>

        <option value="completed"
            {{ request('status') == 'completed' ? 'selected' : '' }}>
            Completed
        </option>

        <option value="cancelled"
            {{ request('status') == 'cancelled' ? 'selected' : '' }}>
            Cancelled
        </option>

    </select>

    <input type="date" name="from" value="{{ request('from') }}">

    <input type="date" name="to" value="{{ request('to') }}">

    <button type="submit">
        Lọc
    </button>

    <a href="{{ route('invoices.index') }}" class="reset-btn">
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
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($invoices as $invoice)

                    <tr>

                        <td>{{ $invoice->id }}</td>

                        <td>{{ $invoice->product_name }}</td>

                        <td>
                            {{ number_format($invoice->price) }} VNĐ
                        </td>

                        <td>{{ $invoice->quantity }}</td>

                        <td>
                            {{ number_format($invoice->total_amount) }} VNĐ
                        </td>

                        <td>

                            @if ($invoice->payment_method == 'cash')

                                Tiền mặt

                            @elseif ($invoice->payment_method == 'momo')

                                Momo

                            @elseif ($invoice->payment_method == 'banking')

                                Chuyển khoản

                            @endif

                        </td>

                        <td>

                            @if ($invoice->status == 'completed')

                                <span class="status-completed">
                                    Hoàn thành
                                </span>

                            @else

                                <span class="status-cancelled">
                                    Đã hủy
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $invoice->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>

                            <div class="action-btns">

                                <a
                                    href="{{ route('invoices.edit', $invoice->id) }}"
                                    class="btn btn-sm btn-warning"
                                >
                                    Sửa
                                </a>

                                <form
                                    action="{{ route('invoices.destroy', $invoice->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này không?')"
                                    >
                                        Xóa
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center py-4">
                            Chưa có hóa đơn nào
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- PAGINATION -->
<div class="d-flex justify-content-center mt-3">

    {{ $invoices->links() }}

</div>

@endsection