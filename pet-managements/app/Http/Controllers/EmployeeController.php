<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Hiển thị danh sách
    public function index(Request $request)
{
    $query = Employee::query();

    // SEARCH
    if ($request->search) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%')
              ->orWhere('phone', 'like', '%' . $search . '%');

        });
    }

    // FILTER POSITION
    if ($request->position) {

        $query->where('position', $request->position);

    }

    $employees = $query
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('employees.index', compact('employees'));
}

    // Form thêm
    public function create()
    {
        return view('employees.create');
    }

    // Lưu
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|max:20',
            'position' => 'nullable|max:255',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Thêm nhân viên thành công');
    }

    // Form sửa
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Cập nhật
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'nullable|max:20',
            'position' => 'nullable|max:255',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Cập nhật thành công');
    }

    // Xóa
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Xóa thành công');
    }
}