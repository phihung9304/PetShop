<?php

namespace App\Http\Controllers;

use App\Models\CareGuide;
use Illuminate\Http\Request;

class CareGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = CareGuide::latest()->get();
        return view('care-guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('care-guides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'species' => 'required|string|max:255',
            'breed'   => 'nullable|string|max:255',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        CareGuide::create($request->all());

        return redirect()
            ->route('care.guides.index')
            ->with('success', 'Thêm cách nuôi thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guide = CareGuide::findOrFail($id);
        return view('care-guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guide = CareGuide::findOrFail($id);
        return view('care-guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|string|max:255',
            'breed'   => 'nullable|string|max:255',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $guide = CareGuide::findOrFail($id);
        $guide->update($request->all());

        return redirect()
            ->route('care.guides.index')
            ->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guide = CareGuide::findOrFail($id);
        $guide->delete();

        return redirect()
            ->route('care.guides.index')
            ->with('success', 'Xóa thành công!');
    }
}