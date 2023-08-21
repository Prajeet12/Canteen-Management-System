<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex  items-center px-6 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-800 focus:bg-cyan-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
