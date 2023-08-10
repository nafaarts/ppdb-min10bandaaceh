<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class ToggleLulusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Siswa $siswa)
    {
        $pesan = $siswa->status_lulus ? 'batalkan lulus' : 'luluskan';

        $siswa->update([
            'status_lulus' => !$siswa->status_lulus
        ]);

        return back()->with('berhasil', 'Siswa berhasil di' . $pesan);
    }
}
