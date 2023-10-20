<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Movies</h3>
                            <a class="btn btn-success float-right" href="/admin/movies">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $movie->poster }}" alt="movie poster" style="max-width: 200px; max-height: 500px;">
                            </div>
                            <hr>
                            <div>
                                <div class="d-flex flex-column float-right">
                                    <p>Created: {{ $movie->created_at }}</p>
                                    <p>Updated: {{ $movie->updated_at }}</p>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-success" href="{{ route('movies.edit', $movie->slug) }}">Edit</a>
                                    </div>
                                </div>

                                <h4>{{ $movie->title }}</h4>
                                <p class="mt-3">Rating: {{ $movie->age_rating }}</p>
                                <p>Release Date: {{ $movie->release_date }}</p>
                                <p>Run Time (minutes): {{ $movie->run_time }}</p>
                                <p>Director(s): <span class="fw-semibold">{{ implode(', ', $movie->directors()->pluck('name')->toArray()) }}</span></p>
                                <p>Cast: <span class="fw-semibold">{{ implode(', ', $movie->actors()->pluck('name')->toArray()) }}</span></p>
                            </div>
                            <hr>
                            <div>
                                <h5>Description</h5>
                                <p>{{ $movie->description }}</p>
                            </div>
                            <hr>
                            <div>
                                <h5>Trailer</h5>
                                <p><a href="{{ $movie->trailer }}" target="_blank">{{ $movie->trailer }}</a></p>
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
</x-admin-layout>

