<div class = "company-favorites">
    <div class = "title">
        <h6> {{__('favorites')}} </h6>
    </div>
    <div class = "content">
        <span class = "company"> {{__('company')}} </span>
        <div class = "favorites">
        @foreach ($company->favorites() as $item)
            <a href = "{{route('user.show', [$item->id])}}"> {{$item->getCompanyName()}} </a>
        @endforeach
        </div>
    </div>
</div>