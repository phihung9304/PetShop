<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Pet Management</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, #fff7ed, #fed7aa);
            position: relative;
        }

        /* Background blur */

        .circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
        }

        .circle1 {
            width: 300px;
            height: 300px;
            background: #fb923c;
            top: -100px;
            left: -100px;
        }

        .circle2 {
            width: 250px;
            height: 250px;
            background: #fdba74;
            bottom: -80px;
            right: -80px;
        }

        /* Card */

        .register-card {
            position: relative;
            z-index: 10;

            width: 100%;
            max-width: 450px;

            padding: 45px;

            border-radius: 28px;

            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);

            border: 1px solid rgba(255, 255, 255, 0.4);

            box-shadow:
                0 10px 40px rgba(249, 115, 22, 0.18);
        }

        /* Icon */

        .icon-box {
            width: 90px;
            height: 90px;

            margin: auto;
            margin-bottom: 20px;

            border-radius: 50%;

            background: linear-gradient(135deg, #fb923c, #f97316);

            display: flex;
            justify-content: center;
            align-items: center;

            color: white;
            font-size: 38px;

            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.35);
        }

        /* Title */

        .register-title {
            text-align: center;
            font-weight: 700;
            color: #ea580c;
            margin-bottom: 8px;
        }

        .register-subtitle {
            text-align: center;
            color: #7c2d12;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Input */

        .input-group {
            margin-bottom: 20px;
        }

        .input-group-text {
            border-radius: 14px 0 0 14px;
            border: 1px solid #fed7aa;
            background: #fff7ed;
            color: #f97316;
        }

        .form-control {
            border-radius: 0 14px 14px 0;
            border: 1px solid #fed7aa;
            padding: 14px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #fb923c;
            box-shadow: 0 0 0 0.25rem rgba(251, 146, 60, 0.2);
        }

        /* Button */

        .btn-register {
            width: 100%;
            padding: 14px;

            border: none;
            border-radius: 14px;

            background: linear-gradient(135deg, #fb923c, #f97316);

            color: white;
            font-weight: 600;
            font-size: 15px;

            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);

            box-shadow:
                0 10px 20px rgba(249, 115, 22, 0.3);
        }

        /* Login link */

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #7c2d12;
        }

        .login-link a {
            text-decoration: none;
            color: #f97316;
            font-weight: 600;
        }

        .login-link a:hover {
            color: #ea580c;
        }

        /* Alert */

        .alert {
            border-radius: 14px;
            font-size: 14px;
        }

        @media(max-width: 500px) {
            .register-card {
                margin: 20px;
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

    <!-- Background -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>

    <!-- Card -->
    <div class="register-card">

        <!-- Icon -->
        <div class="icon-box">
            <i class="bi bi-person-plus-fill"></i>
        </div>

        <!-- Title -->
        <h2 class="register-title">
            Create Account
        </h2>

        <p class="register-subtitle">
            Tạo tài khoản để quản lý thú cưng của bạn
        </p>

        <!-- ERROR -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="/register">

            @csrf

            <!-- NAME -->
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Nhập họ tên của bạn">
            </div>

            <!-- EMAIL -->
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                </span>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Nhập email của bạn">
            </div>

            <!-- PASSWORD -->
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Nhập mật khẩu">
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-shield-lock-fill"></i>
                </span>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Xác nhận mật khẩu">
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-register">
                <i class="bi bi-person-check-fill"></i>
                Tạo tài khoản
            </button>

        </form>

        <!-- LOGIN -->
        <div class="login-link">
            Đã có tài khoản?
            <a href="/login">
                Đăng nhập ngay
            </a>
        </div>

    </div>

</body>

</html>