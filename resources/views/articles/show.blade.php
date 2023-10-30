<x-layout>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> blog detail</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="fa-solid fa-arrow-right"></span> blog listing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog detail section-->
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-detail-ct">
                        <h1>{{ $article->title }}</h1>
                        <span class="time">{{ date('Y-m-d', strtotime($article->created_at)) }}</span>
                        <img src="{{ $article->image }}" alt="">
                        <p>{!! nl2br($article->body) !!}</p>

                        <!-- comment items -->
                        <div class="comments">
                            <h4>04 Comments</h4>
                            <div class="cmt-item flex-it">
                                <img src="/images/uploads/author.png" alt="">
                                <div class="author-infor">
                                    <div class="flex-it2">
                                        <h6><a href="#">Steve Perry</a></h6> <span class="time"> - 27 Mar 2017</span>
                                    </div>
                                    <p>Even though Journey's classic vocalist Steve Perry didn’t reunite with the band during their Rock Hall performance (to the dismay of hopeful fans), he did offer up a touching speech.</p>
                                    <p><a class="rep-btn" href="#">+ Reply</a></p>
                                </div>
                            </div>
                            <div class="cmt-item flex-it reply">
                                <img src="/images/uploads/author2.png" alt="">
                                <div class="author-infor">
                                    <div class="flex-it2">
                                        <h6><a href="#">Joss Whedon</a></h6> <span class="time"> - 27 Mar 2017</span>
                                    </div>
                                    <p>Prince died not long after the 2016 Rock Hall ceremony, so this year's edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.</p>
                                </div>
                            </div>
                            <div class="cmt-item flex-it reply">
                                <img src="/images/uploads/author3.png" alt="">
                                <div class="author-infor">
                                    <div class="flex-it2">
                                        <h6><a href="#">Dave McNary</a></h6> <span class="time"> - 27 Mar 2017</span>
                                    </div>
                                    <p>Blue Sky Studios is one of the world’s leading digital animation movie studios and we are proud of their commitment to stay and grow in Connecticut.</p>
                                </div>
                            </div>
                            <div class="cmt-item flex-it">
                                <img src="/images/uploads/author4.png" alt="">
                                <div class="author-infor">
                                    <div class="flex-it2">
                                        <h6><a href="#">Margot Robbie</a></h6> <span class="time"> - 27 Mar 2017</span>
                                    </div>
                                    <p>Joan Baez was the sharpest of the Rock Hall inductees, singing about deportees and talking social activism as well as joking about her age and the likelihood that a good portion of the Barclays. </p>
                                    <p><a class="rep-btn" href="#">+ Reply</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>Leave a comment</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Your email">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Website">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="message" id="" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <input class="submit" type="submit" placeholder="submit">
                            </form>
                        </div>
                        <!-- comment form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of  blog detail section-->
</x-layout>
