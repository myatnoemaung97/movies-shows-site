<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Artists</h3>
                            <a href="{{ route('people.create') }}" class="btn btn-success float-right">Create Artist Profile</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="people" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
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
        var peopleTable = $('#people').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/people/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "name"
                },
                {
                    "data": "image"
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deletePersonButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this profile?',
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
</x-admin-layout>
