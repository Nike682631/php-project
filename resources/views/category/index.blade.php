@extends('layouts.new')

@section('content')
@include("components.headers.category-header")
    <section class="content sm">
        <div class="container">
            <div class="row">
                <div class="category-description col-md-10 px-3 py-5">
                    {{ __('Subscribed members gain instant access to the largest database of wood and timber suppliers, manufacturers, furniture companies, wood processing equipment providers from all over the globe. Advanced sorting algorithm allows qualifying available products by the type of wood, measurement sizes, country of origin, and more. Find the supplier which is closest to you.') }}                    
                </div>
                <div class="d-flex justify-content-between flex-wrap category-container">
                    @foreach($topLevelCategories as $category)
                        @include('components.cards.category-card')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

