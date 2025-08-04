@props(['href', 'icon'])

<a href="{{ $href }}" class="flex gap-2 items-center px-4 py-2 rounded-lg primary text-sm transition">
    <i class="{{ $icon }}"></i>{{ $slot }}
</a>