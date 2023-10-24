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
        </div>
        <h4><a href="{{ route('shows.show', $show->slug) }}" style="text-decoration: none;"
               class="text-black">{{ $show->title }}</a> <span class="fs-5">S{{ $currentSeason->season_number }}</span>
        </h4>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">S{{ $currentSeason->season_number }}.E{{ $episode->episode_number }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="d-flex flex-column float-right">
                            <p>Created: {{ $episode->created_at }}</p>
                            <p>Updated: {{ $episode->updated_at }}</p>
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-success" href="{{ route('episodes.edit', [$show->slug, $currentSeason->season_number, $episode->episode_number]) }}">Edit</a>
                            </div>
                        </div>

                        <h5>{{ $episode->title }}</h5>
                        <p>Released Date: {{ $episode->released_date }}</p>
                        <p>Run Time (mins): {{ $episode->run_time }}</p>
                        <p>Description: {{ $episode->description }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</x-show-season>
