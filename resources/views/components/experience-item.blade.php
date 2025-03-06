<div {{ $attributes->merge(['class' => 'bg-white p-4 shadow-md rounded-lg border-l-4 pl-4']) }}>
    <h3 class="text-lg font-semibold">{{$title}}</h3>
    <p class="text-sm font-medium text-gray-700">{{$company}}</p>
    <p class="text-sm text-gray-500">{{$date}}</p>
    <p class="text-sm text-gray-600">{{$content}}</p>
</div>