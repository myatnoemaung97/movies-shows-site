<x-layout>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> {{ $playlist->name }}</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li><span class="fa-solid fa-arrow-right"></span> playlist</li>
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
                    @foreach($playlist->movies() as $movie)
                        <x-media-list-item :media="$movie"/>
                    @endforeach
                    @foreach($playlist->shows() as $movie)
                        <x-media-list-item :media="$movie"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- end of  blog detail section-->
</x-layout>
