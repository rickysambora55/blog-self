<x-admin-layout>
    <div class="flex flex-col px-4" x-data="{ modalOn: false, stiff: true }">
        <form>
            <x-modal x-bind:modalOn="modalOn" x-bind:stiff="false" title="Add Project"
                message="Add new project to your portfolio profile." confirmText="Save" cancelText="Cancel"
                color="primary">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" aria-label="Title"
                            class="p-2 border border-gray-300 rounded-md"
                            value="{{ isset($profile['title']) ? $profile['title'] : ''}}"
                            placeholder="Portfolio Website" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="type">Type</label>
                        <input type="type" name="type" id="type" aria-label="Type"
                            class="p-2 border border-gray-300 rounded-md"
                            value="{{ isset($profile['type']) ? $profile['type'] : ''}}" placeholder="Website" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="description">Description</label>
                        <textarea rows="4" name="description" id="description" aria-label="Description"
                            class="p-2 border border-gray-300 rounded-md"
                            value="{{ isset($profile['description']) ? $profile['description'] : ''}}"
                            placeholder="This is a description of the project"></textarea>
                    </div>
                </div>
            </x-modal>
        </form>

        <div class="flex my-4 items-center justify-end">
            <button class="py-2 px-3 hover:cursor-pointer rounded-md primary" x-on:click="modalOn = true">
                Add Project
            </button>
        </div>
        <x-table :projects="$projects"></x-table>
    </div>
</x-admin-layout>