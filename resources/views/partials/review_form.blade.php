<form id="review-form">
    @csrf

    <input type="hidden" name="mediaId" value="{{ $mediaId }}">
    <input type="hidden" name="mediaType" value="{{ $type }}">

    <input type="text" class="form-control" id="review-headline" name="headline"
           placeholder="Write a headline for your review here"
           value="{{ $review?->headline }}"
           >
    <p id="headline-error" class="error"></p>

    <textarea id="review-body" name="body" class="form-control" rows="10"
              placeholder="Write you review here" style="margin-top: 15px;">{{ $review?->body }}</textarea>
    <p id="body-error" class="error"></p>

    <div style="display: flex; justify-content: end; margin: 20px;">
        <button class="comment-btn" type="submit"
        >{{ $review?->body ? 'Update' : 'Post' }}
        </button>
    </div>
</form>
