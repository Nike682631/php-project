<div class="mobile-header">
    <div class="hamburger-menu">
        <div class="logo-wrapper align-self-center">
            <a class="navbar-brand mr-3 mr-md-3" href="/">
                <img src="{{ asset('images/commodity-logo.png') }}" style="width: 175px;" />
            </a>
        </div>
        <a class="mburger mburger--collapse" href="#mobile-menu">
            <b></b>
            <b></b>
            <b></b>
        </a>
    </div>
    <nav id="mobile-menu">
        <ul>
         <li><span>@include('components.icons.service') {{ __('Services') }}</span>
                <ul>
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
                    <li>
                    <a class="dropdown-item view-all" href="{{ route('category.index') }}">
                    {{ __("View All") }}
                    </a>
                    </li>
                </ul>
            </li>
            <li>
            
                            
            <span>@include('components.icons.product') {{ __('Products') }}</span>
                <ul>
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
                    <li><a class="dropdown-item view-all"
                            href="{{ route('products.index') }}">{{ __('View All') }}</a>
                    </li>
                </ul>
            </li>
            @guest
                <li>
                    <span>
                        <a href="{{ route('page.show', 10) }}">
                            {{ __('About B2BWood.com') }}
                        </a>
                    </span>

                </li>

                <li><span><a href="{{ route('page.show', 9) }}">
                            {{ __('Benefits for business') }}
                        </a></span>
                </li>

                <li><span> <a href="{{ route('page.show', 8) }}">
                            {{ __('Payments') }}
                        </a></span>

                </li>

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

                <li>
                </li>

                <li>
                    <span>{{ __('Other') }}</span>
                    <ul>
                        <li>
                            <span>
                                <a href="{{ route('page.show', 10) }}">
                                    {{ __('About B2BWood.com') }}
                                </a>
                            </span>

                        </li>

                        <li>
                            <span>
                                <a href="{{ route('page.show', 9) }}">
                                    {{ __('Benefits for business') }}
                                </a>
                            </span>
                        </li>

                        <li>
                            <span>
                                <a href="{{ route('page.show', 8) }}">
                                    {{ __('Payments') }}
                                </a>
                            </span>
                        </li>
                    </ul>
                </li>


            @endguest


           
            @guest
            @else
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-small">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
</div>
