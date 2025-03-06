<a {{ $attributes }} class="hover:scale-110 transition">
    <svg class="w-6 h-6 fill-current text-white hover:text-gray-200" xmlns="http://www.w3.org/2000/svg"
        viewBox="{{ $viewBox }}">
        {{ $slot }}
    </svg>
</a>