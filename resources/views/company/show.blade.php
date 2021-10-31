@extends('layouts.new')


@section('content')
@include("components.sections.page-header")
    <section class="company">
        <div class="container">
            <div class="company row ">
                @include('components.headers.company-header')
              
            </div>
        </div>
    </section>
@endsection

@section('custom_scripts')
    <script>
        {{--window.history.pushState("Company view", "", "/{{ $user->info->companyName }}");--}}
    </script>
@endsection
