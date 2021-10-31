@extends('layouts.new')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    @include('components.sidebars.default-sidebar')
                </div>
                <div class="col-sm-8">
                    <form method="post" action="{{ route('logistics.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h3 class = "sub-title">{{ __("Logistics type") }}</h3>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_type" value="1"> {{ __("Air freight") }} </label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_type" value="2"> {{ __("Cargo truck") }}</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_type" value="3"> {{ __("Courier") }}</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_type" value="4"> {{ __("Container ship") }}</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_type" value="5"> {{ __("Train") }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3 class = "sub-title">{{ __("Pickup details") }}</h3>
                            </div>
                            <div class="col-4">
                                @include('components.forms.countries-select-new', ['label' => 'Origin Country', 'name' => 'origin_country'])
                            </div>
                            <div class="col-4">
                                {{ Form::ewInput('Origin city', 'origin_city', null, ['required']) }}

                            </div>
                            <div class="col-4">
                                {{ Form::ewInput('Origin zip', 'origin_zip', null, ['required']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <h3 class = "sub-title">{{ __("Destination details") }}</h3>
                            </div>
                            <div class="col-4">
                                @include('components.forms.countries-select-new', ['label' => 'Destination country', 'name' => 'destination_country'])
                            </div>
                            <div class="col-4">
                                {{ Form::ewInput('Destination city', 'destination_city', null, ['required']) }}
                            </div>                            
                            <div class="col-4">
                                {{ Form::ewInput('Destination zip', 'destination_zip', null, ['required']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <h3 class = "sub-title">{{ __("Package information") }}</h3>
                            </div>
                            <div class="col-3">
                                {{ Form::ewInput('Weight (kg)', 'weight', null, ['required']) }}
                            </div>
                            <div class="col-3">
                                {{ Form::ewInput('Length (cm)', 'length', null, ['required']) }}
                            </div>
                            <div class="col-3">
                                {{ Form::ewInput('Width (cm)', 'width', null, ['required']) }}
                            </div>

                            <div class="col-3">
                                {{ Form::ewInput('Height (cm)', 'height', null, ['required']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class = "shinny-label" for="description">{{ __("Product description") }}</label>
                                <textarea name="description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <input type="submit" class="btn btn-primary" value="{{ __("Create request") }}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
