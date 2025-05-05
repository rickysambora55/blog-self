<!DOCTYPE html>
<html lang="en">

    <x-header></x-header>

    <body class="overflow-y-scroll" x-data="{ sidebarOn: window.innerWidth >= 640 }"
        @resize.window="if (window.innerWidth >= 640) {sidebarOn = true} else {sidebarOn = false}">
        {{-- <div x-show="sidebarOn || window.innerWidth >= 640" @click.outside="sidebarOn = false"
            class="relative z-50" :class="{ 'block': sidebarOn, 'hidden': !sidebarOn }" class="sm:block"> --}}
            <div class="relative z-100" @click.outside="sidebarOn = false"
                x-show="sidebarOn || window.innerWidth >= 640" x-transition:enter="transition duration-200"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-200" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full">
                <aside id="sidebar-menu" :class="sidebarOn ? 'translate-x-0' : '-translate-x-full'"
                    class="fixed top-0 left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 duration-200 shadow-md"
                    aria-label="Sidebar">
                    <div
                        class="h-full px-3 py-8 overflow-y-auto sidebar-scroll bg-gradient-to-br from-amber-300 via-amber-200 to-amber-300">
                        <ul class=" flex flex-col gap-1">
                            <x-sidebar-item icon="fa-house" label="Dashboard" route="{{ route('admin') }}"
                                :active="Route::is('admin')" />
                            <x-sidebar-item icon="fa-user" label="Profile" route="{{ route('admin-profile') }}"
                                :active="Route::is('admin-profile')" />
                            <x-sidebar-item icon="fa-diagram-project" label="Project"
                                route="{{ route('admin-project') }}" :active="Route::is('admin-project')" />
                            <x-sidebar-item-collapsible icon="fa-building" label="Experience" :items="[
                            ['route' => route('admin'), 'text' => 'Work', 'active' => Route::is('admin')],
                            ['route' => route('admin'), 'text' => 'Education', 'active' => Route::is('admin')],
                        ]" />
                            <x-sidebar-item icon="fa-hand" label="Social Media" route="{{ route('admin-social') }}"
                                :active="Route::is('admin-social')" />
                            <span class="font-medium mt-4">Database</span>
                            <x-sidebar-item icon="fa-cubes" label="Technology" route="{{ route('admin') }}" />
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="sm:ml-64">
                <div class="sticky w-full px-8 py-6 top-0 bg-white shadow-md z-50">
                    <div class="container flex justify-between">
                        <div class="w-full flex gap-6">
                            <button data-drawer-target="sidebar-menu" data-drawer-toggle="sidebar-menu"
                                aria-controls="sidebar-menu" type="button" @click="sidebarOn = !sidebarOn"
                                class="inline-flex items-center p-0 text-gray-600 sm:hidden hover:cursor-pointer hover:text-gray-400">
                                <span class="sr-only">Open sidebar</span>
                                <i class="fa-solid fa-bars text-xl"></i>
                            </button>
                            <div class="flex items-center text-gray-400 gap-2">
                                Dashboard
                                @if (Request::segment(2))
                                <span class="font-light">/</span>
                                <span class="{{ Request::segment(3) ? 'text-gray-400' : 'text-black' }}">
                                    {{ ucfirst(Request::segment(2)) }}
                                </span>
                                @endif
                                @if (Request::segment(3))
                                <span class="font-light">/</span>
                                <span class="text-black">{{ ucfirst(Request::segment(3)) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="relative inline-block text-left" x-data="{ isOn: false }"
                                @click.outside="isOn = false">
                                <div>
                                    <button type="button"
                                        class="inline-flex w-full cursor-pointer justify-center items-center gap-x-1.5"
                                        id="menu-button" @click="isOn = !isOn" :aria-expanded="isOn"
                                        :aria-haspopup="isOn">
                                        Username
                                        <i class="fa-solid fa-chevron-down transition-all duration-200 text-xs"
                                            :class="{'-rotate-180': isOn, 'rotate-0': !isOn }"></i>
                                    </button>
                                </div>

                                <div class="absolute right-0 z-10 mt-2 w-auto origin-top-right rounded-md bg-white ring-none shadow-lg focus:outline-hidden"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                                    x-show="isOn" x-cloak
                                    x-transition:enter="transition ease-out duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75 transform"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95">
                                    <div class="py-1" role="none" x-data="{ isHover: false }">
                                        <x-dropdown-item href="#">Logout</x-dropdown-item>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    {{$slot}}
                </div>
            </div>
            <div x-show="sidebarOn" class="bg-gray-900/50 sm:hidden fixed inset-0 z-60"></div>
    </body>

    @if (session('success'))
    <x-toast type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
    <x-toast type="error" :message="$errors->first()" />
    @endif

</html>