<x-show-season :show="$show" :currentSeason="$currentSeason" :seasons="$seasons">
    <div class="text-center">
        <img src="{{ $currentSeason->poster }}" alt="show poster"
             style="max-width: 200px; max-height: 500px;">
    </div>
    <hr>
    <div>
        <div class="d-flex flex-column float-right">
            <p>Created: {{ $currentSeason->created_at }}</p>
            <p>Updated: {{ $currentSeason->updated_at }}</p>
            <div class="d-flex justify-content-end gap-2">
                <a class="btn btn-success" href="{{ route('seasons.edit', [$show->id, $currentSeason->id]) }}">Edit</a>
                <form action="/admin/shows/{{$show->id}}/seasons/{{ $currentSeason->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">DELETE</button>
                </form>
            </div>
        </div>
        <h4><a href="{{ route('shows.show', $show->id) }}" style="text-decoration: none;"
               class="text-black">{{ $show->title }}</a> <span class="fs-5">S{{ $currentSeason->season_number }}</span></h4>
        <p>Release Date: {{ $currentSeason->release_date }}</p>
        <p>Creator(s): <span
                class="fw-semibold">{{ implode(', ', $show->creators()->pluck('name')->toArray()) }}</span>
        </p>
        <p>Cast: <span
                class="fw-semibold">{{ implode(', ', $show->actors()->pluck('name')->toArray()) }}</span>
        </p>
    </div>
    <hr>
    <div>
        <h5>Trailer</h5>
        <p><a href="{{ $currentSeason->trailer }}" target="_blank">{{ $currentSeason->trailer }}</a></p>
    </div>
    <hr>
    <div>
        <h5>Episodes</h5>
        @foreach($episodes as $episode)
            <p>{{ $episode }}</p>
        @endforeach
    </div>
</x-show-season>
