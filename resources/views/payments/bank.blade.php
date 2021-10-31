@extends('layouts.main')

@section('header')
@endsection

@section('content')



<section class="content sm">
    <div class="container">
        <div class="row no-gutters justify-content-center steps">
            <div class="col-auto">
                <div class="step-block d-lg-flex text-center text-lg-left align-items-center completed">
                    <div class="step-icon mx-auto mb-2 ml-lg-0 mb-lg-0 mr-lg-3 d-flex"><span class="align-self-center mx-auto">
              <svg width="21px" height="20px" viewBox="0 0 21 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="step1-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="step1-2" transform="translate(-446.000000, -184.000000)" fill="#FFFFFF">
                    <g id="step1-3" transform="translate(0.000000, 60.000000)">
                      <g id="step1-4" transform="translate(422.000000, 100.000000)">
                        <g id="step1-5">
                          <g id="step1-6" transform="translate(24.000000, 24.000000)">
                            <path d="M10.5042409,10.5980835 C7.91541606,10.5980835 5.81684672,8.23567568 5.81679562,5.32152334 C5.81679562,1.28039312 7.91536496,0.045012285 10.5042409,0.045012285 C13.0930146,0.045012285 15.1916861,1.28039312 15.1916861,5.32152334 C15.1916861,8.23567568 13.0929124,10.5980835 10.5042409,10.5980835 Z M20.8550949,18.3644717 C21.0181387,18.717543 20.9846204,19.1218182 20.7656788,19.4457494 C20.5467372,19.7696314 20.1760949,19.9630467 19.7743358,19.9630467 L1.2339927,19.9630467 C0.832233577,19.9630467 0.461693431,19.7697297 0.242751825,19.4457985 C0.0237080292,19.1218182 -0.0097080292,18.7176904 0.153335766,18.3644717 L2.51821168,13.2409828 C2.62648175,13.0064373 2.81629927,12.8120885 3.05291971,12.6936609 L6.72281022,10.8562162 C6.80374453,10.815774 6.90174453,10.8236364 6.97470803,10.8766093 C8.01275182,11.6316953 9.23315328,12.0308108 10.5042409,12.0308108 C11.7751241,12.0308108 12.9956277,11.6316953 14.0336715,10.8766093 C14.1064307,10.8236364 14.2044307,10.815774 14.285365,10.8562162 L17.9555109,12.6936609 C18.1920292,12.8120885 18.3820511,13.0065356 18.490219,13.2409828 L20.8550949,18.3644717 Z" id="step1-7"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
              </span></div>
                    <div class="step-info">{{ __('Registration') }} <small class="d-block text-muted">{{ __('Step 1') }}</small></div>
                </div>
            </div>
            <div class="col-auto col-sm-2 col-lg-1 col-splitter"></div>
            <div class="col-auto">
                <div class="step-block d-lg-flex text-center text-lg-left align-items-center completed">
                    <div class="step-icon mx-auto mb-2 ml-lg-0 mb-lg-0 mr-lg-3 d-flex"><span class="align-self-center mx-auto">
              <svg width="23px" height="24px" viewBox="0 0 23 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="step2-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="step2-2" transform="translate(-769.000000, -182.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="step2-3" transform="translate(-3.000000, 58.000000)">
                      <g id="step2-4" transform="translate(425.000000, 102.000000)">
                        <g id="step2-5" transform="translate(324.000000, 0.000000)">
                          <g id="step2-6" transform="translate(23.000000, 22.000000)">
                            <path d="M18.3386667,6.18090798 L18.3386667,6.18581595 L6.80955274,6.18581595 C5.26166245,6.18581595 4.00491139,7.4569816 4.00491139,9.02262577 L4.00491139,13.1109693 C4.00491139,13.4496196 3.6555443,13.6753865 3.3498481,13.5379632 L0.904278481,12.4680245 C0.161873418,12.1342822 -0.168084388,11.2557546 0.161873418,10.5097423 L4.40765401,0.880294479 C4.73761181,0.129374233 5.60617722,-0.204368098 6.34372996,0.129374233 L18.4696793,5.56741104 C18.7802278,5.70974233 18.6831814,6.18090798 18.3386667,6.18090798 Z M21.5120844,7.5158773 C22.3321266,7.5158773 22.9968945,8.18826994 22.9968945,9.01771779 L22.9968945,19.5207853 C22.9968945,20.3502331 22.3321266,21.0226258 21.5120844,21.0226258 L19.5371899,21.0226258 C19.5857131,20.7281472 19.6099747,20.4287607 19.6099747,20.1244663 C19.6099747,19.780908 19.5760084,19.4471656 19.5177806,19.1183313 L21.1141941,19.1183313 L21.1141941,14.0925644 L7.20744304,14.0925644 L7.20744304,19.1232393 L8.79900422,19.1232393 C8.74077637,19.4520736 8.70681013,19.785816 8.70681013,20.1293742 C8.70681013,20.4336687 8.73107173,20.7330552 8.77959494,21.0275337 L6.80470042,21.0275337 C5.98465823,21.0275337 5.3198903,20.3551411 5.3198903,19.5256933 L5.3198903,9.01771779 C5.3198903,8.18826994 5.98465823,7.5158773 6.80470042,7.5158773 L21.5120844,7.5158773 Z M21.1141941,10.9956319 L21.1141941,9.42017178 L7.20744304,9.42017178 L7.20744304,10.9956319 L21.1141941,10.9956319 Z M14.1608186,16.2667975 C16.2667257,16.2667975 17.9747426,17.9944049 17.9747426,20.1244663 C17.9747426,22.2545276 16.2667257,23.982135 14.1608186,23.982135 C12.0549114,23.982135 10.3468945,22.2545276 10.3468945,20.1244663 C10.3468945,17.9944049 12.0549114,16.2667975 14.1608186,16.2667975 Z" id="step2-7"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
              </span></div>
                    <div class="step-info">{{ __('Payment') }} <small class="d-block text-muted">{{ __('Step 2') }}</small></div>
                </div>
            </div>
            <div class="col-auto col-sm-2 col-lg-1 col-splitter"></div>
            <div class="col-auto">
                <div class="step-block d-lg-flex text-center text-lg-left align-items-center current">
                    <div class="step-icon mx-auto mb-2 ml-lg-0 mb-lg-0 mr-lg-3 d-flex"><span class="align-self-center mx-auto">
              <svg width="19px" height="16px" viewBox="0 0 19 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="step3-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="step3-2" transform="translate(-1096.000000, -186.000000)" fill="#FFFFFF">
                    <g id="step3-3" transform="translate(-3.000000, 58.000000)">
                      <g id="step3-4" transform="translate(425.000000, 102.000000)">
                        <g id="step3-5" transform="translate(649.000000, 0.000000)">
                          <path d="M29.6428571,33.25 L43,33.25 L43,37 L26,37 L26,33.25 L26,27 L29.6428571,27 L29.6428571,33.25 Z" id="step3-6" transform="translate(34.500000, 32.000000) rotate(-45.000000) translate(-34.500000, -32.000000) "></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
              </span></div>
                    <div class="step-info">{{ __('Finish') }} <small class="d-block text-muted">{{ __('Step 3') }}</small></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center registration">
            <div class="col-lg-10">
                <div class="alert alert-light text-success mb-4 p-4">
                    <h3 class="mb-2">{{ __('You have successfully registered. You can now ') }}
                        <a href="{{ route('user.edit', Auth::user()->id) }}" style="text-decoration: underline;">{{ __('start using B2BWood.com') }}</a>!</h3>
                    <p class="m-0">{{ __('Make a payment to any bank account bellow') }}</p>

                    <a href="{{ route('user.edit', Auth::user()->id) }}"  class="btn btn-xl btn-primary mt-3">
                        {{ __("Start using B2BWood.com") }}
                    </a>
                </div>
                <ol>
                    <li class="mb-3">{{ __('Make a payment to any bank account bellow') }}</li>
                    <li class="mb-3">{{ __('We will approve your account when transfer will arrive') }} <small class="d-block text-muted">{{ __('It usually takes about 1-2 work days') }}</small></li>
                    <li class="mb-3">{{ __('Once approved, you will be able to see b2bwood.com content') }}</li>
                </ol>
                <hr class="my-4 my-md-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>{{ __('Bank details') }}</h4>
                        <ul class="list-group">
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Recipient:') }} <strong class="d-block d-sm-inline-block">{{ __('UAB “B2Bwood”') }}</strong></li>
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Company code:') }} <strong class="d-block d-sm-inline-block">{{ __('305598946') }}</strong></li>
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Company address:') }}<strong class="d-block d-sm-inline-block">{{ __('Draugystės g. 17-1, LT-51229 Kaunas') }}</strong></li>
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Country:') }} <strong class="d-block d-sm-inline-block">{{ __('Lithuania') }}</strong></li>
                            {{--<li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Recipient bank:') }} <strong class="d-block d-sm-inline-block">{{ __('LUMINOR BANK AS') }}</strong></li>--}}
                            {{--<li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Recipient bank address:') }} <strong class="d-block d-sm-inline-block">{{ __('Konstitucijos pr. 21A, 03601 Vilnius, Lietuva') }}</strong></li>--}}
{{--                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Bank account:') }} <strong class="d-block d-sm-inline-block">{{ __('LT03 4010 0510 0439 8807') }}</strong></li>--}}
{{--                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Swift:') }} <strong class="d-block d-sm-inline-block">{{ __('LAGBLLT2X') }}</strong></li>--}}
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Amount:') }} 
                                <strong class="d-block d-sm-inline-block">
                                    {{ $plan->price }} {{ __('EUR') }}
                                </strong>
                            </li>
                            <li class="list-group-item d-sm-flex justify-content-sm-between align-items-center px-3">{{ __('Reference number:') }} <strong class="d-block d-sm-inline-block">{{ __('B2BWood.com order ID') }} #{{ $plan->id }}</strong></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection