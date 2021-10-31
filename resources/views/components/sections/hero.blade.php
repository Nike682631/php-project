<section class="b2b-hero">
  <div class="mass-header bg-overlay">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="mass-header__left-container col-lg-7">
                <p class="mass-header__label mb-0">{{ __('B2BWOOD.COM') }}</p>
                <p class="mass-header__description mb-0">{{ __('Marketplace for wood related products ') }}</p>
                <div class="search-block">

                  <global-search 
                    initial-query="{{ request('query') }}"
                  >
                  </global-search>
                </div>
            </div>

            <div class="col-lg-5">
              @guest
              <div class="c-login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="c-login-form__title">{{ __('Login') }}</h3>
                    <div class="c-login-form__subtitle">
                      {{ __('Not a member yet? Register to our platform and get these benefits')}}
                    </div>
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

                    <div class="row">
                      <div class="col-md-6 text-left">
                        @if (Route::has('password.request'))
                            <a class="c-link forgot-password-link mb-10 d-block" href="{{ route('password.request') }}" target="
                            ">
                                {{ __('Remind me a password') }}
                            </a>
                        @endif

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" checked class="custom-control-input" id="remember_me" name="remember" value="on">
                                <label class="custom-control-label text-small" for="remember_me">{{ __('Remember me') }}</label>
                            </div>

                      </div>
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                                <span class="btn-icon-arrow">
                                  @include('components.icons.arrow')
                                </span>

                            </button>
                        </div>
                    </div>
                </form>
                <div class = "social-logins">
                  <div class = "google-login">
                    <a href="{{route('login.google')}}" class = "btn btn-google btn-google">
                      <img src = "{{asset('assets/images/google.png')}}" /> {{__('Connect with Google')}}
                    </a>
                  </div>
                  <span class = "or">or</span>
                  <div class = "linkedIn-login">
                    <a href="{{route('login.linkedin')}}" class = "btn btn-linkedIn btn-linkedIn">
                      <img src = "{{asset('assets/images/in2.png')}}" /> {{__('Connect with LinkedIn')}}
                    </a>
                  </div>
                </div>
              </div>
              @else
                <div class="c-login-form">
                  <div class="mb-10">
                  {{ __("Welcome back!") }}
                </div>
                  <div>
                    <a href="/categories/" class="btn btn-primary mb-10">
                      {{ __("Browse all companies") }}
                    </a>
                  <a href="/home/" class="btn btn-primary mb-10">
                    {{ __("Company Profile") }}
                  </a>
                </div>
                </div>
              @endguest


            </div>
        </div>
    </div>
  </div>
</section>
