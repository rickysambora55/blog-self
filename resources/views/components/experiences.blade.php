@props(['works', 'studies'])

<x-section-wrapper-wide>
    <x-slot:section>experiences</x-slot:section>
    <div class="w-full">
        <div class="w-full flex justify-center">
            <x-section-title>Background & Experiences</x-section-title>
        </div>

        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
            <!-- Education -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-blue-500">Education</h2>
                <div class="space-y-6">
                    @foreach ($studies as $study)
                    <x-experience-item class="border-blue-400">
                        <x-slot:title>{{$study['title']}}</x-slot:title>
                        <x-slot:company>{{$study['company']}}</x-slot:company>
                        <x-slot:date>{{$study['formatted_date']}}</x-slot:date>
                        <x-slot:content> {{$study['description']}} </x-slot:content>
                    </x-experience-item>
                    @endforeach
                </div>
            </div>

            <!-- Experience -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-amber-500">Experience</h2>
                <div class="space-y-6">
                    @foreach ($works as $work)
                    <x-experience-item class="border-amber-400">
                        <x-slot:title>{{$work['title']}}</x-slot:title>
                        <x-slot:company>{{$work['company']}}</x-slot:company>
                        <x-slot:date>{{$work['formatted_date']}}</x-slot:date>
                        <x-slot:content> {{$work['description']}} </x-slot:content>
                    </x-experience-item>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</x-section-wrapper-wide>