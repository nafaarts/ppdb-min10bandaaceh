<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakBuktiPendaftaranController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Siswa $siswa)
    {
        // return view('print.bukti-pendaftaran', compact('siswa')); // sample
        $pdf = Pdf::loadView('print.bukti-pendaftaran', compact('siswa'));

        return $pdf->download('kartu-ujian.pdf');
    }
}
