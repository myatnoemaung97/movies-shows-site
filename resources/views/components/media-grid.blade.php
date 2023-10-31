@props(['medias'])

<div class="flex-wrap-movielist">
    @foreach($medias as $media)
        <?php $link = "/" . class_basename($media) === 'Movie' ? 'movies' : 'shows' . "/$media->slug" ?>

        <div class="movie-item-style-2 movie-item-style-1">
            <img src="{{ $media->thumbnail }}" alt="">
            <div class="hvr-inner">
                <a href={{ $link }}> Read more <i class="ion-android-arrow-dropright"></i> </a>
            </div>
            <div class="mv-item-infor">
                <h6>
                    <a href={{ $link }}>{{ $media->title }}</a>
                </h6>
                <p class="rate"><i class="fa-solid fa-star"></i><span>8.1</span> /10</p>
            </div>
        </div>
    @endforeach

    {{ $medias->links() }}
</div>
