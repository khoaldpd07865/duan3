<button
    {{ $attributes->merge(['class' => 'bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded']) }}>
    {{ $slot }}
</button>