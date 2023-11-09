<x-layout>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> Article</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="fa-solid fa-arrow-right"></span> article</li>
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

                        @foreach($article->contents as $content)
                            <img src="{{ $content->image }}" alt="">
                            <p>{!! nl2br($content->body) !!}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of  blog detail section-->
</x-layout>
