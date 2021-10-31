<div class="col-sm-12">
    <div class="col-sm-12 d-flex justify-content-between flex-wrap align-items-center all-products-header">
        <p class="all-products-title mb-0 col-md-6 col-sm-6 col-12 pl-0">{{ __("All Products") }}</p>
        <div class="col-md-4 col-sm-6 col-12 px-0">
            <select wire:model="order" name="country" class="form-control dropdown-sort__product" required>
                <option value="desc" selected>Sort by: Price (High to Low)</option>
                <option value="asc">Sort by: Price (Low to High)</option>
            </select>
        </div>
    </div>  
    <div class="d-flex flex-wrap">
        @foreach($products as $product)
            <div class="col-sm-4 col-md-4 mb-3">
                @include('components.cards.product-card')
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary my-5" wire:click="loadMore()">{{ __("Load More") }}</a>
    </div>
</div>