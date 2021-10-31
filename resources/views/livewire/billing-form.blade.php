<form wire:submit.prevent="saveBillingInfo">
    @csrf
    <p class="register-right-heading mb-0">{{ __('Billing information') }}</p>

    <button class="btn btn-primary customized w-100" type="submit">
        Next Step <span class="float-right">@include('components.icons.arrow')</span>
    </button>
</form>