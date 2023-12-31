<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Playlists</h3>
                            <a class="btn btn-success float-right" href="/admin/playlists">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4>{{ $playlist->name }}</h4>
                                    @if($playlist->pinned)
                                        <i class="fa-solid fa-thumbtack fa-xl" style="color: #0d6efd; transform: rotate(45deg);"></i>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <p>Created: {{ $playlist->created_at }}</p>
                                    <p>Updated: {{ $playlist->updated_at }}</p>
                                    <div class="d-flex justify-content-end gap-3">
                                        <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="pinned" value="{{ $playlist->pinned ? 0 : 1 }}">

                                            <button class="btn btn-primary">{{ $playlist->pinned ? 'Unpin' : 'Pin' }} This List</button>
                                        </form>
                                        <a class="btn btn-success" href="{{ route('playlists.edit', $playlist->id) }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5>Movies</h5>
                                <table class="table table-secondary table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Poster</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($playlist->movies() as $movie)
                                        <tr>
                                            <td>
                                                <a href="{{ route('movies.show', $movie->slug) }}">{{ $movie->title }}</a>
                                            </td>
                                            <td><img src="{{ $movie->thumbnail }}" style="height: 100px;"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div>
                                <h5>Shows</h5>
                                <table class="table table-secondary table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Poster</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($playlist->shows() as $show)
                                        <tr>
                                            <td><a href="{{ route('shows.show', $show->slug) }}">{{ $show->title }}</a>
                                            </td>
                                            <td><img src="{{ $show->thumbnail }}" style="height: 100px;"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                P
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</x-admin-layout>

