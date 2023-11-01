<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1100px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Artists</h3>
                            <a class="btn btn-success float-right" href="/admin/people">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $person->image }}" alt="image" style="max-width: 500px; max-height: 1000px;">
                            </div>
                            <hr>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div>
                                    <h4>{{ $person->name }}</h4>
                                    <p class="mt-3">{{ $person->roles }}</p>
                                </div>

                                <div class="d-flex flex-row align-items-center gap-3">
                                    <div>
                                        <a class="btn btn-success" href="{{ route('people.edit', $person->id) }}">Edit</a>
                                    </div>
                                    <div>
                                        <p>Created: {{ $person->created_at }}</p>
                                        <p>Updated: {{ $person->updated_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5>Biography</h5>
                                <p>{!! nl2br($person->biography)  !!}</p>
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

