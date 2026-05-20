<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Service;

class PetController extends Controller
{
    // 📋 Hiển thị danh sách
    public function index(Request $request)
{
    $query = Pet::with(['customer', 'services'])
        ->orderBy('id', 'desc');

    // 🔎 Search theo tên pet hoặc tên chủ
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where('name', 'like', "%$search%")
              ->orWhereHas('customer', function ($q) use ($search) {
                  $q->where('name', 'like', "%$search%");
              });
    }

    // 🐾 Filter theo loài
    if ($request->filled('species')) {
        $query->where('species', $request->species);
    }

        if ($request->filled('age_range')) {

        if ($request->age_range == 'baby') {
            $query->where('age', '<=', 1);
        }

        if ($request->age_range == 'young') {
            $query->whereBetween('age', [2, 5]);
        }

        if ($request->age_range == 'adult') {
            $query->whereBetween('age', [6, 10]);
        }

        if ($request->age_range == 'old') {
            $query->where('age', '>', 10);
        }
    }

    // 📄 PHÂN TRANG GIỐNG INVOICES
    $pets = $query->latest()->paginate(5)->withQueryString();

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
            'customer_id' => 'nullable|exists:customers,id'
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
