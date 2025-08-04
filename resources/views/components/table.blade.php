@props([
'items' => [],
'headers' => [],
'columnsKey' => [],
'imagePath' => '',
'actions' => [],
])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-amber-100">
            <tr>
                @foreach ($headers as $header)
                <th scope="col" class="px-6 py-4">
                    {{ $header }}
                </th>
                @endforeach
                @if (!empty($actions))
                <th scope="col" class="px-6 py-4">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr class="odd:bg-white even:bg-amber-50 border-b border-gray-200">
                @foreach ($columnsKey as $column)
                <td class="px-6 py-4">
                    @php
                    $value = $item[$column];
                    $isImage = is_string($value) && (Str::startsWith($value, ['http', '/']) || Str::contains($value,
                    ['.jpg', '.jpeg', '.png', '.webp', '.gif']));
                    @endphp

                    @if ($isImage)
                    <img src="{{ $imagePath.$value }}" alt="Image" class="w-12 h-12 object-cover rounded">
                    @else
                    {{ $value }}
                    @endif
                </td>
                @endforeach
                @if (!empty($actions))
                <td class="flex flex-col xl:flex-row px-6 py-4 gap-2">
                    @foreach ($actions as $action)
                    @if ($action == 'edit')
                    <button @click="setItem(@js($item), true); modalOn = true"
                        class="text-blue-600 hover:underline hover:cursor-pointer">
                        Edit
                    </button>
                    @endif
                    @if ($action == 'delete')
                    <button @click="setItem(@js($item), false); modalOn = true"
                        class="text-red-600 hover:underline hover:cursor-pointer">
                        Delete
                    </button>
                    @endif
                    @endforeach
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>