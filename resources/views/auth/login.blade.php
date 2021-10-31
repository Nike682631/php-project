@extends('layouts.main')

@section('content')
    <section class="login d-flex align-items-center px-2 px-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-4 mr-auto pb-5 pb-lg-0">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="mb-4">{{ __('Login') }}</h1>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required="required" placeholder="{{ __('Enter email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" id="password" name="password" required="required" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row justify-content-between form-text-sm form-group">
                            <div class="col-auto">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember" value="on">
                                    <label class="custom-control-label" for="remember_me">{{ __('Remember me') }}</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Remind me a password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-7">
                                <input 
                                    type="submit" 
                                    class="btn btn-primary btn-block"
                                    value="{{ __('Login') }}"
                                />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="login-features">
                        <h4>{{ __('Not a member yet?') }}</h4>
                        <p class="lead mb-4 mb-md-5">
                            <a href="{{ route('register') }}" class="text-white">
                                {{ __('Register to our platform and get these benefits') }}
                            </a>
                        </p>
                        <div class="media feature"> <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/confirm-wh.svg') }}" height="60" width="60">
                            <div class="align-self-center media-body">
                                <h5 class="mb-1">{{ __('Be listed in companies catalog') }}</h5>
                                <p class="m-0">{{ __('Your company will be visible for all website visitors') }}</p>
                            </div>
                        </div>
                        <div class="media feature"> <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/partners-wh.svg') }}" height="60" width="60">
                            <div class="align-self-center media-body">
                                <h5 class="mb-1">{{ __('Find partners to work with') }}</h5>
                                <p class="m-0">{{ __('Our matching service will help you to find partners, which will meet your interest') }}</p>
                            </div>
                        </div>
                        <div class="media feature"> <img class="align-self-center mr-3" alt="" src="{{ asset('assets/user/images/support-wh.svg') }}" height="60" width="60">
                            <div class="align-self-center media-body">
                                <h5 class="mb-1">{{ __('Get the best supports') }}</h5>
                                <p class="m-0">{{ __('Get access to all posts in the web without any limitations') }}</p>
                            </div>
                        </div>
                        <div class="row mt-5">

                            <div class="col-12 col-sm-7">
                                <a href="{{ route('register') }}" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
