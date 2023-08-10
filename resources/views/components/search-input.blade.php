<form {{ $attributes->merge(['class' => 'relative p-2', 'method' => 'GET']) }} class="relative p-2">
    <i class="fa-solid fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
    <x-text-input type="search" name="cari" class="w-full pl-9" :value="request('cari')" />
</form>
