@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #faf6f2;
            font-family: Arial, sans-serif;
        }

        h4 {
            color: #7c5a3a;
            font-weight: 700;
        }

        /* BUTTON */
        .btn {
            border-radius: 8px !important;
            transition: all 0.2s ease;
        }

        /* CẬP NHẬT */
        .btn-primary {
            background: #d2b48c !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-primary:hover {
            background: #7c5a3a !important;
            transform: scale(1.05);
        }

        /* QUAY LẠI */
        .btn-secondary {
            background: #a67c52 !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-secondary:hover {
            background: #7c5a3a !important;
            transform: scale(1.05);
        }
    </style>

    <h4 class="mb-4">✏️ Sửa Thú cưng</h4>

    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-bold">Tên</label>
            <input type="text" name="name" value="{{ $pet->name }}" class="form-control mb-2"
                placeholder="Nhập tên thú cưng" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Loài</label>

            <select name="species" class="form-control mb-2" required>
                <option value="">-- Chọn loài --</option>

                <option value="Chó" {{ $pet->species == 'Chó' ? 'selected' : '' }}>Chó</option>
                <option value="Mèo" {{ $pet->species == 'Mèo' ? 'selected' : '' }}>Mèo</option>
                <option value="Hamster" {{ $pet->species == 'Hamster' ? 'selected' : '' }}>Hamster</option>
                <option value="Thỏ" {{ $pet->species == 'Thỏ' ? 'selected' : '' }}>Thỏ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Giống</label>
            <input type="text" name="breed" value="{{ $pet->breed }}" class="form-control mb-2"
                placeholder="Nhập giống (ví dụ: Poodle, Pug...)" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tuổi</label>
            <input type="number" name="age" value="{{ $pet->age }}" class="form-control mb-2"
                placeholder="Nhập tuổi (ví dụ: 2, 3, 5...)" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Cân nặng</label>
            <input type="number" name="weight" value="{{ $pet->weight }}" class="form-control mb-2"
                placeholder="Nhập cân nặng (kg)" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Khách hàng</label>
            <select name="customer_id" class="form-control mb-3">
                <option value="">-- Không có khách hàng --</option>

                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $pet->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Dịch vụ</label>

            <div style="border:1px solid #ddd; padding:10px; border-radius:8px; max-height:200px; overflow:auto;">
                @foreach ($services as $service)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}"
                            id="service{{ $service->id }}" {{ $pet->services->contains($service->id) ? 'checked' : '' }}>

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
