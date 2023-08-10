<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat';

    protected $fillable = ['file_name'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function getName()
    {
        return explode('/', $this->file_name)[1] ?? '-';
    }
}
