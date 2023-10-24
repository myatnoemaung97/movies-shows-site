<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Content</h3>
                            <a class="btn btn-success float-right" href="/admin/articles/{{$article->id}}">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $content->image }}" alt="content image"
                                     style="max-width: 500px; max-height: 1000px;">
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-3">
                                <div>
                                    <h4><a href="/admin/articles/{{ $article->id }}" style="text-decoration: none; color: black;">{{ $article->title }}</a></h4>
                                </div>

                                <div class="d-flex flex-column">
                                    <p>Created: {{ $content->created_at }}</p>
                                    <p>Updated: {{ $content->updated_at }}</p>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-success" href="{{ route('contents.edit', [$article->id, $content->id]) }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>{!! nl2br($content->body) !!}</p>
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

