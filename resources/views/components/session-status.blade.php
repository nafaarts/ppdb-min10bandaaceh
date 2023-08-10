@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 p-4 border border-green-300 bg-green-100 rounded']) }}>
        {{ $status }}
    </div>
@endif
