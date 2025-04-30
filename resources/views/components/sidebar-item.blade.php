@props([
'icon' => 'fa-house',
'label' => 'Menu',
'route' => '#',
'active' => false
])



<li>
    <a href="{{ $route }}"
        class="{{ $active ? 'bg-amber-500/70 text-black font-semibold' : '' }} flex items-center px-2 py-3 text-gray-900 rounded-lg hover:bg-amber-100/50 group gap-3">
        <i class="fa-solid {{ $icon }} w-4 h-4 text-center"></i>
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ $label }}</span>
    </a>
</li>