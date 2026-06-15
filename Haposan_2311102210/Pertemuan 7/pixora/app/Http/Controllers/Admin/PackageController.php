<?php
// app/Http/Controllers/Admin/PackageController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return response()->json($package);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'edited_photos' => 'required|integer|min:1',
            'location_type' => 'required|in:studio,outdoor,both',
        ]);

        $package = Package::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'down_payment' => $request->down_payment,
            'duration_hours' => $request->duration_hours,
            'edited_photos' => $request->edited_photos,
            'location_type' => $request->location_type,
            'inclusions' => $request->inclusions,
            'is_active' => $request->is_active ?? true,
            'sort_order' => Package::max('sort_order') + 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil ditambahkan.'
        ]);
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'edited_photos' => 'required|integer|min:1',
            'location_type' => 'required|in:studio,outdoor,both',
        ]);

        $package->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'down_payment' => $request->down_payment,
            'duration_hours' => $request->duration_hours,
            'edited_photos' => $request->edited_photos,
            'location_type' => $request->location_type,
            'inclusions' => $request->inclusions,
            'is_active' => $request->is_active ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil diupdate.'
        ]);
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus.');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->orders as $order) {
            Package::where('id', $order['id'])->update(['sort_order' => $order['position']]);
        }

        return response()->json(['success' => true]);
    }
}
