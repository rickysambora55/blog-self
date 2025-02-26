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
            <div class="flex items-center gap-x-4">
                Lang
            </div>
        </div>
    </nav>
</header>