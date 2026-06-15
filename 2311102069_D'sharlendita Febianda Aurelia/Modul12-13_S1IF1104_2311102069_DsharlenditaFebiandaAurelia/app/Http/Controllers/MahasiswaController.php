<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MahasiswaController extends Controller
{
    public function index(): View
    {
        return view('mahasiswa');
    }

    public function getData(): JsonResponse
    {
        return response()->json(
            Mahasiswa::latest()->get()
        );
    }

    public function create(): View
    {
        return view('tambah_mahasiswa');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'jurusan' => 'required'
        ]);

        Mahasiswa::create($validated);

        return redirect('/')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(int $id): View
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('edit_mahasiswa', compact('mhs'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|numeric|unique:mahasiswa,nim,' . $id,
            'jurusan' => 'required'
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($validated);

        return redirect('/')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(int $id): JsonResponse
    {
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return response()->json([
                'error' => 'Data tidak ditemukan'
            ], 404);
        }

        $mhs->delete();

        return response()->json([
            'success' => true
        ]);
    }
}