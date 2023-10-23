<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Shows</h3>
                            <a href="{{ route('shows.create') }}" class="btn btn-success float-right">Create Show</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="shows" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Age Rating</th>
                                    <th>Release Date</th>
                                    <th>Status</th>
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
    var showTable = $('#shows').DataTable({
        'serverSide': true,
        'processing': true,
        'ajax': {
            url: '/admin/shows/',
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
                "data": "release_date"
            },
            {
                "data": "status"
            },
            {
                "data": "action"
            }
        ]
    });

    $(document).on('click', '.deleteShowButton', function(a) {
        a.preventDefault();
        const slug = $(this).data('slug');
        Swal.fire({
            title: 'Do you want to delete this show?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/shows/' + slug,
                    type: 'DELETE',
                    success: function() {
                        showTable.ajax.reload();
                    }
                });

                Swal.fire(
                    'Deleted!',
                    'Show has been deleted.',
                    'success'
                )
            }
        })
    });
</script>
</x-admin-layout>
