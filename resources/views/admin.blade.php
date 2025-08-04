<x-admin-layout>
    <div class="space-y-6">

        {{-- Summary Widgets --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-dashboard-widget title="Projects" :count="$projectsCount" icon="fas fa-briefcase" />
            <x-dashboard-widget title="Technologies" :count="$techCount" icon="fas fa-microchip" />
            <x-dashboard-widget title="Experiences" :count="$experienceCount" icon="fas fa-building" />
            <x-dashboard-widget title="Educations" :count="$educationCount" icon="fas fa-user-graduate" />
        </div>

        {{-- Quick Actions --}}
        <div class="flex flex-wrap gap-2">
            <x-button-link href="{{ route('admin-project') }}" icon="fas fa-plus">Add Project</x-button-link>
            <x-button-link href="{{ route('admin-technology') }}" icon="fas fa-plus">Add Technology</x-button-link>
            <x-button-link href="{{ route('admin-work') }}" icon="fas fa-plus">Add Experience</x-button-link>
            <x-button-link href="{{ route('admin-profile') }}" icon="fas fa-user-edit">Edit Profile</x-button-link>
        </div>

        {{-- Recent Projects --}}
        <div>
            <h2 class="text-lg font-semibold mb-2">📌 Recent Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($recentProjects as $project)
                <x-card>
                    <h3 class="text-md font-medium">{{ $project->title }}</h3>
                    <p class="text-sm text-gray-500">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('admin-project', $project) }}"
                        class="text-amber-500 text-sm mt-2 inline-block">Edit</a>
                </x-card>
                @endforeach
            </div>
        </div>

        {{-- Profile Overview --}}
        <div>
            <h2 class="text-lg font-semibold mb-2">👤 Profile Overview</h2>
            <x-card>
                <h3 class="text-xl font-bold">{{ $profile->name }}</h3>
                <p class="text-gray-500">{{ $profile->title }}</p>
                <p class="mt-2">{{ $profile->bio }}</p>
                <a href="{{ route('admin-profile') }}" class="text-amber-500 text-sm mt-2 inline-block">Edit Profile</a>
            </x-card>
        </div>
    </div>
</x-admin-layout>