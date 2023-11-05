<x-layout>
    <div class="hero sr-single-hero sr-single">
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
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img src="{{ $season->poster }}" alt="">
                        <div class="movie-btn">
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch
                                        Trailer</a>
                                </div>
                                <div><a href="{{ $season->trialer }}"
                                        class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">{{ $show->title }} <span>Season {{ $season->season_number }}</span></h1>
                        <p style="font-weight: bold;">Release Date: {{ $season->release_date }}</p>
                        <p style="font-weight: bold;">Release Date: {{ $season->description }}</p>
                        <p style="font-weight: bold;">Release Date: {{ $season->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
