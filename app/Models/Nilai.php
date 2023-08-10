<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'siswa_id',
        'kategori_nilai_id',
        'nilai'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriNilai::class);
    }
}
