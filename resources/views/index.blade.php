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
                        <a href="/movies" class="viewall">View all <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#tab1">#Popular</a></li>
                            <li><a href="#tab2"> #Coming soon</a></li>
                            <li><a href="#tab3"> #Top rated </a></li>
                            <li><a href="#tab4"> #Most reviewed</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab3" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab4" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Movies/ -->

                    <!-- Shows -->
                    <div class="title-hd">
                        <h2>Series</h2>
                        <a href="/shows" class="viewall">View all <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links-2">
                            <li><a href="#tab21">#Popular</a></li>
                            <li class="active"><a href="#tab22"> #Coming soon</a></li>
                            <li><a href="#tab23"> #Top rated </a></li>
                            <li><a href="#tab24"> #Most reviewed</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab21" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab22" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab23" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab24" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="article-item">
                                                <div class="article-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185"
                                                         height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i
                                                            class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shows/ -->
                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <!-- Celebrities -->
                        <div class="celebrities">
                            <h4 class="sb-title">Spotlight Celebrities</h4>
                            <div class="celeb-item">
                                <a href="#"><img src="images/uploads/ava1.jpg" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Samuel N. Jack</a></h6>
                                    <span>Actor</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="images/uploads/ava2.jpg" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Benjamin Carroll</a></h6>
                                    <span>Actor</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="images/uploads/ava3.jpg" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Beverly Griffin</a></h6>
                                    <span>Actor</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="images/uploads/ava4.jpg" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Justin Weaver</a></h6>
                                    <span>Actor</span>
                                </div>
                            </div>
                            <a href="#" class="btn">See all celebrities<i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <!-- Celebrities/ -->
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
