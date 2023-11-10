<div style="display: flex; justify-content: start; align-items: center;">
    <form id="like" style="margin-right: 10px;">
        @csrf

        <input type="hidden" name="isAuthenticated" value="{{ auth()->check() }}">
        <input type="hidden" name="reviewId" value="{{ $review?->id }}">
        <input type="hidden" name="_method" value="{{ $liked ? 'DELETE' : ($disliked ? 'PATCH' : 'POST') }}">

        <button class="icon-button" type="submit"><i id="like-btn" class="{{ $liked ? 'fa-solid' : 'fa-regular' }} fa-thumbs-up fa-lg"
                                                     style="color: deeppink;"></i> <span style="color: white;">{{ $review?->likes }}</span>
        </button>
    </form>

    <form id="dislike">
        @csrf

        <input type="hidden" name="isAuthenticated" value="{{ auth()->check() }}">
        <input type="hidden" name="reviewId" value="{{ $review?->id }}">
        <input type="hidden" name="_method" value="{{ $disliked ? 'DELETE' : ($liked ? 'PATCH' : 'POST') }}">

        <button class="icon-button" type="submit"><i id="dislike-btn"
                                                     class="{{ $disliked ? 'fa-solid' : 'fa-regular' }} fa-thumbs-down fa-lg"
                                                     style="color: deeppink"></i> <span style="color: white;">{{ $review?->dislikes }}</span>
        </button>
    </form>
</div>
