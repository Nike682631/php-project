<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class='card-body'>

        <div class="activity_type">

            {{ __('Added a new product') }}
            <a href="{{ route('products.show', $item->id) }}">
                {{ $item->product_name }}
            </a>
        </div>
        <div class="activity_content">
            {{ $item->description }}
            <div>
                <img src="{{ $item->getImage() }}" />
            </div>
        </div>
    </div>
</div>
