<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 pb-4">
              <div class="subititle text-gold">
                WOOD-RELATED MARKETPLACE
              </div>
                <h4 class="mb-20 footer-title">{{ __('Buy or sell wood-related products or services stright from suppliers') }}</h4>

<a href="{{ route('page.show', 8) }}" target="_blank">

                <img src="{{ asset('assets/user/images/credit-card.png') }}" alt="payment-methods" class="credit-card-logo"/>
</a>

            </div>
            <div class="col-12 col-md-2 pb-4">
                <h4 class="mb-30 footer-menu-title">{{ __('Navigation') }}</h4>
                <ul class="footer-nav">
                    <li><a href="{{ route('category.index') }}">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('products.category.index') }}">{{ __('Companies') }}</a></li>
                    <li><a href="{{ route('page.show', 5) }}">{{ __('Privacy policy') }}</a></li>
                    <li><a href="{{ route('page.show', 7) }}">{{ __('Cookies policy') }}</a></li>
                    <li><a href="{{ route('page.show', 6) }}">{{ __('General conditions') }}</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 pb-4">
                <h4 class="mb-30 footer-menu-title">{{ __('Company') }}</h4>
                <ul class="footer-nav">
                    <li><a href="{{ route('page.show', 10) }}">{{ __('About B2BWood.com') }}</a></li>
                    <li><a href="{{ route('page.show', 9) }}">{{ __('Benefits for business') }}</a></li>
                    <li><a href="{{ route('page.show', 8) }}">{{ __('Payments') }}</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 get-in-touch">
                <h4 class="mb-30 footer-menu-title">{{ __('Get in touch') }}</h4>
                <p><a href="mailto:info@b2bwood.com">info@b2bwood.com</a></p>
                <p>EN: +37061187792</p>
                <p>RUS: +37060289338</p>
                <p>Skype: office@b2bwood.com</p>

                <div class="social-icons mt-3">
                    {{--<a target="_blank" href="https://www.facebook.com/Eurowood-633097237128709/" class="mr-1"><img src="{{ asset('assets/user/images/fb.svg') }}" alt=""></a>--}}
                    {{--<a target="_blank" href="https://twitter.com/eurowoodcom" class="mr-1"><img src="{{ asset('assets/user/images/tw.svg') }}" alt=""></a>--}}
                    <a target="_blank" href="https://www.linkedin.com/company/uab-b2b-wood" class="mr-1"><img src="{{ asset('assets/user/images/li.svg') }}" alt=""></a>
                    <a target="_blank" href="mailto:sales@b2bwood.com" class="mr-1"><img src="{{ asset('assets/user/images/email.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</footer>
