<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inventory;

class ProductController extends Controller
{
    // 📄 Danh sách
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    // ➕ Form thêm
    public function create()
    {
        return view('products.create');
    }

    // 💾 Lưu
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:99999999.99',
            'category' => 'nullable'
        ]);

        $product = Product::create($validated);

        Inventory::create([
            'product_id' => $product->id,
            'quantity' => 0
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    // 👁 (không dùng cũng được)
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // ✏️ Form sửa
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // 🔄 Cập nhật
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:99999999.99',
            'category' => 'nullable'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Cập nhật thành công');
    }

    // ❌ Xóa
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Xóa thành công');
    }
}
