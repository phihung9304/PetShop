@extends('layouts.app')

@section('content')

<h4 class="mb-4">📊 Tổng quan</h4>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card p-3 bg-primary text-white">
            <h6>Khách hàng</h6>
            <h2>0</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 bg-success text-white">
            <h6>Thú cưng</h6>
            <h2>0</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 bg-warning text-dark">
            <h6>Sản phẩm</h6>
            <h2>0</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 bg-danger text-white">
            <h6>Dịch vụ</h6>
            <h2>0</h2>
        </div>
    </div>

</div>

@endsection