<div>
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="text-white">{{ $error }}</div>
                    @endforeach
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-primary text-white">
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="create" id="createRepresentative" x-data="{
        type: -1
    }">
        @csrf
        <div class="form-group">
            <label class="representative-modal__label">
                {{ __("Company Full Name") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <input wire:model="person_full_name" type="text" name="title" class="form-control" required />
        </div>

        <div class="form-group">
            <label class="representative-modal__label">
                {{ __("Company Position") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <input wire:model="person_job_title" type="text" name="title" class="form-control" required />
        </div>

        <div class="form-group">
            <label class="representative-modal__label">
                {{ __("Company Phone") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <input wire:model="person_phone" type="text" name="title" class="form-control" required />
        </div>

        <div class="form-group form-inline">
            <select class="form-control flex-grow-1" wire:model="selectedRepresent">
                @foreach($representatives as $representative)
                    <option value = "{{$representative->id}}">{{$representative->representative_name}}</option>
                @endforeach
            </select>
            <a class="btn btn-primary customized ml-4 mr-2" x-on:click="type = 0; $wire.setFields()">{{ __("Edit") }}</a>
            <a class="btn btn-secondary customized" x-on:click="type = -1; $wire.deleteRepresent()">{{ __("Delete") }}</a>
        </div>

        <div class="representative-form-group" x-show="type != -1">
            <p class="representative-modal__label2">{{ __("Representative Details") }}</p>

            <div class="form-group">
                <label class="representative-modal__label">
                    {{ __("Representative Name") }}
                    <span class="text-danger ml-1">*</span>
                </label>
                <input wire:model="representative_name" type="text" name="title" class="form-control" required />
            </div>

            <div class="form-group">
                <label class="representative-modal__label">
                    {{ __("Representative Email") }}
                    <span class="text-danger ml-1">*</span>
                </label>
                <input wire:model="email" type="email" name="title" class="form-control" required />
            </div>

            <div class="form-group">
                <label class="representative-modal__label">
                    {{ __("Representative Phone") }}
                </label>
                <input wire:model="phone" type="text" name="title" class="form-control" />
            </div>

            <div class="form-group">
                <label class="representative-modal__label">
                    {{ __("Representative LinkedinURL") }}
                </label>
                <input wire:model="linkedin_url" type="text" name="title" class="form-control" />
            </div>

            <div class="form-group mt-2">
                <label class="representative-modal__label">
                    {{ __("Representative Image") }}
                </label>
                <div class="dropzone customized-dropzone" id="representative-dropzone">                                    
                    <div class="dz-message" data-dz-message>
                        @include('components.icons.camera-grey')
                        <span>{{ __("Drop Your image here or click and upload manualy") }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="representative__btn-group" x-show="type != -1">
            <a class="btn btn-secondary customized mr-2" x-on:click="type = -1">{{ __("Cancel") }}</a>
            <a class="btn btn-primary customized" x-on:click="type = -1; $wire.updateRepresent()" x-show="type == 0">{{ __("Save") }}</a>
            <input type="submit" class="btn btn-primary" value="Create" x-show="type == 1" />
        </div>        
        <a class="btn btn-primary" x-show="type == -1" x-on:click="type = 1; $wire.resetFields()">{{ __("Create New Representative") }}</a>
    </form>

    @push('footer_scripts')
        <script>
            Dropzone.autoDiscover = false;

            var uploadedPhotoMap = {}

            var reprePhotoDropzone = new Dropzone("#representative-dropzone", {
                url: "/media/store",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                maxFilesize: 2,
                maxFiles: 1,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    uploadedPhotoMap[file.name] = response.name
                    Livewire.emit('photoUploaded', uploadedPhotoMap)
                },
                error: function (file, response) {
                    return false;
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedPhotoMap[file.name]
                    }
                    Livewire.emit('photoUploaded', [])
                },
                init: function() {
                    this.on("error", function (file, message) {
                        alert(message);
                        this.removeFile(file);
                    }); 
                }
            });
        </script>

    @endpush
</div>