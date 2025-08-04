@props(['profile'])

<section class="relative w-full h-[46rem] bg-gradient-to-br from-amber-100 to-gray-100 overflow-hidden" id="home">
    {{-- Decorative circle --}}
    <div class="absolute w-96 h-96 bg-amber-300 rounded-full -top-24 -left-24 opacity-30 blur-3xl"></div>
    <div class="absolute w-72 h-72 bg-amber-400 rounded-full -bottom-24 -right-24 opacity-30 blur-2xl"></div>

    <div class="container mx-auto h-full px-6 lg:px-32 py-24 flex flex-col-reverse md:flex-row items-center gap-12">
        {{-- Text --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center md:items-start text-center md:text-left">
            <p class="text-xl text-amber-700 mb-2 animate-fade-in">Hi, I'm</p>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight animate-slide-up">
                {{$profile['name']}}
            </h1>
            <p class="text-lg lg:text-2xl text-gray-700 mt-4 animate-slide-up delay-100">
                I'm a <span class="font-bold text-amber-800">{{$profile['title']}}</span>
            </p>
            <a href="#intro"
                class="mt-8 inline-block bg-amber-600 hover:bg-amber-500 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition duration-300 animate-fade-in delay-200">
                Learn More
            </a>
        </div>

        {{-- Image --}}
        <div class="flex w-full h-2/3 md:h-full items-center justify-end">
            @if(isset($profile['filename1']) && !empty($profile['filename1']))
            <img src="{{url('/storage/' . $profile['filename1'])}}" class="h-auto max-h-full aspect-auto object-top"
                alt="User Picture" />
            @else
            <img src="{{url('/img/profiles/Person_Hero.webp')}}" class="h-auto max-h-full aspect-auto object-top"
                alt="User Picture" />
            @endif
        </div>
    </div>
</section>