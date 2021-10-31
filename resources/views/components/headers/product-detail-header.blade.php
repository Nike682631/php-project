<section class="page-header page-header__small bg-overlay">
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-between align-items-center">
        <p class="font-size-30 text-white page-header__title mb-0">{{ __("$title")}} </p>
        <a class="btn-back-to-all-products d-flex align-items-center" href="{{ route('products.index') }}">
            @include('components.icons.arrow-left-wh')
            <span class="pl-2">{{ _("Back to All Products") }}</span>
        </a>
      </div>
    </div>
  </div>
</section>