@extends('layouts.livewire')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
    
            @include('auth.register.components.left-side')
            
            <div class="right-side-container col-md-7 col-sm-12">
                <div class="pb-4">
                    <p class="register-right-heading mb-0">{{ __('You have successfully registered.') }}</p>
                    <p class="register-agreement mb-4">{{ __('Make a payment to any bank account bellow') }}</p>
                    
                    <p class="register-agreement mb-0">{{ __('1. Make a payment to any bank account bellow') }}</p>
                    <p class="register-agreement mb-0">{{ __('2. We will approve your account when transfer will arrive') }}</p>
                    <p class="register-agreement mb-0">{{ __('3. Once approved, you will be able to see b2bwood.com content') }}</p>
                    
                    <button class="btn btn-primary customized mt-4" onclick="window.location='{{ url('/') }}'">
                        {{ __("Start using B2BWOOD.COM") }}
                    </button>
                </div> 
                    
                <hr class="mb-0">

                <p class="register-right-heading mb-0">{{ __('Bank details') }}</p>
                <div class="bank-details">
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Recipient:</p>
                        <p class="right-desc pl-3 mb-0">UAB "B2Bwood"</p>
                    </div>
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Company code:</p>
                        <p class="right-desc pl-3 mb-0">305598946</p>
                    </div>
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Company address:</p>
                        <p class="right-desc pl-3 mb-0">Draugystes g. 17-1, LT-51229 Kaunas</p>
                    </div>
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Country:</p>
                        <p class="right-desc pl-3 mb-0">Lithuania</p>
                    </div>
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Amount:</p>
                        <p class="right-desc pl-3 mb-0">EUR</p>
                    </div>
                    <div class="d-flex">
                        <p class="left-desc text-right mb-0">Reference number:</p>
                        <p class="right-desc pl-3 mb-0">B2BWood.com order ID #1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection