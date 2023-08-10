<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Status Pendaftaran
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Klik tombol dibawah ini untuk mengubah status pendaftaran.
        </p>
    </header>

    @php
        $statusPendaftaran = App\Models\KonfigurasiUmum::where('nama', 'status_pendaftaran')->first()?->value ?? 0;
    @endphp

    <form method="post" action="{{ route('ubah-status-pendaftaran') }}" class="mt-6 space-y-6"
        id="form-ubah-status-pendaftaran">
        @csrf
        @method('put')

        <div class="flex items-center gap-4">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" @checked($statusPendaftaran) name="status" value="1" class="sr-only peer"
                    onchange="document.getElementById('form-ubah-status-pendaftaran').submit()">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-500">Buka Pendaftaran</span>
            </label>

            @if (session('status') === 'status-pendaftaran-diubah')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
