<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    public function index() {
        return view('reviews.index', [
            'reviews' => auth()->user()->reviews,
        ]);
    }

    public function storeOrUpdate(Request $request) {
        try {
            $request->validate([
                'headline' => 'required|max:80',
                'body' => 'required|min:300'
            ]);

            $review = Review::firstOrCreate([
                'user_id' => auth()->user()->id,
                'media_id' => $request['mediaId'],
                'media_type' => "App\Models\\" . ucwords($request['mediaType']),
            ]);

            $review->update([
                'headline' => $request['headline'],
                'body' => $request['body']
            ]);

            $review->refresh();

            $updatedOwnReview = view('partials.own_review_section', ['ownReview' => $review])->render();
            $updatedReviewForm = view('partials.review_form', ['review' => $review, 'mediaId' => $request['mediaId'], 'type' => $request['mediaType']])->render();

            return response()->json([
                'ownReviewSection' => $updatedOwnReview,
                'reviewForm' => $updatedReviewForm
            ]);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()]);
        }

    }

    public function destroyOrUpdate(Review $review) {
        if ($review->rating === null) {
            $review->delete();

            $review = null;
        } else {
            $review->update([
                'headline' => null,
                'body' => null
            ]);

            $review->refresh();
        }

        $updatedOwnReview = view('partials.own_review_section', ['ownReview' => $review])->render();

        return response()->json([
            'ownReviewSection' => $updatedOwnReview
        ]);
    }

    public function sort(Request $request) {
        $sort = $request['sort'];
        $mediaId = $request['mediaId'];
        $mediaType = $request['mediaType'];

        if ($mediaType === 'movie') {
            $media = Movie::find($mediaId);
        } else {
            $media = Show::find($mediaId);
        }

        if ($sort === 'top') {
            $reviews = $media->reviews()->orderBy('likes', 'desc')->get();
        }

        $user = auth()->user();

        $ownReview = $user->reviews()->firstWhere(['media_id' => $mediaId, 'media_type' => "App\Models\\" . ucwords($mediaType)]);
        $likedReviews = $user->likedReviews;
        $dislikedReviews = $user->dislikedReviews;

        $updatedReviewSection = view('partials.review_section',
            ['mediaId' => $mediaId, 'type' => $mediaType, 'ownReview' => $ownReview, 'reviews' => $reviews, 'likedReviews' => $likedReviews, 'dislikedReviews' => $dislikedReviews])->render();


        return response()->json([
            'updatedReviewSection' => $updatedReviewSection
        ]);
    }
}
