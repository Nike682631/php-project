<div class="mt-3 mb-3">

    <a href="{{ route('get-a-quote') }}" class="wood-restricted__title">


        @if (App\User::activeCompaniesCount())

            {{ __(App\User::activeCompaniesCount() . ' more companies like this...') }}
        @else
            {{ __('More companies like this...') }}

        @endif

    </a>

</div>
<div class="wood-restricted text-center mt-3">
    <section class="features">
        <div class="container">
            <h3 class="section-title text-center">{{ __('Join B2BWood to see more information') }}</h3>
            <div class="row justify-content-center">
                <div class="col-md-6 col-xl-5 v-split mb-5 mb-md-0 ml-4 mr-3 ml-md-0 mr-md-0">
                    <div class="media feature ml-md-5"><img class="align-self-center mr-3" alt=""
                            src="/assets/user/images/companies-wh.svg" height="60" width="60">
                        <div class="align-self-center media-body">
                            <h5 class="m-0">
                                {{ __('Global companies catalog') }}
                            </h5>
                        </div>
                    </div>
                    <div class="media feature ml-md-4"><img class="align-self-center mr-3" alt=""
                            src="/assets/user/images/b2b-wh.svg" height="60" width="60">
                        <div class="align-self-center media-body">
                            <h5 class="m-0">
                                {{ __('Advertisement for companies') }}
                            </h5>
                        </div>
                    </div>
                    <div class="media feature"><img class="align-self-center mr-3" alt=""
                            src="/assets/user/images/assistant-wh.svg" height="60" width="60">
                        <div class="align-self-center media-body">
                            <h5 class="m-0">
                                {{ __('Personal assistant') }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mt-3">
                    <h6 class="m-0 mb-2 d-none d-md-block mt-3">B2BWood.com</h6>
                    <h1 class="mb-3 mt-3" style="font-size: 30px;">{{ __('Global wood-related b2b network') }}</h1>
                    <div class="search-block">
                        <a href="{{ route('get-a-quote') }}" class="btn btn-primary px-3 mr-2 mb-2">
                            {{ __('Get A Quote') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
