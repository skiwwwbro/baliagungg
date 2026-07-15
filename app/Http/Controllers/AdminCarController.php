<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(12);

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tag' => 'nullable|string|max:255',
            'passenger' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'purpose' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car berhasil ditambahkan.');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tag' => 'nullable|string|max:255',
            'passenger' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'purpose' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $validated['image'] = $request->file('image')->store('cars', 'public');
        } else {
            unset($validated['image']);
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car berhasil diupdate.');
    }

    public function destroy(Car $car)
    {

        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car berhasil dihapus.');
    }
}