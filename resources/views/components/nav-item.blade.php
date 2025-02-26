<li>
    <a {{$attributes}} class="font-bold">
        <div
            class="relative transition-color duration-300 hover:text-amber-400 before:transition-[width] before:ease-in-out before:duration-500 before:absolute before:bg-amber-400 before:origin-center before:h-[2px] before:w-0 hover:before:w-[100%] before:bottom-6 before:left-[0%] after:transition-[width] after:ease-in-out after:duration-500 after:absolute after:bg-amber-400 after:origin-center after:h-[2px] after:w-0 hover:after:w-[100%] after:-bottom-1 after:right-[0%]">
            <span>{{$slot}}</span>
        </div>
    </a>
</li>