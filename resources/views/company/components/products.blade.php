<div class="products-list">
    <div class="row">
        <div class="col-12">
            <div class="col-md-12 content">
              <div class="row">
                <div class="col-8">
                  <h3 class="text-left products__title">{{ __("Products") }}</h2>

                </div>
                <div class="col-4 text-right">
                  <a class="products-view-all"
                     href="{{ route('user.products', $user->id) }}">
                      {{ __("View all") }} ({{ $user->products()->count() }})
                      <span class="pl-2">@include('components.icons.arrow-right')</span>                      
                  </a>
                </div>
              </div>
                @php $products = $user->products->take(3); @endphp
                <div class="row products">
                    @foreach($products as $index => $product)
                        @if (Auth::user()->id == $user->id && $index < 2 || Auth::user()->id != $user->id)
                            <div class="col-sm-4 col-md-4 mb-3">
                                @include('components.cards.product-card')
                            </div>
                        @endif
                    @endforeach
                    @auth
                        @if (Auth::user()->id == $user->id)
                            <div class="col-sm-4 col-md-4 mb-3">
                                <a class="btn-add-product" href="{{ route('products.create') }}">
                                    <div class="product card add-new d-flex align-items-center justify-content-center">
                                        @include('components.icons.bold-add-grey')
                                        <span class="product label mt-3">{{ __("Add Product") }}</span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>


</div>
