<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'no_daftar',

        'nama_lengkap',
        'nik',

        'tempat_lahir',
        'tanggal_lahir',

        'anak_ke',
        'jumlah_saudara_kandung',

        'status_anak_dalam_keluarga',
        'status_anak',

        'hobi',
        'cita_cita',

        'jarak_ke_sekolah',
        'transportasi_ke_sekolah',

        'jalan',
        'desa',
        'kecamatan',
        'kab_kota',

        'asal_sekolah',
        'alamat_sekolah',

        'nama_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'no_hp_ayah',
        'alamat_ayah',

        'nama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_hp_ibu',
        'alamat_ibu',

        'nama_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'no_hp_wali',
        'alamat_wali',

        'status_lulus',
        'status_daftar_ulang',
    ];

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
