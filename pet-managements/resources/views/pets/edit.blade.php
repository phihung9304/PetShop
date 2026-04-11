@extends('layouts.app')

@section('content')
<h4 class="mb-4">✏️ Sửa Thú cưng</h4>

<form action="{{ route('pets.update', $pet->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $pet->name }}" class="form-control mb-2" required>

    <input type="text" name="species" value="{{ $pet->species }}" class="form-control mb-2" required>

    <input type="text" name="breed" value="{{ $pet->breed }}" class="form-control mb-2">

    <input type="number" name="age" value="{{ $pet->age }}" class="form-control mb-2">

    <input type="number" step="0.1" name="weight" value="{{ $pet->weight }}" class="form-control mb-2">

    <select name="customer_id" class="form-control mb-3">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ $pet->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection