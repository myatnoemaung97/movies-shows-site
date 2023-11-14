<x-layout>
    <!-- Articles -->
    <div class="slider article-items">
        <div class="container">
            <div class="row">
                <div class="slick-multiItemSlider">
                    @foreach($articles as $article)
                        <div class="article-item">
                            <div class="article-img">
                                <a href="#"><img src="{{ $article->thumbnail }}" alt="" width="285" height="437"></a>
                            </div>
                            <div class="title-in">
                                <h6><a href="/articles/{{$article->id}}">{{$article->title}}</a></h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Articles/ -->

    <div class="article-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8">
                    <!-- Movies -->
                    <div class="title-hd">
                        <h2>Movies</h2>
                        <a href="/movies" class="viewall">View all <i class="ion-ios-arrow-forward"></i></a>
                    </div>
                    <div class="tabs">
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        @foreach($movies as $movie)
                                            <div class="slide-it">
                                                <div class="article-item">
                                                    <div class="article-img">
                                                        <img src="{{ $movie->thumbnail }}" alt="" width="185"
                                                             height="284">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="/movies/{{ $movie->slug }}"> Read more <i
                                                                class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="/movies/{{ $movie->slug }}">{{ $movie->title }}</a>
                                                        </h6>
                                                        <p>
                                                            <i class="ion-android-star"></i><span>{{ $movie->rating }}</span>
                                                            /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Movies/ -->

                    <!-- Shows -->
                    <div class="title-hd">
                        <h2>Series</h2>
                        <a href="/shows" class="viewall">View all <i class="ion-ios-arrow-forward"></i></a>
                    </div>
                    <div class="tabs">
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        @foreach($shows as $show)
                                            <div class="slide-it">
                                                <div class="article-item">
                                                    <div class="article-img">
                                                        <img src="{{ $show->thumbnail }}" alt="" width="185"
                                                             height="284">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="/shows/{{ $show->slug }}"> Read more <i
                                                                class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="/shows/{{ $show->slug }}">{{ $show->title }}</a>
                                                        </h6>
                                                        <p>
                                                            <i class="ion-android-star"></i><span>{{ $show   ->rating }}</span>
                                                            /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shows/ -->
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="celebrities">
                            <h4 class="sb-title">Editor's Lists</h4>
                            @foreach($playlists as $playlist)
                                <div class="celeb-item">
                                    <a href="/playlists/{{ $playlist->id }}">{{ $playlist->name }}</a>
                                </div>
                            @endforeach
                            <a href="/playlists" class="btn">See all lists<i class="ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{--<div class="trailers">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row ipad-width">--}}
    {{--            <div class="col-md-12">--}}
    {{--                <div class="title-hd">--}}
    {{--                    <h2>in theater</h2>--}}
    {{--                    <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>--}}
    {{--                </div>--}}
    {{--                <div class="videos">--}}
    {{--                    <div class="slider-for-2 video-ft">--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/1Q8fG0TtVAY"></iframe>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/w0qQkSuWOS8"></iframe>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/44LdLqgOpjo"></iframe>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/gbug3zTm3Ws"></iframe>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/e3Nl_TCQXuw"></iframe>--}}
    {{--                        </div>--}}
    {{--                        <div>--}}
    {{--                            <iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/NxhEZG0k9_w"></iframe>--}}
    {{--                        </div>--}}


    {{--                    </div>--}}
    {{--                    <div class="slider-nav-2 thumb-ft">--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer7.jpg"  alt="photo by Barn Images" width="4096" height="2737">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Wonder Woman</h4>--}}
    {{--                                <p>2:30</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer2.jpg"  alt="photo by Barn Images" width="350" height="200">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Oblivion: Official Teaser Trailer</h4>--}}
    {{--                                <p>2:37</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer6.jpg" alt="photo by Joshua Earle">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Exclusive Interview:  Skull Island</h4>--}}
    {{--                                <p>2:44</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer3.png" alt="photo by Alexander Dimitrov" width="100" height="56">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Logan: Director James Mangold Interview</h4>--}}
    {{--                                <p>2:43</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer4.png"  alt="photo by Wojciech Szaturski" width="100" height="56">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Beauty and the Beast: Official Teaser Trailer 2</h4>--}}
    {{--                                <p>2: 32</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="trailer-img">--}}
    {{--                                <img src="images/uploads/trailer5.jpg"  alt="photo by Wojciech Szaturski" width="360" height="189">--}}
    {{--                            </div>--}}
    {{--                            <div class="trailer-infor">--}}
    {{--                                <h4 class="desc">Fast&Furious 8</h4>--}}
    {{--                                <p>3:11</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
</x-layout>
