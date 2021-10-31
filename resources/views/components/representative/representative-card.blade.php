<div class="card-body representative-card">
    <div class="representative-row">
        <div class="representative__name">
            {{ $representative->representative_name }}
        </div>

        @isset($representative->phone)
            <div class="representative__phone">
                <a href="tel:{{ $representative->phone }}">{{ $representative->phone }}</a>
            </div>
        @endif
        
        @isset($representative->linkedin_url)
            <div class="representative__linkedin-url">
                <a href="{{ $representative->linkedin_url }}" target="_blank">{{ $representative->linkedin_url }}</a>
            </div>
        @endif

        <div class="representative__email">
            <a href="mailto:{{ $representative->email }}?Subject=Hello"
                target="_top">{{ $representative->email }}</a>
        </div>
    </div>
</div>