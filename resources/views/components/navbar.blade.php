<header class="fixed w-full top-0 z-999">
    <nav class="bg-white p-6 container rounded-b-xl ml-auto mr-auto">
        <div class="w-full flex justify-between">
            <div class="w-full flex gap-10">
                {{-- <a href="{{ url('/') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto">
                    Logo
                </a> --}}
                <ul class="flex gap-10">
                    <x-nav-item href="{{ url('/') }}">Home</x-nav-item>
                    <x-nav-item href="{{ url('#skill') }}">Skill</x-nav-item>
                    <x-nav-item href="{{ url('#resume') }}">Resume</x-nav-item>
                    <x-nav-item href="{{ url('#project') }}">Project</x-nav-item>
                    <x-nav-item href="{{ url('#contact') }}">Contact</x-nav-item>
                </ul>
            </div>
            <div class="flex items-center">
                <div class="relative inline-block text-left" x-data="{ isOn: false }">
                    <div>
                        <button type="button" class="inline-flex w-full justify-center items-center gap-x-1.5 font-bold"
                            id="menu-button" @click="isOn = !isOn" :aria-expanded="isOn" :aria-haspopup="isOn">
                            Options
                            <svg class="-mr-1 size-5 text-gray-400 transition-all duration-200"
                                :class="{'-rotate-180': isOn, 'rotate-0': !isOn }" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                        x-show="isOn" x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-0">Account settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-1">Support</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-2">License</a>
                            <form method="POST" action="#" role="none">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>