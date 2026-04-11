<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pet Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #fffaf5; /* cam rất nhạt */
}

/* SIDEBAR */
.sidebar {
    height: 100vh;
    background: linear-gradient(
        180deg,
        #fdba74,   /* cam nhạt */
        #fb923c,   /* cam vừa */
        #fed7aa    /* cam rất nhạt */
    );
    color: white;
    padding: 20px;
    box-shadow: 5px 0 20px rgba(251,146,60,0.2);
}

.sidebar h4 {
    font-weight: bold;
    margin-bottom: 30px;
    color: #ffffff
}

/* MENU */
.sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff7ed;
    padding: 10px 12px;
    border-radius: 10px;
    margin-bottom: 8px;
    text-decoration: none;
    transition: 0.3s;
    font-weight: 500;
}

/* hover */
.sidebar a:hover {
    background: rgba(255,255,255,0.25);
    transform: translateX(5px);
}

/* active */
.sidebar {
    height: 100vh;
    background: linear-gradient(
        to bottom,
        #f97316 0%,   /* cam đậm ở trên */
        #fb923c 40%,  /* cam vừa */
        #fed7aa 100%  /* cam nhạt ở dưới */
    );
    color: white;
    padding: 20px;
    box-shadow: 5px 0 20px rgba(249,115,22,0.25);
}

/* CONTENT */
.content-area {
    background: #fffaf5;
}

/* NAVBAR */
.navbar {
    background: #ffffff !important;
    border-radius: 14px;
    box-shadow: 0 5px 15px rgba(251,146,60,0.12);
    color: #fb923c;
}

/* CARD */
.card {
    border: 1px solid #fed7aa;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(251,146,60,0.08);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(251,146,60,0.15);
}
</style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4>🐾 Pet Admin</h4>

                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}"><i
                        class="bi bi-speedometer2"></i> Dashboard</a>

                <a href="{{ url('/pets') }}" class="{{ request()->is('pets*') ? 'active' : '' }}"><i
                        class="bi bi-heart"></i> Thú cưng</a>

                <a href="{{ url('/services') }}" class="{{ request()->is('services*') ? 'active' : '' }}"><i
                        class="bi bi-scissors"></i> Dịch vụ</a>

                <a href="{{ url('/care-guides') }}" class="{{ request()->is('care-guides*') ? 'active' : '' }}"><i
                        class="bi bi-book"></i> Cách nuôi</a>

                <a href="{{ url('/products') }}" class="{{ request()->is('products*') ? 'active' : '' }}"><i
                        class="bi bi-bag"></i> Sản phẩm</a>

                <a href="{{ url('/employees') }}" class="{{ request()->is('employees*') ? 'active' : '' }}"><i
                        class="bi bi-person-badge"></i> Nhân viên</a>

                <a href="{{ url('/inventory') }}" class="{{ request()->is('inventory*') ? 'active' : '' }}"><i
                        class="bi bi-box-seam"></i> Kho</a>

                <a href="{{ url('/revenue') }}" class="{{ request()->is('revenue*') ? 'active' : '' }}"><i
                        class="bi bi-currency-dollar"></i> Doanh thu</a>

                <a href="{{ url('/customers') }}" class="{{ request()->is('customers*') ? 'active' : '' }}"><i
                        class="bi bi-people"></i> Khách hàng</a>

                <a href="{{ url('/payments') }}" class="{{ request()->is('payments*') ? 'active' : '' }}"><i
                        class="bi bi-wallet2"></i> Thanh toán</a>
            </div>

            <!-- Content -->
            <div class="col-md-10 p-4">



                @yield('content')

            </div>

        </div>
    </div>

</body>

</html>
