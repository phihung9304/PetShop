<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // 📋 Hiển thị danh sách
    public function index()
    {
        $pets = Pet::with('customer')->get();
        return view('pets.index', compact('pets'));
    }

    // ➕ Form thêm
    public function create()
    {
        $customers = Customer::all();
        return view('pets.create', compact('customers'));
    }

    // 💾 Lưu dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')
                         ->with('success', 'Thêm thú cưng thành công!');
    }

    // ✏️ Form sửa
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $customers = Customer::all();

        return view('pets.edit', compact('pet', 'customers'));
    }

    // 🔄 Cập nhật
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return redirect()->route('pets.index')
                         ->with('success', 'Cập nhật thành công!');
    }

    // 🗑️ Xóa
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index')
                         ->with('success', 'Xóa thành công!');
    }
}