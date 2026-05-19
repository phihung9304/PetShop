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

.form-wrapper{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
    border:1px solid #e0d6cc;
}

.btn-primary{
    transition: all 0.2s ease;
    background:#a67c52 !important;
    border:none !important;
}

.btn-secondary{
    transition: all 0.2s ease;
    background:#d2b48c !important;
    border:none !important;
}

.btn-primary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}

.btn-secondary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}
input{
    border-radius:8px !important;
}
</style>

<h4 class="mb-4">✏️ Sửa Nhân viên</h4>

<div class="form-wrapper">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
    <label class="fw-bold">Tên nhân viên</label>
    <input type="text"
           name="name"
           class="form-control"
           value="{{ $employee->name }}"
           placeholder="Nhập tên nhân viên"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Email</label>
    <input type="email"
           name="email"
           class="form-control"
           value="{{ $employee->email }}"
           placeholder="Nhập email"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">Số điện thoại</label>
    <input type="text"
           name="phone"
           class="form-control"
           value="{{ $employee->phone }}"
           placeholder="Nhập số điện thoại">
</div>

<div class="mb-3">
    <label class="fw-bold">Chức vụ</label>

    <select name="position" class="form-control">
        <option value="">-- Chọn chức vụ --</option>

        <option value="Quản lý"
            {{ $employee->position == 'Quản lý' ? 'selected' : '' }}>
            Quản lý
        </option>

        <option value="Nhân viên"
            {{ $employee->position == 'Nhân viên' ? 'selected' : '' }}>
            Nhân viên
        </option>

        <option value="Bác sĩ thú y"
            {{ $employee->position == 'Bác sĩ thú y' ? 'selected' : '' }}>
            Bác sĩ thú y
        </option>

        <option value="Thu ngân"
            {{ $employee->position == 'Thu ngân' ? 'selected' : '' }}>
            Thu ngân
        </option>
    </select>
</div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</div>

@endsection