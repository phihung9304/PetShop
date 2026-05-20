<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inventory;

class ProductController extends Controller
{
    // 📄 Danh sách sản phẩm (kèm tồn kho)
    public function index(Request $request)
{
    $query = Product::with('inventories');

    // SEARCH
    if ($request->search) {

        $search = $request->search;

        $query->where('name', 'like', '%' . $search . '%');

    }

    // FILTER CATEGORY
    if ($request->category) {

        $query->where('category', $request->category);

    }

    $products = $query
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('products.index', compact('products'));
}

    // ➕ Form thêm
    public function create()
    {
        return view('products.create');
    }

    // 💾 Lưu sản phẩm + TẠO INVENTORY LUÔN
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:99999999.99',
            'category' => 'nullable',
            'quantity' => 'nullable|integer|min:0' // 👈 thêm tồn kho ban đầu
        ]);

        $product = Product::create($validated);

        // 🔥 Tạo inventory mặc định
        Inventory::create([
            'product_id' => $product->id,
            'warehouse_name' => 'Kho chính',
            'quantity' => $request->quantity ?? 0
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    // ✏️ Form sửa (chỉ sửa giá)
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // 🔄 Cập nhật (chỉ price + category)
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:99999999.99',
            'category' => 'nullable'
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Cập nhật thành công');
    }

    // ❌ Xóa
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Xóa thành công');
    }
}
