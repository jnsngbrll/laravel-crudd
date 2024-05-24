<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-400 hover:bg-blue-300 text-white border border-blue-400 py-2 font-bold tracking-widest uppercase transition-all duration duration-300 rounded-md']) }}>
    {{ $slot }}
</button>
