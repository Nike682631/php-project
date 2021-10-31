<span class="languages">
    <span class="dropdown">
        <a class="btn btn-sm dropdown-toggle mr-0 py-0 px-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('assets/user/images/'.   Session::get( 'applocale' ) .'.svg') }}" width="24" height="16" alt="">
            {{Session::get('applocale')}}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('language.set', 'en') }}">
                <img src="{{ asset('assets/user/images/en.svg') }}" width="24" height="16" alt="">
                <span>English</span>
            </a>
            <a class="dropdown-item" href="{{ route('language.set', 'lt') }}"><img src="{{ asset('assets/user/images/lt.svg') }}" width="20" height="20" alt=""> <span>Lithuanian</span></a>
            <a class="dropdown-item" href="{{ route('language.set', 'ru') }}">
                <img src="{{ asset('assets/user/images/ru.svg') }}" width="20" height="20" alt="">
                <span>Russian</span>
            </a>
{{--            <a class="dropdown-item" href="ua"><img src="{{ asset('assets/user/images/ua.svg') }}" width="20" height="20" alt=""> <span>Ukrainian</span></a>--}}
{{--            <a class="dropdown-item" href="de"><img src="{{ asset('assets/user/images/de.svg') }}" width="20" height="20" alt=""> <span>Deutsch</span></a>--}}
{{--            <a class="dropdown-item" href="fr"><img src="{{ asset('assets/user/images/fr.svg') }}" width="20" height="20" alt=""> <span>French</span></a>--}}
            {{--<a class="dropdown-item" href="it"><img src="{{ asset('assets/user/images/it.svg') }}" width="20" height="20" alt=""> <span>Italian</span></a>--}}
            {{--<a class="dropdown-item" href="pl"><img src="{{ asset('assets/user/images/pl.svg') }}" width="20" height="20" alt=""> <span>Polish</span></a>--}}
        </div>
    </span>
</span>
