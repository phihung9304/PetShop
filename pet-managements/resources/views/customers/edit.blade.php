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

/* FORM BOX */
.form-box{
    background:#fff;
    padding:20px;
    border-radius:12px;
    border:1px solid #e0d6cc;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

/* INPUT */
.form-control{
    border-radius:8px;
}

.form-control:focus{
    border-color:#a67c52;
    box-shadow:0 0 0 2px rgba(166,124,82,0.2);
}

/* BUTTON */
.btn{
    border-radius:8px !important;
    transition: all 0.2s ease;
}

/* CẬP NHẬT */
.btn-primary{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
}

.btn-primary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}

/* QUAY LẠI */
.btn-secondary{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
}

.btn-secondary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}
</style>

<h4 class="mb-4">✏️ Sửa khách hàng</h4>

<div class="form-box">
<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
    <label class="fw-bold">Tên khách hàng</label>
    <input type="text"
           name="name"
           value="{{ $customer->name }}"
           class="form-control"
           placeholder="Nhập tên khách hàng"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Số điện thoại</label>
    <input type="text"
           name="phone"
           value="{{ $customer->phone }}"
           class="form-control"
           placeholder="Nhập số điện thoại" required>
</div>

<div class="mb-3">
    <label class="fw-bold">Email</label>
    <input type="email"
           name="email"
           value="{{ $customer->email }}"
           class="form-control"
           placeholder="Nhập email" required>
</div>

<div class="mb-3">
    <label class="fw-bold">Địa chỉ</label>
    <input type="text"
           name="address"
           value="{{ $customer->address }}"
           class="form-control"
           placeholder="Nhập địa chỉ" required>
</div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection