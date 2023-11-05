@props(['medias'])

<div class="mvcast-item">
    @foreach($medias as $media)
        <div class="cast-it">
            <div class="cast-left cebleb-film">
                <div style="width: 75px; height: 100px; margin-right: 10px;">
                    <img src="{{ $media->poster }}" alt="poster">
                </div>
                <div>
                    <a href="#">{{ $media->title }}</a>
                </div>
            </div>
            <p>... {{ date('Y', strtotime($media->release_date)) }}</p>
        </div>
    @endforeach
</div>
