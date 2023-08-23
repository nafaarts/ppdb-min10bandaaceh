<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormulirController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric|unique:siswa',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
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

        $minutes = 60; // Cookie will be valid for 60 minutes
        $response = new Response('Cookie has been set.');
        $response->cookie('register_status', 'true', $minutes);

        return redirect()->route('bukti-pendaftaran', ['no_daftar' => $validated['no_daftar']])->withCookie($response->headers->getCookies()[0]);
    }
}
