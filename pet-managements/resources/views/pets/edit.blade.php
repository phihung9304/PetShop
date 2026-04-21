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

<h4 class="mb-4">✏️ Sửa Thú cưng</h4>

<form action="{{ route('pets.update', $pet->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- TÊN --}}
    <input type="text" name="name" value="{{ $pet->name }}" class="form-control mb-2" required>

    {{-- LOÀI --}}
    <input type="text" name="species" value="{{ $pet->species }}" class="form-control mb-2" required>

    {{-- GIỐNG --}}
    <input type="text" name="breed" value="{{ $pet->breed }}" class="form-control mb-2">

    {{-- TUỔI --}}
    <input type="number" name="age" value="{{ $pet->age }}" class="form-control mb-2">

    {{-- CÂN NẶNG --}}
    <input type="number" step="0.1" name="weight" value="{{ $pet->weight }}" class="form-control mb-2">

    {{-- KHÁCH HÀNG --}}
    <select name="customer_id" class="form-control mb-3">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ $pet->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    {{-- DỊCH VỤ --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Dịch vụ</label>

        <div style="border:1px solid #ddd; padding:10px; border-radius:8px; max-height:200px; overflow:auto;">
            @foreach($services as $service)
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="services[]"
                           value="{{ $service->id }}"
                           id="service{{ $service->id }}"
                           {{ $pet->services->contains($service->id) ? 'checked' : '' }}>

                    <label class="form-check-label" for="service{{ $service->id }}">
                        {{ $service->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

@endsection