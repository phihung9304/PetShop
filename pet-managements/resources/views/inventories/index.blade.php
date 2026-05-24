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
    min-width: 250px;
    flex: 1;
}

.filter-bar select {
    min-width: 180px;
    cursor: pointer;
}

.filter-bar input:focus,
.filter-bar select:focus {
    border-color: var(--primary);
}

/* BUTTON */
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

    /* =========================
        BUTTONS
    ========================= */
    .btn {
        border-radius: 8px !important;
    }

    .btn-primary {
        background: #a67c52 !important;
        border: none !important;
    }

    .btn-primary:hover {
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
        PRODUCT LINK
    ========================= */
    .product-link {
        text-decoration: none;
        color: var(--primary);
        font-weight: 600;
    }

    .product-link:hover {
        color: #a67c52;
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
        .filter-bar button,
        .btn-create,
        .reset-btn {
            width: 100%;
            text-align: center;
        }
        .filter-bar input{
            min-width: 100%;
        }

        .table {
            table-layout: auto;
        }

        .btn {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>

<h4 class="mb-4">📦 Quản lý Kho</h4>

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

    <a href="{{ route('inventories.create') }}" class="btn-create">
        ➕ Thêm kho
    </a>

    <input
        type="text"
        name="search"
        placeholder="🔎 Tìm sản phẩm hoặc tên kho..."
        value="{{ request('search') }}"
    >
<select name="warehouse_name">

    <option value="">🏬 Tất cả kho</option>

    <option value="Kho chính"
        {{ request('warehouse_name') == 'Kho chính' ? 'selected' : '' }}>
        Kho chính
    </option>

    <option value="Kho phụ 1"
        {{ request('warehouse_name') == 'Kho phụ 1' ? 'selected' : '' }}>
        Kho phụ 1
    </option>

    <option value="Kho phụ 2"
        {{ request('warehouse_name') == 'Kho phụ 2' ? 'selected' : '' }}>
        Kho phụ 2
    </option>

</select>
    <button type="submit">
        Tìm
    </button>

    <a href="{{ route('inventories.index') }}" class="reset-btn">
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
                    <th>Sản phẩm</th>
                    <th>Tên kho</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($inventories as $inv)

                    <tr>

                        <td>{{ $inv->id }}</td>

                        <td>
                            {{ $inv->product->name }}
                        </td>

                        <td>
                            {{ $inv->warehouse_name }}
                        </td>

                        <td>
                            {{ $inv->quantity }}
                        </td>

                        <td>

                            <a
                                href="{{ route('inventories.edit', $inv->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Sửa
                            </a>

                            <form
                                action="{{ route('inventories.destroy', $inv->id) }}"
                                method="POST"
                                style="display:inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xóa kho này?')"
                                >
                                    Xóa
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-4">
                            Chưa có dữ liệu kho 📦
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- PAGINATION -->
<div class="d-flex justify-content-center mt-3">

    {{ $inventories->links() }}

</div>

@endsection