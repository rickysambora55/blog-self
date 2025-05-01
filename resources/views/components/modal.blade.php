@props([
'title' => 'Modal Title',
'message' => 'Are you sure?',
'confirmText' => 'Confirm',
'color' => 'secondary',
'cancelText' => 'Cancel',
'icon' => false,
'iconColor' => 'bg-red-100',
'iconClass' => 'fa-exclamation'
])

<div x-show="modalOn" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="relative z-100"
    aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>

    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"
        @click.outside="!stiff ? modalOn = false : ''">
    </div>

    <div class="fixed inset-0 z-100 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div @click.stop
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                        @if($icon)
                        <div
                            class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full {{ $iconColor }} sm:mx-0 sm:size-10">
                            <i class="fa-solid {{ $iconClass }} h-4 w-4 text-lg text-center"></i>
                        </div>
                        @endif
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">{{ $title }}</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{ $slot }}
                    </div>
                </div>
                <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" x-on:click="modalOn = false"
                        class="inline-flex w-full justify-center rounded-md {{ $color }} px-3 py-2 text-sm font-semibold text-white shadow-xs sm:ml-3 sm:w-auto hover:cursor-pointer">
                        {{ $confirmText }}
                    </button>
                    <button type="button" x-on:click="modalOn = false"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto hover:cursor-pointer">
                        {{ $cancelText }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>