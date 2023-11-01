@props(['season', 'show'])

<div class="mvcast-item">
    <div class="cast-it">
        <div class="cast-left series-it">
            <img src="{{ $season->thumbnail }}" alt="">
            <div>
                <a href="/shows/{{ $show->slug }}/seasons/{{ $season->season_number }}">Season {{ $season->season_number }}</a>
                <p>{{ $season->episodes()->count() }} Episodes</p>
                <p>Premiered on {{ $season->release_date }}</p>
            </div>
        </div>
    </div>
</div>
