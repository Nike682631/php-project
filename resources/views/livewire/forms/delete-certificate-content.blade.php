<div>
    <p class="modal-title certificate-modal__text">{{ __("Are you sure you want to delete certificate?") }}</p>
    <div class="d-flex justify-content-end pt-4">
        <a role="button" class="btn btn-secondary mr-3" data-dismiss="modal">{{ __("No") }}</a>
        <a role="button" class="btn btn-primary" wire:click="delete()">{{ __("Yes") }}</a>
    </div>

    @push('footer_scripts')
        <script type="text/javascript">
            $('#certificateConfirmModal').on('show.bs.modal', function (e) {
                var cert_id = $(e.relatedTarget).data('id');
                Livewire.emit('certificationId', cert_id);
            });
        </script>
    @endpush
</div>