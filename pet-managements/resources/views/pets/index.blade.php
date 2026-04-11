@extends('layouts.app')

@section('content')

<style>
body{
    background:#faf6f2;
}

/* TITLE */
h4{
    color:#7c5a3a;
    font-weight:700;
}

/* TABLE CHUNG */
.table{
    background:#ffffff;
    border-radius:12px;
    overflow:hidden;
    border:1px solid #ead7c3;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

/* HEADER - GIỐNG 100% KHÁCH HÀNG */
.table thead tr{
    background: linear-gradient(
        to right,
        #7c5a3a,
        #a67c52,
        #d2b48c
    );
}

/* HEADER CELL */
.table thead th{
    border:none !important;
    padding:12px;
}

/* BODY */




/* CELL */
th, td{
    padding:12px !important;
    vertical-align: middle;
}

/* BUTTON CHUẨN */
.btn-primary,
.btn-success{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
}

.btn-primary:hover,
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

/* BUTTON RADIUS */
.btn{
    border-radius:8px;
}
</style>
    <h4 class="mb-4">🐶 Quản lý Thú cưng</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pets.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Thêm thú cưng
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Loài</th>
                    <th>Tuổi</th>
                    <th>Chủ sở hữu</th>
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
                        <td>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
