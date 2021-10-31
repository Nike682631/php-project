<section class="categories-home">

  <div class="d-flex">
    <div class="home-category-slider">
      <img src="/assets/images/home-side.jpg" />
      <img src="/assets/images/home-side.jpg" />
      <img src="/assets/images/home-side.jpg" />
      <img src="/assets/images/home-side.jpg" />
    </div>
    <div class="category-links-holder d-flex flex-wrap">
      <div class="browse-companies w-100">
        <div class="browse-companies__heading">
          {{ __("Browse Companies") }}
        </div>
        <div class="browse-companies__description">
          {{ __("Select a category of companies providing products or services and get specific results according to your needs.")}}
        </div>
      </div>

      <div class="categories-wrapper d-flex w-100 flex-wrap">
        <div class="col-12 col-sm-6 border-right category-column">
          <div class="categories-heading">
            @include('components.icons.service-primary')
            <span class="pl-3">{{ __("Services") }}</span>
          </div>

          <div class="category-links">
            <div class="categories-block">
                <div class="categories-content">
                    <ul class="mb-0">
                        @foreach($serviceCategories as $index => $cat)
                          @if( $index < 10 )
                            <li class="d-flex">
                                <a class="d-flex align-items-center" href="{{ route('products.category', $cat->id) }}">
                                  <p class="mb-0">{{ $cat->name }}</p>
                                </a>
                            </li>
                          @endif
                        @endforeach
                    </ul>
                    
                    @if($serviceCategories->count() > 9)
                      <x-input.link-button text="View all" link="/services/" />
                    @endif

                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 category-column">
          <div class="categories-heading">
            @include('components.icons.product-primary')
            <span class="pl-3">{{ __("Products") }}</span>
          </div>

          <div class="category-links">
            <div class="categories-block">
                <div class="categories-content">
                    <ul class="mb-0">
                        @foreach($productCategories as $index => $cat)
                          @if( $index < 10 )
                            <li class="d-flex">
                                <a class="d-flex align-items-center" href="{{ route('products.category', $cat->id) }}">
                                  <p class="mb-0">{{ $cat->name }}</p>
                                </a>
                            </li>
                          @endif
                        @endforeach
                    </ul>

                    @if($productCategories->count() > 9)
                      <x-input.link-button text="View all" link="/products/" />
                    @endif
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  @include('components.sections.how-it-works')

</section>
