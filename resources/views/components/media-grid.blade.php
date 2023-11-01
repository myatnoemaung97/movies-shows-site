@props(['medias', 'type'])

<div class="flex-wrap-movielist">
    @foreach($medias as $media)
        <div class="movie-item-style-2 movie-item-style-1">
            <img src="{{ $media->thumbnail }}" alt="">
            <div class="hvr-inner">
                <a href="/{{ $type }}/{{ $media->slug }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
            </div>
            <div class="mv-item-infor">
                <h6>
                    <a href="/{{ $type }}/{{ $media->slug }}">{{ $media->title }}</a>
                </h6>
                <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
            </div>
        </div>
    @endforeach

    {{ $medias->links() }}
</div>
