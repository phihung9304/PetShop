@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #7c5a3a;
        --primary-light: #c2a089;
        --border: #ead7c3;
        --bg: #faf6f2;
        --white: #fff;
    }

    /* QUAN TRỌNG: tránh body đè layout sidebar */
    .content-area {
        background: var(--bg);
        min-height: 100vh;
    }

    /* TITLE */
    .dashboard-title {
        color: var(--primary);
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* CARD */
    .dashboard-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 18px;
        color: #6b4f3a;
        box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);

        opacity: 0;
        transform: translateY(15px);
        animation: fadeUp 0.5s ease forwards;
        transition: all 0.25s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(124, 90, 58, 0.15);
    }

    .card-1 { animation-delay: 0.1s; }
    .card-2 { animation-delay: 0.2s; }
    .card-3 { animation-delay: 0.3s; }
    .card-4 { animation-delay: 0.4s; }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ICON */
    .icon {
        font-size: 40px;
        color: #a67c52;
        margin-bottom: 5px;
    }

    /* NUMBER */
    .number {
        font-size: 32px;
        font-weight: bold;
        background: linear-gradient(180deg, var(--primary), var(--primary-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<div class="container py-3">

    <h3 class="dashboard-title mb-4">📊 DASHBOARD ADMIN</h3>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card dashboard-card card-1  text-center p-3">
                <div class="icon">👤</div>
                <h6>Khách hàng</h6>
                <div class="number" id="customerCount">0</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card card-2  text-center p-3">
                <div class="icon">🐶</div>
                <h6>Thú cưng</h6>
                <div class="number" id="petCount">0</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card card-3  text-center p-3">
                <div class="icon">📦</div>
                <h6>Sản phẩm</h6>
                <div class="number" id="productCount">0</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card card-4 text-center p-3">
                <div class="icon">🛎️</div>
                <h6>Dịch vụ</h6>
                <div class="number" id="serviceCount">0</div>
            </div>
        </div>

    </div>
</div>

<script>
function countUp(id, end) {
    let el = document.getElementById(id);
    let current = 0;

    // tránh lỗi NaN
    end = Number(end ?? 0);

    let step = end / 60;

    function animate() {
        current += step;

        if (current >= end) {
            el.innerText = end;
        } else {
            el.innerText = Math.floor(current);
            requestAnimationFrame(animate);
        }
    }

    animate();
}

countUp("customerCount", {{ $customerCount ?? 0 }});
countUp("petCount", {{ $petCount ?? 0 }});
countUp("productCount", {{ $productCount ?? 0 }});
countUp("serviceCount", {{ $serviceCount ?? 0 }});
</script>

@endsection