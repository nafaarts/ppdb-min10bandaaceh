<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'Administrator',
            'nip' => '000000000',
            'email' => 'admin@gmail.com',
            'no_hp' => "0000000000",
            'password' => bcrypt('password'),
            'hak_akses' => 'admin'
        ]);

        \App\Models\KonfigurasiUmum::insert([
            [
                'nama' => 'status_pendaftaran',
                'value' => 0
            ],
            [
                'nama' => 'pengumuman_lulus',
                'value' => 0
            ]
        ]);
    }
}
