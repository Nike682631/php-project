<div class="list-item company-card">
    <div class="company-card__header d-flex flex-wrap">
        <div class="detail d-flex flex-grow-1 align-items-center flex-wrap">
            @guest
                <h3 class="flex-grow-1">
                    <x-input.link target="#unauthorizedModal" type="modal">
                        {{ __("Hidden") }} <i class="fas fa-lock"></i>
                    </x-input.link>
                </h3>
            @else
                @isset($user->info->company_name )
                    <x-input.link link="{{ route('user.show', $user->id) }}" class="mr-auto title">
                        {{ $user->info->company_name }}
                    </x-input.link>
                @endisset
            @endguest
            
            <span class="company-card__label d-flex align-items-center mr-4">
                <span>{{ __("Products:") }}</span>
                <a class="company-card__info pl-2">
                    {{ $user->products()->count() }}
                </a>
            </span>
            <span class="company-card__label d-flex align-items-center">
                <span>{{ __("Website:") }}</span>
                @guest
                    <x-input.link target="#unauthorizedModal" type="modal">
                        {{ __("Hidden") }}
                    </x-input.link>
                @else
                    @isset($user->info->website )
                        <a href="https://{{ $user->info->website }}" target="_blank" class="company-card__info pl-2">
                            {{ $user->info->website }}                         
                        </a>
                    @endisset
                @endguest
                
            </span>
        </div>
        @guest
            <a class="like d-flex align-items-center" x-data="{ approve: false }" href="#" data-toggle="modal" data-target="#unauthorizedModal" >
        @else
            <a class="like d-flex align-items-center" x-data="{ approve: {{ $user->isLiked() }} }" x-on:click="approve = !approve; $wire.like({{ $user->id }}, approve)">
        @endguest        
            <div x-show="approve" style="display:none;">
                @include('components.icons.like-active')
            </div>
            <div x-show="!approve">
                @include('components.icons.like-inactive')
            </div>
        </a>        
    </div>
    <div class="company-card__body d-flex align-items-stretch">
        <div class="company-card__img-container">
            <a href="{{ route('user.show', $user->id) }}">
                <img class="company-card__img" src="{{ asset($user->getPhoto()) }}" alt="">
            </a>
        </div>            
        <div class="d-flex flex-grow-1 flex-wrap">
            <div class="col-md-6 col-sm-12 col-12 side">
                <span class="sub-title">{{ __('Sells') }}</span>
                <div class="d-flex flex-wrap">
                    @guest
                        <span>{{ __("Hidden") }}</span>
                    @else
                        @foreach($user->sells->take(10) as $item)
                            <span class="company-card__text">
                            {{ $item->name }}
                            </span>

                        @endforeach
                    @endguest
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 side">
                <span class="sub-title">{{ __('Buys') }}</span>
                <div class="d-flex flex-wrap">
                    @guest
                        <span>{{ __("Hidden") }}</span>
                    @else
                        @foreach($user->buys->take(10) as $item)
                            <span class="company-card__text">
                            {{ $item->name }}
                            </span>

                        @endforeach

                    @endguest
                </div>
            </div>
        </div>
    </div>
        
    <div class="company-card__footer row">
        <div class="col-md-7 d-flex justify-content-between">
            @isset($user->info->employees_number)
                <div>
                    <span class="company-card__label d-block">{{ __('Employees') }}</span>
                    <span class="company-card__info">{{ $user->info->employees_number }}</span>
                </div>
            @endisset
            @isset($user->info->creation_year)
                <div>
                    <span class="company-card__label d-block">{{ __('Creation year') }}</span>
                    @guest
                        <x-input.link target="#unauthorizedModal" type="modal">
                            {{ __("Hidden") }}
                        </x-input.link>
                    @else
                        <span class="company-card__info">
                            {{ $user->info->creation_year }}
                        </span>
                    @endguest
                </div>
            @endisset
            @isset($user->info->country)
                <div>
                    <span class="company-card__label d-block">{{ __('Country') }}</span>
                    <div class="country-icon">
                        <img style="width: 25px;"
                            src="{{ asset('images/flags/' . strtolower($user->info->country) . '.png') }}">
                        <span class="company-card__info">{{ $user->info->country }}</span>
                    </div>
                </div>
            @endisset
            <div>
                <span class="company-card__label d-block">{{ __('Company Rating') }}</span>
                @component('components.rating.star', [
                    'rate' => $user->rate()
                ])
                @endcomponent
            </div>
        </div>
        <div class="col-md-5 d-flex justify-content-end btn-detail-group">
            @auth
                <x-input.link 
                    link="{{ route('user.show', $user->id) }}" 
                    class="btn btn-secondary btn-customized mr-3" 
                    target="_blank">
                    {{ __('More Info') }}
                </x-input.link>

                <x-input.link 
                    link="{{ route('message.create', $user->id) }}" 
                    class="btn btn-primary btn-customized" 
                    target="_blank">
                    {{ __('Send message') }}
                </x-input.link>            
            @else
                <x-input.link target="#unauthorizedModal" type="modal" class="btn btn-secondary btn-customized mr-3">
                    {{ __('More Info') }}
                </x-input.link>

                <x-input.link target="#unauthorizedModal" type="modal" class="btn btn-primary btn-customized">
                    {{ __('Send message') }}
                </x-input.link>
            @endauth
        </div>
    </div>
</div>
