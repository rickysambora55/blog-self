@props(['projects'])

<x-section-wrapper-wide>
    <x-slot:section>projects</x-slot:section>
    <div class="w-full">
        <div class="w-full flex justify-center">
            <x-section-title>My Projects</x-section-title>
        </div>

        <div class="w-full 2xl:px-2 flex flex-wrap justify-evenly gap-8 mt-6">
            @foreach ($projects as $project)
            <x-project-item :images="$project['images']" :technologies="$project['technologies']">
                <x-slot:title>{{$project['title']}}</x-slot:title>
                <x-slot:type>{{$project['type']}}</x-slot:type>
                <x-slot:description>{{$project['description']}}</x-slot:description>
            </x-project-item>
            @endforeach
        </div>

    </div>
</x-section-wrapper-wide>