<?php

namespace App\Http\Controllers;

use App\Models\HelicopterTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHelicopterTourController extends Controller
{
    public function index()
    {
        $helicopterTours = HelicopterTour::latest()->paginate(12);

        return view('admin.helicopter-tours.index', compact('helicopterTours'));
    }

    public function create()
    {
        return view('admin.helicopter-tours.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'category' => 'required|string|max:255',
        'package_name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tag' => 'nullable|string|max:255',
        'duration' => 'nullable|string|max:255',
        'passenger' => 'nullable|string|max:255',
        'route' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ]);

    $validated['is_active'] = $request->has('is_active');

    if ($request->hasFile('image')) {
    $validated['image'] = $request->file('image')->store('helicopter-tours', 'public');
}

    \App\Models\HelicopterTour::create($validated);

    return redirect()
        ->route('admin.helicopter-tours.index')
        ->with('success', 'Helicopter tour berhasil ditambahkan.');
}

    public function show(HelicopterTour $helicopterTour)
    {
        return view('admin.helicopter-tours.show', compact('helicopterTour'));
    }

    public function edit(HelicopterTour $helicopterTour)
    {
        return view('admin.helicopter-tours.edit', compact('helicopterTour'));
    }

    public function update(Request $request, HelicopterTour $helicopterTour)
{
    $validated = $request->validate([
        'category' => 'required|string|max:255',
        'package_name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tag' => 'nullable|string|max:255',
        'duration' => 'nullable|string|max:255',
        'passenger' => 'nullable|string|max:255',
        'route' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ]);

    $validated['is_active'] = $request->has('is_active');

    if ($request->hasFile('image')) {
    if ($helicopterTour->image && Storage::disk('public')->exists($helicopterTour->image)) {
        Storage::disk('public')->delete($helicopterTour->image);
    }

    $validated['image'] = $request->file('image')->store('helicopter-tours', 'public');
} else {
    unset($validated['image']);
}

    $helicopterTour->update($validated);

    return redirect()
        ->route('admin.helicopter-tours.index')
        ->with('success', 'Helicopter tour berhasil diupdate.');
}

    public function destroy(HelicopterTour $helicopterTour)
{

    if ($helicopterTour->image && Storage::disk('public')->exists($helicopterTour->image)) {
    Storage::disk('public')->delete($helicopterTour->image);
}

    $helicopterTour->delete();

    return redirect()
        ->route('admin.helicopter-tours.index')
        ->with('success', 'Helicopter tour berhasil dihapus.');
}
}