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

<h4 class="mb-4">✏️ Sửa Dịch vụ</h4>

<div class="form-box">
<form action="{{ route('services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="fw-bold">Tên dịch vụ</label>
        <input type="text" name="name" class="form-control"
               value="{{ $service->name }}" required>
    </div>

    <div class="mb-3">
        <label class="fw-bold">Giá</label>
        <input type="number" name="price" class="form-control"
               value="{{ $service->price }}" required>
    </div>

    <div class="mb-3">
        <label class="fw-bold">Mô tả</label>
        <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
    </div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection