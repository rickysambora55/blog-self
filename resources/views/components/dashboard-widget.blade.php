@props(['title', 'count', 'icon'])

<div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
    <div>
        <h3 class="text-sm text-gray-500">{{ $title }}</h3>
        <p class="text-2xl font-bold">{{ $count }}</p>
    </div>
    <div class="text-gray-400 text-3xl">
        <i class="{{ $icon }}"></i>
    </div>
</div>