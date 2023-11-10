<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function storeOrUpdate(Request $request) {
        DB::transaction(function () use ($request) {
            $mediaId = $request['mediaId'];
            $mediaType = $request['mediaType'];
            $rating = $request['rating'];

            $review = Review::firstOrCreate([
                'user_id' => auth()->user()->id,
                'media_id' => $mediaId,
                'media_type' => "App\Models\\" . ucwords($mediaType),
            ]);

            $review->update([
                'rating' => $rating,
            ]);

            $this->updateMediaRating($mediaId, $mediaType);
        });
    }

    public function destroyOrUpdate(Review $review) {
        DB::transaction(function () use ($review) {
            $mediaId = $review->media_id;
            $mediaType = $review->media_type;

            if ($review->body === null) {
                $review->delete();
                return;
            }

            $review->update([
                'rating' => null
            ]);

            $media = Movie::find($review->media_id);
            $media->update(['rating' => Review::where(['media_id' => $mediaId, 'media_type' => "App\Models\\" . ucwords($mediaType)])->avg('rating')]);

            $this->updateMediaRating($mediaId, $mediaType);
        });
    }

    private function updateMediaRating($mediaId, $mediaType) {
        switch ($mediaType) {
            case 'movie':
                $media = Movie::find($mediaId);
                break;
            case 'show':
                $media = Show::find($mediaId);
                break;
        }

        $media->update([
            'rating' => Review::where(['media_id' => $mediaId, 'media_type' => "App\Models\\" . ucwords($mediaType)])->avg('rating')
        ]);
    }
}
