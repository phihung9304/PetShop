@extends('layouts.app')

@section('content')
<h4>✏️ Sửa khách hàng</h4>

<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $customer->name }}" class="form-control mb-2">
    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control mb-2">
    <input type="email" name="email" value="{{ $customer->email }}" class="form-control mb-2">
    <input type="text" name="address" value="{{ $customer->address }}" class="form-control mb-2">

    <button class="btn btn-primary">Cập nhật</button>
</form>
@endsection