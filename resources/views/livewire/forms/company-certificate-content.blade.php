<div>
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="text-white">{{ $error }}</div>
                    @endforeach
            </div>
        @endif
    </div>
    <form wire:submit.prevent="create" id="createCert" wire:ignore>
        @csrf
        <div class="form-group mt-2">
            <label class="certificate-modal__label">
                {{ __("Certificate Image") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <div class="dropzone customized-dropzone" id="cert-thumb-dropzone">                                    
                <div class="dz-message" data-dz-message>
                    @include('components.icons.camera-grey')
                    <span>{{ __("Drop Your image here or click and upload manualy") }}</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="certificate-modal__label">
                {{ __("Certificate Name") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <input wire:model="title" type="text" name="title" class="form-control" />
        </div>

        <div class="form-group mt-2">
            <label class="certificate-modal__label">
                {{ __("Certificate File") }}
                <span class="text-danger ml-1">*</span>
            </label>
            <div class="dropzone customized-dropzone" id="cert-file-dropzone">                                    
                <div class="dz-message" data-dz-message>
                    <span>{{ __("Drop Your file here or click and upload manualy") }}</span>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary float-right" value="Create Certificate" />
    </form>

    @push('footer_scripts')
        <script>
            Dropzone.autoDiscover = false;

            var uploadedThumbMap = {}
            var uploadedFileMap = {}

            var certThumbDropzone = new Dropzone("#cert-thumb-dropzone", {
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
                    // $('#createCert').append('<input wire:model="thumbnail" type="hidden" name="thumbnail[]" value="' + response.name + '" />')
                    uploadedThumbMap[file.name] = response.name
                    Livewire.emit('fileUploaded', 'thumbnail', uploadedThumbMap)
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
                        name = uploadedThumbMap[file.name]
                    }
                    Livewire.emit('fileUploaded', 'thumbnail', [])
                    // $('#createCert').find('input[name="thumbnail[]"][value="' + name + '"]').remove()
                },
                init: function() {
                    this.on("error", function (file, message) {
                        alert(message);
                        this.removeFile(file);
                    }); 
                }
            });

            var certFileDropzone = new Dropzone("#cert-file-dropzone", {
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
                acceptedFiles: ".pdf,.doc,.docx,.jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    // $('#createCert').append('<input wire:model="cert_file" type="hidden" name="cert_file[]" value="' + response.name + '" />')
                    uploadedFileMap[file.name] = response.name
                    Livewire.emit('fileUploaded', 'cert_file', uploadedFileMap)
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
                        name = uploadedFileMap[file.name]
                    }
                    Livewire.emit('fileUploaded', 'cert_file', [])
                    // $('#createCert').find('input[name="cert_file[]"][value="' + name + '"]').remove()
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