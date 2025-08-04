<x-admin-layout>
    <div class="flex flex-col px-4" x-data="{
        modalOn: false,
        stiff: true,
        id: null,
        title: '',
        type: '',
        description: '',
        filenames: [],
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
        errors: { title: '', type: '', description: '' },
        setItem(item, isEditing = false) {
            this.id = item.id;
            this.title = item.title;
            this.type = item.type;
            this.description = item.description;
            this.filenames = item.images;
            this.isEditing = isEditing;
            this.isDestroy = !isEditing;
            if (isEditing) {
                this.modalTitle = 'Edit Project';
                this.modalMessage = 'Edit the project details and save the changes.';
                this.modalConfirmText = 'Save';
                this.modalColor = 'primary';
                this.modalIcon = false;
                this.modalIconClass = 'fa-edit';
                this.modalIconColor = 'bg-blue-100';
                this.modalIsForm = true;
            } else if (this.isDestroy) {
                this.modalTitle = 'Delete Project';
                this.modalMessage = `Delete project from your portfolio.`;
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
            this.title = '';
            this.type = '';
            this.description = '';
            this.filenames = [];
            this.errors = { title: '', type: '', description: '', filenames: [] };
            this.isEditing = false;
            this.isDestroy = false;
            this.modalTitle = 'Add Project';
            this.modalMessage = 'Add a new project to your portfolio profile.';
            this.modalConfirmText = 'Save';
            this.modalColor = 'primary';
            this.modalIcon = false;
            this.modalIconClass = 'fa-plus';
            this.modalIconColor = 'bg-green-100';
            this.modalIsForm = true;
        },
        validate() {
            this.errors.title = (this.title || '').trim() === '' ? 'Title is required' : '';
            this.errors.type = (this.type || '').trim() === '' ? 'Type is required' : '';
            this.errors.description = (this.description || '').trim() === '' ? 'Description is required' : '';
            this.errors.filenames = Array.isArray(this.filenames) && this.filenames.length > 0
                ? ''
                : 'Images are required';

            return !Object.values(this.errors).some(error => error !== '');
        }
    }">
        <form method="POST" enctype="multipart/form-data" :action="isEditing
        ? '{{ route('project.update', '') }}/' + id
        : (isDestroy
            ? '{{ route('project.destroy', '') }}/' + id
            : '{{ route('project.store') }}')" @submit.prevent="if (!isDestroy && !validate()) return; $el.submit()">
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
                        <span class="font-bold" x-text="title"></span>
                        Are you sure you want to delete this project? This action is irreversible!
                    </span>
                </div>
                <div class="flex flex-col gap-4" x-show="!isDestroy">
                    <div class="flex slef flex-wrap gap-2">
                        <template x-for="(image, index) in filenames" :key="index">
                            <img :src="typeof image === 'string' || image.filename ? '/storage/' + (image.filename || image) : URL.createObjectURL(image)"
                                :alt="image.alt || 'Project Image'" class="rounded-md w-32 h-32 object-cover" />
                        </template>
                    </div>
                    <div class="flex flex-col gap-4 w-full">
                        <div class="flex flex-col gap-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" aria-label="Title"
                                class="p-2 border border-gray-300 rounded-md" placeholder="Portfolio Website"
                                x-model="title" />
                            <span x-show="errors.title" x-text="errors.title" class="text-sm text-red-500"></span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="type">Type</label>
                            <input type="text" name="type" id="type" aria-label="Type"
                                class="p-2 border border-gray-300 rounded-md" placeholder="Website" x-model="type" />
                            <span x-show="errors.type" x-text="errors.type" class="text-sm text-red-500"></span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="description">Description</label>
                            <textarea rows="4" name="description" id="description" aria-label="Description"
                                class="p-2 border border-gray-300 rounded-md"
                                placeholder="This is a description of the project" x-model="description"></textarea>
                            <span x-show="errors.description" x-text="errors.description"
                                class="text-sm text-red-500"></span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="filenames">Images</label>
                            <input type="file" name="filenames[]" id="filenames" aria-label="Images"
                                class="p-2 border border-gray-300 rounded-md" multiple x-ref="fileInput" @change="
                                    const maxSize = 2 * 1024 * 1024;
                                    const newFiles = Array.from($refs.fileInput.files);

                                    const oversized = newFiles.filter(file => file.size > maxSize);
                                    if (oversized.length > 0) {
                                        alert('Each file must be under 2 MB.');
                                        $refs.fileInput.value = null;
                                        return;
                                    }

                                    if (newFiles.length > 5) {
                                        alert('You can only upload up to 5 images.');
                                        $refs.fileInput.value = null;
                                        return;
                                    }

                                    filenames = [...filenames, ...newFiles];
                                " />
                            <span x-show="errors.filenames" x-text="errors.filenames"
                                class="text-sm text-red-500"></span>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>

        <div class="flex my-4 items-center justify-end">
            <button class="py-2 px-3 hover:cursor-pointer rounded-md primary" @click="resetForm(); modalOn = true">
                Add Project
            </button>
        </div>
        <x-table :items="$projects" :headers="['Title', 'Type', 'Description']"
            :columnsKey="['title', 'type', 'description']" :actions="['edit', 'delete']">
        </x-table>
    </div>
</x-admin-layout>