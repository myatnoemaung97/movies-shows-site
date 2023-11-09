<?php

namespace App\Http\Controllers;

use App\Models\LikeDislike;
use App\Models\Review;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request) {
        $review = Review::find($request['reviewId']);

        LikeDislike::create([
            'review_id' => $review->id,
            'user_id' => auth()->user()->id,
            'is_like' => true
        ]);

        $review->update(['likes' => $review->likes + 1]);

        $review->refresh();

        $updatedLikeDislike = view('partials.like_dislike', ['review' => $review, 'liked' => true, 'disliked' => false])->render();

        return response()->json([
            'updatedLikeDislike' => $updatedLikeDislike,
        ]);
    }

    public function update(Request $request) {
        $review = Review::find($request['reviewId']);

        LikeDislike::where([
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
        ])->update(['is_like' => true]);

        $review->update([
            'likes' => $review->likes + 1,
            'dislikes' => $review->dislikes - 1
        ]);

        $review->refresh();

        $updatedLikeDislike = view('partials.like_dislike', ['review' => $review, 'liked' => true, 'disliked' => false])->render();

        return response()->json([
            'updatedLikeDislike' => $updatedLikeDislike,
        ]);
    }

    public function destroy(Request $request) {
        $review = Review::find($request['reviewId']);

        LikeDislike::where([
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
        ])->delete();

        $review->update([
            'likes' => $review->likes - 1,
        ]);

        $review->refresh();

        $updatedLikeDislike = view('partials.like_dislike', ['review' => $review, 'liked' => false, 'disliked' => false])->render();

        return response()->json([
            'updatedLikeDislike' => $updatedLikeDislike,
        ]);
    }
}
