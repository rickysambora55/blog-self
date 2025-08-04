<x-admin-layout>
    <div class="flex flex-col px-4">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" aria-label="Name"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['name']) ? $profile['name'] : ''}}" placeholder="John Doe" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" aria-label="Email"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['email']) ? $profile['email'] : ''}}" placeholder="john@example.com" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" aria-label="Title"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['title']) ? $profile['title'] : ''}}"
                        placeholder="Software Engineer" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bio">Bio</label>
                    <textarea rows="4" name="bio" id="bio" aria-label="Bio"
                        class="p-2 border border-gray-300 rounded-md"
                        placeholder="Tell us a little about yourself">{{ isset($profile['bio']) ? $profile['bio'] : ''}}</textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="address">Address</label>
                    <textarea rows="2" name="address" id="address" aria-label="Address"
                        class="p-2 border border-gray-300 rounded-md"
                        placeholder="Sumpah Pemuda Street, Jakarta">{{ isset($profile['address']) ? $profile['address'] : ''}}</textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" aria-label="Phone"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['phone']) ? $profile['phone'] : ''}}" placeholder="081234567890" />
                </div>
                @php
                $selectedTechIds = $profile->technologies->pluck('id')->toArray();
                @endphp

                <div class="mb-4">
                    <span>Skills</span>
                    <div x-data="{
                        selected: {{ json_encode($selectedTechIds) }},
                    }" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <template x-for="tech in {{ json_encode($technologies) }}" :key="tech.id">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" :value="tech.id" x-model="selected" name="technologies[]"
                                    class="rounded border-gray-300">
                                <span x-text="tech.name"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 justify-evenly w-full">
                    <div class="w-full">
                        @if(!empty($profile['filename1']))
                        <div>
                            <label class="font-semibold">Current Landing Image:</label>
                            <img src="{{ asset('/storage/' . $profile['filename1']) }}"
                                class="w-auto h-48 rounded-md mt-2">
                        </div>
                        @endif
                        <div class="flex flex-col gap-2 w-full">
                            <label for="filename1">Landing Image</label>
                            <input type="file" name="filename1" id="filename1" accept="image/*"
                                class="p-2 border border-gray-300 rounded-md hover:cursor-pointer" />
                        </div>
                    </div>

                    <div class="w-full">
                        @if(!empty($profile['filename2']))
                        <div>
                            <label class="font-semibold">Current Bio Image:</label>
                            <img src="{{ asset('/storage/' . $profile['filename2']) }}"
                                class="w-auto h-48 rounded-md mt-2">
                        </div>
                        @endif
                        <div class="flex flex-col gap-2 w-full">
                            <label for="filename2">Bio Image</label>
                            <input type="file" name="filename2" id="filename2" accept="image/*"
                                class="p-2 border border-gray-300 rounded-md hover:cursor-pointer" />
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="mt-6 p-2 bg-amber-900 text-white rounded-md hover:cursor-pointer">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>