@auth
    @if(Auth::user()->id == $user->id)
        <ul class="nav nav-tabs">

            <li>
                <a href="{{ route('user.show', [$user->id]) }}"
                   class="btn btn-sm btn-success float-sm-right">{{ __('Company profile') }}</a>
            </li>
            <li>
                <a href="{{ route('user.edit', [$user->id]) }}"
                   class="btn btn-sm btn-success float-sm-right">{{ __('Edit company info') }}</a>
            </li>
            <li>
                <a href="{{ route('logistics.index') }}"
                   class="btn btn-sm btn-success float-sm-right">{{ __('Logistic request') }}</a>
            </li>
            <li>
                <a href="{{ route('user.products', $user->id) }}"
                   class="btn btn-sm btn-success float-sm-right">{{ __('Products') }}</a>
            </li>
            <li>
                <a href="{{ route('products.create') }}"
                   class="btn btn-sm btn-success float-sm-right">{{ __('Add Product') }}</a>
            </li>
        </ul>
    @endauth
@endif
