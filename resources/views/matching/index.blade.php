@extends('layouts.new')

@section('content')
@component('components.headers.common-header', [
    'title' => 'Matches'
])
@endcomponent
    <section class="content">
        <div class="container py-5">
            <div class="row match-row">
                <div class="match-left-container col-md-3 col-sm-12">
                    <a href="{{ isset($matchSettings['match_link']) ? URL::to($matchSettings['match_link']) : '/' }}" target="_blank">
                        @if (isset($matchSettings['match_cover_photo']))
                            <img src="{{ asset('storage/'.$matchSettings['match_cover_photo']) }}"/>
                        @else 
                            <img src="{{ asset('assets/user/images/img-default-side.png') }}"/>
                        @endif
                    </a>
                </div>

                <div class="flex-grow-1 col-md-9 col-sm-12 match-right-container">
                    <div class="border rounded match-tile-container">
                        <p class="match-tile-title mb-0">{{ __("Your seller matches") }}</p>

                        @foreach($relatedSellers as $company)
                            @component('matching.components.match-card', [
                                'company' => $company
                            ])
                            @endcomponent
                        @endforeach
                    </div>

                    <div class="border rounded match-tile-container">
                        <p class="match-tile-title mb-0">{{ __("Your buyer matches") }}</p>

                        @foreach($relatedBuyers as $company)
                            @component('matching.components.match-card', [
                                'company' => $company
                            ])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
