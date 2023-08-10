<?php

namespace App\Http\Controllers\Konfigurasi;

use Illuminate\Http\Request;
use App\Models\KonfigurasiUmum;
use App\Http\Controllers\Controller;

class UbahStatusPengumumanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        KonfigurasiUmum::updateOrCreate([
            'nama' => 'pengumuman_lulus'
        ], [
            'value' => $request->status ?? 0
        ]);

        return back()->with('status', 'status-pengumuman-diubah');
    }
}
