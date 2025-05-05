@php
$colors = [
'success' => ['bg' => 'bg-green-100', 'border'=> 'border-green-400', 'iconColor' => 'text-green-500', 'icon' =>
'fa-circle-check'],
'error' => ['bg' => 'bg-red-100', 'border'=> 'border-red-400', 'iconColor' => 'text-red-500', 'icon' =>
'fa-triangle-exclamation'],
];
@endphp

<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
    x-transition.opacity.duration.300ms
    class="fixed bottom-5 right-5 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-800 bg-white ring ring-gray-200 border-r-3 border-b-2 {{ $colors[$type]['border']}} rounded-xl shadow-md"
    role="alert">

    <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 rounded-full {{ $colors[$type]['bg'] }}">
        <i class="fa-solid {{ $colors[$type]['icon'] }} {{ $colors[$type]['iconColor'] }} text-lg"></i>
    </div>

    <div class="ms-4 text-sm font-medium">
        {{ $message }}
    </div>

    <button @click="show = false" class="ms-auto text-gray-400 hover:text-gray-700 transition duration-150 ease-in-out">
        <i class="fa-solid fa-xmark text-lg"></i>
    </button>
</div>