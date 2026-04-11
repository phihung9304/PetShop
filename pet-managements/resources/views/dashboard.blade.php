@extends('layouts.app')

@section('content')

<style>


/* TITLE */
.dashboard-title{
    color:#7c5a3a;
    font-weight:700;
    letter-spacing:1px;
}

/* CARD */
.dashboard-card{
    background: #ffffff;
    border: 1px solid #ead7c3;
    border-radius: 18px;

    /* chữ nâu nhạt */
    color:#6b4f3a;

    box-shadow: 0 8px 20px rgba(124,90,58,0.08);

    opacity:0;
    transform:translateY(20px);
    animation:fadeUp 0.6s ease forwards;
    transition:0.25s;
}

/* hover */
.dashboard-card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 28px rgba(124,90,58,0.15);
    border-color:#d6bfa6;
}

/* animation delay */
.card-1{animation-delay:0.1s;}
.card-2{animation-delay:0.2s;}
.card-3{animation-delay:0.3s;}
.card-4{animation-delay:0.4s;}

@keyframes fadeUp{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ICON */
.icon{
    font-size:45px;
    opacity:0.9;
    color:#a67c52; /* nâu nhạt */
}

/* NUMBER (quan trọng nhất bạn yêu cầu) */
.number{
    font-size:32px;
    font-weight:bold;

    /* nâu gradient nhạt dần */
    background: linear-gradient(180deg, #7c5a3a, #c2a089);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>

<div class="container py-3">

    <h3 class="dashboard-title mb-4">📊 DASHBOARD ADMIN</h3>

    <div class="row g-4">

        <!-- CUSTOMER -->
        <div class="col-md-3">
            <div class="card dashboard-card card-1 h-100 text-center p-3">
                <div class="icon">👤</div>
                <h6>Khách hàng</h6>
                <div class="number" id="customerCount">0</div>
            </div>
        </div>

        <!-- PET -->
        <div class="col-md-3">
            <div class="card dashboard-card card-2 h-100 text-center p-3">
                <div class="icon">🐶</div>
                <h6>Thú cưng</h6>
                <div class="number" id="petCount">0</div>
            </div>
        </div>

        <!-- PRODUCT -->
        <div class="col-md-3">
            <div class="card dashboard-card card-3 h-100 text-center p-3">
                <div class="icon">📦</div>
                <h6>Sản phẩm</h6>
                <div class="number">0</div>
            </div>
        </div>

        <!-- SERVICE -->
        <div class="col-md-3">
            <div class="card dashboard-card card-4 h-100 text-center p-3">
                <div class="icon">🛎️</div>
                <h6>Dịch vụ</h6>
                <div class="number">0</div>
            </div>
        </div>

    </div>
</div>

<script>
function countUp(id, end) {
    let el = document.getElementById(id);
    let start = 0;
    let duration = 1000;
    let step = end / (duration / 16);

    function run() {
        start += step;
        if (start >= end) {
            el.innerText = end;
        } else {
            el.innerText = Math.floor(start);
            requestAnimationFrame(run);
        }
    }

    run();
}

countUp("customerCount", {{ $customerCount }});
countUp("petCount", {{ $petCount }});
</script>

@endsection