<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::query();

        // 🔎 SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('product_name', 'like', '%' . $request->search . '%')
                    ->orWhere('id', $request->search);
            });
        }

        // 💳 PAYMENT FILTER
        if ($request->payment_method) {
            $query->where('payment_method', $request->payment_method);
        }

        // 📌 STATUS FILTER
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // 📅 DATE FILTER
        if ($request->from && $request->to) {
            $query->whereBetween('created_at', [
                $request->from . ' 00:00:00',
                $request->to . ' 23:59:59'
            ]);
        }

        // 📄 MAIN LIST
        $invoices = $query->latest()->paginate(5)->withQueryString();

        // 📊 KPI (NÊN TÍNH TRÊN TOÀN BỘ, KHÔNG PHỤ THUỘC FILTER)
        $totalInvoices = Invoice::count();

        $completedInvoices = Invoice::where('status', 'completed')->count();

        $cancelledInvoices = Invoice::where('status', 'cancelled')->count();

        $totalRevenue = Invoice::where('status', 'completed')->sum('total_amount');

        return view('invoices.index', compact(
            'invoices',
            'totalInvoices',
            'completedInvoices',
            'cancelledInvoices',
            'totalRevenue'
        ));
    }

    public function create()
    {
        $products = Product::all();
        return view('invoices.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required',
            'status' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        $total = $product->price * $request->quantity;

        Invoice::create([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]);

        return redirect('/invoices')->with('success', 'Tạo hóa đơn thành công');
    }

    public function edit(Invoice $invoice)
    {
        $products = Product::all();
        return view('invoices.edit', compact('invoice', 'products'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required',
            'status' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        $total = $product->price * $request->quantity;

        $invoice->update([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]);

        return redirect('/invoices')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect('/invoices')->with('success', 'Xóa thành công');
    }
}
