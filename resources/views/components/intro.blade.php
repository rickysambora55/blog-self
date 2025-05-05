@props(['profile'])

<x-section-wrapper>
    <x-slot:section>intro</x-slot:section>
    <div class="w-full max-w-1/3">
        <div class="flex w-full h-2/3 md:h-full items-center justify-start">
            @if(isset($profile['filename2']) && !empty($profile['filename2']))
            <img src="{{url('/storage/' . $profile['filename2'])}}" class="h-auto max-h-full aspect-auto object-top"
                alt="User Picture" />
            @else
            <img src="{{url('/img/profiles/Person_2.webp')}}" class="h-auto max-h-full aspect-auto object-top"
                alt="User Picture" />
            @endif
        </div>
    </div>
    <div class="w-full">
        <x-section-title>About Me</x-section-title>

        <div class="text-justify">
            {{$profile['bio']}}
        </div>
    </div>
</x-section-wrapper>