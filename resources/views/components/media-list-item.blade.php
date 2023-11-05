@props(['media'])

<?php $type = class_basename($media) ?>

<div class="movie-item-style-2">
    <img src="{{ $media->thumbnail }}" alt="poster">
    <div class="mv-item-infor">
        <h6><a href="/{{ $type === 'Movie' ? 'movies' : 'shows' }}/{{ $media->slug }}">{{ $media->title }} <span>({{ date('Y', strtotime($media->release_date)) }})</span></a></h6>
        @if($type === 'Show') <p>TV Series</p> @endif
        <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
        <p class="describe">{{ substr($media->description, 0, 200) . '...' }}</p>
        <p class="run-time"> Run Time: {{ $media->run_time }} . <span>MMPA: {{ $media->age_rating }} </span> . <span>Release: {{ $media->release_date }}</span>
        </p>

        @if($type === 'Show')
            <p>Creator: @foreach($media->creators as $creator)
                    <a href="/celebrities/{{ $creator->id }}">{{ $creator->name }}</a>
                @endforeach</p>
        @endif

        @if($type === 'Movie')
            <p>Director: @foreach($media->directors as $director)
                    <a href="/celebrities/{{ $director->id }}">{{ $director->name }}</a>
                @endforeach</p>
        @endif

        <p>Stars: @foreach($media->actors as $actor)
                <a href="/celebrities/{{ $actor->id }}">{{ $actor->name }}</a>
            @endforeach
        </p>
    </div>
</div>
