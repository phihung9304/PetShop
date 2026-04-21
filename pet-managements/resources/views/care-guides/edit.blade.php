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

/* BUTTON */
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

<h4 class="mb-4">➕ Thêm cách nuôi</h4>

<div class="form-box">
<form action="{{ route('care.guides.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Loài</label>
        <input type="text" name="species" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Giống</label>
        <input type="text" name="breed" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tiêu đề</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nội dung</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>

    <button class="btn btn-success">Lưu</button>
    <a href="{{ route('care.guides.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection