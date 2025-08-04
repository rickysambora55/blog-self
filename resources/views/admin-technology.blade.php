<x-admin-layout>
    <div class="flex flex-col px-4" x-data="{
        modalOn: false,
        stiff: true,
        id: null,
        name: '',
        filename: '',
        isEditing: false,
        isDestroy: false,
        modalTitle: 'Default Title',
        modalMessage: 'Default message here.',
        modalConfirmText: 'Confirm',
        modalCancelText: 'Cancel',
        modalColor: 'primary',
        modalIcon: false,
        modalIconClass: 'fa-exclamation',
        modalIconColor: 'bg-red-100',
        modalIsForm: false,
        errors: { name: '', filename: ''},
        setItem(item, isEditing = false) {
            this.id = item.id;
            this.name = item.name;
            this.filename = item.filename;
            this.isEditing = isEditing;
            this.isDestroy = !isEditing;
            if (isEditing) {
                this.modalTitle = 'Edit Technology';
                this.modalMessage = 'Edit the technology details and save the changes.';
                this.modalConfirmText = 'Save';
                this.modalColor = 'primary';
                this.modalIcon = false;
                this.modalIconClass = 'fa-edit';
                this.modalIconColor = 'bg-blue-100';
                this.modalIsForm = true;
            } else if (this.isDestroy) {
                this.modalTitle = 'Delete Technology';
                this.modalMessage = `Delete technology from database.`;
                this.modalConfirmText = 'Delete';
                this.modalColor = 'danger';
                this.modalIcon = true;
                this.modalIconClass = 'fa-trash';
                this.modalIconColor = 'bg-red-100';
                this.modalIsForm = true;
            };
        },
        resetForm() {
            this.id = null;
            this.name = '';
            this.filename = '';
            this.errors = { name: '', filename: ''};
            this.isEditing = false;
            this.isDestroy = false;
            this.modalTitle = 'Add Technology';
            this.modalMessage = 'Add a new technology to database.';
            this.modalConfirmText = 'Save';
            this.modalColor = 'primary';
            this.modalIcon = false;
            this.modalIconClass = 'fa-plus';
            this.modalIconColor = 'bg-green-100';
            this.modalIsForm = true;
        },
        validate() {
            this.errors.name = this.name.trim() === '' ? 'Name is required' : '';
            const file = this.$refs.fileInput.files[0];
            this.errors.filename = (!this.isEditing && !file) ? 'Image is required' : '';

            return !Object.values(this.errors).some(error => error !== '');
        },
    }">
        <form method="POST" enctype="multipart/form-data" :action="isEditing
        ? '{{ route('technology.update', '') }}/' + id
        : (isDestroy
            ? '{{ route('technology.destroy', '') }}/' + id
            : '{{ route('technology.store') }}')"
            @submit.prevent="if (!isDestroy && !validate()) return; $el.submit()">
            @csrf
            <template x-if="isEditing">
                <input type="hidden" name="_method" value="PATCH" />
            </template>
            <template x-if="isDestroy">
                <input type="hidden" name="_method" value="DELETE" />
            </template>
            <x-modal x-bind:modalOn="modalOn" x-bind:modalTitle="modalTitle" x-bind:modalMessage="modalMessage"
                x-bind:modalConfirmText="modalConfirmText" x-bind:modalCancelText="'Cancel'"
                x-bind:modalColor="modalColor" x-bind:modalIcon="modalIcon" x-bind:modalIconClass="modalIconClass"
                x-bind:modalIconColor="modalIconColor" x-bind:modalIsForm="true">
                <div x-show="isDestroy">
                    <span class="flex flex-col">
                        <span class="font-bold" x-text="name"></span>
                        Are you sure you want to delete this technology? This action is irreversible!
                    </span>
                </div>
                <div class="flex flex-col gap-4" x-show="!isDestroy">
                    <input type="hidden" name="type" :value="type">
                    <div class="flex flex-col gap-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" aria-label="name"
                            class="p-2 border border-gray-300 rounded-md" placeholder="HTML" x-model="name" />
                        <span x-show="errors.name" x-text="errors.name" class="text-sm text-red-500"></span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="filename">Image</label>
                        <input type="file" name="filename" id="filename" aria-label="Image" accept="image/*"
                            class="p-2 border border-gray-300 rounded-md" x-ref="fileInput" @change="
                            const file = $refs.fileInput.files[0];
                            const maxSize = 2 * 1024 * 1024;

                            if (file && file.size > maxSize) {
                                alert('File must be under 2 MB.');
                                $refs.fileInput.value = null;
                                return;
                            }
                        " />
                        <span x-show="errors.filename" x-text="errors.filename" class="text-sm text-red-500"></span>
                    </div>
                </div>
            </x-modal>
        </form>

        <div class="flex my-4 items-center justify-end">
            <button class="py-2 px-3 hover:cursor-pointer rounded-md primary" @click="resetForm(); modalOn = true">
                Add Technology
            </button>
        </div>
        <x-table :items="$techs" :headers="['Image', 'Name']" :columnsKey="['filename', 'name']"
            :actions="['edit', 'delete']" :imagePath="asset('/storage'). '/'">
        </x-table>
    </div>
</x-admin-layout>