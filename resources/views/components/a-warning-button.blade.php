<a
    {{ $attributes->merge(['class' => 'inline-flex items-center bg-yellow-300 border border-yellow-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</a>
