@props(['works', 'studies'])

<x-section-wrapper-wide>
    <x-slot:section>experiences</x-slot:section>
    <div class="w-full">
        <div class="w-full flex justify-center">
            <x-section-title>Background & Experiences</x-section-title>
        </div>

        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
            <!-- Education -->
            <div class="relative" x-data="{
                isStudyBottom: false,
                checkScroll() {
                    const container = $refs.container;
                    this.isStudyBottom = container.scrollHeight - container.scrollTop === container.clientHeight;
                }
            }">
                <h2 class="text-2xl font-bold mb-4 text-blue-500">Education</h2>
                <div x-ref="container" @scroll="checkScroll" class="space-y-6 h-full max-h-112 overflow-y-auto">
                    @foreach ($studies as $study)
                    <x-experience-item class="border-blue-400">
                        <x-slot:title>{{$study['title']}}</x-slot:title>
                        <x-slot:company>{{$study['company']}}</x-slot:company>
                        <x-slot:date>{{$study['formatted_date']}}</x-slot:date>
                        <x-slot:content> {{$study['description']}} </x-slot:content>
                    </x-experience-item>
                    @endforeach
                    @if (count($studies) > 2)
                    <div x-show="!isStudyBottom"
                        class="absolute bottom-0 left-0 w-full h-12 bg-gradient-to-t from-blue-200 via-transparent to-transparent pointer-events-none">
                    </div>
                    @endif
                </div>
            </div>

            <!-- Experience -->
            <div class="relative" x-data="{
                isWorkBottom: false,
                checkScroll() {
                    const container = $refs.container;
                    this.isWorkBottom = container.scrollHeight - container.scrollTop === container.clientHeight;
                }
            }">
                <h2 class="text-2xl font-bold mb-4 text-amber-500">Experience</h2>
                <div x-ref="container" @scroll="checkScroll" class="space-y-6 h-full max-h-112 overflow-y-auto">
                    @foreach ($works as $work)
                    <x-experience-item class="border-amber-400">
                        <x-slot:title>{{$work['title']}}</x-slot:title>
                        <x-slot:company>{{$work['company']}}</x-slot:company>
                        <x-slot:date>{{$work['formatted_date']}}</x-slot:date>
                        <x-slot:content> {{$work['description']}} </x-slot:content>
                    </x-experience-item>
                    @endforeach
                    @if (count($works) > 2)
                    <div x-show="!isWorkBottom"
                        class="absolute bottom-0 left-0 w-full h-12 bg-gradient-to-t from-amber-200 via-transparent to-transparent pointer-events-none">
                    </div>
                    @endif
                </div>
            </div>


        </div>

    </div>
</x-section-wrapper-wide>