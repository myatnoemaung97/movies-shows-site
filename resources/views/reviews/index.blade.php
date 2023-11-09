<x-layout>
    <x-profile-layout>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="topbar-filter">
                <p>{{ $reviews->count() }} review(s)</p>
                <label>Sort by:</label>
                <select>
                    <option value="range">-- Choose option --</option>
                    <option value="saab">-- Choose option 2--</option>
                </select>
            </div>
            @foreach($reviews as $review)
                <?php $media = $review->media ?>
                <div class="movie-item-style-2 userrate">
                    <img src="{{ $media->poster }}" alt="">
                    <div class="mv-item-infor">
                        <h6><a href="/{{ strtolower(class_basename($media)) }}s/{{ $media->slug }}">{{ $media->title }} <span>({{ date('Y', strtotime($media->release_date)) }})</span></a></h6>
                        @if($review->rating)
                            <p class="time sm-text">your rate:</p>
                            <p class="rate"><i class="ion-android-star"></i><span>{{ $review->rating }}</span> /10</p>
                        @endif
                        @if($review->body)
                            <p class="time sm-text">your reviews:</p>
                            <h6>{{ $review->headline }}</h6>
                            <p class="time sm">{{ date('d F Y', strtotime($review->created_at)) }}</p>
                            <p>{{ $review->body }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </x-profile-layout>
</x-layout>
