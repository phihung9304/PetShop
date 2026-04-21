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

/* SERVICE BOX */
.service-box{
    border:1px solid #ddd;
    padding:10px;
    border-radius:8px;
    max-height:200px;
    overflow:auto;
    background:#fafafa;
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

<h4 class="mb-4">➕ Thêm Thú cưng</h4>

<div class="form-box">
<form action="{{ route('pets.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Tên" class="form-control mb-2" required>

    <input type="text" name="species" placeholder="Loài" class="form-control mb-2" required>

    <input type="text" name="breed" placeholder="Giống" class="form-control mb-2">

    <input type="number" name="age" placeholder="Tuổi" class="form-control mb-2">

    <input type="number" step="0.1" name="weight" placeholder="Cân nặng" class="form-control mb-2">

    <select name="customer_id" class="form-control mb-3" required>
        <option value="">-- Chọn khách hàng --</option>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    {{-- DỊCH VỤ --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Dịch vụ</label>

        <div class="service-box">
            @forelse($services as $service)
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="services[]"
                           value="{{ $service->id }}"
                           id="service{{ $service->id }}">

                    <label class="form-check-label" for="service{{ $service->id }}">
                        {{ $service->name }}
                    </label>
                </div>
            @empty
                <span class="text-muted">Chưa có dịch vụ</span>
            @endforelse
        </div>
    </div>

    <button class="btn btn-success">Lưu</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
</div>

@endsection