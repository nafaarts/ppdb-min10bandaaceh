<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('no_daftar')->unique();
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara_kandung');
            $table->string('status_anak_dalam_keluarga');
            $table->string('status_anak');
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('jarak_ke_sekolah');
            $table->string('transportasi_ke_sekolah');
            $table->string('jalan');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('nama_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('no_hp_ayah');
            $table->string('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('no_hp_ibu');
            $table->string('alamat_ibu');
            $table->string('nama_wali');
            $table->string('pendidikan_wali');
            $table->string('pekerjaan_wali');
            $table->string('penghasilan_wali');
            $table->string('no_hp_wali');
            $table->string('alamat_wali');
            $table->boolean('status_lulus')->default(0);
            $table->boolean('status_daftar_ulang')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
