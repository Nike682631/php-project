<div style="text-align: center;">

    <h1>{{ __("You've got a new match - B2BWood") }}</h1>
    <p>
        {{ __("You have been matched with a new company which ") }} {{ $type }} - {{ $category->name }}
    </p>
    <img src="{{ asset('uploads/' . $buyer->photo) }}" />
    <h4>{{ $buyer->info->company_name }}</h4>
    <a href="https://b2bwood.com/matches" target="_blank">{{ __("See my matches") }}</a>

</div>
