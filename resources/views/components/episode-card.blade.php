@props(['episode'])

<div class="episodeCard">
    <div>
        <img src="{{ $episode->image }}">
    </div>
    <div>
        <p>{{ ucwords($episode->title) }}</p>
        <p>{{ $episode->description }}</p>
    </div>
</div>

