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
                <a class="btn btn-success"
                   href="{{ route('seasons.edit', [$show->slug, $currentSeason->season_number]) }}">Edit</a>
                <form action="/admin/shows/{{$show->slug}}/seasons/{{ $currentSeason->season_number }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">DELETE</button>
                </form>
            </div>
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
                        <h3 class="card-title">Episodes</h3>
                        <a href="{{ route('episodes.create', [$show->slug, $currentSeason->season_number]) }}"
                           class="btn btn-success float-right">Create Episode</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="episodes" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Episode Number</th>
                                <th>Title</th>
                                <th>Run Time</th>
                                <th>Release Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <script>
        // Get the full URL of the current page
        var url = window.location.href;

        // Regular expression pattern to match showId and seasonId in the URL
        var regexPattern = /\/admin\/shows\/([^\/]+)\/seasons\/(\d+)/;

        // Use regex exec() method to extract values
        var match = regexPattern.exec(url);

        // Check if there is a match
        if (match) {
            var showSlug = match[1]; // Extract showId
            var seasonNumber = match[2]; // Extract seasonId
        }

        var episodeTable = $('#episodes').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/shows/' + showSlug + '/seasons/' + seasonNumber,
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "episode_number"
                },
                {
                    "data": "title"
                },
                {
                    "data": "run_time"
                },
                {
                    "data": "release_date"
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteEpisodeButton', function(a) {
            a.preventDefault();
            const episodeNumber = $(this).data('episode_number');
            Swal.fire({
                title: 'Do you want to delete this episode?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/people/' + id,
                        type: 'DELETE',
                        success: function() {
                            peopleTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Profile has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
</x-show-season>
