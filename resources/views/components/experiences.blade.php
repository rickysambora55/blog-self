<x-section-wrapper-wide>
    <x-slot:section>projects</x-slot:section>
    <div class="w-full">
        <div class="w-full flex justify-center">
            <x-section-title>Background & Experiences</x-section-title>
        </div>

        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
            <!-- Experience -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-amber-500">Experience</h2>
                <div class="space-y-6">
                    <x-experience-item class="border-amber-400">
                        <x-slot:title>Lorem Ipsum Dolor</x-slot:title>
                        <x-slot:company>Lorem Company</x-slot:company>
                        <x-slot:date>Jan 2020 - Aug 2020</x-slot:date>
                        <x-slot:content>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facilis.
                        </x-slot:content>
                    </x-experience-item>
                </div>
            </div>

            <!-- Education -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-blue-500">Education</h2>
                <div class="space-y-6">
                    <x-experience-item class="border-blue-400">
                        <x-slot:title>Lorem Ipsum Dolor</x-slot:title>
                        <x-slot:company>Lorem Company</x-slot:company>
                        <x-slot:date>Jan 2020 - Aug 2020</x-slot:date>
                        <x-slot:content>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facilis.
                        </x-slot:content>
                    </x-experience-item>
                </div>
            </div>
        </div>

    </div>
</x-section-wrapper-wide>