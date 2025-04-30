@props(['profile','works', 'studies', 'projects'])
<header class="fixed w-full top-0 z-999">
    <div class="mx-auto w-full max-w-screen-xl">
        <nav class="bg-white p-6 px-12 rounded-b-xl shadow-md">
            <div class="container flex justify-between ml-auto mr-auto">
                <div class="w-full flex gap-10">
                    {{-- <a href="{{ url('/') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto">
                        Logo
                    </a> --}}
                    <ul class="flex gap-10">
                        <x-nav-item href="{{ url('/') }}">Home</x-nav-item>
                        @if(Request::is('/'))
                        @if(isset($profile['technologies']))
                        <x-nav-item href="{{ url('#skills') }}">Skills</x-nav-item>
                        @endif
                        @if((isset($works) && $works->isNotEmpty()) || (isset($studies) && $studies->isNotEmpty()))
                        <x-nav-item href="{{ url('#experiences') }}">Experiences</x-nav-item>
                        @endif
                        @if(isset($projects) && $projects->isNotEmpty())
                        <x-nav-item href="{{ url('#projects') }}">Projects</x-nav-item>
                        @endif
                        <x-nav-item href="{{ url('#contact') }}">Contact</x-nav-item>
                        @endif
                    </ul>
                </div>
                <div class="flex items-center">
                    <div class="relative inline-block text-left" x-data="{ isOn: false }" @click.outside="isOn = false">
                        <div>
                            <button type="button"
                                class="inline-flex w-full cursor-pointer justify-center items-center gap-x-1.5 font-bold"
                                id="menu-button" @click="isOn = !isOn" :aria-expanded="isOn" :aria-haspopup="isOn">
                                Lang
                                <svg class="-mr-1 size-5 text-gray-400 transition-all duration-200"
                                    :class="{'-rotate-180': isOn, 'rotate-0': !isOn }" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-none shadow-lg focus:outline-hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                            x-show="isOn" x-cloak x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                            <div class="py-1" role="none" x-data="{ isHover: false }">
                                <x-dropdown-item href="#">English</x-dropdown-item>
                                <x-dropdown-item href="#">Indonesia</x-dropdown-item>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>