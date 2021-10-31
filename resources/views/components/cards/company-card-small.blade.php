<div class="list-item">
    <div class="row align-items-center">
        <div class="col-auto col-4">
            <div class="item-thumb d-flex align-items-center">

                <a href="{{ route('user.show', $user->id) }}">
                    @include('category.components.company-avatar')
                </a>
            </div>
        </div>
        <div class="col-8">
            <h3>
                @guest
                    <a data-toggle="modal" data-target="#unauthorizedModal">
                        {{ __("Hidden") }} <i class="fas fa-lock"></i>
                    </a>
                @else
                    <a href="{{ route('user.show', $user->id) }}">
                        {{ $user->info->company_name }}
                    </a>
                @endguest

            </h3>


            <div class="row short-details align-items-center">
                <div class="col-6 col-md-auto mb-2"><span class="label">{{ __('Website') }}</span>
                    <span class="value">
                 @guest
                            <a href="#" data-toggle="modal" data-target="#unauthorizedModal"> {{ __('Hidden')}} </a>
                        @else
                            <a href="https://{{ $user->info->website }}"
                               target="_blank">{{ $user->info->website }}</a>
                        @endguest

            </span>
                </div>
                <div class="col-6 col-md-auto mb-2"><span class="label">{{ __('Employees') }}</span>
                    <span class="value">{{ $user->info->employees_number }}</span></div>
                @if($user->info->creation_year)
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
                @endif
                <div class="col-6 col-md-auto mb-2">
                    <span class="label">{{ __('Country') }}</span>
                    <div class="country-icon">
                        <img class="w-25" style="width: 35px;" src="{{ asset('images/flags/' . strtolower($user->info->country) . '.png') }}">
                        <span class="value">{{ $user->info->country }}</span>
                    </div>


                </div>


            </div>
        </div>
        <div class="col-12 mt-3">
            @subscribed
                <a href="{{ route('message.create', $user->id) }}" class="btn btn-sm btn-success">
                    {{ __('Send message') }}
                </a>
                <a href="{{ route('user.show', $user->id) }}"
                   class="btn btn-sm btn-outline-primary">{{ __('Company information') }}</a>

            @unsubscribed
                <a href="#" data-toggle="modal" data-target="#unauthorizedModal" class="btn btn-sm btn-success">
                    {{ __('Send message') }}
                </a>
                <a href="#" data-toggle="modal" data-target="#unauthorizedModal"
                   class="btn btn-sm btn-outline-primary">{{ __('Company information') }}</a>

            @endsubscribed
        </div>

    </div>

</div>
