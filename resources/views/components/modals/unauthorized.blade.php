<!-- Modal -->
<div class="modal fade" id="unauthorizedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __("You are not allowed to view this") }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ __("Please login or register to access this information") }}
                </p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" type="button" class="btn btn-secondary">{{ __("Login") }}</a>
                <a href="{{ route('get-a-quote') }}" type="button" class="btn btn-primary">{{ __("Get A Quote") }}</a>
            </div>
        </div>
    </div>
</div>
