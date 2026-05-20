<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        // Default range: 7 ngày gần nhất
        $from = $request->from ?? now()->subDays(6)->toDateString();
        $to = $request->to ?? now()->toDateString();

        $query = Invoice::where('status', 'completed')
            ->whereBetween('created_at', [
                $from . ' 00:00:00',
                $to . ' 23:59:59'
            ]);

        // KPI
        $totalRevenue = (clone $query)->sum('total_amount');
        $totalOrders = (clone $query)->count();
        $avgOrder = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        // CHART DATA
        $chartData = (clone $query)
            ->selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $chartData->pluck('date');
        $totals = $chartData->pluck('total');

        // TOP PRODUCT
        $topProducts = Invoice::selectRaw('product_name, SUM(quantity) as qty, SUM(total_amount) as revenue')
            ->where('status', 'completed')
            ->whereBetween('created_at', [
                $from . ' 00:00:00',
                $to . ' 23:59:59'
            ])
            ->groupBy('product_name')
            ->orderByDesc('revenue')
            ->limit(5)
            ->get();

        return view('revenue.index', compact(
            'totalRevenue',
            'totalOrders',
            'avgOrder',
            'dates',
            'totals',
            'topProducts',
            'from',
            'to'
        ));
    }
}