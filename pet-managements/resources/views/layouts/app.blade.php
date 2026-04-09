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
            background: #f1f5f9;
        }

        .sidebar {
            height: 100vh;
            background: #1e293b;
            color: white;
            padding: 20px;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #cbd5e1;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #334155;
            color: white;
        }

        .sidebar a.active {
            background: #3b82f6;
            color: white;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .navbar {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4>🐾 Pet Admin</h4>

            <a href="/" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="/customers"><i class="bi bi-people"></i> Khách hàng</a>
            <a href="/pets"><i class="bi bi-heart"></i> Thú cưng</a>
            <a href="/products"><i class="bi bi-bag"></i> Sản phẩm</a>
            <a href="/services"><i class="bi bi-scissors"></i> Dịch vụ</a>
            <a href="/care-guides"><i class="bi bi-book"></i> Cách nuôi</a>
            <a href="/payments"><i class="bi bi-cash"></i> Thanh toán</a>
        </div>

        <!-- Content -->
        <div class="col-md-10 p-4">

            <!-- Navbar -->
            <nav class="navbar bg-white shadow-sm mb-4 px-3">
                <span class="fw-bold">Dashboard</span>
            </nav>

            @yield('content')

        </div>

    </div>
</div>

</body>
</html>