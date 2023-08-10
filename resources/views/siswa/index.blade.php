@section('title', 'Data Siswa')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Siswa
            </h2>
            @can('admin')
                <x-a-primary-button :href="route('siswa.create')" class="py-1 px-3">
                    <i class="fa-solid fa-plus mr-1"></i>
                    Tambah Siswa
                </x-a-primary-button>
            @endcan
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-session-status class="mb-4" :status="session('berhasil')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-search-input />
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
                                        {{ $item->created_at->translatedFormat('d F Y H:s') }} WIB
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <x-a-secondary-button :href="route('siswa.show', $item)" class="px-2 py-1">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-a-secondary-button>
                                            @can('admin')
                                                <x-a-warning-button :href="route('siswa.edit', $item)" class="px-2 py-1">
                                                    <i class="fa-solid fa-edit"></i>
                                                </x-a-warning-button>
                                                <x-form-delete :action="route('siswa.destroy', $item)" :confirm="true">
                                                    <x-danger-button class="px-2 py-1">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </x-danger-button>
                                                </x-form-delete>
                                            @endcan
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
                <div class="p-2">
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
