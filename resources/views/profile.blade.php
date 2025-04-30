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
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['bio']) ? $profile['bio'] : ''}}"
                        placeholder="Tell us a little about yourself"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="address">Address</label>
                    <textarea rows="2" name="address" id="address" aria-label="Address"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['address']) ? $profile['address'] : ''}}"
                        placeholder="Sumpah Pemuda Street, Jakarta"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" aria-label="Website"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['website']) ? $profile['website'] : ''}}"
                        placeholder="https://example.com" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="github">Github</label>
                    <input type="text" name="github" id="github" aria-label="Github"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['github']) ? $profile['github'] : ''}}"
                        placeholder="https://github.com/johndoe" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" aria-label="LinkedIn"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['linkedin']) ? $profile['linkedin'] : ''}}"
                        placeholder="https://linkedin.com/in/johndoe" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" aria-label="Instagram"
                        class="p-2 border border-gray-300 rounded-md"
                        value="{{ isset($profile['instagram']) ? $profile['instagram'] : ''}}"
                        placeholder="https://instagram.com/johndoe" />
                </div>
                <button type="submit" class="mt-6 p-2 bg-amber-900 text-white rounded-md">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>