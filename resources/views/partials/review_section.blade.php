<div id="review-section" class="topbar-filter">
    <label>Sort by:</label>
    <select onchange="handleSortChange(this.value, {{ $mediaId }}, '{{ $type }}')">
        <option selected disabled>-</option>
        <option value="best">Best</option>
        <option value="top">Top</option>
        <option value="new">New</option>
        <option value="controversial">Controversial</option>
    </select>
</div>

@include('partials.own_review_section', ['ownReview' => $ownReview])

@if($reviews)
    @foreach($reviews as $review)
        <x-review-card :review="$review" :liked="$likedReviews?->contains($review)" :disliked="$dislikedReviews?->contains($review)" />
    @endforeach
@endif


