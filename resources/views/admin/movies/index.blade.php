<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Articles</h3>
                            <a href="{{ route('movies.create') }}" class="btn btn-success float-right">Create Movie</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Age Rating</th>
                                        <th>Release Date</th>
                                        <th>Run Time(minutes)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                        <tr>
                                            <td>{{ $movie->title }}</td>
                                            <td>{{ $movie->age_rating }}</td>
                                            <td>{{ $movie->release_date }}</td>
                                            <td>{{ $movie->run_time }}</td>
                                            <td>
                                                <a class="btn btn-secondary">Details</a>
                                                <a class="btn btn-success">Edit</a>
                                                <a class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
</x-admin-layout>
