@props(['media', 'type', 'period', 'currentSeason', 'isInWatchlist' => false, 'review' => null])

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
                    <img src="{{ $media->poster }}" alt="poster">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i>
                                    Watch
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
                    @if($type === 'season')
                        <h1 class="bd-hd"><a href="/shows/{{ $media->show->slug }}"
                                             style="color: white;">{{ $media->show->title }}</a>
                            <span>Season {{ $media->season_number }} - {{ $media->release_date }}</span>
                        </h1>
                    @endif

                    <h1 class="bd-hd">{{ $media->title }}
                        @if($type === 'movie')
                            <span>{{ date('Y', strtotime($media->release_date)) }}</span>
                        @elseif($type === 'show')
                            <span>{{ $period }}</span>
                        @endif
                    </h1>

                    @if($type !== 'season')
                        <div id="plus-sign" class="social-btn {{ $isInWatchlist ? 'hide' : '' }}">
                            <a href="#" class="parent-btn"
                               onclick="addToWatchlist({{ $media->id }}, '{{ $type }}', {{ auth()->check() }})"><i
                                    class="fa-solid fa-plus"></i> Add to Watchlist</a>
                        </div>

                        <div id="check-sign" class="social-btn {{ !$isInWatchlist ? 'hide' : '' }}">
                            <a href="#" class="parent-btn"
                               onclick="removeFromWatchlist({{ $media->id }}, '{{ $type }}', {{ auth()->check() }})"><i
                                    class="fa-solid fa-check"></i> In Watchlist </a>
                        </div>

                        <div class="movie-rate" style="{{ $type === 'season' ? 'margin-bottom: 100px;' : '' }}">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <p><span>8.1</span> /10<br>
                                    <span class="rv">56 Reviews</span>
                                </p>
                            </div>
                            <div class="rate-star">
                                @if($review?->rating)
                                    <p>Your Rating: </p>
                                    <div class="ratingLink"><a href="#"><i class="fa-solid fa-star fa-2xl"
                                                                           style="display: flex; justify-content: center; color: #f5b50a;"><span
                                                    class="rating-number1">{{ $review->rating }}</span></i></a></div>
                                @else
                                    <p>Rate This {{ ucwords($type) }}: </p>
                                    <div class="ratingLink"><a href="#"><i class="fa-regular fa-star"
                                                                           style="color: #f5b50a"></i></a></div>
                                @endif

                                <div class="rating-wrapper" id="rating-content">
                                    <div class="rating-content">
                                        <a href="#" class="close">x</a>
                                        <i class="fa-solid fa-star fa-2xl"
                                           style="display: flex; justify-content: center; color: #f5b50a;"><span
                                                class="rating-number">{{ $review?->rating }}</span></i>
                                        <br>
                                        <div style="margin-top: 50px;">
                                            @for($i = 1; $i <= 10; $i++)
                                                <i id="star{{$i}}"
                                                   class="{{ $review && $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"
                                                   style="cursor: pointer; color: #f5b50a; font-size: 30px; margin-right: 5px;"
                                                   onmouseover="hoverStar({{ $i }})" onmouseleave="leaveStar()"
                                                   onclick="clickStar({{ $i }})"></i>
                                            @endfor
                                        </div>
                                        <br>
                                        <button class="rateBtn grey"
                                                onclick="rate({{ $media->id }}, '{{ $type }}', {{ auth()->check() }})"
                                                disabled>Rate
                                        </button>
                                        @if($review?->rating)
                                            <button class="remove-rating-btn"
                                                    onclick="removeRating({{ $review->id }})"
                                            >Remove Rating
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Overview</a></li>
                                @if($type === 'season')
                                    <li><a href="#episodes"> Episodes</a></li>
                                @else
                                    <li><a href="#reviews"> Reviews</a></li>
                                    @if($type === 'show')
                                        <li><a href="#season"> Seasons</a></li>
                                    @endif
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-{{ $type === 'season' ? '12' : '8' }} col-sm-12 col-xs-12">
                                            <p>{!! nl2br($media->description) !!} </p>

                                            @if($type !== 'season')
                                                @if($type === 'show' && $media->seasons->count() > 0)
                                                    <div class="title-hd-sm">
                                                        <h4>Current Season</h4>
                                                        <a href="/shows/{{ $media->slug }}/seasons" class="time">View
                                                            All
                                                            Seasons <i class="ion-ios-arrow-right"></i></a>
                                                    </div>
                                                    <x-season-card :show="$media" :season="$currentSeason"/>
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
                                            @endif
                                        </div>
                                        @if($type !== 'season')
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
                                                        <p>
                                                            <a href="/celebrities/{{ $actor->id }}">{{ $actor->name }}</a>
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
                                        @endif
                                    </div>
                                </div>
                                @if($type !== 'season')
                                    <div id="reviews" class="tab review">
                                        <div class="row">
                                            <div class="rv-hd" style="margin-bottom: 15px; cursor: pointer;"
                                                 onclick="showCommentArea({{ auth()->check() }})">
                                                <div class="redbtn">Write Review</div>
                                            </div>

                                            <div id="comment-area" class="hide">
                                                <input type="text" class="form-control" id="review-headline"
                                                       placeholder="Write a headline for your review here"
                                                       style="margin-bottom: 10px;">

                                                <textarea id="review-body" class="form-control" rows="10"
                                                          placeholder="Write you review here"></textarea>

                                                <div style="display: flex; justify-content: end; margin: 20px;">
                                                    <button class="comment-btn"
                                                            onclick="postComment({{ $media->id }}, '{{ $type }}')">Post
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="topbar-filter">
                                                <p>Found <span>56 reviews</span> in total</p>
                                                <label>Filter by:</label>
                                                <select>
                                                    <option value="rating">Best</option>
                                                    <option value="rating">Top</option>
                                                    <option value="date">New</option>
                                                    <option value="date">Controversial</option>
                                                </select>
                                            </div>

                                            @foreach($media->reviews as $review)
                                                <x-review-card :review="$review"/>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if($type === 'show' && $media->seasons->count() > 0)
                                    <div id="season" class="tab">
                                        <div class="row">
                                            @foreach($media->seasons as $season)
                                                <x-season-card :show="$media" :season="$season"/>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if($type === 'season')
                                    <div id="episodes" class="tab">
                                        <div class="row">
                                            @foreach($media->episodes as $episode)
                                                <x-episode-card :episode="$episode"/>
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
