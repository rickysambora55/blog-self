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
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-amber-100">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-amber-50 border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Website Portfolio
                        </th>
                        <td class="px-6 py-4">
                            Website
                        </td>
                        <td class="px-6 py-4">
                            Super website
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>