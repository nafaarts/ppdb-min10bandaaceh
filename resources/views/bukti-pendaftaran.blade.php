@extends('layouts.front')

@section('title', 'Cetak Bukti Pendaftaran')

@section('content')
    <div class="flex flex-grow container mx-auto">
        <div class="bg-white rounded p-8 m-3 md:m-0 w-full">
            <h5 class="font-bold text-2xl text-center">Cetak Bukti Pendaftaran</h5>
            <hr class="my-6">
            <x-session-status :status="session('berhasil')" />

            <form action="" class="flex gap-3">
                <x-text-input placeholder="Masukan Nomor Daftar" class="w-full" name="no_daftar" :value="request('no_daftar')" />
                <x-primary-button>
                    Cari
                </x-primary-button>
            </form>

            <hr class="my-8">

            @if (request('no_daftar'))
                @if ($siswa)
                    <table>
                        <tr>
                            <th class="text-left">Nomor Daftar</th>
                            <td class="px-4">:</td>
                            <td>
                                <span class="font-bold">{{ $siswa->no_daftar }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left">Nama Lengkap</th>
                            <td class="px-4">:</td>
                            <td>{{ $siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">NIK</th>
                            <td class="px-4">:</td>
                            <td>{{ $siswa->nik }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Tempat, Tanggal Lahir</th>
                            <td class="px-4">:</td>
                            <td>{{ $siswa->tempat_lahir }},
                                {{ now()->parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Nama Ayah</th>
                            <td class="px-4">:</td>
                            <td>{{ $siswa->nama_ayah }}</td>
                        </tr>
                    </table>

                    <hr class="my-8">

                    <form action="{{ route('cetak.bukti-pendaftaran', $siswa) }}" method="post">
                        @csrf
                        <x-primary-button class="px-2 py-1">
                            <i class="fas fw fa-download me-2"></i> Download Bukti Pendaftaran
                        </x-primary-button>
                    </form>
                @else
                    <div class="font-medium text-sm text-yellow-600 p-4 border border-yellow-300 bg-yellow-100 rounded">
                        Tidak ada data dengan nomor daftar <strong>{{ request('no_daftar') }}</strong>
                    </div>
                @endif
            @else
                <div class="font-medium text-sm text-blue-600 p-4 border border-blue-300 bg-blue-100 rounded">
                    Silahkan masukan nomor daftar anda.
                </div>
            @endif
        </div>
    </div>
@endsection
