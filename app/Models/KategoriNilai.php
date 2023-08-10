<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriNilai extends Model
{
    use HasFactory;

    protected $table = 'kategori_nilai';

    protected $fillable = [
        'nama',
        'slug',
        'kategori'
    ];

    public function nilai()
    {
        $this->hasMany(Nilai::class, 'kategori_nilai_id');
    }
}
