@extends('layouts.front')

@section('title', 'Beranda')

@section('content')
    <main class="flex-grow flex justify-center items-center">
        <div class="text-center text-white space-y-4">
            <h4 class="md:text-3xl uppercase">Penerimaan Peserta Didik Baru</h4>
            <h2 class="text-lg md:text-5xl font-bold uppercase">MIN 10 Banda Aceh</h2>
            <h6 class="md:text-lg uppercase">Tahun Ajaran {{ date('Y') }} / {{ date('Y') + 1 }}</h6>
            <hr class="w-24 border-white/50 mx-auto">
            @php
                $statusPendaftaran = App\Models\KonfigurasiUmum::where('nama', 'status_pendaftaran')->first()?->value;
            @endphp
            <a @if ($statusPendaftaran) href="{{ route('formulir') }}" @else href="javascript:alert('Maaf pendaftaran sudah ditutup!')" @endif
                class="inline-flex items-center bg-transparent border py-1 px-3 focus:outline-none hover:bg-white hover:text-black rounded text-base mt-4 md:mt-0">
                Daftar Sekarang
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </main>
@endsection
