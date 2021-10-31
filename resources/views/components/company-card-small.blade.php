<div class = "company-card-small">
    <div class = "grey-back">
        <img class = "company-avatar" src="{{$company->getPhoto()}}" alt="{{ $company->getCompanyName() }} banner">
        
        <h5 class = "company-name">{{ $company->info->company_name }} </h5>
        <div class = "company-review">
            @for($i = 1; $i <= $company->average_review(); $i ++)
                <span class="fa fa-star checked"></span>
            @endfor
            @for($i = $company->average_review() + 1; $i <= 5; $i ++)
                <span class="fa fa-star"></span>
            @endfor
        </div>
        <a class = "btn btn-primary btn-large" href = "{{ route('user.show', [$company->id]) }}">
            {{ __('View Profile') }}
        </a>
    </div>
</div>