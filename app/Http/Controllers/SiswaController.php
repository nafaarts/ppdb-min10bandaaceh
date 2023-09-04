<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Models\KategoriNilai;
use App\Rules\BirthYearRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::latest()
            ->when(request('cari'), function ($query) {
                $query->where('no_daftar', 'like', "%" . request('cari') . "%")
                    ->orwhere('nama_lengkap', 'like', "%" . request('cari') . "%")
                    ->orWhere('nik', 'like', "%" . request('cari') . "%")
                    ->orWhere('nama_ayah', 'like', "%" . request('cari') . "%")
                    ->orWhere('nama_ibu', 'like', "%" . request('cari') . "%")
                    ->orWhere('nama_wali', 'like', "%" . request('cari') . "%");
            })
            ->paginate();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric|unique:siswa',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => ['required', new BirthYearRule(7)],
            'anak_ke' => 'required|numeric',
            'jumlah_saudara_kandung' => 'required|numeric',
            'status_anak_dalam_keluarga' => 'required',
            'status_anak' => 'required',
            'hobi' => 'nullable',
            'cita_cita' => 'nullable',
            'jarak_ke_sekolah' => 'required',
            'transportasi_ke_sekolah' => 'required',
            'jalan' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kab_kota' => 'required',
            'asal_sekolah' => 'nullable',
            'alamat_sekolah' => 'nullable',
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'no_hp_ayah' => 'required|numeric',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'no_hp_ibu' => 'required|numeric',
            'alamat_ibu' => 'required',
            'nama_wali' => 'required',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'penghasilan_wali' => 'required',
            'no_hp_wali' => 'required|numeric',
            'alamat_wali' => 'required',
        ]);

        // no daftar
        $validated['no_daftar'] = 'PPDB-' . str_pad((Siswa::latest()->first()?->id ?? 0) + 1, 4, '0', STR_PAD_LEFT);

        $siswa = Siswa::create($validated);

        // sertifikat diubah jadi berkas Lampiran
        foreach ($request->sertifikat ?? [] as $sertifikat) {
            $fileName = 'sertifikat/' .  $validated['no_daftar'] . '-' .  $sertifikat->getClientOriginalName();
            $sertifikat->storeAs('public/', $fileName);
            $siswa->sertifikat()->create(['file_name' => $fileName]);
        }

        return redirect()->route('siswa.index')->with('berhasil', 'Siswa berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $kategoriNilai = KategoriNilai::all()
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
            })->groupBy('kategori');

        return view('siswa.show', compact('siswa', 'kategoriNilai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => ['required', 'numeric', Rule::unique(Siswa::class)->ignore($siswa)],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => ['required', new BirthYearRule(7)],
            'anak_ke' => 'required|numeric',
            'jumlah_saudara_kandung' => 'required|numeric',
            'status_anak_dalam_keluarga' => 'required',
            'status_anak' => 'required',
            'hobi' => 'nullable',
            'cita_cita' => 'nullable',
            'jarak_ke_sekolah' => 'required',
            'transportasi_ke_sekolah' => 'required',
            'jalan' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kab_kota' => 'required',
            'asal_sekolah' => 'nullable',
            'alamat_sekolah' => 'nullable',
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'no_hp_ayah' => 'required|numeric',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'no_hp_ibu' => 'required|numeric',
            'alamat_ibu' => 'required',
            'nama_wali' => 'required',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'penghasilan_wali' => 'required',
            'no_hp_wali' => 'required|numeric',
            'alamat_wali' => 'required',
        ]);

        // no daftar
        $siswa->update($validated);

        // sertifikat diubah jadi berkas Lampiran
        foreach ($request->sertifikat ?? [] as $sertifikat) {
            $fileName = 'sertifikat/' .  $siswa->no_daftar . '-' .  $sertifikat->getClientOriginalName();
            $sertifikat->storeAs('public/', $fileName);
            $siswa->sertifikat()->create(['file_name' => $fileName]);
        }

        return redirect()->route('siswa.index')->with('berhasil', 'Siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        foreach ($siswa->sertifikat as $sertifikat) {
            Storage::delete('/public/' . $sertifikat->file_name);
            $sertifikat->delete();
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('berhasil', 'Siswa berhasil dihapus!');
    }
}
