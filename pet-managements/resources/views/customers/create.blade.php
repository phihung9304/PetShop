@extends('layouts.app')

@section('content')
<h4>➕ Thêm khách hàng</h4>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Tên" class="form-control mb-2" required>
    <input type="text" name="phone" placeholder="SĐT" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="text" name="address" placeholder="Địa chỉ" class="form-control mb-2">

    <button class="btn btn-success">Lưu</button>
</form>
@endsection