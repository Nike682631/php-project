<div class="reviews-list">
    @foreach ($reviews as $review)
    @include("company.components.review-card", ['data' => $review])
    @endforeach

    @if ($showLoadMoreButton)
        <button wire:click="loadReviews" type="button" class="btn-sm btn-outline-secondary">Load more...</button>
    @endif
</div>