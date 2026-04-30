<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    // 📦 Xem danh sách kho
    public function index()
    {
        $inventories = Inventory::with('product')->get();

        return view('inventory.index', compact('inventories'));
    }

    // ➕ Nhập kho
    public function import(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $inventory = Inventory::firstOrCreate(
            ['product_id' => $request->product_id],
            ['quantity' => 0]
        );

        $inventory->quantity += $request->quantity;
        $inventory->save();

        return back()->with('success', 'Nhập kho thành công');
    }

    // ➖ Xuất kho
    public function export(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $inventory = Inventory::where('product_id', $request->product_id)->first();

        if (!$inventory || $inventory->quantity < $request->quantity) {
            return back()->with('error', 'Không đủ hàng trong kho');
        }

        $inventory->quantity -= $request->quantity;
        $inventory->save();

        return back()->with('success', 'Xuất kho thành công');
    }
}