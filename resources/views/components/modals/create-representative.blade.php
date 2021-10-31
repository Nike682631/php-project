<!-- Modal -->
<div class="modal fade" id="createRepresentativeModal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title certificate-modal__title">{{ __("Create Representative") }}</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <livewire:company.representative />
            </div>
        </div>
    </div>
</div>