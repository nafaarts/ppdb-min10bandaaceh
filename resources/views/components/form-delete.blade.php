@props(['confirm' => false])

<form {{ $attributes->merge(['method' => 'POST']) }}
    @if ($confirm) onsubmit="return confirm('apakah anda yakin?')" @endif>
    @csrf
    @method('DELETE')
    {{ $slot }}
</form>
