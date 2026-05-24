<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pet Management</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(135deg, #fff7ed, #ffedd5);
            overflow-x: hidden;
        }

        /* BACKGROUND */

        .bg-blur {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
            opacity: 0.4;
        }

        .bg1 {
            width: 300px;
            height: 300px;
            background: #fb923c;
            top: -100px;
            left: -100px;
        }

        .bg2 {
            width: 250px;
            height: 250px;
            background: #fdba74;
            bottom: -80px;
            right: -80px;
        }

        /* SIDEBAR */

        .sidebar {
            width: 280px;
            min-height: 80vh;

            position: fixed;
            left: 0;
            top: 0;

            padding: 24px;

            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(14px);

            border-right: 1px solid rgba(255, 255, 255, 0.3);

            box-shadow:
                0 10px 30px rgba(249, 115, 22, 0.12);

            z-index: 1000;
        }

        /* LOGO */

        .logo-box {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 35px;
        }

        .logo-icon {
            width: 52px;
            height: 52px;

            border-radius: 16px;

            background: linear-gradient(135deg, #fb923c, #f97316);

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;
            font-size: 24px;

            box-shadow:
                0 10px 20px rgba(249, 115, 22, 0.25);
        }

        .logo-text h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #ea580c;
        }

        .logo-text p {
            margin: 0;
            font-size: 13px;
            color: #9a3412;
        }

        /* MENU */

        .menu-title {
            font-size: 12px;
            text-transform: uppercase;
            color: #9a3412;
            margin-bottom: 12px;
            padding-left: 10px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px 14px;
            margin-bottom: 10px;

            border-radius: 16px;

            color: #7c2d12;
            text-decoration: none;

            transition: all 0.25s ease;

            font-weight: 500;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover {
            background: rgba(249, 115, 22, 0.12);
            transform: translateX(5px);
            color: #ea580c;
        }

        .sidebar a.active {
            background:
                linear-gradient(135deg, #fb923c, #f97316);

            color: white;

            box-shadow:
                0 10px 20px rgba(249, 115, 22, 0.25);
        }

        /* USER CARD */

        .user-card {
            margin-top: 25px;

            padding: 16px;
            border-radius: 18px;

            background: rgba(255, 255, 255, 0.55);

            border: 1px solid rgba(255,255,255,0.4);
        }

        .avatar {
            width: 50px;
            height: 50px;

            border-radius: 50%;

            background:
                linear-gradient(135deg, #fb923c, #f97316);

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        /* LOGOUT */

        .logout-btn {
            width: 100%;

            border: none;
            padding: 13px;

            border-radius: 14px;

            background: #ef4444;
            color: white;

            font-weight: 600;

            transition: 0.25s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            background: #dc2626;
        }

        /* CONTENT */

        .main-content {
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
        }

        /* TOPBAR */

        .topbar {
            background: rgba(255, 255, 255, 0.7);

            backdrop-filter: blur(12px);

            border-radius: 24px;

            padding: 18px 24px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow:
                0 8px 24px rgba(249, 115, 22, 0.08);

            margin-bottom: 25px;
        }

        .topbar h3 {
            margin: 0;
            font-weight: 700;
            color: #7c2d12;
        }

        /* CONTENT CARD */

        .content-card {
            background: rgba(255, 255, 255, 0.75);

            backdrop-filter: blur(12px);

            border-radius: 28px;

            padding: 30px;

            min-height: 500px;

            box-shadow:
                0 10px 30px rgba(249, 115, 22, 0.08);
        }

        /* MOBILE */

        @media(max-width: 992px) {

            .sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- BACKGROUND -->
    <div class="bg-blur bg1"></div>
    <div class="bg-blur bg2"></div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- LOGO -->
        <div class="logo-box">

            <div class="logo-icon">
                🐾
            </div>

            <div class="logo-text">
                <h4>Pet Admin</h4>
                <p>Management System</p>
            </div>

        </div>

        <!-- MENU -->
        <div class="menu-title">
            MAIN MENU
        </div>

        <a href="{{ url('/') }}"
            class="{{ request()->is('/') ? 'active' : '' }}">

            <i class="bi bi-grid-fill"></i>
            Dashboard
        </a>

        <a href="{{ url('/pets') }}"
            class="{{ request()->is('pets*') ? 'active' : '' }}">

            <i class="bi bi-heart-fill"></i>
            Thú cưng
        </a>

        <a href="{{ url('/services') }}"
            class="{{ request()->is('services*') ? 'active' : '' }}">

            <i class="bi bi-scissors"></i>
            Dịch vụ
        </a>

        <a href="{{ url('/care-guides') }}"
            class="{{ request()->is('care-guides*') ? 'active' : '' }}">

            <i class="bi bi-book-fill"></i>
            Cách nuôi
        </a>

        <a href="{{ url('/products') }}"
            class="{{ request()->is('products*') ? 'active' : '' }}">

            <i class="bi bi-bag-fill"></i>
            Sản phẩm
        </a>

        <a href="{{ url('/employees') }}"
            class="{{ request()->is('employees*') ? 'active' : '' }}">

            <i class="bi bi-person-badge-fill"></i>
            Nhân viên
        </a>

        <a href="{{ url('/inventories') }}"
            class="{{ request()->is('inventories*') ? 'active' : '' }}">

            <i class="bi bi-box-seam-fill"></i>
            Kho
        </a>

        <a href="{{ url('/revenue') }}"
            class="{{ request()->is('revenue*') ? 'active' : '' }}">

            <i class="bi bi-currency-dollar"></i>
            Doanh thu
        </a>

        <a href="{{ url('/customers') }}"
            class="{{ request()->is('customers*') ? 'active' : '' }}">

            <i class="bi bi-people-fill"></i>
            Khách hàng
        </a>

        <a href="{{ url('/invoices') }}"
            class="{{ request()->is('invoices*') ? 'active' : '' }}">

            <i class="bi bi-wallet2"></i>
            Hóa đơn
        </a>
            <!-- LOGOUT -->
            <form method="POST" action="{{ url('/logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    Đăng xuất
                </button>
            </form>
    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
        
        <!-- CONTENT -->
        <div class="content-card">
            @yield('content')
        </div>

    </div>

</body>

</html>