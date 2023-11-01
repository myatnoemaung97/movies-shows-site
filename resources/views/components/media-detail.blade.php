@props(['media', 'type', 'period', 'currentSeason'])

<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="{{ $media->poster }}" alt="">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch
                                    Trailer</a>
                            </div>
                            <div><a href="{{ $media->trialer }}"
                                    class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd">{{ $media->title }}
                        @if($type === 'movie')
                            <span>{{ date('Y', strtotime($media->release_date)) }}</span>
                        @else
                            <span>{{ $period }}</span>
                        @endif
                    </h1>
                    <div class="social-btn">
                        <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                    </div>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p><span>8.1</span> /10<br>
                                <span class="rv">56 Reviews</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>Rate This Movie: </p>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star-outline"></i>
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Overview</a></li>
                                <li><a href="#reviews"> Reviews</a></li>
                                @if($type === 'show')
                                    <li><a href="#season"> Seasons</a></li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>{!! nl2br($media->description) !!}</p>

                                            @if($type === 'show')
                                                <div class="title-hd-sm">
                                                    <h4>Current Season</h4>
                                                    <a href="/shows/{{ $media->slug }}/seasons" class="time">View All
                                                        Seasons <i class="ion-ios-arrow-right"></i></a>
                                                </div>
                                                <x-season-card :show="$media" :season="$currentSeason" />
                                            @endif

                                            <div class="title-hd-sm">
                                                <h4>cast</h4>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                @foreach($media->actors as $actor)
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="{{ $actor->thumbnail }}" alt="">
                                                            <a href="/celebrities/{{ $actor->id }}">{{ $actor->name }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>User reviews</h4>
                                                <a href="#" class="time">See All 56 Reviews <i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie user review -->
                                            <div class="mv-user-review-item">
                                                <h3>Best Marvel movie in my opinion</h3>
                                                <div class="no-star">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star last"></i>
                                                </div>
                                                <p class="time">
                                                    17 December 2016 by <a href="#"> hawaiipierson</a>
                                                </p>
                                                <p>This is by far one of my favorite movies from the MCU. The
                                                    introduction of new Characters both good and bad also makes the
                                                    movie more exciting. giving the characters more of a back story
                                                    can also help audiences relate more to different characters
                                                    better, and it connects a bond between the audience and actors
                                                    or characters. Having seen the movie three times does not bother
                                                    me here as it is as thrilling and exciting every time I am
                                                    watching it. In other words, the movie is by far better than
                                                    previous movies (and I do love everything Marvel), the plotting
                                                    is splendid (they really do out do themselves in each film,
                                                    there are no problems watching it more than once.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            @if($type === 'show')
                                                <div class="sb-it">
                                                    <h6>Status: </h6>
                                                    <p>{{ $media->status }}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Creators: </h6>
                                                    @foreach($media->creators as $creator)
                                                        <p>
                                                            <a href="/celebrities/{{ $creator->id }}">{{ $creator->name }}</a>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="sb-it">
                                                    <h6>Directors: </h6>
                                                    @foreach($media->directors as $director)
                                                        <p>
                                                            <a href="/celebrities/{{ $director->id }}">{{ $director->name }}</a>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="sb-it">
                                                <h6>Stars: </h6>
                                                @foreach($media->actors as $actor)
                                                    <p><a href="/celebrities/{{ $actor->id }}">{{ $actor->name }}</a>
                                                    </p>
                                                @endforeach
                                            </div>
                                            <div class="sb-it">
                                                <h6>Genres:</h6>
                                                @foreach($media->genres as $genre)
                                                    <p><a href="#">{{ $genre->name }}</a></p>
                                                @endforeach
                                            </div>
                                            <div class="sb-it">
                                                <h6>Release Date:</h6>
                                                <p>{{ $media->release_date }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Run Time:</h6>
                                                <p>{{ $media->run_time }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Age Rating:</h6>
                                                <p>{{ $media->age_rating }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="reviews" class="tab review">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <a href="#" class="redbtn">Write Review</a>
                                        </div>
                                        <div class="topbar-filter">
                                            <p>Found <span>56 reviews</span> in total</p>
                                            <label>Filter by:</label>
                                            <select>
                                                <option value="popularity">Popularity Descending</option>
                                                <option value="popularity">Popularity Ascending</option>
                                                <option value="rating">Rating Descending</option>
                                                <option value="rating">Rating Ascending</option>
                                                <option value="date">Release date Descending</option>
                                                <option value="date">Release date Ascending</option>
                                            </select>
                                        </div>
                                        <div class="mv-user-review-item">
                                            <div class="user-infor">
                                                <img src="/images/uploads/userava1.jpg" alt="">
                                                <div>
                                                    <h3>Best Marvel movie in my opinion</h3>
                                                    <div class="no-star">
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star last"></i>
                                                    </div>
                                                    <p class="time">
                                                        17 December 2016 by <a href="#"> hawaiipierson</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <p>This is by far one of my favorite movies from the MCU. The
                                                introduction of new Characters both good and bad also makes the
                                                movie more exciting. giving the characters more of a back story can
                                                also help audiences relate more to different characters better, and
                                                it connects a bond between the audience and actors or characters.
                                                Having seen the movie three times does not bother me here as it is
                                                as thrilling and exciting every time I am watching it. In other
                                                words, the movie is by far better than previous movies (and I do
                                                love everything Marvel), the plotting is splendid (they really do
                                                out do themselves in each film, there are no problems watching it
                                                more than once.</p>
                                        </div>
                                        <div class="mv-user-review-item">
                                            <div class="user-infor">
                                                <img src="/images/uploads/userava2.jpg" alt="">
                                                <div>
                                                    <h3>Just about as good as the first one!</h3>
                                                    <div class="no-star">
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                    </div>
                                                    <p class="time">
                                                        17 December 2016 by <a href="#"> hawaiipierson</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <p>Avengers Age of Ultron is an excellent sequel and a worthy MCU title!
                                                There are a lot of good and one thing that feels off in my
                                                opinion. </p>

                                            <p>THE GOOD:</p>

                                            <p>First off the action in this movie is amazing, to buildings
                                                crumbling, to evil blue eyed robots tearing stuff up, this movie has
                                                the action perfectly handled. And with that action comes visuals.
                                                The visuals are really good, even though you can see clearly where
                                                they are through the movie, but that doesn't detract from the
                                                experience. While all the CGI glory is taking place, there are
                                                lovable characters that are in the mix. First off the original
                                                characters, Iron Man, Captain America, Thor, Hulk, Black Widow, and
                                                Hawkeye, are just as brilliant as they are always. And Joss Whedon
                                                fixed my main problem in the first Avengers by putting in more
                                                Hawkeye and him more fleshed out. Then there is the new Avengers,
                                                Quicksilver, Scarletwich, and Vision, they are pretty cool in my
                                                opinion. Vision in particular is pretty amazing in all his
                                                scenes.</p>

                                            <p>THE BAD:</p>

                                            <p>The beginning of the film it's fine until towards the second act and
                                                there is when it starts to feel a little rushed. Also I do feel like
                                                there are scenes missing but there was talk of an extended version
                                                on Blu-Ray so that's cool.</p>
                                        </div>
                                        <div class="topbar-filter">
                                            <label>Reviews per page:</label>
                                            <select>
                                                <option value="range">5 Reviews</option>
                                                <option value="saab">10 Reviews</option>
                                            </select>
                                            <div class="pagination2">
                                                <span>Page 1 of 6:</span>
                                                <a class="active" href="#">1</a>
                                                <a href="#">2</a>
                                                <a href="#">3</a>
                                                <a href="#">4</a>
                                                <a href="#">5</a>
                                                <a href="#">6</a>
                                                <a href="#"><i class="ion-arrow-right-b"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($type === 'show')
                                    <div id="season" class="tab">
                                        <div class="row">
                                            @foreach($media->seasons as $season)
                                                <x-season-card :show="$media" :season="$season" />
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
