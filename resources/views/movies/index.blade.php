<x-layout>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> movies</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li><i class="fa-solid fa-sm fa-arrow-right"></i> movies </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p>Found <span>{{ $count }} movies</span> in total</p>
                        <label>Sort by:</label>
                        <select>
                            <option value="rating">Rating Descending</option>
                            <option value="rating">Rating Ascending</option>
                            <option value="date">Release date Descending</option>
                            <option value="date">Release date Ascending</option>
                        </select>
                    </div>

                    <x-media-grid :medias="$movies"/>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="searh-form">
                            <h4 class="sb-title">Search for movie</h4>
                            <form class="form-style-1" action="#">
                                <div class="row">
                                    <div class="col-md-12 form-it">
                                        <label>Movie name</label>
                                        <input type="text" placeholder="Enter keywords">
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Genres & Subgenres</label>
                                        <div class="group-ip">
                                            <select
                                                name="skills" multiple="" class="ui fluid dropdown">
                                                <option value="">Enter to filter genres</option>
                                                <option value="Action1">Action 1</option>
                                                <option value="Action2">Action 2</option>
                                                <option value="Action3">Action 3</option>
                                                <option value="Action4">Action 4</option>
                                                <option value="Action5">Action 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Rating Range</label>
                                        <select>
                                            <option value="range">-- Select the rating range below --</option>
                                            <option value="saab">-- Select the rating range below --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Release Year</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select>
                                                    <option value="range">From</option>
                                                    <option value="number">10</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select>
                                                    <option value="range">To</option>
                                                    <option value="number">20</option>
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
</x-layout>
