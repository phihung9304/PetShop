<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Pet Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.15);
        }

        .login-title {
            text-align: center;
            font-weight: bold;
            color: #f97316;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #fed7aa;
        }

        .form-control:focus {
            border-color: #fb923c;
            box-shadow: 0 0 0 0.2rem rgba(251, 146, 60, 0.2);
        }

        .btn-login {
            background: #f97316;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #ea580c;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #f97316;
            text-decoration: none;
            font-weight: 600;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #fff7ed;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #f97316;
            font-size: 35px;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="icon-box">
            <i class="bi bi-heart-fill"></i>
        </div>

        <h2 class="login-title">
            Pet Management Login
        </h2>

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Email
                </label>

                <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn"
                    value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Mật khẩu
                </label>

                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>

            <button type="submit" class="btn btn-login w-100">
                <i class="bi bi-box-arrow-in-right"></i>
                Đăng nhập
            </button>

        </form>

        <div class="register-link">
            Chưa có tài khoản?
            <a href="/register">
                Đăng ký
            </a>
        </div>

    </div>

</body>

</html>
