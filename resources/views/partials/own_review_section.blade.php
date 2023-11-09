<div id="own-review" class="{{ $ownReview?->body ? '' : 'hide' }}">
    <x-review-card :review="$ownReview" />
</div>
