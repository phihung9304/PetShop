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
    background:#a67c52 !important;
    border:none !important;
}

.btn-primary:hover{
    background:#7c5a3a !important;
}

.btn-secondary{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
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
            <label>Tên</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $employee->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ $employee->email }}" required>
        </div>

        <div class="mb-3">
            <label>SĐT</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ $employee->phone }}">
        </div>

        <div class="mb-3">
            <label>Chức vụ</label>
            <input type="text" name="position" class="form-control"
                   value="{{ $employee->position }}">
        </div>

        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</div>

@endsection