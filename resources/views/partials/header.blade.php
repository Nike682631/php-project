@section('header')
    @auth
        <nav class="navbar navbar-top  {% if light_navbar is defined %}navbar-light {% endif %}navbar-top py-2 py-md-2 px-2 px-md-3">
            <div class="container justify-content-between">
                <div class="row align-items-center flex-fill">
                    <div class="col-auto order-2 order-lg-1 mr-auto mr-md-0 align-self-center">
                        <a class="navbar-brand mr-3 mr-md-3" href="/">
                            <img src="{{ asset('images/commodity-logo.png') }}" style="width: 175px;"/>
                        </a>
                    </div>
                    <div class="col-auto ml-auto order-2 order-lg-3 pl-0">
                    </div>

                    <div class="col-auto order-3 order-lg-4 user-links">

                        <a href="#"
                           role="button" id="userDropdown" data-toggle="dropdown"
                           class="btn btn-outline-light btn-login btn-login-mobile btn-user dropdown-toggle">
                            {{-- Profile icon--}}
                            <svg width="21px" height="20px" viewBox="0 0 21 20" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Header-logged-v2" transform="translate(-1241.000000, -53.000000)"
                                       fill="#063C34">
                                        <g id="Header">
                                            <g id="Login" transform="translate(1224.000000, 43.000000)">
                                                <path style="fill: #355448;"
                                                      d="M27.5042409,20.5980835 C24.9154161,20.5980835 22.8168467,18.2356757 22.8167956,15.3215233 C22.8167956,11.2803931 24.915365,10.0450123 27.5042409,10.0450123 C30.0930146,10.0450123 32.1916861,11.2803931 32.1916861,15.3215233 C32.1916861,18.2356757 30.0929124,20.5980835 27.5042409,20.5980835 Z M37.8550949,28.3644717 C38.0181387,28.717543 37.9846204,29.1218182 37.7656788,29.4457494 C37.5467372,29.7696314 37.1760949,29.9630467 36.7743358,29.9630467 L18.2339927,29.9630467 C17.8322336,29.9630467 17.4616934,29.7697297 17.2427518,29.4457985 C17.023708,29.1218182 16.990292,28.7176904 17.1533358,28.3644717 L19.5182117,23.2409828 C19.6264818,23.0064373 19.8162993,22.8120885 20.0529197,22.6936609 L23.7228102,20.8562162 C23.8037445,20.815774 23.9017445,20.8236364 23.974708,20.8766093 C25.0127518,21.6316953 26.2331533,22.0308108 27.5042409,22.0308108 C28.7751241,22.0308108 29.9956277,21.6316953 31.0336715,20.8766093 C31.1064307,20.8236364 31.2044307,20.815774 31.285365,20.8562162 L34.9555109,22.6936609 C35.1920292,22.8120885 35.3820511,23.0065356 35.490219,23.2409828 L37.8550949,28.3644717 Z"
                                                      id="Combined-Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            {{--Profile icon end--}}
                            <span class="d-none d-md-inline-block ml-2">
                                @isset(Auth::user()->info)
                                {{ Auth::user()->info->company_name }}
                                @endisset
                            </span>

                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('user.index') }}">
                                    <span>{{ __('User Profile')}}</span>
                                </a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   class="btn btn-light btn-logout">
                                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Header-light-logged-v2" transform="translate(-1444.000000, -54.000000)"
                                               fill-rule="nonzero">
                                                <g id="Header">
                                                    <g id="logout" transform="translate(1429.000000, 43.000000)">
                                                        <g id="Group" transform="translate(13.000000, 10.000000)">
                                                            <rect id="Rectangle" x="0" y="0" width="20" height="20"></rect>
                                                            <path d="M7.5,10.5454545 L17,10.5454545" id="Path-2"
                                                                  stroke="#063C34" stroke-width="1.5"></path>
                                                            <polyline id="Path-3" stroke="#063C34" stroke-width="1.5"
                                                                      points="15 6.49098876 17.5 10.5454545 15 14.5"></polyline>
                                                            <polyline id="Path-10" stroke="#063C34" stroke-width="1.5"
                                                                      points="8.5 2.5 3 2.5 3 18.1812329 8.5 18.1812329"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    {{ __("Logout") }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </a>

                        <a href="{{ route('message.read', 1) }}" class="btn btn-light">{{ __("Messages") }}</a>
                        <a href="{{ route('matching.index') }}" class="btn btn-light">{{ __("Matches ") }}<span class="badge badge-success">{{ Auth::user()->matchesCount() }}</span></a>
                        <a href="{{ route('logistics.index') }}" class="btn btn-light">{{ __("Logistics Requests ") }}<span class="badge badge-success"> {{ App\LogisticsRequest::activeRequests() }}</span></a>
                            @include('components.languages.languages')
                    </div>

                </div>
            </div>
        </nav>
        <div class="subnav mobile-menu">
            <div class="container">
                <div class="subnav-toggle">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="row header-links">
                    @include('partials.header-links')
                </div>
            </div>
        </div>
    @else
        <nav class="navbar navbar-top py-2 py-md-2 px-2 px-md-3">
            <div class="container justify-content-between">
                <div class="row align-items-center flex-fill">
                    <div class="col-auto order-2 order-lg-1 mr-auto mr-md-0 align-self-center">
                        <a class="navbar-brand mr-3 mr-md-3" href="/">
                            <img src="{{ asset('images/commodity-logo.png') }}" style="width: 175px;"/>
                        </a>
                    </div>
                    <div class="col-12 col-lg-auto ml-lg-auto order-1 order-lg-3 text-lg-right">
                        <div class="very-top-head">
                            <div class="row align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="additional-nav"><a href="{{ route('page.show', 10) }}">{{ __('About') }} <span
                                                    class="d-none d-sm-inline-block">{{ __('B2BWood.com') }}</span></a> <a
                                                href="{{ route('page.show', 9) }}"><span
                                                    class="d-none d-sm-inline-block">{{ __('Benefits') }}</span> {{ __('for business') }}
                                        </a> <a href="{{ route('page.show', 8) }}">{{ __('Payments') }}</a></div>
                                </div>
                                <div class="col-auto ml-auto">
                                   @include('components.languages.languages')
                                </div>
                                <a href="{{ route('login') }}"
                                   class="d-none d-lg-inline-block btn-login btn btn-outline-light">{{ __('Login') }}</a>

                                <a href="{{ route('get-a-quote') }}"
                                   class="d-none d-lg-inline-block btn-login btn btn-outline-light ml-3">{{ __('Get a Quote') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto ml-auto order-3 d-lg-none">
                        <a href="{{ route('login') }}" class="btn-login btn-login-mobile btn btn-outline-light">{{ __('Login') }}
                            <span
                                    class="d-none d-sm-inline-block d-md-none d-lg-inline-block">/ {{ __('Registration') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="subnav mobile-menu">
            <div class="container">
                <div class="subnav-toggle">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="row header-links">
                    @include('partials.header-links')
                </div>
            </div>
        </div>
    @endauth

@show




{{--<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" style="color: #003d34; margin-bottom: 0; border-radius: 0; background: #638177;" role="alert">
            {% if payment.status == 'completed' %}
            {{ __('Your subscription ended. Please renew it.') }}
            {% elseif payment.status == 'pending' and payment.method == 'paysera' %}
            {{ __('Your subscription is being verified by Paysera. If you paid successfully, this usually takes up to 20 minutes. If payment failed, you can') }} <a href="#" style="color: #fff;">{{ __('Retry') }}</a>
            {% elseif payment.status == 'pending' and payment.method == 'bank' %}
            {{ __('Your subscription is being verified. As soon as we receive bank transfer you will be able to use all of the EUROWOOD features.') }}&nbsp;&nbsp;
            <a href="#" style="color: #fff;">{{ __('View wire transfer information') }}</a>
            {% endif %}
        </div>
    </div>
</div>--}}
