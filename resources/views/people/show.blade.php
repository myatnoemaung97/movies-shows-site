<x-layout>
    <div class="hero hero3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h1> movie listing - list</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- celebrity single section-->

    <div class="page-single movie-single cebleb-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="mv-ceb">
                        <img src="{{ $person->image }}" alt="image">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct">
                        <h1 class="bd-hd">{{ $person->name }}</h1>
                        <p class="ceb-single">{{ $person->roles }}</p>
                        <div class="social-link cebsingle-socail">
                            <a href="#"><i class="ion-social-facebook"></i></a>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                            <a href="#"><i class="ion-social-googleplus"></i></a>
                            <a href="#"><i class="ion-social-linkedin"></i></a>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overviewceb">Overview</a></li>
                                    <li><a href="#biography"> biography</a></li>
                                    <li><a href="#filmography">filmography</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overviewceb" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <p>{!! nl2br($person->bio) !!}</p>
                                                <p class="time"><a class="_my-tab-link" href="#biography">See full bio <i
                                                            class="ion-ios-arrow-right"></i></a></p>
                                                <div class="title-hd-sm">
                                                    <h4>filmography</h4>
                                                    <a href="#filmography" class="time _my-tab-link">Full Filmography<i
                                                            class="ion-ios-arrow-right"></i></a>
                                                </div>
                                                <!-- movie cast -->
                                                <x-filmography :medias="$medias->take(5)"/>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Date of Birth: </h6>
                                                    <p>{{ $person->birthday }}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Country: </h6>
                                                    <p>{{ $person->country }}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Height:</h6>
                                                    <p>{{ $person->height }} cm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="biography" class="tab">
                                        <div class="row">
                                            <div class="rv-hd">
                                                <div>
                                                    <h3>Biography of</h3>
                                                    <h2>{{ $person->name }}</h2>
                                                </div>
                                            </div>
                                            <p>{!! nl2br($person->biography) !!}</p>
                                        </div>
                                    </div>
                                    <div id="filmography" class="tab">
                                        <div class="row">
                                            <div class="rv-hd">
                                                <div>
                                                    <h3>Biography of</h3>
                                                    <h2>{{ $person->name }}</h2>
                                                </div>
                                            </div>
                                            <div class="topbar-filter">
                                                <p>Found <span>{{ $medias->count() }} medias</span> in total</p>
                                                <label>Filter by:</label>
                                                <select>
                                                    <option value="rating">Rating Descending</option>
                                                    <option value="rating">Rating Ascending</option>
                                                    <option value="date">Release date Descending</option>
                                                    <option value="date">Release date Ascending</option>
                                                </select>
                                            </div>
                                            <!-- movie cast -->
                                            <x-filmography :medias="$medias->take(5)"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- celebrity single section-->
</x-layout>
