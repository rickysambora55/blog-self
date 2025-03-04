<div class="flex flex-col items-center gap-2">
    <div class="w-24 h-24 flex items-center justify-center bg-gray-300 rounded-full">
        <img {{$attributes}} alt={{$slot}} class="w-16 h-16">
    </div>
    <span class="font-semibold text-lg">{{$slot}}</span>
</div>