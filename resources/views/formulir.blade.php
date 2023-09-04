@extends('layouts.front')

@section('title', 'Formulir')

@section('content')
    <div class="flex flex-grow container mx-auto">
        <div class="bg-white rounded p-8 m-3 md:m-0 w-full">
            <h5 class="font-bold text-2xl text-center">Formulir Pendaftaran MIN 10 Banda Aceh</h5>
            <hr class="my-6">
            @if (request('show_notes') == 1)
                <div class="space-y-6">
                    @include('form.notes')
                    <x-a-primary-button class="py-2 px-3" :href="route('formulir')">
                        Lanjutkan
                        <i class="fas fa-fw fa-arrow-right"></i>
                    </x-a-primary-button>
                </div>
            @else
                @if (request()->cookie('register_status'))
                    <div class="text-center">
                        <h2 class="text-lg mb-2">Terima kasih sudah mendaftar di MIN 10 Banda Aceh, data anda sudah
                            terdaftar.
                        </h2>
                        <p class="text-gray-500">Info lebih lanjut silahkan hubungi admin PPDB MIN 10 Banda Aceh pada
                            <a class="hover:text-green-500" href="tel:08126387123">081236871231</a>
                        </p>
                    </div>
                @else
                    <form method="post" action="{{ route('formulir.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('form.siswa')
                    </form>
                @endif
            @endif
        </div>
    </div>
@endsection
