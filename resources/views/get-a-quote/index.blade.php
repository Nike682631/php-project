@extends('layouts.main')

@section('content')
    <section class="content info-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>{{ __("Get A Quote") }}</h1>
                    <p>
                        {{ __("Fill out the form and schedule a meeting with our wood-sales expert to see how B2B wood can help you to grow your business") }}
                    </p>
                    <!-- Calendly inline widget begin -->
                    <div class="calendly-inline-widget" data-url="https://calendly.com/svirskis/30min" style="width: 100%; height:1030px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
                    <!-- Calendly inline widget end -->
                </div>

                <div class="col-sm-4">
                    @include('components.sidebars.default-sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
