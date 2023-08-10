@extends('layouts.front')

@section('title', 'Pengumuman Kelulusan')

@section('content')
    <div class="flex flex-grow container mx-auto">
        <div class="bg-white rounded p-8 m-3 md:m-0 w-full">
            <h5 class="font-bold text-2xl text-center">Pengumuman Kelulusan PPDB MIN 10 Banda Aceh</h5>
            <hr class="my-6">
            <x-search-input />
            <hr>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr class="border-b">
                            <th scope="col" class="px-6 py-4">
                                No Daftar
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Nama Ayah
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Tanggal Mendaftar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->no_daftar }}
                                </th>
                                <td class="px-6 py-4 font-bold">
                                    {{ $item->nama_lengkap }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama_ayah }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->created_at->translatedFormat('d F Y H:s') }} WIB
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
            <div class="p-2">
                {{ $siswa->links() }}
            </div>
        </div>
    </div>
@endsection
