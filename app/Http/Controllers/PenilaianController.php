<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriNilai;
use App\Models\Siswa;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::where('no_daftar', request('siswa'))->first();

        $kategoriNilai = $siswa ? KategoriNilai::all()
            ->map(function ($kategori) use ($siswa) {
                $dataNilai = $siswa->nilai()->where('kategori_nilai_id', $kategori->id)->first();
                return [
                    ...$kategori->only([
                        'nama',
                        'slug',
                        'kategori',
                    ]),
                    'nilai' => $dataNilai->nilai ?? 0
                ];
            })->groupBy('kategori') : [];

        return view('penilaian.penilaian', compact('siswa', 'kategoriNilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $dataNilai = collect($request->nilai)->map(
            fn ($item, $index) =>  [
                'nama' => $index,
                'nilai' => $item
            ]
        )->values();

        foreach ($dataNilai as $data) {
            $kategoriNilai = KategoriNilai::where('slug', $data['nama'])->firstOrFail();
            $siswa->nilai()->updateOrCreate(['kategori_nilai_id' => $kategoriNilai->id,], [
                'nilai' => $data['nilai']
            ]);
        }
        return back()->with('berhasil', 'Nilai berhasil diubah/ditambahkan!');
    }
}
