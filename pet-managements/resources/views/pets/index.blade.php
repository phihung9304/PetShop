@extends('layouts.app')

@section('content')
<style>
body{
    background:#faf6f2;
    font-family: Arial, sans-serif;
}

h4{
    color:#7c5a3a;
    font-weight:700;
}

/* =========================
   TABLE WRAPPER (GIỐNG SERVICES)
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

/* HEADER */
.table thead th{
    background:#7c5a3a;
    color:#fff;
    padding:12px;
    font-weight:600;
    border:1px solid #e0d6cc;
        text-align: center !important;
    vertical-align: middle;
}

/* CELLS */
.table th,
.table td{
    padding:12px;
    border:1px solid #e0d6cc;
    vertical-align:middle;
    word-break:break-word;
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

.table tbody td{
    text-align: center !important;
    vertical-align: middle;
}

/* =========================
   PET COLUMN STYLE
========================= */
.services-col{
    max-width:200px;
    white-space:normal;
    word-break:break-word;
}

/* BADGE */
.badge-service{
    display:inline-block;
    margin:2px;
    color:#000;
}

/* =========================
   BUTTONS (GIỐNG SERVICES)
========================= */
.action-btns{
    display:flex;
    gap:6px;
    justify-content:center;
}

.btn{
    border-radius:8px !important;
}

.btn-success{
    background:#a67c52 !important;
    border:none !important;
}

.btn-success:hover{
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

/* EMPTY */
.empty{
    padding:20px;
    color:#999;
}
</style>

<h4 class="mb-4">🐶 Quản lý Thú cưng</h4>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3 d-flex justify-content-between">
    <a href="{{ route('pets.create') }}" class="btn btn-success">
        ➕ Thêm thú cưng
    </a>
</div>

<!-- WRAPPER TABLE (GIỐNG SERVICES) -->
<div class="table-wrapper">
    <div class="table-responsive table-wrapper">
        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Loài</th>
                    <th>Tuổi</th>
                    <th>Chủ sở hữu</th>
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
                        <td>{{ $pet->age }}</td>
                        <td>{{ $pet->customer->name }}</td>

                        <td class="services-col">
                            @if($pet->services->count())
                                @foreach($pet->services as $service)
                                    <span class="badge-service">
                                        {{ $service->name }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-muted">Chưa có</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-btns">
                                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">
                                    Sửa
                                </a>

                                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">
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
</div>

@endsection