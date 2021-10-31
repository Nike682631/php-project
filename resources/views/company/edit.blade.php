@extends('layouts.main')

@section('content')
<section class="content sm">
    <div class="container">
        <ul class="nav nav-tabs">
            <li>
                <a href="{{ route('user.index', Auth::user()->id) }}" class="btn btn-sm btn-success float-sm-right">{{ __('Company profile') }}</a>
            </li>
            <li>
                <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-sm btn-success float-sm-right">{{ __('Edit company info') }}</a>
            </li>
            <li>
                <a href="{{ route('logistics.index') }}" class="btn btn-sm btn-success float-sm-right">{{ __('Logistic request') }}</a>
            </li>
            <li>
                <a href="{{ route('user.products', Auth::user()->id) }}" class="btn btn-sm btn-success float-sm-right">{{ __('Products') }}</a>
            </li>
            <li>
                <a href="#" class="btn btn-sm btn-success float-sm-right">{{ __('Change password') }}</a>
            </li>
        </ul>
        <div class="h1 section-title text-center mb-4">{{ __('Activities of the company') }}</div>
        <div class="row justify-content-center text-center section-description mb-4 mb-lg-5">
            <div class="col-lg-8 col-xl-7"> {{ __('Please fill information about your company') }}</div>
            @isset($_SESSION['message'])
            <div class="col-lg-8 col-xl-7">
                <div class="alert alert-success" role="alert" style="margin-top: 20px;">
                    {{ __('Profile updated successfully!') }}
                </div>
            </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('What types of products the company sells?') }}</h4>
                        <div id="sell_product" class="company-activities-list sell-form">
                            @include('components.forms.category-select' , ['type' => 'sell'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('What types of products the company buys?') }}</h4>
                        <div id="buy_product" class="company-activities-list buy-form">
                         @include('components.forms.category-select', ['type' => 'buy'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('What kind of services the company provides?') }}</h4>
                        <div id="sell_service" class="company-activities-list sell-form">
                            @include('components.forms.service-category-select', ['type' => 'sell'])

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('What kind of services the company needs?') }}</h4>
                        <div id="buy_service" class="company-activities-list buy-form">
                            @include('components.forms.service-category-select', ['type' => 'buy'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @method('PUT')
            @csrf
        <div class="h1 section-title text-center mt-4 mb-4">{{ __('Company information') }}</div>
        <div class="row justify-content-center text-center section-description mb-4 mb-lg-5">
            <div class="col-lg-8 col-xl-7"> {{ __('Please fill information about your company') }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('Company information') }}</h4>
                        {{ Form::ewInput('Company name', 'company_name', $user->info->company_name, ['required']) }}
                        {{ Form::ewInput('Address', 'address', $user->info->address, ['required']) }}

                        {{ Form::ewInput('Registration code', 'registration_code', $user->info->registration_code, ['required']) }}
                        {{ Form::ewInput('VAT Number', 'vat_number', $user->info->vat_number, []) }}

                        <div class="row">
                            <div class="col-6">
                                {{ Form::ewInput('Creation year', 'creation_year', $user->info->creation_year, ['required']) }}

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label("employees_number", "Number of employees", ['class' => 'shinny-label']) }}

                                    <select name="employees_number" class="form-control">
                                        <option value="1-10">1-10</option>
                                        <option value="50-100">50-100</option>
                                        <option value="100-500">100-500</option>
                                        <option value="500-1000">500-1000</option>
                                        <option value="1000-5000">1000-5000</option>
                                        <option value="5000+">5000+</option>
                                    </select>
                                </div>
                            </div>
                        </div>




                     {{--   {{ form_row(form.userInfo.registrationCode) }}
                        {{ form_row(form.userInfo.vatNumber) }}
                        {{ form_row(form.userInfo.country) }}
                        {{ form_row(form.userInfo.address) }}
                        {{ form_row(form.userInfo.employeesNumber) }}
                        {{ form_row(form.userInfo.website) }}
                        {{ form_row(form.userInfo.creationYear) }}
                        {{ form_row(form.userInfo.yearTurnover) }}
                        {{ form_row(form.userInfo.productionVolume) }}
                        {{ form_row(form.userInfo.purchaseVolume) }}--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('Representative information') }}</h4>

                        {{ Form::ewInput('Phone number', 'person_phone', $user->info->person_phone, ['required']) }}
                        {{ Form::ewInput('Website', 'website', $user->info->website, []) }}
                        {{ Form::ewInput('Skype', 'person_skype', $user->info->person_skype, []) }}
                        {{ Form::ewInput('Position', 'person_job_title', $user->info->person_job_title, []) }}
                        {{ Form::ewInput('Full Name', 'person_full_name', $user->info->person_full_name, []) }}

                        {{--{{ form_row(form.userInfo.personType) }}
                        {{ form_row(form.userInfo.personFullName) }}
                        {{ form_row(form.userInfo.personJobTitle) }}
                        {{ form_row(form.userInfo.personSkype) }}
                        {{ form_row(form.userInfo.personPhone) }}
                        {{ form_row(form.userInfo.personPhone2) }}--}}
                        <div class="form-group">
                            <label for="" class="col-form-label mb-3">{{ __('Countries of operation') }}</label>
                            <div class="row">
                                <select class="select2" name="countries[]" multiple="multiple">
                                   @include('components.forms.countries-options')
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                        <h4 class="mb-3 mb-lg-4">{{ __('Description of the company') }}</h4>
                        <div class="form-group row">
                            <div class="col-12">
                                <textarea name="description" class="form-control">{{ $user->info->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-4">
               @csrf
                <input type="submit" class="btn-primary btn" value="{{ __('Update information') }}" />
            </div>
        </div>
    </div>
</section>
</form>


<script>
    $(document).ready(function(){
        $('#categories li>a').on('click', function(e){
            e.preventDefault();
            const listElement = $(this).next();
            if (listElement.is( ":hidden" )) {
                $(this).addClass("submenu-indicator-minus");
                listElement.slideDown(200);
            } else {
                $(this).removeClass("submenu-indicator-minus");
                listElement.slideUp(200);
            }
        });
    });
</script>
<script>
    function callAjax(id, type, url) {
        $.ajax({
            url: url,
            type: "GET",
            data: { "id" : id, "type" : type},
            success: function(data) {
                if (data.success) {
                    // show notification in side
                }
            }
        });
    }
    function recalculateCheckedTree() {
        $('.user-has').prop('checked', false);
        $('.user-has').prop('indeterminate', false);
        $('.user-has').prop('checked', true);
        $($('.user-has').get().reverse()).each(function() {
            const size = $(this).siblings("ul").find('input').length;
            let foundChecked = 0;
            $(this).siblings("ul").find('input').each(function() {
                if ($(this).is(':checked')) {
                    foundChecked++;
                }
            });
            if (size === foundChecked) {
                $(this).prop('checked', true);
            } else if (size !== 0 && foundChecked === 0) {
                $(this).prop('checked', false);
                $(this).prop('indeterminate', false);
            } else {
                $(this).prop("indeterminate", true);
            }
        });
    }
    $(document).ready(function() {
        recalculateCheckedTree();
        $(".edit-profile-checkbox").click(function (event) {
            event.stopPropagation();
            var id = parseInt($(this).next().attr("data-id"))
            var type = $(this).parent().closest('div').parent().attr('id');
            const size = $(this).siblings("ul").find('input').length;
            if ($(this).is(':checked')) {
                $(this).addClass("user-has");
                $(this).siblings("ul").find('input').prop('checked', true).addClass("user-has");
                $(this).parents("ul").siblings('input').prop('checked', true).addClass("user-has");
            } else {
                $(this).removeClass("user-has");
                $(this).siblings("ul").find('input').prop('checked', false).removeClass("user-has");

            }
            recalculateCheckedTree();
        });
    });
</script>
<link href="{{ asset('assets/admin/plugins/summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
        });
        $('.note-popover').hide();
    });
</script>
@endsection