<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function storeOrUpdate(Request $request) {
        $review = Review::firstOrCreate([
            'user_id' => auth()->user()->id,
            'media_id' => $request['mediaId'],
            'media_type' => "App\Models\\" . ucwords($request['mediaType']),
        ]);

        $review->update([
            'headline' => $request['headline'],
            'body' => $request['body']
        ]);
    }

    public function destroyOrUpdate(Review $review) {
        if ($review->rating === null) {
            $review->delete();
            return;
        }

        $review->update([
            'headline' => null,
            'body' => null
        ]);
    }
}
