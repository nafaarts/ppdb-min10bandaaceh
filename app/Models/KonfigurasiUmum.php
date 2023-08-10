<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiUmum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'value'
    ];

    protected $table = 'konfigurasi_umum';
}
