<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }
    public function create()
    {
        return view('admin.packages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
        Package::create($request->all());
        return redirect()->route('packages.index')->with('success', 'Paket fotografi berhasil ditambahkan!');
    }
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        $package->update($request->all());
        return redirect()->route('packages.index')->with('success', 'Data paket berhasil diupdate.');
    }
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Paket berhasil dihapus.');
    }
}
