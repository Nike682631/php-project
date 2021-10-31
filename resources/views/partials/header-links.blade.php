<div class="col-12 col-lg-auto mr-lg-auto subnav-left">
    <div class="nav-title">
        <a class="text-white" href="{{ route('category.index') }}">
             <span><img
                         src="{{ asset('assets/user/images/wood.svg') }}"
                         alt=""></span>
            {{ __('Services') }}
        </a>
    </div>
    <ul>
        <li class="categories-content">
            <a href="{{ route('category.show', '449') }}">
                                    <span><img
                                                src="{{ asset('assets/user/images/services-wh.svg') }}"
                                                alt=""></span>
                {{ __('Logistics') }}
            </a></li>
        <li class="categories-content">
            <a href="{{ route('category.show', 463) }}">
                                    <span><img
                                                src="{{ asset('assets/user/images/services-wh.svg') }}"
                                                alt=""></span>
                {{ __('Banking') }}
            </a></li>

        <li class="categories-content">
            <a href="{{ route('category.show', 472) }}">
                                    <span><img
                                                src="{{ asset('assets/user/images/services-wh.svg') }}"
                                                alt=""></span>
                {{ __('Legal') }}
            </a></li>

    </ul>
</div>
<div class="col-12 col-lg-auto ml-lg-auto mt-2 mt-lg-0 subnav-right">
    <div class="nav-title">
        <a href="{{ route('products.category.index') }}" class="text-white">
             <span><img
                         src="{{ asset('assets/user/images/carving.svg') }}"
                         alt=""></span>
            {{ __('Products') }}
        </a>
        </div>
    <ul>
        <li>
            <a href="{{ route('products.category', 194) }}">
                <span>
                    <img src="{{ asset('assets/user/images/wood-icon.svg') }}" alt="">
                </span>
                {{ __('Wood') }}
            </a>
        </li>
        <li><a href="{{ route('products.category', 266) }}"><span>
                    <img src="{{ asset('assets/user/images/flooring-icon.svg') }}" alt="">
                </span> {{ __('Flooring') }}
            </a>
        </li>
        <li><a href="{{ route('products.category', 349) }}"><span>
                    <img src="{{ asset('assets/user/images/machinery-icon.svg') }}" alt="">
                </span> {{ __('Machinery') }}</a></li>
        <li>
        <a href="{{ route('products.category', 297) }}">
            <span>
                <img src="{{ asset('assets/user/images/furniture-icon.svg') }}" alt="">
            </span>
            {{ __('Furniture') }}
        </a>
        </li>
    </ul>
</div>