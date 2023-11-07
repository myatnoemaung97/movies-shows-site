@props(['ownReview', 'reviews'])

<div class="topbar-filter">
    <label>Sort by:</label>
    <select>
        <option value="rating">Best</option>
        <option value="rating">Top</option>
        <option value="date">New</option>
        <option value="date">Controversial</option>
    </select>
</div>


@include('partials.own_review_section', ['ownReview' => $ownReview])

@if($reviews)
    @foreach($reviews as $review)
        <x-review-card :review="$review"/>
    @endforeach
@endif


