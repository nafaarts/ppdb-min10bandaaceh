@section('title', 'Dasbor')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/3 mb-4">
                    <div class="p-6 text-gray-500">
                        <span>Total Pendaftar</span>
                        <h4 class="text-3xl text-gray-900 mt-1">{{ $totalPendaftar }}</h4>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/3 mb-4">
                    <div class="p-6 text-gray-500">
                        <span>Total Lulus</span>
                        <h4 class="text-3xl text-gray-900 mt-1">{{ $totalLulus }}</h4>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/3 mb-4">
                    <div class="p-6 text-gray-500">
                        <span>Total Daftar Ulang</span>
                        <h4 class="text-3xl text-gray-900 mt-1">{{ $totalDaftarUlang }}</h4>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-500">
                    Selamat Datang, <strong class="text-green-700">{{ Auth::user()->nama }}</strong>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-3 flex justify-between">
                    <small class="text-xs text-gray-500">Pendaftar terbaru</small>
                    <a href="{{ route('siswa.index') }}"
                        class="text-xs text-gray-500 cursor-pointer hover:text-green-600 hover:underline hover:underline-offset-4">
                        Lihat selengkapnya<i class="ml-2 fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <hr>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="border-b">
                                <th scope="col" class="px-6 py-4">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    TTL
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Lulus
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Daftar Ulang
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Tanggal Mendaftar
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span class="text-gray-900 ">{{ $item->nama_lengkap }}</span>
                                            <small class="text-gray-600 ">{{ $item->no_daftar }}</small>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ "$item->tempat_lahir, " .now()->parse($item->tanggal_lahir)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-badge-status :status="$item->status_lulus" />
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-badge-status :status="$item->status_daftar_ulang" />
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at->translatedFormat('d F Y H:m') }} WIB
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <x-a-secondary-button :href="route('siswa.show', $item)" class="px-2 py-1">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-a-secondary-button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <th scope="row" colspan="8"
                                        class="px-6 py-10 font-medium text-gray-900 uppercase text-center">
                                        tidak ada data.
                                    </th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
