@props(['profile'])

<x-section-wrapper-wide class="bg-gradient-to-b from-amber-200 to-amber-100">
    <x-slot:section>skills</x-slot:section>
    <div class="w-full">
        <div class="w-full flex justify-center">
            <x-section-title>My Skills</x-section-title>
        </div>

        <div class="w-full flex flex-wrap justify-center gap-10 mt-6">
            @foreach ($profile['technologies'] as $skill)
            <x-skills-item src="/storage/{{$skill['filename']}}">{{$skill['name']}}</x-skills-item>
            @endforeach
        </div>
    </div>
</x-section-wrapper-wide>