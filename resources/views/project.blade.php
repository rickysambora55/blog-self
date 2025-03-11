<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body class="flex flex-col gap-4 min-h-screen">
        <x-navbar></x-navbar>
        <article class="flex flex-col flex-grow p-12 mt-4">
            <div class="my-6 flex flex-col">
                <span class="font-bold text-3xl">{{$project['title']}}</span>
                <span class="text-md text-gray-700">{{$project['type']}}</span>
            </div>
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-full md:col-span-3 flex flex-col">
                    <div>
                        <div x-data="{
                            slides: {{ json_encode($project['images']) }},
                            currentSlideIndex: 1,
                            previous() {
                                if (this.currentSlideIndex > 1) {
                                    this.currentSlideIndex = this.currentSlideIndex - 1
                                } else {
                                    // If it's the first slide, go to the last slide
                                    this.currentSlideIndex = this.slides.length
                                }
                            },
                            next() {
                                if (this.currentSlideIndex < this.slides.length) {
                                    this.currentSlideIndex = this.currentSlideIndex + 1
                                } else {
                                    // If it's the last slide, go to the first slide
                                    this.currentSlideIndex = 1
                                }
                            },
                        }" class="relative w-full overflow-hidden">

                            <!-- previous button -->
                            <button type="button"
                                class="absolute left-5 top-1/2 z-20 flex rounded-sm -translate-y-1/2 items-center justify-center bg-white/40 p-1 text-neutral-600 transition hover:cursor-pointer hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                                aria-label="previous slide" x-on:click="previous()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                    fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>

                            <!-- next button -->
                            <button type="button"
                                class="absolute right-5 top-1/2 z-20 flex rounded-sm -translate-y-1/2 items-center justify-center bg-white/40 p-1 text-neutral-600 transition hover:cursor-pointer hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                                aria-label="next slide" x-on:click="next()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                    fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>

                            <!-- slides -->
                            <div class="relative min-h-[70svh] w-full">
                                <template x-for="(slide, index) in slides">
                                    <div x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                                        x-transition.opacity.duration.1000ms>
                                        <img class="absolute w-full h-full rounded-sm inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                                            x-bind:src="slide.filename" x-bind:alt="slide.alt" />
                                    </div>
                                </template>
                            </div>

                            <!-- indicators -->
                            <div class="absolute rounded-sm bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75"
                                role="group" aria-label="slides">
                                <template x-for="(slide, index) in slides">
                                    <button
                                        class="size-2 rounded-full transition bg-neutral-600 dark:bg-neutral-300 hover:cursor-pointer"
                                        x-on:click="currentSlideIndex = index + 1"
                                        x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']"
                                        x-bind:aria-label="'slide ' + (index + 1)"></button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="my-6 flex flex-col">
                        <span class="font-bold text-xl">Description</span>
                        <p class="text-base">
                            {{ $project['description'] }}
                        </p>
                    </div>
                </div>
                <div class="col-span-full md:col-span-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <span class="font-bold text-xl">Technologies Used</span>
                        <div class="flex gap-2 flex-wrap">
                            @foreach ($project['technologies'] as $tech)
                            <x-tech-item src="/img/tech/{{$tech['filename']}}.webp">
                                {{$tech['name']}}
                            </x-tech-item>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="font-bold text-xl">Links</span>
                        {{-- <ul class="list-disc list-inside text-base">
                            @if ($project['github'])
                            <li><a href="{{ $project['github'] }}">{{ $project['github'] }}</a></li>
                            @endif
                            @if ($project['website'])
                            <li><a href="{{ $project['website'] }}">{{ $project['website'] }}</a></li>
                            @endif
                        </ul> --}}
                    </div>
                </div>
        </article>
        <x-footer></x-footer>
    </body>

</html>