<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Service;

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
    $services = Service::all();

    return view('pets.create', compact('customers', 'services'));
}

    // 💾 Lưu dữ liệu
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'species' => 'required',
        'customer_id' => 'required|exists:customers,id'
    ]);

    $pet = Pet::create($request->all());

    $pet->services()->sync($request->services ?? []);

    return redirect()->route('pets.index')
                     ->with('success', 'Thêm thú cưng thành công!');
}

    // ✏️ Form sửa
public function edit($id)
{
    $pet = Pet::with('services')->findOrFail($id);
    $customers = Customer::all();
    $services = Service::all();

    return view('pets.edit', compact('pet', 'customers', 'services'));
}

    // 🔄 Cập nhật
public function update(Request $request, $id)
{
    $pet = Pet::findOrFail($id);

    $pet->update($request->all());

    // 👉 cập nhật dịch vụ
    $pet->services()->sync($request->services ?? []);

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