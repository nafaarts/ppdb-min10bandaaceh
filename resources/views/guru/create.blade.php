@section('title', 'Tambah Guru')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Guru
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('guru.store') }}">
                    @csrf
                    <div class="space-y-6">
                        <div class="flex gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="nama" value="Nama Lengkap" class="required" />
                                <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                    :value="old('nama')" autofocus autocomplete="nama" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="nip" value="Nomor Induk Pegawai" class="required" />
                                <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full"
                                    :value="old('nip')" autocomplete="nip" />
                                <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="email" :value="__('Email')" class="required" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email')" autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="no_hp" value="Nomor Handphone" class="required" />
                                <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                                    :value="old('no_hp')" autocomplete="no_hp" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="password" :value="__('Password')" class="required" />
                                <x-text-input id="password" name="password" type="password"
                                    class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="password" value="Ulangi Kata Sandi" class="required" />
                                <x-text-input id="password" name="password_confirmation" type="password"
                                    class="mt-1 block w-full" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-a-secondary-button :href="route('guru.index')" class="px-4 py-2">Kembali</x-a-secondary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
