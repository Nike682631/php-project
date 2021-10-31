<div class="list-item">
    <div class="row align-items-center">
        <div class="col col-md-12 order-2 order-md-1">
            <h3>
                @guest
                    <a data-toggle="modal" data-target="#unauthorizedModal">
                        {{ __("Hidden") }} <i class="fas fa-lock"></i>
                    </a>
                @else
                    @isset($user->info->company_name )
                        <a href="{{ route('user.show', $user->id) }}" style="font-size: 26px; font-weight: 600;">
                            {{ $user->info->company_name }}
                        </a>
                    @endisset
                @endguest

            </h3>
        </div>
        <div class="col-auto order-1 order-md-2">
            <div class="item-thumb d-flex align-items-center">

                <a href="{{ route('user.show', $user->id) }}">
                    @include('category.components.company-avatar')
                </a>
            </div>
        </div>
        <div class="col-12 col-md order-3">
            <div class="row">
                <div class="col-12 col-sm-4"><span class="h5">{{ __('Sells') }}</span>
                    <div class="tags">
                        @guest
                            <span>{{ __("Hidden") }}</span>
                        @else
                            @foreach($user->sells->take(10) as $item)
                                <span>
                                   {{ $item->name }}
                                </span>

                            @endforeach
                        @endguest
                    </div>
                </div>
                <div class="col-12 col-sm-4"><span class="h5">{{ __('Buys') }}</span>
                    <div class="tags">
                        @guest
                            <span>{{ __("Hidden") }}</span>
                        @else
                            @foreach($user->sells->take(10) as $item)
                                <span>
                                   {{ $item->name }}
                                </span>

                            @endforeach

                        @endguest
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <span class="h5">{{ __('Products') }}</span>
                    <div class="tags">{{ $user->products()->count() }}

                        <div class="div">
                            <a target="_blank" href="{{ route('user.products', $user->id) }}" class="small">{{__("View all")}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row short-details pt-2 align-items-center">
        <div class="col-6 col-md-auto mb-2"><span class="label">{{ __('Website') }}</span>
            <span class="value">
                 @guest
                    <a href="#" data-toggle="modal" data-target="#unauthorizedModal"> {{ __('Hidden')}} </a>
                @else
                    @isset($user->info->website )

                    <a href="https://{{ $user->info->website }}"
                       target="_blank">{{ $user->info->website }}</a>
                        @endisset
                @endguest

            </span>
        </div>
        @isset($user->info->employees_number)
        <div class="col-6 col-md-auto mb-2">
            <span class="label">{{ __('Employees') }}</span>
            <span class="value">{{ $user->info->employees_number }}</span>
        </div>
        @endisset
        @isset($user->info->creation_year)
            <div class="col-6 col-md-auto mb-2">

                <span class="label">{{ __('Creation year') }}</span>

                @guest
                    <a href="#" data-toggle="modal" data-target="#unauthorizedModal"
                       target="">Hidden</a>
                @else
                    <span class="value">
                        {{ $user->info->creation_year }}
                    </span>
                @endguest


            </div>
        @endisset
        @isset($user->info->country)
        <div class="col-6 col-md-auto mb-2">
            <span class="label">{{ __('Country') }}</span>
            <div class="country-icon">
                <img class="w-25" style="width: 35px;"
                     src="{{ asset('images/flags/' . strtolower($user->info->country) . '.png') }}">
                <span class="value">{{ $user->info->country }}</span>
            </div>


        </div>
        @endisset
        @auth
        <div class="col-12 col-md-auto ml-auto">
            <a target="_blank" href="{{ route('message.create', $user->id) }}" class="btn btn-success">
                {{ __('Send message') }}
            </a>
            <a target="_blank" href="{{ route('user.show', $user->id) }}"
               class="btn btn-outline-primary">{{ __('More') }}</a>

        </div>
        @else
        <div class="col-12 col-md-auto ml-auto">
            <a href="#" data-toggle="modal" data-target="#unauthorizedModal" class="btn btn-success">
                {{ __('Send message') }}
            </a>
            <a href="#" data-toggle="modal" data-target="#unauthorizedModal"
               class="btn btn-outline-primary">{{ __('More') }}</a>

        </div>
        @endauth

    </div>
</div>
