<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Articles</h3>
                            <a href="{{ route('articles.create') }}" class="btn btn-success float-right">Create Article</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="articles" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
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
        var articleTable = $('#articles').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/articles/',
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
                    'data': 'status'
                },
                {
                    "data": "created_at"
                },
                {
                    'data': 'updated_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteArticleButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this article?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/articles/' + id,
                        type: 'DELETE',
                        success: function() {
                            articleTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Article has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
</x-admin-layout>
