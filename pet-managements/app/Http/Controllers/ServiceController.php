<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
{
    $query = Service::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('price_range')) {

        if ($request->price_range == 'low') {
            $query->where('price', '<', 100000);
        }

        if ($request->price_range == 'mid') {
            $query->whereBetween('price', [100000, 300000]);
        }

        if ($request->price_range == 'high') {
            $query->where('price', '>', 300000);
        }
    }

    $services = $query->latest()
        ->paginate(5)
        ->withQueryString();

    return view('services.index', compact('services'));
}

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Service::create($data);

        return redirect()->route('services.index')
            ->with('success', 'Thêm dịch vụ thành công!');
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $service->update($data);

        return redirect()->route('services.index')
            ->with('success', 'Cập nhật thành công!');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Xóa thành công!');
    }
}