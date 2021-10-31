<header class="header">
    <div class="background-secondary header__first-row text-white">
        <div class="container">
            <div class="row justify-content-end align-items-center">
                <div class="col-11 text-right secondary-nav">
                    <ul class="navbar-nav">
                        @guest
                            <a href="{{ route('page.show', 10) }}">
                                {{ __('About B2BWood.com') }}
                            </a>
                            <a href="{{ route('page.show', 9) }}">
                                {{ __('Benefits for business') }}
                            </a>
                            <a href="{{ route('page.show', 8) }}">
                                {{ __('Payments') }}
                            </a>

                        @else
                            <li>
                                <a href="{{ route('message.read', 1) }}" class="">
                                    {{ __('Messages') }}
                                    <span class="badge badge-danger">{{ Auth::user()->unreadCount() }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('matching.index') }}" class="" style="">
                                    {{ __('Matches ') }}
                                    <span class="badge badge-danger">{{ Auth::user()->matchesCount() }}</span>
                                </a>

                            </li>
                            <li>
                                <a href="{{ route('logistics.index') }}" class="">
                                    {{ __('Logistics Requests ') }}
                                    <span class="badge badge-danger">{{ App\LogisticsRequest::activeRequests() }}</span>
                                </a>

                            </li>

                        @endguest
                    </ul>
                </div>
                <div class="col-1 text-right">
                    @include('components.languages.languages')
                </div>

            </div>
        </div>


    </div>
    <div class="header__second-row background-primary">
        <div class="container">
            <div class="row">
                <div class="logo-wrapper align-self-center">
                    <a class="navbar-brand mr-3 mr-md-3" href="/">
                        <img src="{{ asset('images/commodity-logo.png') }}" style="width: 175px;" />
                    </a>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @include('components.icons.service')
                            {{ __('Services') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [5]) }}">
                                    <div class="menu-icon"></div>
                                    {{ __('Forestry') }}
                                </a>
                                {{-- Do not delete this, example how to do 3rd level sub-menu --}}
                                {{-- <x-sub-menu
                                    :items="[['Thid level 1', ''], ['Third level 2', ''], ['Third level 3', '']]" /> --}}
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [15]) }}">
                                    <div class="menu-icon"></div>
                                    {{ __('Sawmills') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [472]) }}">
                                    <div class="menu-icon"></div>
                                    {{ __('Legal') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [170]) }}">
                                    <div class="menu-icon"></div>
                                    {{ __('Machinery') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item view-all" href="{{ route('category.index') }}">
                            {{ __('View All') }}
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @include('components.icons.product')
                            {{ __('Products') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [266]) }}">
                                    {{-- <div class="menu-icon">@include('components.icons.product')</div> --}}
                                    {{ __('Floor') }}
                                </a>
                                {{-- Do not delete this, example how to do 3rd level sub-menu --}}
                                {{-- <x-sub-menu
                                    :items="[['Thid level 1', ''], ['Third level 2', ''], ['Third level 3', '']]" /> --}}
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [297]) }}">
                                    {{-- <div class="menu-icon">@include('components.icons.product')</div> --}}
                                    {{ __('Furniture') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [349]) }}">
                                    {{-- <div class="menu-icon">@include('components.icons.product')</div> --}}
                                    {{ __('Woodworking equipment') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item second-level" href="{{ route('category.show', [668]) }}">
                                    {{-- <div class="menu-icon">@include('components.icons.product')</div> --}}
                                    {{ __('Wood') }}
                                </a>
                            </li>
                            <li><a class="dropdown-item view-all" href="{{ route('products.index') }}">{{ __('View All') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="login-button-wrapper">

                    @guest
                        <a href="{{ route('get-a-quote') }}"
                            class="d-none d-lg-inline-block btn-login btn btn-outline-light ml-3">{{ __('Get a Quote') }}
                        </a>
                        <a href="{{ route('login') }}"
                            class="d-none d-lg-inline-block btn-login btn btn-primary">{{ __('Register | Login') }}</a>
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown pl-3 mr-auto">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    @include('components.icons.user')
                                    {{ __('Company Profile') }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item second-level" href="/home">
                                            {{ __('Company Profile') }}
                                        </a>
                                        {{-- Do not delete this, example how to do 3rd level sub-menu --}}
                                        {{-- <x-sub-menu
                                    :items="[['Thid level 1', ''], ['Third level 2', ''], ['Third level 3', '']]" /> --}}
                                    </li>
                                    <li>
                                        <a class="dropdown-item second-level" href="/billing/">
                                            {{ __('Subscriptions and billing') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item second-level"
                                            href="{{ route('user.products', [Auth::user()->id]) }}">
                                            {{ __('Company Products') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item second-level" href="{{ route('products.create') }}">
                                            {{ __('Add Product') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item second-level" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                 document.getElementById('logout-form').submit();"
                                            class="text-white text-small">

                                            {{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
