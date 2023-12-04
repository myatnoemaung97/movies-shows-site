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
                                <h6><a href="/articles/{{$article->id}}"><span class="aritcle-title">{{$article->title}}</span></a></h6>
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
</x-layout>
