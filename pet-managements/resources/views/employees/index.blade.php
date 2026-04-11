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

/* TABLE */
.table{
    background:#ffffff;
    border-radius:12px;
    overflow:hidden;
    border:1px solid #ead7c3;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

/* HEADER GIỐNG CUSTOMER */
.table thead tr{
    background: linear-gradient(
        to right,
        #7c5a3a,
        #a67c52,
        #d2b48c
    );
    color:#fff;
}

/* HEADER CELL */
.table thead th{
    border:none !important;
    padding:12px;
}

/* BODY */
.table tbody tr{
    background:#ffffff;
    transition:0.2s;
}

/* HOVER */
.table tbody tr:hover{
    background:#f3e8dc;
}

/* BUTTONS GIỐNG CUSTOMER */
.btn-primary{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
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

/* BUTTON RADIUS */
.btn{
    border-radius:8px;
}

/* CELL */
th, td{
    padding:12px !important;
    vertical-align: middle;
}
</style>
<h4 class="mb-4">👨‍💼 Quản lý Nhân viên</h4>

<div class="mb-3">
    <a href="#" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Thêm nhân viên
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Đặng Thị Kim Anh</td>
                <td>kim.anh@example.com</td>
                <td>0123456789</td>
                <td>Quản lý</td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Sửa
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i> Xóa
                    </a>
                </td>
            </tr>
            <!-- Thêm dòng nhân viên ở đây -->
        </tbody>
    </table>
</div>
@endsection