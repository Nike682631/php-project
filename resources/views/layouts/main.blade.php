<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'B2BWood.com')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('layouts.includes.favicons')
    @include('layouts.includes.styles')
    @include('layouts.includes.scripts')

    {{-- Old layout specific styles --}}
    <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/custom_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eurowood.css') }}?ver=1.2.4" rel="stylesheet">
    <link href="{{ asset('styles/index.css') }}" rel="stylesheet">
    {{-- END Old layout specific styles --}}
    <link rel="manifest" href="{{ asset('assets/user/images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#043029">
    <meta name="msapplication-TileImage" content="{{ asset('assets/user/images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#043029">
    <meta name="verify-paysera" content="cc62971f61b2482d4fa972b5c14522c5">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    @yield('stylesheets')
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.components.notification')
    @if ((new \Jenssegers\Agent\Agent())->isMobile())
        @include('layouts.components.header-mobile')
    @endif
    <main role="main" class="flex-shrink-0">
        @if ((new \Jenssegers\Agent\Agent())->isDesktop())
            @include('layouts.components.header')
        @endif


        @if (Session::has('message'))
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-white">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif

        @yield('content')

    </main>

@stack('footer_scripts')
<!-- LiveWire Script -->
@livewireScripts
</body>

@yield('custom_scripts')

</html>
