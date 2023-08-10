<?php

namespace App\Http\Controllers;

use App\Models\KategoriNilai;
use Illuminate\Http\Request;

class KategoriNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriNilai::when(request('cari'), function ($query) {
            $query->where('nama', 'like', '%' .  request('cari') . '%');
        })->latest()->paginate();
        return view('kategori-nilai.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori-nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kategori' => 'required'
        ]);

        KategoriNilai::create([
            'nama' => $validated['nama'],
            'slug' => str()->slug($validated['nama']),
            'kategori' => $validated['kategori']
        ]);

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriNilai $kategori)
    {
        return view('kategori-nilai.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriNilai $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kategori' => 'required'
        ]);

        $kategori->update([
            'nama' => $validated['nama'],
            'slug' => str()->slug($validated['nama']),
            'kategori' => $validated['kategori']
        ]);

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriNilai $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil dihapus!');
    }
}
