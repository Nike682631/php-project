@extends('layouts.new')

@section('content')
@include("components.sections.page-header", ["title" => "Logistics"])
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    @include('components.sidebars.default-sidebar')
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="logistics-types">
                            <div class="type">
                                <a href="{{ route('logistics.type', 'air-freight') }}">{{ __("Air freight") }}</a>
                            </div>

                            <div class="type">
                                <a href="{{ route('logistics.type', 'cargo-truck') }}">{{ __("Cargo truck") }}</a>
                            </div>

                            <div class="type">
                                <a href="{{ route('logistics.type', 'courier') }}">{{ __("Courier") }}</a>
                            </div>
                            <div class="type">
                                <a href="{{ route('logistics.type', 'container-ship') }}">{{ __("Container ship") }}</a>
                            </div>

                            <div class="type">
                                <a href="{{ route('logistics.type', 'train') }}">{{ __("Train") }}</a>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan = "4">{{ __("Logistics requests") }}</th>
                                <th colspan="2" class="text-right">
                                    @auth
                                    <a href="{{ route('logistics.create') }}" class="btn btn-sm btn-primary">{{ __('Create New Request') }}</a>
                                    @endauth
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>
                                    <label> {{ __('from:') }} </label>
                                    <p>{{$request->origin_city}}, {{$request->origin_country}}</p>
                                </td>
                                <td>
                                    <label> {{ __('to:') }} </label>
                                    <p>{{ $request->destination_city }}, {{ $request->destination_country }} </p>
                                </td>

                                <td>
                                    <label> {{ __('weight:') }} </label>
                                    <p> {{ $request->weight }} {{ __("KG") }} </p>
                                </td>
                                <td>
                                    <label> {{ __('dimensions:') }} </label>
                                    <br />
                                    <p>{{ $request->length }} x {{ $request->width }} x {{ $request->height }}
                                </td>
                                <td>
                                    <label> {{ __('type:') }}</label>
                                   @include('logistics.components.request-type-component')
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('logistics.show', $request->id) }}"
                                       class="btn btn-lg btn-secondary">{{ __('More Info') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        @if(count($requests) == 0)
                            <tr>
                                <td colspan="6">{{ __('No logistics requests') }} </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>


@endsection