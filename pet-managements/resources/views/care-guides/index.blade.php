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

/* TABLE WRAPPER */
.table-wrapper{
    border:1px solid #e0d6cc;
    border-radius:12px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

/* TABLE */
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
    text-align:center;
}

/* CELL */
.table th,
.table td{
    padding:12px;
    border:1px solid #e0d6cc;
    vertical-align:middle;
    word-break:break-word;
    text-align:center;
}

/* ZEBRA */
.table tbody tr:nth-child(even){
    background:#fcf7f2;
}

.table tbody tr:hover{
    background:#f3e8dc;
}

/* CONTENT COLUMN */
.content-col{
    max-width:300px;
    text-align:left !important;
}

/* BUTTONS */
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

<h4 class="mb-4">📘 Quản lý Cách nuôi</h4>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3 d-flex justify-content-between">
    <div>
        <a href="{{ route('care.guides.create') }}" class="btn btn-success">
            ➕ Thêm cách nuôi
        </a>
    </div>
</div>

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
                            <div class="action-btns"></div><a href="{{ route('care.guides.edit', $guide->id) }}" class="btn btn-sm btn-warning">
                                    Sửa
                                </a>

                                <form action="{{ route('care.guides.destroy', $guide->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Xóa hướng dẫn này?')">
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

@endsection