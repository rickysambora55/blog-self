<div class="flex flex-col items-center gap-2">
    <div
        class="w-24 h-24 flex items-center justify-center bg-white rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
        <img {{$attributes}} alt="{{$slot}}" class="w-14 h-14">
    </div>
    <span class="font-semibold text-lg text-gray-800">{{$slot}}</span>
</div>