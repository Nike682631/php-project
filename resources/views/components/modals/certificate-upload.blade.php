<!-- Modal -->
<div class="modal fade" id="certificateUploadModal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title certificate-modal__title">{{ __("Certificate Details") }}</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <livewire:forms.company-certificate-content />
            </div>
        </div>
    </div>
</div>