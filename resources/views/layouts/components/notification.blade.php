@if(Auth::user() != null && Auth::user()->hasRole('free_trial'))
    <div class="d-flex justify-content-center align-items-center app-notification py-2">
        <a class="text-white" href="{{ route('register.step2') }}">
            <span class="app-notification__text font-weight-bold">
                {{ __('Your free trial mode will be expired within 30 days. Please') }}
            </span>
            <span class="app-notification__subscribe py-1 px-2">
                 {{ __('Subscribe Now') }}
            </span>
        </a>
    </div>
@endif
