@extends('layouts.app')

@section('content')
<h4 class="mb-4">➕ Thêm Thú cưng</h4>

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

    <button class="btn btn-success">Lưu</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection