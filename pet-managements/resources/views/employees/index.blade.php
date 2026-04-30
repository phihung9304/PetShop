@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #faf6f2;
            font-family: Arial, sans-serif;
        }

        h4 {
            color: #7c5a3a;
            font-weight: 700;
        }

        .table-wrapper {
            border: 1px solid #e0d6cc;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 20px rgba(124, 90, 58, 0.08);
        }

        .table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table thead th {
            background: #7c5a3a;
            color: #fff;
            padding: 12px;
            font-weight: 600;
            border: 1px solid #e0d6cc;
            text-align: center !important;
        }

        .table th,
        .table td {
            padding: 12px !important;
            vertical-align: middle;
            border: 1px solid #e0d6cc;
            word-break: break-word;
            text-align: center !important;
        }

        .table tbody tr:nth-child(odd) {
            background: #fff;
        }

        .table tbody tr:nth-child(even) {
            background: #fcf7f2;
        }

        .table tbody tr:hover {
            background: #f3e8dc;
        }

        .btn-primary {
            background: #a67c52 !important;
            border: none !important;
        }

        .btn-primary:hover {
            background: #7c5a3a !important;
        }

        .btn-warning {
            background: #d2b48c !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-danger {
            background: #8b5e3c !important;
            border: none !important;
            color: #fff !important;
        }

        .alert-success {
            background: #f3e8dc;
            border: none;
            color: #7c5a3a;
        }

        .btn {
            border-radius: 8px !important;
        }
    </style>

    <h4 class="mb-4">👤 Quản lý Nhân viên</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            ➕ Thêm nhân viên
        </a>
    </div>

    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-striped align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Chức vụ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                    Sửa
                                </a>

                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
