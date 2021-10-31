<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B2BWood.com</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-16857273-19"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date());
        gtag('config', 'UA-16857273-19');
    </script>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/user/images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/user/images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/user/images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/user/images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/user/images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/user/images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/user/images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/user/images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/user/images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/user/images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/user/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/user/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/user/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/user/images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#043029">
    <meta name="msapplication-TileImage" content="{{ asset('assets/user/images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#043029">
    <meta name="verify-paysera" content="cc62971f61b2482d4fa972b5c14522c5">
    <!-- main css files -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/custom_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eurowood.css') }}?ver=1.2.4" rel="stylesheet">
    <link href="{{ asset('styles/index.css') }}" rel="stylesheet">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/user/bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/user/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/user/bootstrap/js/bootstrap-4.2.1.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/custom.js') }}?ver=1.2.3"></script>


    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    @yield('stylesheets')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176760551-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-176760551-1');
    </script>

    <!--  Main CSS Entry file  -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @livewireStyles
</head>
<body class="d-flex flex-column h-100">
    <main role="main" class="flex-shrink-0">

        @include('layouts.components.notification')

        @include('layouts.components.header')


        @if(Session::has('message'))
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-white">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')

    </main>

    @include('layouts.components.footer')
    @include('components.modals.unauthorized')
    <!--Start of Tawk.to Script-->
    @auth
    @else
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f42a3761e7ade5df4433a51/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    @endauth
    <!--End of Tawk.to Script-->

    @stack('footer_scripts')

    @livewireScripts

</body>

<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#03211d"
                },
                "button": {
                    "background": "#33A695"
                }
            },
            "theme": "classic",
            "content": {
                "message": "We use cookies to ensure the best experience on our website. If you continue to use this site we will assume that you are okey with it.",
                "href": "https://b2bwood.com/page/5"
            }
        })});
</script>

@yield('custom_scripts')
</html>
