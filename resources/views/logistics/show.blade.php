@extends('layouts.main')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-7">


                            <div class="product-seller-card">
                                <a href="{{ route('logistics.index') }}" class="btn btn-primary btn-sm mb-3">
                                   <  {{ __("Back to all logistics requests") }}
                                </a>
                                <h1>{{ __("Logistics request: ") }} #{{ $logisticsRequest->id }}

                                </h1>
                                <h2 class="mb-2">{{ __("Delivery details") }}</h2>
                                @if($logisticsRequest->request_type)
                                <h3>
                                    {{ __("Transportation type: ") }}
                                    @php $request = $logisticsRequest; @endphp
                                    @include('logistics.components.request-type-component')
                                </h3>
                                @endif
                                <div class="price">
                                    <strong>
                                        {{ __("Deadline: ") }} {{ $logisticsRequest->pickup_at }}
                                    </strong>
                                </div>
                                <div>
                                    <strong>
                                    {{ __("From: ") }}  {{ $logisticsRequest->origin_country }}, {{ $logisticsRequest->origin_city }} , {{ $logisticsRequest->origin_zip }}
                                    </strong>
                                </div>

                                <div>
                                    <strong>
                                        {{ __("To: ") }}  {{ $logisticsRequest->destination_country }}, {{ $logisticsRequest->destination_city }} , {{ $logisticsRequest->destination_zip }}
                                    </strong>
                                </div>


                                <hr>
                                <h5 class="mb-2">{{ __("Package details") }}</h5>

                                <div>
                                    {{ __("Weight: ") }} {{ $logisticsRequest->weight }} kg
                                </div>

                                <div>
                                    {{ __("Dimensions: ") }} {{ $logisticsRequest->length }}
                                    x {{ $logisticsRequest->height }} x {{ $logisticsRequest->width }} cm
                                </div>

                                <div>
                                    {{ __("Pieces: ") }} {{ $logisticsRequest->pieces }}
                                </div>

                                <div>
                                    {{ __("Pack type: ") }} {{ $logisticsRequest->pack_type }}
                                </div>


                                <div class="product-description mt-5">
                                    <h4>{{ __("Delivery description") }}</h4>
                                    <hr>
                                    {!! $logisticsRequest->description !!}
                                </div>

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="contact-seller mt-3">
                                <h5>{{ __("Client details") }}</h5>
                                @php
                                    $user = $logisticsRequest->user;
                                @endphp
                                @include('components.cards.company-card-small')
                            </div>


                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>


@endsection