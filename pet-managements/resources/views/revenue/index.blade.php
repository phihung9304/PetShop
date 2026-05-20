@extends('layouts.app')

@section('content')

<style>
/* =======================
   CONTAINER SAFE (KHÔNG ĐỤNG BOOTSTRAP)
======================= */
.revenue-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #faf6f2, #f3e8dc);
}

/* TITLE */
.revenue-container h4 {
    color: #5a3e2b;
    font-weight: 700;
    margin-bottom: 15px;
}

/* =======================
   FILTER
======================= */
.filter-box {
    background: #fff;
    padding: 15px 20px;
    border-radius: 14px;
    border: 1px solid #eadfd6;
    box-shadow: 0 10px 25px rgba(90, 62, 43, 0.08);
    margin-bottom: 20px;
}

.filter-box input[type="date"] {
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ddd;
    margin-right: 10px;
}

.filter-box button {
    background: #7c5a3a;
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
}

.filter-box button:hover {
    background: #5a3e2b;
}

/* =======================
   KPI GRID (RESPONSIVE FIX)
======================= */
.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 20px;
}

@media (max-width: 992px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .grid {
        grid-template-columns: 1fr;
    }
}

.card {
    background: #fff;
    padding: 22px;
    border-radius: 16px;
    border: 1px solid #eadfd6;
    box-shadow: 0 12px 30px rgba(90, 62, 43, 0.08);
    position: relative;
}

.card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 5px;
    height: 100%;
    background: #7c5a3a;
}

.card-title {
    font-size: 13px;
    color: #8a6b55;
    text-transform: uppercase;
}

.value {
    font-size: 24px;
    font-weight: bold;
    color: #2e7d32;
    margin-top: 8px;
}

/* =======================
   CHART FIX HEIGHT
======================= */
.chart-box {
    background: #fff;
    padding: 20px;
    border-radius: 16px;
    border: 1px solid #eadfd6;
    box-shadow: 0 12px 30px rgba(90, 62, 43, 0.08);
    margin-bottom: 20px;
}

/* =======================
   TABLE
======================= */
.top-table {
    background: #fff;
    padding: 20px;
    border-radius: 16px;
    border: 1px solid #eadfd6;
    box-shadow: 0 12px 30px rgba(90, 62, 43, 0.08);
}

.top-table table {
    width: 100%;
    border-collapse: collapse;
}

.top-table th {
    background: #7c5a3a;
    color: #fff;
    padding: 10px;
}

.top-table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.top-table tr:hover {
    background: #faf3ed;
}

</style>

<div class="revenue-container">

    <h4>📊 Revenue Dashboard Pro</h4>

    <!-- FILTER -->
    <div class="filter-box">
        <form method="GET">
            <label>📅 Từ:</label>
            <input type="date" name="from" value="{{ $from }}">

            <label>➡️ Đến:</label>
            <input type="date" name="to" value="{{ $to }}">

            <button type="submit">Lọc</button>
        </form>
    </div>

    <!-- KPI -->
    <div class="grid">

        <div class="card">
            <div class="card-title">Doanh thu</div>
            <div class="value">{{ number_format($totalRevenue ?? 0) }} ₫</div>
        </div>

        <div class="card">
            <div class="card-title">Đơn hàng</div>
            <div class="value">{{ $totalOrders ?? 0 }}</div>
        </div>

        <div class="card">
            <div class="card-title">Trung bình / đơn</div>
            <div class="value">{{ number_format($avgOrder ?? 0) }} ₫</div>
        </div>

    </div>

    <!-- CHART (FIX LỆCH) -->
    <div class="chart-box">
        <div style="position: relative; height: 300px;">
            <canvas id="chart"></canvas>
        </div>
    </div>

    <!-- TOP PRODUCT -->
    <div class="top-table">

        <h4>🏆 Top sản phẩm</h4>

        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Doanh thu</th>
                </tr>
            </thead>

            <tbody>
                @foreach($topProducts ?? [] as $p)
                <tr>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ number_format($p->revenue) }} ₫</td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chart'), {
    type: 'line',
    data: {
        labels: {!! json_encode($dates ?? []) !!},
        datasets: [{
            label: 'Doanh thu',
            data: {!! json_encode($totals ?? []) !!},
            borderColor: '#7c5a3a',
            backgroundColor: 'rgba(124,90,58,0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

@endsection