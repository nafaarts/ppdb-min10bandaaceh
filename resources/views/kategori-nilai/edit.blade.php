@section('title', 'Kategori Nilai')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori Nilai
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('kategori-nilai.update', $kategori) }}">
                    @csrf
                    @method('patch')
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="nama" :value="__('Nama')" class="required" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                :value="old('nama', $kategori->nama)" required autofocus autocomplete="nama" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>

                        <div>
                            <x-input-label for="kategori" value="Kategori" class="required" />
                            <x-select id="kategori" name="kategori" class="mt-1 block w-full">
                                <option @selected(old('kategori', $kategori->kategori) == '') value="">-- pilih kategori --</option>
                                <option @selected(old('kategori', $kategori->kategori) == 'lisan') value="lisan">LISAN</option>
                                <option @selected(old('kategori', $kategori->kategori) == 'tulis') value="tulis">TULIS</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-a-secondary-button :href="route('kategori-nilai.index')" class="px-4 py-2">Kembali</x-a-secondary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
