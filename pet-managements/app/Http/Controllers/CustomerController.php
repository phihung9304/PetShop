<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // 📋 Danh sách
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // ➕ Form thêm
    public function create()
    {
        return view('customers.create');
    }

    // 💾 Lưu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Thêm thành công!');
    }

    // ✏️ Form sửa
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // 🔄 Cập nhật
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Cập nhật thành công!');
    }

    // 🗑️ Xóa
    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect()->route('customers.index')
                         ->with('success', 'Xóa thành công!');
    }
}