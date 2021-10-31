@extends('layouts.main')
@isset($category->name)
    @section('title', $category->name . ' - B2BWood.com')
    @endisset

    @section('content')
        @if ($category)
            @component('components.headers.common-header', [
                'title' => $category->name,
                ])
            @endcomponent
        @elseif ($type == 'services')
            @component('components.headers.common-header', [
                'title' => __('Services'),
            ]) @endcomponent
        @elseif($type == 'products')
            @component('components.headers.common-header', [
                'title' => __('Products'),
                ])
            @endcomponent
        @endif
        
        <section class="content sm">
            <div class="container">
                <livewire:services.main-content :catId="$cat_id" />
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
                var what, a = arguments,
                    L = a.length,
                    ax;
                while (L > 1 && arr.length) {
                    what = a[--L];
                    while ((ax = arr.indexOf(what)) !== -1) {
                        arr.splice(ax, 1);
                    }
                }
                return arr;
            }

            $(document).ready(function() {


                $('select').on('change', function(e) {
                    countries = [this.value];
                    page = 1;

                });
                $(".filters-cat").click(function() {
                    $(".filters-cat").removeClass("active");
                    $(this).addClass("active");
                    category = parseInt($(this).attr("data-id"))
                    page = 1;

                });
                $('.filters-buy').click(function() {
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
                $('.filters-sell').click(function() {
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
                $('.filters-prev').click(function() {
                    if (page > 1) {
                        page--;

                    }
                });
                $('.filters-next').click(function() {
                    if (page < totalPages) {
                        page++;

                    }
                });
            });

        </script>
    @endsection
