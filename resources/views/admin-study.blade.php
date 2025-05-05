<x-admin-layout>
    <div class="flex flex-col px-4" x-data="{
        modalOn: false,
        stiff: true,
        id: null,
        title: '',
        type: 0,
        company: '',
        description: '',
        start_date: '',
        end_date: '',
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
        errors: { title: '', description: '', company: '', start_date: '', end_date: '' },
        setItem(item, isEditing = false) {
            this.id = item.id;
            this.title = item.title;
            this.type = item.type;
            this.company = item.company;
            this.description = item.description;
            this.start_date = item.start_date ? item.start_date.split('T')[0] : '';
            this.end_date = item.end_date ? item.end_date.split('T')[0] : '';
            this.isEditing = isEditing;
            this.isDestroy = !isEditing;
            if (isEditing) {
                this.modalTitle = 'Edit Education';
                this.modalMessage = 'Edit the education details and save the changes.';
                this.modalConfirmText = 'Save';
                this.modalColor = 'primary';
                this.modalIcon = false;
                this.modalIconClass = 'fa-edit';
                this.modalIconColor = 'bg-blue-100';
                this.modalIsForm = true;
            } else if (this.isDestroy) {
                this.modalTitle = 'Delete Education';
                this.modalMessage = `Delete education from your portfolio.`;
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
            this.type = 0;
            this.company = '';
            this.description = '';
            this.start_date = '';
            this.end_date = '';
            this.errors = { title: '', description: '', company: '', start_date: '', end_date: ''};
            this.isEditing = false;
            this.isDestroy = false;
            this.modalTitle = 'Add Education';
            this.modalMessage = 'Add a new education to your portfolio profile.';
            this.modalConfirmText = 'Save';
            this.modalColor = 'primary';
            this.modalIcon = false;
            this.modalIconClass = 'fa-plus';
            this.modalIconColor = 'bg-green-100';
            this.modalIsForm = true;
        },
        validate() {
            this.errors.title = this.title.trim() === '' ? 'Title is required' : '';
            this.errors.description = this.description.trim() === '' ? 'Description is required' : '';
            this.errors.company = this.company.trim() === '' ? 'Company is required' : '';
            this.errors.start_date = this.start_date.trim() === '' ? 'Start date is required' : '';

            return !Object.values(this.errors).some(error => error !== '');
        },
    }">
        <form method="POST" :action="isEditing
        ? '{{ route('experience.update', '') }}/' + id
        : (isDestroy
            ? '{{ route('experience.destroy', '') }}/' + id
            : '{{ route('experience.store') }}')" @submit.prevent="if (validate()) $el.submit()">
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
                        Are you sure you want to delete this education? This action is irreversible!
                    </span>
                </div>
                <div class="flex flex-col gap-4" x-show="!isDestroy">
                    <input type="hidden" name="type" :value="type">
                    <div class="flex flex-col gap-2">
                        <label for="title">Field of Study</label>
                        <input type="text" name="title" id="title" aria-label="Title"
                            class="p-2 border border-gray-300 rounded-md" placeholder="Bachelor Degree of Computer"
                            x-model="title" />
                        <span x-show="errors.title" x-text="errors.title" class="text-sm text-red-500"></span>
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="company">University/School</label>
                        <input type="text" name="company" id="company" aria-label="Company"
                            class="p-2 border border-gray-300 rounded-md" placeholder="Oxford University"
                            x-model="company" />
                        <span x-show="errors.company" x-text="errors.company" class="text-sm text-red-500"></span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="description">Description</label>
                        <textarea rows="4" name="description" id="description" aria-label="Description"
                            class="p-2 border border-gray-300 rounded-md"
                            placeholder="This is a description of the experience" x-model="description"></textarea>
                        <span x-show="errors.description" x-text="errors.description"
                            class="text-sm text-red-500"></span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 justify-between">
                        <div class="flex flex-col gap-2 w-full">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" aria-label="Start Date"
                                class="p-2 border border-gray-300 rounded-md" x-model="start_date" />
                            <span x-show="errors.start_date" x-text="errors.start_date"
                                class="text-sm text-red-500"></span>
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" aria-label="End Date"
                                class="p-2 border border-gray-300 rounded-md" x-model="end_date" />
                            <span x-show="errors.end_date" x-text="errors.end_date" class="text-sm text-red-500"></span>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>

        <div class="flex my-4 items-center justify-end">
            <button class="py-2 px-3 hover:cursor-pointer rounded-md primary" @click="resetForm(); modalOn = true">
                Add Education
            </button>
        </div>
        <x-table :items="$studies" :headers="['Title', 'University/School', 'Description', 'Date']"
            :columnsKey="['title', 'company', 'description', 'formatted_date']" :actions="['edit', 'delete']">
        </x-table>
    </div>
</x-admin-layout>