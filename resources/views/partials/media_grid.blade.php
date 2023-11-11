@props(['sort' => null])

<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="topbar-filter">
        <p>Found <span>{{ $count }} movies</span> in total</p>
        <label>Sort by:</label>
        <select onchange="sortMedias(this.value, '{{ $type }}', '{{ request()->fullUrl() }}')">
            <option value="rating desc" {{ $sort === 'rating desc' ? 'selected' : '' }}>Rating Descending</option>
            <option value="rating asc" {{ $sort === 'rating asc' ? 'selected' : '' }}>Rating Ascending</option>
            <option value="release_date desc" {{ $sort === 'release_date desc' ? 'selected' : '' }}>Release date Descending</option>
            <option value="release_date asc" {{ $sort === 'release_date asc' ? 'selected' : '' }}>Release date Ascending</option>
        </select>
    </div>

    <div>
        <div class="flex-wrap-movielist">
            @foreach($medias as $media)
                <div class="movie-item-style-2 movie-item-style-1">
                    <img src="{{ $media->thumbnail }}" alt="">
                    <div class="hvr-inner">
                        <a href="/{{ $type }}s/{{ $media->slug }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                    </div>
                    <div class="mv-item-infor">
                        <h6>
                            <a href="/{{ $type }}s/{{ $media->slug }}">{{ $media->title }} ({{ date('Y', strtotime($media->release_date)) }})</a>
                        </h6>
                        <p class="rate"><i class="ion-android-star"></i><span>{{ $media->rating }}</span> /10</p>
                    </div>
                </div>
            @endforeach

            {{ $medias->links() }}
        </div>
    </div>
</div>
