<?php

namespace App\Services;

use App\Models\Invoice;

class RevenueService
{
    // Tổng doanh thu
    public function total()
    {
        return Invoice::where('status', 'completed')
            ->sum('total_amount');
    }

    // Hôm nay
    public function today()
    {
        return Invoice::where('status', 'completed')
            ->whereDate('created_at', today())
            ->sum('total_amount');
    }

    // Tháng này
    public function month()
    {
        return Invoice::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');
    }

    // Theo khoảng ngày
    public function range($from, $to)
    {
        return Invoice::where('status', 'completed')
            ->whereBetween('created_at', [$from, $to])
            ->sum('total_amount');
    }

    // Theo phương thức thanh toán
    public function byPaymentMethod()
    {
        return Invoice::selectRaw('payment_method, SUM(total_amount) as total')
            ->where('status', 'completed')
            ->groupBy('payment_method')
            ->get();
    }

    // Top sản phẩm
    public function topProducts()
    {
        return Invoice::selectRaw('product_name, SUM(quantity) as qty, SUM(total_amount) as revenue')
            ->where('status', 'completed')
            ->groupBy('product_name')
            ->orderByDesc('revenue')
            ->limit(5)
            ->get();
    }
}