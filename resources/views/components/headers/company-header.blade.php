<div class="b2b-company w-100">
    <div class="b2b-company__header">
        <!-- @include('company.components.user-actions') -->
        <div class="cover mb-4">
            @if ($user->cover == null)
                <img src="{{ asset('assets/images/demo-cover.png') }}" alt="{{ $user->info->company_name }}">
            @else
                <div class="cover-background"
                    style="height: 270px; background-position: center center; background: url({{ asset('uploads/' . $user->cover) }}); background-size: cover;">
                </div>
            @endif

            <div class="company-header-details text-white">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9 ">
                            <div class="row">

                                <div class="company-details__left mr-auto pl-5">

                                    <div class="company-header-details__wrapper">
                                        <div class="company-details-tagline">
                                            {{ __('COMPANY NAME') }}
                                        </div>
                                        <h1 class="company-details-value">
                                            {{ $user->info->company_name }}
                                        </h1>
                                    </div>

                                    <div class="company-header-details__wrapper">
                                        <div class="company-details-tagline">
                                            {{ __('COMPANY RATING') }}
                                        </div>
                                        @component('components.rating.star', [
                                            'rate' => $user->rate()
                                        ])
                                        @endcomponent
                                    </div>
                                    @if ($user->id != Auth::user()->id)
                                        <div class="company-header-details__wrapper">
                                            <div class="company-details-tagline">
                                                {{ __('FAVORITE') }}
                                            </div>
                                            @if($user->isLiked() == "true")
                                                @include('components.icons.like-active-wh')
                                            @else
                                                @include('components.icons.like-inactive')
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                @auth
                                    @if (Auth::user()->id == $user->id)
                                        <x-input.link target="#coverUploadModal" type="modal" class="btn img-text d-flex align-items-center mr-4">
                                            @include("components.icons.camera-wh")          
                                            <span class="pl-3">{{ __('Change cover') }}</span>
                                        </x-input.link>
                                    @else 
                                        <a class='btn btn-primary btn-outline-primary customized mr-4' target="_blank"
                                            href="{{ route('message.create', $user->id) }}">
                                            <i class="mr-3 far fa-envelope"></i> {{ __('Contact company') }}
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row company-details">
            <div class="col-md-3">
                <div class="profile">
                    @auth
                        @if (Auth::user()->id == $user->id)
                            <div class="logo-form">
                                <x-input.link target="#logoUploadModal" type="modal" class="btn img">
                                    @include("components.icons.camera-wh")                                    
                                </x-input.link>
                            </div>

                        @endauth
                    @endif
                    @if ($user->photo == null)
                        <img src="{{ asset('assets/user/images/thumb.jpg') }}"
                            alt="{{ $user->info->company_name }} banner">
                    @else
                        <img src="{{ asset('uploads/' . $user->photo) }}"
                            alt="{{ $user->info->company_name }}  logo">
                    @endif
                </div>

                <div class="card info-card company-info-card-1 pl-2">
                    <div class="info-card__header card-header">
                        <div class="card-subheading d-flex justify-content-between align-items-center">
                            <span>{{ __('Representatives') }}</span>                            
                            
                            @if (Auth::user()->id == $user->id)
                                <x-input.link target="#createRepresentativeModal" type="modal" class="btn edit d-flex align-items-center">
                                    @include("components.icons.pencil-primary")
                                    <span class="ml-2">{{ __('Edit') }}</span>
                                </x-input.link>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="representative-row">
                            <div class="representative__name">
                                {{ $user->info->person_full_name }}
                                <br>
                                {{ $user->info->person_job_title }}
                            </div>

                            <div class="representative__phone">
                                <a href="tel:{{ $user->info->person_phone }}">{{ $user->info->person_phone }}</a>
                            </div>

                            <div class="representative__email">
                                <a href="mailto:{{ $user->email }}?Subject=Hello"
                                    target="_top">{{ $user->email }}</a>
                            </div>
                        </div>
                    </div>
                    @foreach($user->representatives as $representative)
                        @component('components.representative.representative-card', [
                            'representative' => $representative,
                        ])
                        @endcomponent
                    @endforeach
                </div>

                <div class="card info-card">
                    <div class="info-card__header card-header">
                        <div class="card-subheading">
                            {{ __('Company info') }}

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-row">
                            <div class="card-row__tagline">
                                {{ __('Company') }}
                            </div>
                            <div class="card-row__value">
                                @if (Auth::user()->id == $user->id)

                                    <livewire:edit-company-name :user="$user">
                                    @else
                                        {{ $user->info->company_name }}
                                @endif
                            </div>
                        </div>

                        <div class="card-row">
                            <div class="card-row__tagline">
                                {{ __('Contacts') }}
                            </div>
                            <div class="card-row__value">
                                @if (Auth::user()->id == $user->id)
                                    <livewire:edit-company-email :user="$user">
                                    <livewire:edit-company-phone :user="$user">
                                @else
                                    <div>{{ $user->email }}</div>
                                    <div>{{ $user->info->person_phone }}</div>                                    
                                @endif
                            </div>
                        </div>

                        <div class="card-row">
                            <div class="card-row__tagline">
                                {{ __('Address') }}
                            </div>
                            <div class="card-row__value">
                                @if (Auth::user()->id == $user->id)
                                    <livewire:edit-company-address :user="$user">
                                @else
                                    {{ $user->info->address }}
                                @endif
                            </div>
                        </div>

                        <div class="card-row">
                            <div class="card-row__tagline">
                                {{ __('Employees') }}
                            </div>
                            <div class="card-row__value">
                                @if (Auth::user()->id == $user->id)
                                    <livewire:edit-company-employee :user="$user">
                                @else
                                    {{ $user->info->employees_number }}
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card info-card">
                    <div class="info-card__header card-header">
                        <div class="card-subheading">
                            {{ __('Additional info') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-row">
                            <div class="card-row__tagline mb-10">
                                {{ __('Certificates') }}
                            </div>
                            <div class="card-row__value d-flex flex-wrap">
                                @foreach ($user->certificates as $index => $certificate)
                                    @if ($index < 3)
                                        <x-headers.company-certificate :certificate="$certificate" />
                                    @endif
                                @endforeach
                                @if ($user->certificates->count() > 3)
                                    <div class="collapse" id="allCompanyCerts">
                                        @foreach ($user->certificates as $index => $certificate)
                                            @if ($index > 2)
                                                <x-headers.company-certificate :certificate="$certificate" />
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                @auth
                                    @if (Auth::user()->id == $user->id)
                                        <a data-toggle="modal" data-target="#certificateUploadModal" href="#" role="button">
                                            <div
                                                class="card-row__add-certificate d-flex align-items-center justify-content-center bg-white">
                                                @include('components.icons.add-grey')
                                            </div>
                                        </a>
                                    @endauth
                                @endif
                            </div>

                            @if ($user->certificates->count() > 3)
                                <a data-toggle="collapse" href="#allCompanyCerts" role="button" aria-expanded="false"
                                    aria-controls="allCompanyCerts" id="btn-expander">

                                    <p class="mt-2 btn-load-more show">{{ __('Load More') }}</p>
                                    <p class="mt-2 btn-load-more">{{ __('Collapse') }}</p>
                                </a>
                            @endif
                        </div>
                        <div class="reviews-title">
                            <span class="latest-reviews"> {{ __('Latest Reviews') }} </span>
                            @if (Auth::user()->id != $user->id)
                                <livewire:create-review :company="$user" :author="Auth::user()">
                            @endif
                        </div>
                        <livewire:reviews-list :user="$user">
                    </div>
                </div>
            </div>


            <div class="col-md-9">

                <!-- Company description -->
                @include("company.components.company-description")

                <div class="info-card-light card ml-2">
                    <div class="card-body">
                        <div class="row customized-1">
                            <div class="col-6 info-card__tags-list">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="info-card__heading">{{ __('Sells') }}</span>
                                    @auth
                                        @if (Auth::user()->id == $user->id)
                                            <x-input.link class="btn edit d-flex align-items-center" link="{{ route('user.edit', Auth::user()->id) }}">
                                                @include("components.icons.pencil-primary")
                                                <span class="ml-2">{{ __('Edit') }}</span>
                                            </x-input.link>
                                        @endif
                                    @endauth
                                </div>                                
                                <div class="tags">
                                    @guest
                                        <span>{{ __('Hidden') }}</span>
                                    @else
                                        @foreach ($user->sells->take(10) as $item)
                                            <div class="tag">
                                                <a target="_blank" href="{{ route('category.show', $item->id) }}">
                                                    {!! $item->categoryPathPrint() !!}
                                                </a>
                                            </div>

                                        @endforeach

                                    @endguest
                                </div>
                            </div>
                            <div class="col-6 info-card__tags-list">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="info-card__heading">{{ __('Buys') }}</span>
                                    @auth
                                        @if (Auth::user()->id == $user->id)
                                            <x-input.link class="btn edit d-flex align-items-center" link="{{ route('user.edit', Auth::user()->id) }}">
                                                @include("components.icons.pencil-primary")
                                                <span class="ml-2">{{ __('Edit') }}</span>
                                            </x-input.link>
                                        @endif
                                    @endauth
                                </div>                                
                                <div class="tags">
                                    @guest
                                        <span>{{ __('Hidden') }}</span>
                                    @else
                                        @foreach ($user->buys->take(10) as $item)
                                            <div class="tag">
                                                <a target="_blank" href="{{ route('category.show', $item->id) }}">

                                                    {!! $item->categoryPathPrint() !!}
                                                </a>
                                            </div>

                                        @endforeach
                                    @endguest
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-12">
                        @if ($user->info->address)
                            <div id="map" style="height: 393px;"></div>
                            <!-- This is needed for google map to load -->
                            <div style="display: none;" id="address">
                                <strong>{{ __('Address: ') }}</strong> <br>
                                {{ $user->info->address }}
                            </div>
                    </div>
                    @endif

                    <div class="col-sm-12">
                        @include('company.components.products')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('components.modals.logo-upload')
@include('components.modals.cover-upload')
@include('components.modals.certificate-upload')
@include('components.modals.cert-delete-confirm')
@include('components.modals.img-lightbox')
@include('components.modals.create-representative')

@section('custom_scripts')
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=AIzaSyAP363m01M2tA8v45FLOLo8czBWCd4mAj0&sensor=false"></script>
    <script>
        $(document).ready(function() {

            $('#allCompanyCerts').on('hidden.bs.collapse', function() {
                var children = $("#btn-expander").children();
                $(children[0]).toggleClass('show');
                $(children[1]).toggleClass('show');
            });

            $('#allCompanyCerts').on('shown.bs.collapse', function() {
                var children = $("#btn-expander").children();
                $(children[0]).toggleClass('show');
                $(children[1]).toggleClass('show');
            });

            var geocoder;
            var map;
            var address = document.getElementById("address").textContent;

            function initialize() {
                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(-34.397, 150.644);
                var myOptions = {
                    zoom: 14,
                    center: latlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                    },
                    navigationControl: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map"), myOptions);
                if (geocoder) {
                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                map.setCenter(results[0].geometry.location);

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<b>' + address + '</b>',
                                    size: new google.maps.Size(150, 50)
                                });

                                var marker = new google.maps.Marker({
                                    position: results[0].geometry.location,
                                    map: map,
                                    title: address
                                });
                                google.maps.event.addListener(marker, 'click', function () {
                                    infowindow.open(map, marker);
                                });

                            } else {
                            }
                        } else {
                        }
                    });
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        });

    </script>
@endsection
