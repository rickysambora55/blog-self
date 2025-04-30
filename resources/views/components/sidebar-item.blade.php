@props([
'icon' => 'fa-house',
'label' => 'Menu',
'route' => '#',
])

<li>
    <a href="{{ $route }}"
        class="flex items-center px-2 py-3 text-gray-900 rounded-lg dark:text-white hover:bg-amber-100/50 dark:hover:bg-gray-700 group gap-3">
        <i class="fa-solid {{ $icon }} w-4 h-4 text-center"></i>
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ $label }}</span>
    </a>
</li>