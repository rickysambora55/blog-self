@props(['projects'])

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
            @foreach ($projects as $project)
            <tr class="odd:bg-white even:bg-amber-50 border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $project['title'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $project['type'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $project['description'] }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>