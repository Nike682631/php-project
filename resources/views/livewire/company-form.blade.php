<form method="post" wire:submit.prevent="saveUserInfo">
    @csrf
    <p class="register-right-heading mb-0">{{ __('Company information') }}</p>

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Company name',
        'id' => 'company_name',
        'placeholder' => 'Your company name'
    ])
    @endcomponent

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Registration code',
        'id' => 'registration_code',
        'placeholder' => 'Company registraion code'
    ])
    @endcomponent

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Vat number',
        'id' => 'vat_number',
        'placeholder' => 'Vat number'
    ])
    @endcomponent

    <div class="form-group">
        <label for="country" class="pr-1 text-uppercase label-title">{{ __("Country") }}</label><span class="text-danger">*</span>
        @include('components.forms.countries-select')
    </div>    

    <p class="register-right-heading mb-0">{{ __('Representative information') }}</p>
    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'First and last names',
        'id' => 'person_full_name',
        'placeholder' => 'Name of the representative'
    ])
    @endcomponent

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Address',
        'id' => 'address',
        'placeholder' => 'Enter your company address'
    ])
    @endcomponent

    <div class="two-row d-flex flex-wrap justify-content-between">
        <div class="form-group">
            <label class="pr-1 text-uppercase label-title">{{ __('You are') }}</label><span class="text-danger">*</span>
            <select wire:model="person_type" class="form-control">
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mis.">Mis.</option>
            </select>
        </div>

        <div class="form-group">
            <label class="pr-1 text-uppercase label-title">{{ __('Number of employees') }}</label><span class="text-danger">*</span>
            <select wire:model="employees_number" class="form-control">
                <option value="1-10">1-10</option>
                <option value="50-100">50-100</option>
                <option value="100-500">100-500</option>
                <option value="500-1000">500-1000</option>
                <option value="1000-5000">1000-5000</option>
                <option value="5000+">5000+</option>
            </select>
        </div>
    </div>

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Website',
        'id' => 'website',
        'placeholder' => 'Website'
    ])
    @endcomponent

    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Job title',
        'id' => 'person_job_title',
        'placeholder' => 'Enter your position in the company'
    ])
    @endcomponent

    @component('components.forms.lw-input', [
        'required' => false,
        'title' => 'Skype',
        'id' => 'person_skype',
        'placeholder' => 'Skype Nickname'
    ])
    @endcomponent
    
    @component('components.forms.lw-input', [
        'required' => true,
        'title' => 'Phone',
        'id' => 'person_phone',
        'placeholder' => 'Your phone number'
    ])
    @endcomponent

    <div class="py-4 register-agreement">
        <input type="checkbox" required />
        {{ __('By creating account, I agree to general ') }}

        <a href="{{ route('general-conditions') }}" target="_blank">
            <u>{{ __('conditions') }}</u>
        </a>
        {{ __('and') }}
        <a href="{{ route('privacy-policy') }}" target="_blank">
            <u>{{ __('privacy policy') }}</u>
        </a>
    </div>

    <button class="btn btn-primary customized w-100" type="submit">
        Next Step <span class="float-right">@include('components.icons.arrow')</span>
    </button>
</form>