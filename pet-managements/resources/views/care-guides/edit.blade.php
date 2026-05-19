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
    transition: all 0.2s ease;
}

.btn-success{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
}

.btn-success:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
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

<h4 class="mb-4">✏️ Sửa cách nuôi</h4>

<div class="form-box">
<form action="{{ route('care-guides.update', $guide->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
    <label class="fw-bold">Loài</label>
    <input type="text"
           name="species"
           class="form-control"
           value="{{ $guide->species }}"
           placeholder="Nhập loài (ví dụ: chó, mèo)"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Giống</label>
    <input type="text"
           name="breed"
           class="form-control"
           value="{{ $guide->breed }}"
           placeholder="Nhập giống (ví dụ: Poodle, Alaska)">
</div>

<div class="mb-3">
    <label class="fw-bold">Tiêu đề</label>
    <input type="text"
           name="title"
           class="form-control"
           value="{{ $guide->title }}"
           placeholder="Nhập tiêu đề"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Nội dung</label>
    <textarea name="content"
              class="form-control"
              rows="5"
              placeholder="Nhập nội dung"
              required>{{ $guide->content }}</textarea>
</div>

    <button class="btn btn-success">Cập nhật</button>
    <a href="{{ route('care-guides.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection