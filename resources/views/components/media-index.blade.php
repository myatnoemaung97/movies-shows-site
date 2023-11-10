@props(['medias', 'count', 'type'])

<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1> {{ $type }}s</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="/">Home</a></li>
                        <li><i class="ion-ios-arrow-forward"></i> {{ $type }}s</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div id="media-grid">
                @include('partials.media_grid', ['medias' => $medias, 'count' => $count, 'type' => $type])
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search for movie</h4>
                        <form class="form-style-1" action="/movies" method="GET">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Movie name</label>
                                    <input type="text" placeholder="Enter keywords" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="col-md-12 form-it">
                                    <label>Genres & Subgenres</label>
                                    <div class="group-ip">
                                        <select
                                            name="genres" multiple="" class="ui fluid dropdown">
                                            <option value="">Enter to filter genres</option>
                                            <?php use App\Models\Genre ?>
                                            @foreach(Genre::all() as $genre)
                                                <option value="{{ $genre->name }}">{{ ucwords($genre->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 form-it">
                                    <label for="min_rating">Minimum Rating</label>
                                    <select name="min_rating" id="min_rating">
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 form-it">
                                    <label>Release Year (From - To)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="year_from">
                                                <option disabled>From</option>
                                                @for($i = date('Y', strtotime(now())); $i >= 1940 ; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="year_to">
                                                <option value="range" disabled>To</option>
                                                @for($i = date('Y', strtotime(now())); $i >= 1940 ; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <input class="submit" type="submit" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
