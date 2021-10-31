<div class="left-side-container col-md-5 col-sm-12">
    <p class="text-white register-left-heading mb-0">{{ __('Register Now') }}</p>
    <p class="text-white register-left-description">
        {{ __('Register to our platform and get these benefits') }}
    </p>
    <div class="separator border border-bottom w-100 mt-4 mb-3"></div>
    <div class="d-flex mb-5 step px-3 py-2 {{$step == 1 ? 'selected' : ''}}"> 
        <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/edit-wh.svg') }}" height="60" width="60">
        <div class="align-self-center">
            <p class="mb-1 text-white sub-title">{{ __('Registration') }}</p>
            <p class="m-0 sub-text">{{ __('Step1') }}</p>
        </div>
    </div>
    <div class="d-flex mb-5 step px-3 py-2 {{$step == 2 ? 'selected' : ''}}"> 
        <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/card-payment.svg') }}" height="60" width="60">
        <div class="align-self-center">
            <p class="mb-1 text-white sub-title">{{ __('Payment') }}</p>
            <p class="m-0 sub-text">{{ __('Step2') }}</p>
        </div>
    </div>
    <div class="d-flex step px-3 py-2 {{$step == 3 ? 'selected' : ''}}"> 
        <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/check-wh.svg') }}" height="60" width="60">
        <div class="align-self-center">
            <p class="mb-1 text-white sub-title">{{ __('Finish') }}</p>
            <p class="m-0 sub-text">{{ __('Step3') }}</p>
        </div>
    </div>
</div>