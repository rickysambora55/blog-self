@props(['profile'])

<x-section-wrapper>
    <x-slot:section>intro</x-slot:section>
    @if(isset($profile['filename2']))
    <div class="w-full max-w-1/3">
        <div class="flex w-full h-2/3 md:h-full items-center justify-start">
            <img src="{{url('/img/profiles/' . $profile['filename2'])}}"
                class="h-auto max-h-full aspect-auto object-top" alt="User Picture" />
        </div>
    </div>
    @endif
    <div class="w-full  {{ empty($profile['filename2']) ? 'justify-center flex flex-col items-center' : '' }}">
        <x-section-title>About Me</x-section-title>

        <div class="text-justify">
            {{$profile['bio']}}
        </div>
    </div>
</x-section-wrapper>