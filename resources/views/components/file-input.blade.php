@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'type' => 'file',
    'class' => 'border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-green-50 file:text-green-700
      hover:file:bg-green-100',
]) !!}>
