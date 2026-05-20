@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #faf6f2;
            font-family: Arial, sans-serif;
        }

        .card-custom {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);
            border: 1px solid #e0d6cc;
        }

        h4 {
            color: #7c5a3a;
            font-weight: 700;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #d9c7b8;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #a67c52;
            box-shadow: none;
        }

        .btn {
            border-radius: 8px !important;
            transition: all 0.2s ease;
        }

        .btn-save {
            background: #a67c52 !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-save:hover {
            background: #7c5a3a !important;
            transform: scale(1.05);
        }

        .btn-secondary {
            background: #d2b48c !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-secondary:hover {
            background: #7c5a3a !important;
            transform: scale(1.05);
        }
    </style>

    <div class="container">

        <h4 class="mb-4">➕ Thêm hóa đơn</h4>

        <div class="card-custom">

            <form action="{{ route('invoices.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Sản phẩm
                    </label>

                    <select name="product_id" class="form-select">

                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                                -
                                {{ number_format($product->price) }} VNĐ
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Số lượng
                    </label>

                    <input type="number" name="quantity" class="form-control" min="1" value="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Phương thức thanh toán
                    </label>

                    <select name="payment_method" class="form-select">

                        <option value="cash">
                            Tiền mặt
                        </option>

                        <option value="momo">
                            Momo
                        </option>

                        <option value="banking">
                            Chuyển khoản
                        </option>

                    </select>


                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Trạng thái
                    </label>

                    <select name="status" class="form-select">

                        <option value="completed">
                            Hoàn thành
                        </option>

                        <option value="cancelled">
                            Đã hủy
                        </option>

                    </select>
                </div>
                <button type="submit" class="btn btn-save">
                    Lưu hóa đơn
                </button>
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Quay lại</a>

            </form>

        </div>

    </div>
@endsection
