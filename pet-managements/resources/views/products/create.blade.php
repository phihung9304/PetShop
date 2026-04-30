@extends('layouts.app')

@section('content')
<style>
body{ background:#faf6f2; font-family:Arial; }
h4{ color:#7c5a3a; font-weight:700; }

.form-box{
    background:#fff;
    padding:20px;
    border-radius:12px;
    border:1px solid #e0d6cc;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
}

.btn{
    border-radius:8px !important;
}

.btn-success{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
}

.btn-success:hover{
    background:#7c5a3a !important;
}

.btn-secondary{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
}
</style>

<h4 class="mb-4">➕ Thêm sản phẩm</h4>

<div class="form-box">
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Giá</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tồn kho</label>
        <input type="number" name="stock" class="form-control">
    </div>

    <div class="mb-3">
        <label>Danh mục</label>
        <input type="text" name="category" class="form-control">
    </div>

    <button class="btn btn-success">Lưu</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection