@props(['profile'])

<section class="w-full h-184 px-32 bg-gray-100" id="home">
    <div class="container h-full py-24 flex flex-col md:flex-row gap-8 mx-auto items-center">
        <div class="flex flex-col w-full justify-center text-center md:text-left">
            <span class="text-2xl">Hi, I'm</span>
            <span class="text-6xl font-extrabold">{{$profile['name']}}</span>
            <span class="text-xl">I'am a <span class="font-bold">{{$profile['title']}}</span></span>
        </div>
        <div class="flex w-full h-2/3 md:h-full items-center justify-end">
            <img src="{{url('/img/Person_Hero.webp')}}" class="h-auto max-h-full aspect-auto object-top"
                alt="User Picture" />
        </div>
    </div>
</section>