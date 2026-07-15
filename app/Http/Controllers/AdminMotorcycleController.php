<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMotorcycleController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::latest()->paginate(12);

        return view('admin.motorcycle.index', compact('motorcycles'));
    }

    public function create()
    {
        return view('admin.motorcycle.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tag' => 'nullable|string|max:255',
            'cc' => 'nullable|string|max:255',
            'fuel' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
    $validated['image'] = $request->file('image')->store('motorcycles', 'public');
}

        Motorcycle::create($validated);

        return redirect()->route('admin.motorcycles.index')->with('success', 'Motorcycle berhasil ditambahkan.');
    }

    public function show(Motorcycle $motorcycle)
    {
        return view('admin.motorcycle.show', compact('motorcycle'));
    }

    public function edit(Motorcycle $motorcycle)
    {
        return view('admin.motorcycle.edit', compact('motorcycle'));
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tag' => 'nullable|string|max:255',
            'cc' => 'nullable|string|max:255',
            'fuel' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
    if ($motorcycle->image && Storage::disk('public')->exists($motorcycle->image)) {
        Storage::disk('public')->delete($motorcycle->image);
    }

    $validated['image'] = $request->file('image')->store('motorcycles', 'public');
} else {
    unset($validated['image']);
}

        $motorcycle->update($validated);

        return redirect()->route('admin.motorcycles.index')->with('success', 'Motorcycle berhasil diupdate.');
    }

    public function destroy(Motorcycle $motorcycle)
    {

        if ($motorcycle->image && Storage::disk('public')->exists($motorcycle->image)) {
    Storage::disk('public')->delete($motorcycle->image);
}
        $motorcycle->delete();

        return redirect()->route('admin.motorcycles.index')->with('success', 'Motorcycle berhasil dihapus.');
    }
}