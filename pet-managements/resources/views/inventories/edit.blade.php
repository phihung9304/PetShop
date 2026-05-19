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

/* FORM BOX (GIỐNG CUSTOMERS) */
.form-box{
    background:#fff;
    padding:20px;
    border-radius:12px;
    border:1px solid #e0d6cc;
    box-shadow:0 8px 20px rgba(124,90,58,0.08);
    max-width:100%;
}

/* INPUT + SELECT */
.form-control{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:12px;
    border:1px solid #e0d6cc;
    border-radius:8px;
    outline:none;
}

.form-control:focus{
    border-color:#a67c52;
    box-shadow:0 0 0 2px rgba(166,124,82,0.2);
}

/* BUTTON */
.btn{
    border-radius:8px !important;
    transition: all 0.2s ease;
}

/* LƯU */
.btn-success{
    background:#a67c52 !important;
    border:none !important;
    color:#fff !important;
    padding:10px 15px;
    margin-top:10px;
}

.btn-success:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}

/* QUAY LẠI */
.btn-secondary{
    background:#d2b48c !important;
    border:none !important;
    color:#fff !important;
    padding:10px 15px;
    margin-top:10px;
    margin-left:10px;
}

.btn-secondary:hover{
    background:#7c5a3a !important;
    transform: scale(1.05);
}
</style>

<h4 class="mb-4">✏️ Sửa kho</h4>

<div class="form-box">

<form method="POST" action="{{ route('inventories.update', $inventory->id) }}">
    @csrf
    @method('PUT')

    {{-- SẢN PHẨM --}}
    <div class="mb-3">
        <label class="fw-bold">Sản phẩm</label>
        <select name="product_id" class="form-control" required>
            @foreach($products as $p)
                <option value="{{ $p->id }}"
                    {{ $inventory->product_id == $p->id ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- KHO --}}
    <div class="mb-3">
        <label class="fw-bold">Tên kho</label>
        <select name="warehouse_name" class="form-control" required>
            <option value="">-- Chọn kho --</option>

            <option value="Kho chính"
                {{ $inventory->warehouse_name == 'Kho chính' ? 'selected' : '' }}>
                Kho chính
            </option>

            <option value="Kho phụ 1"
                {{ $inventory->warehouse_name == 'Kho phụ 1' ? 'selected' : '' }}>
                Kho phụ 1
            </option>

            <option value="Kho phụ 2"
                {{ $inventory->warehouse_name == 'Kho phụ 2' ? 'selected' : '' }}>
                Kho phụ 2
            </option>
        </select>
    </div>

    {{-- SỐ LƯỢNG --}}
    <div class="mb-3">
        <label class="fw-bold">Số lượng</label>
        <input type="number"
               name="quantity"
               class="form-control"
               value="{{ $inventory->quantity }}"
               placeholder="Nhập số lượng"
               min="0"
               required>
    </div>

    <button type="submit" class="btn btn-success">
        Cập nhật
    </button>

    <a href="{{ route('inventories.index', ['product_id' => $inventory->product_id]) }}"
       class="btn btn-secondary">
        Quay lại
    </a>

</form>

</div>

@endsection