<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    // 📄 LIST ALL INVENTORY
    public function index(Request $request)
{
    $query = Inventory::with('product');

    // SEARCH
    if ($request->search) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('warehouse_name', 'like', '%' . $search . '%')

              ->orWhereHas('product', function ($product) use ($search) {

                    $product->where('name', 'like', '%' . $search . '%');

              });

        });
    }

    // FILTER KHO
    if ($request->warehouse_name) {

        $query->where('warehouse_name', $request->warehouse_name);

    }

    $inventories = $query
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('inventories.index', compact('inventories'));
}

    // ➕ FORM CREATE
    public function create()
    {
        $products = Product::all();
        return view('inventories.create', compact('products'));
    }

    // 💾 STORE
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_name' => 'required',
            'quantity' => 'required|integer|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()
            ->route('inventories.index')
            ->with('success', 'Thêm kho thành công');
    }

    // ✏️ EDIT
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        $products = Product::all();

        return view('inventories.edit', compact('inventory', 'products'));
    }

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_name' => 'required',
            'quantity' => 'required|integer|min:0',
        ]);

        $inventory->update($request->all());

        return redirect()
            ->route('inventories.index')
            ->with('success', 'Cập nhật kho thành công');
    }

    // ❌ DELETE
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()
            ->route('inventories.index')
            ->with('success', 'Xóa kho thành công');
    }
}