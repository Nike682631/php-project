<div class="d-flex match-tile align-items-center border-top flex-wrap">
    <a href="{{ route('user.show', $company->id) }}">
        <img class="match-tile__avatar border rounded-circle" src="{{ asset($company->getPhoto()) }}" alt="">
    </a>
    <div class="px-4 match-tile__company">
        <a href="{{ route('user.show', $company->id) }}">
            <p class="match-tile__company-name mb-0">{{ $company->info->company_name }}</p>
        </a>
        <div>
            @component('components.rating.star', [
                'rate' => 3
            ])
            @endcomponent
        </div>
    </div>
    <div class="px-4 match-tile__country">
        <p class="match-tile__country-header mb-1">{{ __("COUNTRY:") }}</p>
        <p class="match-tile__country-name mb-0">{{ $company->info->country }}</p>
    </div>
    <div class="d-flex flex-grow-1 justify-content-end match-tile__btn-group">
        <a 
            href="{{ route('user.show', $company->id) }}"
            class="btn btn-custom-gray mr-3">
            
                {{ __('More Info') }}
        </a>
        <a 
            href="{{ route('message.create', $company->id) }}" 
            class="btn btn-primary">

                {{ __('Send Message') }}
        </a>
    </div>
</div>