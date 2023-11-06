<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function storeOrUpdate(Request $request) {
        $review = Review::firstOrCreate([
            'user_id' => auth()->user()->id,
            'media_id' => $request['mediaId'],
            'media_type' => "App\Models\\" . ucwords($request['mediaType']),
        ]);

        $review->update([
            'rating' => $request['rating']
        ]);
    }

    public function destroyOrUpdate(Review $review) {
        if ($review->body === null) {
            $review->delete();
            return;
        }

        $review->update([
            'rating' => null
        ]);
    }
}
