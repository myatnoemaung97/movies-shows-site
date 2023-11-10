<x-layout>
    <x-media-detail :media="$show" :currentSeason="$currentSeason" :type="'show'" :period="$period"
                    :isInWatchlist="$isInWatchlist" :review="$review"
                    :likedReviews="$likedReviews" :dislikedReviews="$dislikedReviews"
    />
</x-layout>
