<div class="section-header">
    @if ($subtext != '')
        <span class="section-title__sub">{{ __("$subtext") }}</span>
    @endif    

    @switch($tag)
        @case("h1")
            <h1 class="section-title mt-1">{{ __("$text") }}</h1>
            @break

        @case("h2")
            <h2 class="section-title mt-1">{{ __("$text") }}</h2>
            @break

        @case("h4")
            <h4 class="section-title mt-1">{{ __("$text") }}</h4>
            @break

        @case("h5")
            <h5 class="section-title mt-1">{{ __("$text") }}</h5>
            @break

        @case("h6")
            <h6 class="section-title mt-1">{{ __("$text") }}</h6>
            @break

        @default
            <h3 class="section-title mt-1">{{ __("$text") }}</h3>
            
    @endswitch
</div>