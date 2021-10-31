<div class="product card">
    <div class="product-image">
        <a href="{{ route('products.show', $product->id) }}">
            <img src=" {{ $product->getImage() }}" alt="{{ $product->product_name }}"/>
        </a>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <a href="{{ route('products.show', $product->id) }}" class="product-title">
                <span>
                    {{ $product->product_name }}
                </span>
            </a>

            @auth
                @if(Auth::user()->id === $product->user_id)
                    <x-input.link class="btn edit d-flex align-items-center" href="#">
                        @include("components.icons.pencil-primary")
                        <span class="ml-2">{{ __('Edit') }}</span>
                    </x-input.link>
                @endif
            @endauth 
            
      </div>

      <div class="product__description">
        {{ $product->description }}
      </div>

        <div class="product__price">{{ __("Price") }}: {{ $product->getPrice() }}</div>

        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary customized-1 btn-block product-details-btn">
            {{ __("Product info") }}
        </a>

    </div>


</div>
