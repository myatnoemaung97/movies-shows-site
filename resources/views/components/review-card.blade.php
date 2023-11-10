@props(['review', 'liked' => false, 'disliked' => false, 'displayActions' => true])

<div class="mv-user-review-item">
    <div class="user-infor">
        <div>
            <h3>{{ $review?->headline }}</h3>

            @if($review?->rating)
                <p>{{ $review?->rating }}/10 <i class="fa-solid fa-star" style="color: gold;"></i></p>
            @endif

            <p class="time">
                {{ date('d F Y', strtotime($review?->created_at))}} by <a href="#">{{ $review?->user->username }}</a>
            </p>
        </div>
    </div>
    <p>{{ $review?->body }}</p>
    @if($displayActions)
        <div>
            @if(auth()->check() && $review?->user->id === auth()->user()->id)
                <form id="delete-review" action="/reviews/{{ $review->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="reviewId" value="{{ $review?->id }}">

                    <button class="icon-button" type="submit"><i class="fa-solid fa-trash" style="color: deeppink;"
                                                                 title="Delete Review"></i></button>
                </form>
            @else
                <div id="like-dislike{{ $review?->id }}">
                    @include('partials.like_dislike', ['review' => $review, 'liked' => $liked, 'disliked' => $disliked])
                </div>
            @endif
        </div>
    @endif
</div>
