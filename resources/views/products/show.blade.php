@extends('layouts.main')

@section('content')
    @component('components.headers.product-detail-header', [
        'title' => 'Raw Wood Logs'
    ])
    @endcomponent
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="container-product-detail d-flex flex-wrap">
                        <div class="col-md-6 col-12 mb-5">
                            <img class="container-product-detail__img" src="{{ $product->getImage() }}" />
                            <div class="product-images">
                                @foreach($product->media as $media)
                                    <img 
                                        onclick="javascript:showProductImg('{{ $media->getFullUrl() }}')" 
                                        src="{{ $media->getFullUrl() }}"
                                        alt="" />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <p class="container-product-detail__name mb-4">
                                {{ $product->product_name }}
                            </p>
                            <p class="container-product-detail__label mb-2">{{ __("Product Description") }}</p>
                            <p class="container-product-detail__description mb-4">
                                {{ $product->description }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="container-product-detail__label mb-0">
                                        {{ __("Price From") }}
                                    </p>
                                    <p class="container-product-detail__price">
                                        {{ $product->getFromPrice() }}
                                    </p>
                                    <p class="container-product-detail__label mb-0">
                                        {{ __("Price To") }}
                                    </p>
                                    <p class="container-product-detail__price">
                                        {{ $product->getToPrice() }}
                                    </p>
                                </div>
                                <a class="btn btn-primary btn-product-send-msg customized-1" href="{{ route('message.create', $product->user->id) }}" class="btn btn-primary">
                                    <span class="pr-3">
                                        @include('components.icons.envelop-wh')
                                    </span>
                                    {{ __("Send Message") }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container-related-product">
                        <p class="container-product-detail__name mb-4">{{ __("Related products") }}</p>
                        <div class="d-flex flex-wrap container-related-product__container-cards">
                            @foreach($product->getRelatedProducts() as $index => $product)
                                <div class="col-sm-4 col-md-4">
                                    @include('components.cards.product-card')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <img class="border rounded-circle img-product-company-avatar" src="{{ asset($product->user->getPhoto()) }}" />
                    <div class="container-company-detail">
                        <p class="container-company-detail__label-title pb-2">{{ __("Company Info") }}</p>
                        <p class="container-product-detail__label mt-4 mb-2">{{ __("Company") }}</p>
                        <p class="container-company-detail__text mb-4">{{ $product->user->name }}</p>
                        <p class="container-product-detail__label mb-2">{{ __("Contacts") }}</p>
                        <p class="container-company-detail__text mb-2">{{ $product->user->email }}</p>
                        <p class="container-company-detail__text mb-4">{{ $product->user->info->person_phone }}</p>
                        <p class="container-product-detail__label mb-2">{{ __("Address") }}</p>
                        <p class="container-company-detail__text mb-4">{{ $product->user->info->address }}</p>
                        <p class="container-product-detail__label mb-2">{{ __("Employees") }}</p>
                        <p class="container-company-detail__text mb-5">{{ $product->user->info->employees_number }}</p>
                        <a href="{{ route('user.show', $product->user->id) }}" class="btn btn-primary customized-1">
                            {{ __("Company Details") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('components.modals.img-lightbox')

@push('footer_scripts')
    <script type="text/javascript">
        var lightboxModal = document.getElementById("lightboxModal");
        var modalImg = document.getElementById("id-img-lightbox");
        function showProductImg(url) {
            lightboxModal.style.display = "block";
            modalImg.src = url;
        } 
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("lightbox-close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            lightboxModal.style.display = "none";
        }
    </script>
@endpush