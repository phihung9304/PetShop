@extends('layouts.app')

@section('content')

<style>
body{
    background:#faf6f2;
    font-family: Arial, sans-serif;
}

/* TITLE */
h4{
    color:#7c5a3a;
    font-weight:700;
}

/* =========================
   TABLE WRAPPER (ĐỒNG BỘ)
========================= */
.table-wrapper{
    border:1px solid #e0d6cc;
    border-radius:12px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

/* =========================
   TABLE
========================= */
.table{
    width:100%;
    margin:0;
    border-collapse:collapse;
    table-layout:fixed;
}

/* HEADER (GIỐNG SYSTEM)
   đổi sang màu nâu đồng bộ */
.table thead th{
    background:#7c5a3a;
    color:#fff;
    padding:12px;
    font-weight:600;
    border:1px solid #e0d6cc;
}

/* CELLS */
.table th,
.table td{
    padding:12px !important;
    vertical-align:middle;
    border:1px solid #e0d6cc;
    word-break:break-word;
}

.table thead th{
    text-align: center;
}

/* ZEBRA */
.table tbody tr:nth-child(odd){
    background:#fff;
}

.table tbody tr:nth-child(even){
    background:#fcf7f2;
}

/* HOVER */
.table tbody tr:hover{
    background:#f3e8dc;
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
   BUTTONS (ĐỒNG BỘ SYSTEM)
========================= */
.btn-primary{
    background:#a67c52 !important;
    border:none !important;
}

.btn-primary:hover{
    background:#7c5a3a !important;
}

.btn-warning{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
}

.btn-danger{
    background:#8b5e3c !important;
    border:none !important;
    color:#fff !important;
}

/* ALERT */
.alert-success{
    background:#f3e8dc;
    border:none;
    color:#7c5a3a;
}

/* BUTTON RADIUS */
.btn{
    border-radius:8px !important;
}
</style>

<h4 class="mb-4">👤 Quản lý Khách hàng</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('customers.create') }}" class="btn btn-primary">
        ➕ Thêm khách hàng
    </a>
</div>

<!-- WRAPPER TABLE -->
<div class="table-wrapper">
    <div class="table-responsive">
        <table class="table table-striped align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($customers as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->phone }}</td>
                    <td>{{ $c->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $c->id) }}" class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        <form action="{{ route('customers.destroy', $c->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection