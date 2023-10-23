@props(['show', 'seasons', 'currentSeason' => null])

<x-admin-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 1500px; margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">
                                <label for="season">Seasons</label>
                                <div class="d-flex align-items-center gap-2">
                                    <select class="form-select" name="season" id="season"
                                            onchange="redirectToSeason('{{ $show->slug }}')">
                                        <option selected disabled>-</option>
                                        @foreach($seasons as $season)
                                            <option
                                                value="{{ $season->season_number }}" {{ $currentSeason?->season_number == $season->season_number ? 'selected' : '' }}>{{ $season->season_number }}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('seasons.create', $show->slug) }}"
                                       class="btn btn-sm btn-outline-success rounded-pill" title="Add New Season">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </h3>

                            <a class="btn btn-success float-right"
                               href="/admin/shows/{{ request()->routeIs('seasons.show') || request()->routeIs('episodes.show') || request()->routeIs('episodes.create') ? $show->slug : '' }}{{ request()->routeIs('episodes.show') ? "/seasons/$currentSeason->season_number" : ''}}">Back</a>


                            <!-- /.card-header -->
                            <div class="card-body">
                                {{ $slot }}
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
        function redirectToSeason(showSlug) {
            var seasonNumber = document.getElementById('season').value;
            window.location.href = `/admin/shows/${showSlug}/seasons/${seasonNumber}`;
        }

        function goBack() {
            window.history.go(-1);
            return false;
        }
    </script>
</x-admin-layout>
