@section('title', 'Daftar Ulang')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Ulang
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <x-session-status class="mb-4" :status="session('berhasil')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
                <form action="" class="flex gap-3">
                    <x-text-input placeholder="Masukan Nomor Daftar" class="w-full" name="siswa" :value="request('siswa')" />
                    <x-primary-button>
                        Cari
                    </x-primary-button>
                </form>
            </div>
            @if (request('siswa'))
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @if ($siswa)
                        <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                            <h3 class="text-xl mb-3 font-bold">{{ $siswa->no_daftar }}</h3>
                            <div class="flex gap-3">
                                <form action="{{ route('daftar-ulang.toggle', $siswa) }}" method="post"
                                    id="toggleForm">
                                    @csrf
                                </form>
                                @if ($siswa->status_daftar_ulang)
                                    <button onclick="document.getElementById('toggleForm').submit()"
                                        class="inline-flex items-center bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 px-2 py-1">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="hidden md:block">Batalkan Daftar Ulang</span>
                                    </button>
                                @else
                                    <button onclick="document.getElementById('toggleForm').submit()"
                                        class="inline-flex items-center bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 px-2 py-1">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="hidden md:block">Konfirmasi Daftar Ulang</span>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <hr class="my-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2 space-y-6">
                                <table>
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
                                </table>

                                <table>
                                    <tr>
                                        <th class="text-left">Status Lulus</th>
                                        <td class="px-4">:</td>
                                        <td><x-badge-status :status="$siswa->status_lulus" /></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Daftar Ulang</th>
                                        <td class="px-4">:</td>
                                        <td><x-badge-status :status="$siswa->status_daftar_ulang" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="w-full md:w-1/2 space-y-6">
                                @foreach ($kategoriNilai as $nama => $kategori)
                                    <table>
                                        @foreach ($kategori as $item)
                                            <tr>
                                                <th class="text-left">{{ $item['nama'] }}</th>
                                                <td class="px-4">:</td>
                                                <td>{{ $item['nilai'] }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endforeach
                            </div>
                        </div>

                        @if ($siswa->sertifikat->count() > 0)
                            <hr class="my-6">
                            <small class="block text-gray-500 mb-3">Sertifikat</small>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($siswa->sertifikat as $sertifikat)
                                    <div
                                        class="border border-gray-300 hover:border-green-300 rounded flex gap-2 p-2 text-xs">
                                        <i class="fa-solid fa-file text-green-500"></i>
                                        <span class="text-gray-600">
                                            <a href="{{ asset('storage/' . $sertifikat->file_name) }}"
                                                target="_blank">{{ $sertifikat->getName() }}</a>
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <div
                            class="font-medium text-sm text-yellow-600 p-4 border border-yellow-300 bg-yellow-100 rounded">
                            Tidak ada data dengan nomor daftar <strong>{{ request('siswa') }}</strong>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
