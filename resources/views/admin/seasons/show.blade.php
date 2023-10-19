<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">
                                <label for="season">Season</label>
                                <select class="form-select" name="season" id="season" onchange="redirectToSeason({{ $show->id }})">
                                    <option value="">-</option>
                                    @foreach($seasons as $season)
                                        <option value="{{ $season->id }}">{{ $season->season_number }}</option>
                                    @endforeach
                                </select>
                            </h3>
                            <a class="btn btn-success float-right" href="/admin/shows">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $season->poster }}" alt="show poster"
                                     style="max-width: 200px; max-height: 500px;">
                            </div>
                            <hr>
                            <div>
                                <div class="d-flex flex-column float-right">
                                    <p>Created: {{ $season->created_at }}</p>
                                    <p>Updated: {{ $season->updated_at }}</p>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-success" href="{{ route('seasons.edit', [$show->id, $season->id]) }}">Edit</a>
                                    </div>
                                </div>
                                <h4><a href="{{ route('shows.show', $show->id) }}" style="text-decoration: none;"
                                       class="text-black">{{ $show->title }}</a> S{{ $season->season_number }}</h4>
                                <p>Release Date: {{ $season->release_date }}</p>
                                <p>Creator(s): <span
                                        class="fw-semibold">{{ implode(', ', $show->creators()->pluck('name')->toArray()) }}</span>
                                </p>
                                <p>Cast: <span
                                        class="fw-semibold">{{ implode(', ', $show->actors()->pluck('name')->toArray()) }}</span>
                                </p>
                            </div>
                            <hr>
                            <hr>
                            <div>
                                <h5>Trailer</h5>
                                <p><a href="{{ $show->trailer }}" target="_blank">{{ $show->trailer }}</a></p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        function redirectToSeason(showId) {
            var seasonId = document.getElementById('season').value;
            console.log(seasonId);
            window.location.href = `/admin/shows/${showId}/seasons/${seasonId}`;
        }
    </script>
</x-admin-layout>
