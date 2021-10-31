<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <x-company-card-small :company="Auth::user()"></x-company-card-small>
            <x-feed.cards.company-favorites :company="Auth::user()"></x-feed.cards.company-favorites>
            <x-feed.cards.company-actions :company="Auth::user()"></x-feed.cards.company-actions>
        </div>
        <div class="col-sm-5 mt-3">
                <livewire:posts />

            @foreach ($activity as $key => $item)
                <x-activity-card :item="$item"></x-activity-card>
            @endforeach
        </div>
        <div class = "col-sm-4 mt-4">
        @include('components.sidebars.default-sidebar')
        </div>
    </div>
</div>
