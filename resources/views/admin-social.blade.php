<x-admin-layout>
    <div class="flex flex-col px-4">
        <form method="POST" action="{{ route('social.update') }}">
            @csrf
            <div class="flex flex-col gap-4">
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
                <button type="submit"
                    class="mt-6 p-2 bg-amber-900 text-white rounded-md hover:cursor-pointer">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>