<div class="reviews-list">
    <span class="title">Latest Reviews</span>
    @foreach ($reviews as $review)
    @include("company.components.review-card", ['data' => $review])
    @endforeach
</div>
{{$reviews->links()}}