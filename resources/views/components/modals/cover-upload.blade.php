<!-- Modal -->
<div class="modal fade" id="coverUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __("Upload cover photo") }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __("Upload a picture. Max Allowed filesize: 1MB. Accepted formats .jpg/.png") }}

                <div class="mt-2">
                    <form method="post" action="{{ route('images.store')}}" enctype="multipart/form-data"
                          class="dropzone cover-dropzone" id="cover-dropzone">
                        @csrf
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <form action="{{ route('user.change-cover') }}" method="post">
                    @csrf
                    <input type="hidden" id="cover" name="cover" required/>
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script type="text/javascript">
            Dropzone.autoDiscover = false;

            var coverDropzone = new Dropzone("#cover-dropzone", {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    $("#cover").attr('value', response.success)
                },
                error: function (file, response) {
                    return false;
                }
            });
        </script>

    @endpush

</div>