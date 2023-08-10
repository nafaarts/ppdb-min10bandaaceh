@section('title', 'Kategori Penilaian')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kategori Penilaian
            </h2>
            <x-a-primary-button :href="route('kategori-nilai.create')" class="py-1 px-3">
                <i class="fa-solid fa-plus mr-1"></i>
                Tambah Kategori
            </x-a-primary-button>
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
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Tanggal ditambah
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->nama }}
                                    </th>
                                    <td class="px-6 py-4 uppercase">
                                        {{ $item->kategori }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <x-a-warning-button :href="route('kategori-nilai.edit', $item)" class="px-2 py-1">
                                                <i class="fa-solid fa-edit"></i>
                                            </x-a-warning-button>
                                            <x-form-delete :action="route('kategori-nilai.destroy', $item)" :confirm="true">
                                                <x-danger-button class="px-2 py-1">
                                                    <i class="fa-solid fa-trash"></i>
                                                </x-danger-button>
                                            </x-form-delete>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="4" class="px-6 py-10 text-center">
                                        <span>Tidak ada data</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
