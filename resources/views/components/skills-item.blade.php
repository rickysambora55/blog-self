<div class="flex flex-col items-center gap-2">
    <div class="relative flex items-center justify-center">
        <svg class="text-white w-24" viewBox="17.48 12.57 81.35 88.22">
            <path fill="currentColor"
                d="M89.8169 85.345L65.5127 98.7562C60.3865 101.585 54.145 101.463 49.1422 98.4367L25.3831 84.1077C20.3803 81.0815 17.3725 75.6305 17.4795 69.7846L18.0246 42.0444C18.1316 36.1985 21.3562 30.8531 26.4824 28.0244L50.7866 14.6132C55.9128 11.7846 62.1543 11.9065 67.1571 14.9327L90.9162 29.2617C95.919 32.2879 98.9268 37.7389 98.8198 43.5848L98.2747 71.325C98.1677 77.1709 94.9431 82.5163 89.8169 85.345Z">
            </path>
        </svg>
        <x-tech-item {{$attributes}} class="absolute h-14 w-14">{{$slot}}</x-tech-item>
    </div>
    <span class="font-semibold text-lg text-gray-800">{{$slot}}</span>
</div>