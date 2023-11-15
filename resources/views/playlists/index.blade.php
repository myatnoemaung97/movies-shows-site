<x-layout>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> Lists</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li> <span class="fa-solid fa-arrow-right"></span> lists</li>
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
                    <ol>
                        @foreach($playlists as $playlist)
                            <li style="color: white; margin-bottom: 10px;"><a href="/playlists/{{ $playlist->id }}">{{ $playlist->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end of  blog detail section-->
</x-layout>
