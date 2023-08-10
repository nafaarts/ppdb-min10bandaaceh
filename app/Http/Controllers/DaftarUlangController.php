<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\KategoriNilai;

class DaftarUlangController extends Controller
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

        return view('daftar-ulang.index', compact('siswa', 'kategoriNilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $pesan = $siswa->status_daftar_ulang ? 'batalkan daftar ulang' : 'konfirmasi';

        $siswa->update([
            'status_daftar_ulang' => !$siswa->status_daftar_ulang
        ]);

        return back()->with('berhasil', 'Siswa berhasil di' . $pesan);
    }
}
