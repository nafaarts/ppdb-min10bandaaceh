<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\KonfigurasiUmum;
use Illuminate\Http\Request;

class UbahStatusPendaftaranController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        KonfigurasiUmum::updateOrCreate([
            'nama' => 'status_pendaftaran'
        ], [
            'value' => $request->status ?? 0
        ]);

        return back()->with('status', 'status-pendaftaran-diubah');
    }
}
