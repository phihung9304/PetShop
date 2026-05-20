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

.btn-primary{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
}

.btn-primary:hover{
    background:#7c5a3a !important;
}

.btn-secondary{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
}
.btn-secondary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}
</style>

<h4 class="mb-4">✏️ Sửa sản phẩm</h4>

<div class="form-box">
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="mb-3">
    <label class="fw-bold">Tên sản phẩm</label>
    <input type="text"
           name="name"
           value="{{ $product->name }}"
           class="form-control"
           placeholder="Nhập tên sản phẩm"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Giá</label>
    <input type="number"
           step="0.01"
           name="price"
           value="{{ $product->price }}"
           class="form-control"
           placeholder="Nhập giá sản phẩm"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Danh mục</label>

    <select name="category" class="form-control" required>
        <option value="">-- Chọn danh mục --</option>

        <option value="Thức ăn"
            {{ $product->category == 'Thức ăn' ? 'selected' : '' }}>
            Thức ăn
        </option>

        <option value="Phụ kiện"
            {{ $product->category == 'Phụ kiện' ? 'selected' : '' }}>
            Phụ kiện
        </option>

        <option value="Thuốc"
            {{ $product->category == 'Thuốc' ? 'selected' : '' }}>
            Thuốc
        </option>

        <option value="Đồ chơi"
            {{ $product->category == 'Đồ chơi' ? 'selected' : '' }}>
            Đồ chơi
        </option>
    </select>
</div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection