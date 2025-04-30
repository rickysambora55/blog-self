@props([
'icon' => 'fa-house',
'label' => 'Menu',
'items' => [], // ['route' => '#', 'text' => 'Submenu']
])

<li x-data="{ open: false }">
    <button type="button" @click="open = !open"
        class="flex items-center w-full px-2 py-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-amber-100/50 dark:text-white dark:hover:bg-gray-700 gap-3 hover:cursor-pointer">
        <i class="fa-solid {{ $icon }} w-4 h-4 text-center"></i>
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ $label }}</span>
        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-200"
            :class="{ 'rotate-180': open }"></i>
    </button>
    <ul x-show="open" x-transition class="py-2 space-y-1" x-cloak>
        @foreach ($items as $item)
        <li>
            <a href="{{ $item['route'] }}"
                class="flex items-center w-full p-2 pl-8 text-gray-900 transition duration-75 rounded-lg group hover:bg-amber-100/50 dark:text-white dark:hover:bg-gray-700 gap-3">
                <i class="fa-solid fa-o text-xs w-4 h-2 text-center"></i>
                {{ $item['text'] }}
            </a>
        </li>
        @endforeach
    </ul>
</li>