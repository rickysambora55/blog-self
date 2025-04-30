<x-admin-layout>
    <div class="flex flex-col px-4">
        <div class="flex flex-col my-4 md:flex-row items-center justify-end">
            <button class="py-2 px-3 hover:cursor-pointer bg-amber-500 text-white rounded-md hover:bg-amber-600">Add
                Project</button>
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