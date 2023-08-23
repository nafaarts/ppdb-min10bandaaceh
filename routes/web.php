<?php

use App\Http\Controllers\CetakBuktiPendaftaranController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\DeleteSertifikatController;
use App\Http\Controllers\FormulirController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriNilaiController;
use App\Http\Controllers\Konfigurasi\UbahStatusPengumumanController;
use App\Http\Controllers\Konfigurasi\UbahStatusPendaftaranController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ToggleLulusController;
use App\Models\KonfigurasiUmum;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulir', function () {
    $status = KonfigurasiUmum::where('nama', 'status_pendaftaran')->first()?->value;
    if (!$status) {
        return redirect('/');
    }

    return view('formulir');
})->name('formulir');

Route::post('/formulir/register', FormulirController::class)->name('formulir.store');

Route::get('/pengumuman-kelulusan', function () {
    $status = KonfigurasiUmum::where('nama', 'pengumuman_lulus')->first()?->value;
    if (!$status) {
        return redirect('/');
    }

    $siswa = Siswa::latest()
        ->when(request('cari'), function ($query) {
            $query->where('nama_lengkap', 'like', "%" . request('cari') . "%")
                ->orWhere('nik', 'like', "%" . request('cari') . "%")
                ->orWhere('nama_ayah', 'like', "%" . request('cari') . "%")
                ->orWhere('nama_ibu', 'like', "%" . request('cari') . "%")
                ->orWhere('nama_wali', 'like', "%" . request('cari') . "%");
        })
        ->where('status_lulus', 1)
        ->paginate();

    return view('data-lulus', compact('siswa'));
})->name('data-lulus');

// bukti pendaftaram
Route::get('/bukti-pendaftaran', function () {
    $siswa = request('no_daftar') ? Siswa::where('no_daftar', request('no_daftar'))->first() : null;
    return view('bukti-pendaftaran', compact('siswa'));
})->name('bukti-pendaftaran');
Route::post('/bukti-pendaftaran/{siswa}/cetak', CetakBuktiPendaftaranController::class)->name('cetak.bukti-pendaftaran');

Route::get('/dashboard', function () {
    $siswa = Siswa::latest()->limit(5)->get();
    $totalPendaftar = Siswa::count();
    $totalLulus = Siswa::where('status_lulus', true)->count();
    $totalDaftarUlang = Siswa::where('status_daftar_ulang', true)->count();

    return view('dashboard', compact('siswa', 'totalPendaftar', 'totalLulus', 'totalDaftarUlang'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // data siswa
    Route::resource('siswa', SiswaController::class);

    // penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');
    Route::post('/penilaian/{siswa}/nilai', [PenilaianController::class, 'update'])->name('penilaian.nilai');

    // daftar ulang
    Route::get('/daftar-ulang', [DaftarUlangController::class, 'index'])->name('daftar-ulang');
    Route::post('/daftar-ulang/{siswa}/toggle', [DaftarUlangController::class, 'update'])->name('daftar-ulang.toggle');

    Route::middleware('can:admin')->group(function () {
        // data guru
        Route::resource('guru', GuruController::class)->except('show')->parameters([
            'guru' => 'user'
        ]);

        // data kategori nilai
        Route::resource('kategori-nilai', KategoriNilaiController::class)->except('show')->parameters([
            'kategori-nilai' => 'kategori'
        ]);

        // konfigurasi
        Route::view('konfigurasi', 'konfigurasi.index')->name('konfigurasi');
        Route::put('konfigurasi/ubah-status-pendaftaran', UbahStatusPendaftaranController::class)->name('ubah-status-pendaftaran');
        Route::put('konfigurasi/ubah-status-pengumuman', UbahStatusPengumumanController::class)->name('ubah-status-pengumuman');

        // hapus sertifikat
        Route::delete('sertifikat/{sertifikat}/destroy', DeleteSertifikatController::class)->name('sertifikat.destroy');

        // toggle kelulusan siswa
        Route::post('siswa/{siswa}/toggle-lulus', ToggleLulusController::class)->name('toggle-lulus');
    });

    // data profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
