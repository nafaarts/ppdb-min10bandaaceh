@section('title', 'Penilaian')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Penilaian
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <x-session-status :status="session('berhasil')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
                <form action="" class="flex gap-3">
                    <x-text-input placeholder="Masukan Nomor Daftar" class="w-full" name="siswa" :value="request('siswa')" />
                    <x-primary-button>
                        Cari
                    </x-primary-button>
                </form>
            </div>

            @if (request('siswa'))
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8 ">
                    @if ($siswa)
                        <table>
                            <tr>
                                <th class="text-left">Nama Lengkap</th>
                                <td class="px-4">:</td>
                                <td><a href="{{ route('siswa.show', $siswa) }}"
                                        class="hover:underline hover:text-green-500"
                                        target="_blank">{{ $siswa?->nama_lengkap ?? '' }}</a></td>
                            </tr>
                            <tr>
                                <th class="text-left">NIK</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa?->nik ?? '' }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Tempat, Tanggal Lahir</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa?->tempat_lahir ?? '' }},
                                    {{ now()->parse($siswa?->tanggal_lahir ?? '0')->translatedFormat('d F Y') }}</td>
                            </tr>
                        </table>

                        <hr class="my-6">

                        <form action="{{ route('penilaian.nilai', $siswa) }}" method="POST" id="form-penilaian"
                            class="space-y-6">
                            @csrf
                            @foreach ($kategoriNilai as $nama => $kategori)
                                <h6 class="mb-4 uppercase text-gray-500">{{ $nama }}</h6>
                                <div class="flex flex-wrap gap-3">
                                    @foreach ($kategori as $item)
                                        <div class="w-full">
                                            <x-input-label :value="$item['nama']" />
                                            <x-text-input type="number" step="0.01" class="w-full"
                                                value="{{ $item['nilai'] }}" name="nilai[{{ $item['slug'] }}]"
                                                placeholder="Masukan nilai {{ $item['nama'] }}" />
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <div class="flex gap-3">
                                <x-primary-button>Simpan</x-primary-button>
                                <x-a-secondary-button :href="route('penilaian')" class="py-2 px-4">Batal</x-a-secondary-button>
                            </div>
                        </form>
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
