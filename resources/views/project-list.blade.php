<!DOCTYPE html>
<html lang="en">

    <x-header></x-header>

    <body class="flex flex-col gap-4 min-h-screen">
        <x-navbar></x-navbar>
        <article class="flex flex-col p-12 mt-12 container mx-auto justify-center">
            <div class="w-full flex justify-center">
                <x-section-title-big>My Projects</x-section-title-big>
            </div>
            <div class="w-full 2xl:px-2 flex flex-wrap justify-evenly gap-4 mt-6">
                @foreach ($projects as $project)
                <x-project-item href="project/{{$project['slug']}}" :images="$project['images']"
                    :technologies="$project['technologies']">
                    <x-slot:title>{{$project['title']}}</x-slot:title>
                    <x-slot:type>{{$project['type']}}</x-slot:type>
                    <x-slot:description>{{$project['description']}}</x-slot:description>
                </x-project-item>
                @endforeach
            </div>
        </article>
        <div class="flex flex-grow"></div>
        <x-footer></x-footer>
    </body>

</html>