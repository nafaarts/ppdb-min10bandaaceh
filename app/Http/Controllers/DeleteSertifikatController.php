<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Support\Facades\Storage;

class DeleteSertifikatController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Sertifikat $sertifikat)
    {
        Storage::delete('/public/' . $sertifikat->file_name);
        $sertifikat->delete();

        return back()->with('berhasil', 'sertifikat berhasil dihapus!');
    }
}
