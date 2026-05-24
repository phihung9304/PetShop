<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pet Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #fffaf5;
            font-family: Arial, sans-serif;
        }

        .container-fluid,
        .row {
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(to bottom,
                #f97316 0%,
                #fb923c 40%,
                #fed7aa 100%
            );
            color: white;
            padding: 20px;
            box-shadow: 5px 0 20px rgba(249, 115, 22, 0.25);
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff7ed;
            padding: 10px 12px;
            border-radius: 12px;
            margin-bottom: 8px;
            text-decoration: none;
            transition: 0.25s;
            font-weight: 500;
            position: relative;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, 0.35);
            font-weight: 600;
        }

        .sidebar a.active::before {
            content: "";
            position: absolute;
            left: -10px;
            width: 4px;
            height: 60%;
            background: white;
            border-radius: 10px;
        }

        /* CONTENT */
        .content-area {
            min-height: 100vh;
            padding: 20px;
            overflow-y: auto;
        }

        /* CARD */
        .card {
            border: 1px solid #fed7aa;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(251, 146, 60, 0.08);
        }

        /* USER CARD */
        .user-card {
            background: rgba(255, 255, 255, 0.12);
            padding: 12px;
            border-radius: 14px;
            backdrop-filter: blur(6px);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: white;
            color: #f97316;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* LOGOUT */
        .logout-btn {
            border: none;
            padding: 12px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.25s;
            width: 100%;
        }

        .logout-btn:hover {
            background: #ef4444;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar">

            <h4>🐾 Pet Admin</h4>

            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ url('/pets') }}" class="{{ request()->is('pets*') ? 'active' : '' }}">
                <i class="bi bi-heart"></i> Thú cưng
            </a>

            <a href="{{ url('/services') }}" class="{{ request()->is('services*') ? 'active' : '' }}">
                <i class="bi bi-scissors"></i> Dịch vụ
            </a>

            <a href="{{ url('/care-guides') }}" class="{{ request()->is('care-guides*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Cách nuôi
            </a>

            <a href="{{ url('/products') }}" class="{{ request()->is('products*') ? 'active' : '' }}">
                <i class="bi bi-bag"></i> Sản phẩm
            </a>

            <a href="{{ url('/employees') }}" class="{{ request()->is('employees*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Nhân viên
            </a>

            <a href="{{ url('/inventories') }}" class="{{ request()->is('inventories*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Kho
            </a>

            <a href="{{ url('/revenue') }}" class="{{ request()->is('revenue*') ? 'active' : '' }}">
                <i class="bi bi-currency-dollar"></i> Doanh thu
            </a>

            <a href="{{ url('/customers') }}" class="{{ request()->is('customers*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Khách hàng
            </a>

            <a href="{{ url('/invoices') }}" class="{{ request()->is('invoices*') ? 'active' : '' }}">
                <i class="bi bi-wallet2"></i> Hóa đơn
            </a>

            <hr class="text-white opacity-25 my-4">

            <!-- LOGOUT -->
            <form method="POST" action="{{ url('/logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    Đăng xuất
                </button>
            </form>

        </div>

        <!-- CONTENT -->
        <div class="col-md-10 content-area">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>