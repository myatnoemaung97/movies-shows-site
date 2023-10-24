<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Articles</h3>
                            <a class="btn btn-success float-right" href="/admin/articles">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $article->image }}" alt="article image"
                                     style="max-width: 500px; max-height: 1000px;">
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-3">
                                <div>
                                    <h4>{{ $article->title }}</h4>
                                    <p>status: {{ $article->status }}</p>
                                </div>

                                <div class="d-flex flex-column">
                                    <p>Created: {{ $article->created_at }}</p>
                                    <p>Updated: {{ $article->updated_at }}</p>
                                    <div class="d-flex justify-content-end gap-2">
                                        <form action="/admin/articles/{{ $article->id }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="published">
                                            <input type="hidden" name="title" value="{{ $article->title }}">
                                            <input type="hidden" name="body" value="{{ $article->body }}">

                                            <button class="btn btn-primary" type="submit">Publish</button>
                                        </form>
                                        <a class="btn btn-success" href="{{ route('articles.edit', $article->id) }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>{!! nl2br($article->body) !!}</p>
                            <hr>
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Contents</h3>
                                                <a href="{{ route('contents.create', $article->id) }}"
                                                   class="btn btn-success float-right">Add Content</a>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table id="contents" class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Image</th>
                                                        <th>Body</th>
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
        // Get the full URL of the current page
        var url = window.location.href;

        // Regular expression pattern to match showId and seasonId in the URL
        var regexPattern = /\/admin\/articles\/(\d+)/;

        // Use regex exec() method to extract values
        var match = regexPattern.exec(url);

        // Check if there is a match
        if (match) {
            var articleId = match[1]; // Extract showId
        }

        var contentTable = $('#contents').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/articles/' + articleId,
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "image"
                },
                {
                    'data': 'body'
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

        $(document).on('click', '.deleteContentButton', function (a) {
            a.preventDefault();
            const contentId = $(this).data('content_id');
            const articleId = $(this).data('article_id');
            Swal.fire({
                title: 'Do you want to delete this content?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/articles/' + articleId + '/contents/' + contentId,
                        type: 'DELETE',
                        success: function () {
                            contentTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Content has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
</x-admin-layout>

