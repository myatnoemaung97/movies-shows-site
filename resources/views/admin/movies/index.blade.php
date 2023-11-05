<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Movies</h3>
                            <a href="{{ route('movies.create') }}" class="btn btn-success float-right">Create Movie</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="movies" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Age Rating</th>
                                        <th>Release Date</th>
                                        <th>Run Time(minutes)</th>
                                        <th>Created</th>
                                        <th>Updated</th>
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        var movieTable = $('#movies').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/movies/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "title"
                },
                {
                    "data": "age_rating"
                },
                {
                    'data': 'release_date'
                },
                {
                    'data': 'run_time'
                },
                {
                    'data': 'created_at'
                },
                {
                    'data': 'updated_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteMovieButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this movie?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/movies/' + id,
                        type: 'DELETE',
                        success: function() {
                            movieTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Movie has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
</x-admin-layout>
