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

/* HEADER gradient nâu nhạt dần */
.table thead tr{
    background: linear-gradient(
        to right,
        #7c5a3a,
        #a67c52,
        #d2b48c
    );
    color:white;
}

/* hover row */
.table tbody tr{
    transition:0.2s;
}

.table tbody tr:hover{
    background:#f3e8dc;
}

/* BUTTONS */
.btn-primary{
    background:#a67c52;
    border:none;
}

.btn-primary:hover{
    background:#7c5a3a;
}

.btn-warning{
    background:#d2b48c;
    border:none;
    color:white;
}

.btn-danger{
    background:#8b5e3c;
    border:none;
}

/* ALERT */
.alert-success{
    background:#f3e8dc;
    border:none;
    color:#7c5a3a;
}

/* TABLE HEADER SPACING */
th, td{
    padding:12px !important;
    vertical-align: middle;
}

/* BUTTON ROUND */
.btn{
    border-radius:8px;
}
</style>
<h4 class="mb-4">👤 Quản lý Khách hàng</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('customers.create') }}" class="btn btn-primary">
        Thêm khách hàng
    </a>
</div>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Hành động</th>
    </tr>

    @foreach($customers as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>{{ $c->address }}</td>
        <td>
            <a href="{{ route('customers.edit', $c->id) }}" class="btn btn-warning btn-sm">Sửa</a>

            <form action="{{ route('customers.destroy', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection