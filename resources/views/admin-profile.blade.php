<x-admin-layout>
    <div class="flex flex-col px-4">
        <form>
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
                        class="p-2 border border-gray-300 rounded-md" placeholder="Tell us a little about yourself">{{ isset($profile['bio']) ? $profile['bio'] : ''}}
                    </textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="address">Address</label>
                    <textarea rows="2" name="address" id="address" aria-label="Address"
                        class="p-2 border border-gray-300 rounded-md" placeholder="Sumpah Pemuda Street, Jakarta">{{ isset($profile['address']) ? $profile['address'] : ''}}
                    </textarea>
                </div>
                <button type="submit" class="mt-6 p-2 bg-amber-900 text-white rounded-md">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>