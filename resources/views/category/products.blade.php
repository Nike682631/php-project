@extends('layouts.main')

@section('content')
    <section class="content sm">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg sidebar collapse sidebar-collapse" id="sidebar">
                    <div class="categories mt-lg-5">
                        
                        @include('category.components.category-tree')
                    </div>

                </div>
                <div class="col-12 col-lg">
                    <div class="list-title">
                        <button class="btn btn-sm btn-success d-lg-none float-right" type="button"
                                data-toggle="collapse" data-target="#sidebar"
                                aria-label="Toggle categoriescompanies"> {{ __('Categories') }} </button>
                        <h1>
                            @if($type == 'services')
                                {{ __('Services ') }}
                            @elseif($type == 'products')
                                {{ __('Products ') }}
                            @endif
                            @if($category)
                                : {{ $category->name }}
                            @endif
                        </h1>
                    </div>
                    <div>
                        @auth
                            @if($companies->count() == 0)
                                <p id="no-companies" class="text-center">
                                    {{ __("There are no companies in this category") }}</p>
                            @endif
                        @endauth
                    </div>
                    <div class="list">
                        @foreach($companies as $user)
                            @include('components.cards.company-card')
                        @endforeach
                    </div>

                    @auth
                        <div class="wood-pagination text-center mt-3">
                            {{ $companies->links() }}
                        </div>

                    @else
                        @include('components.sections.restricted-content')
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_scripts')
    <script>


        let category = 0;
        let action = ['buy', 'sell'];
        let page = 1;
        let countries = [];


        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        $(document).ready(function () {


            $('select').on('change', function (e) {
                countries = [this.value];
                page = 1;

            });
            $(".filters-cat").click(function () {
                $(".filters-cat").removeClass("active");
                $(this).addClass("active");
                category = parseInt($(this).attr("data-id"))
                page = 1;

            });
            $('.filters-buy').click(function () {
                if (!$(this).prev().is(":checked")) {
                    if (jQuery.inArray("buy", action) === -1) {
                        action.push('buy');
                    }
                } else {
                    if (jQuery.inArray("buy", action) !== -1) {
                        action = removeA(action, 'buy');
                    }
                }
                page = 1;

            });
            $('.filters-sell').click(function () {
                if (!$(this).prev().is(":checked")) {
                    if (jQuery.inArray("sell", action) === -1) {
                        action.push('sell');
                    }
                } else {
                    if (jQuery.inArray("sell", action) !== -1) {
                        action = removeA(action, 'sell');
                    }
                }
                page = 1;

            });
            $('.filters-prev').click(function () {
                if (page > 1) {
                    page--;

                }
            });
            $('.filters-next').click(function () {
                if (page < totalPages) {
                    page++;

                }
            });
        });
    </script>
@endsection
