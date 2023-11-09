<div class="hero user-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>{{ auth()->user()->username }}’s profile</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="/">Home</a></li>
                        <li><span class="ion-ios-arrow-right"></span>Watchlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-single userfav_list">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="user-information">
                    <div class="user-fav">
                        <p>Account Details</p>
                        <ul>
                            <li class="{{ request()->path() === 'profile' ? 'active' : '' }}"><a href="/profile">Profile</a></li>
                            <li class="{{ request()->path() === 'profile/watchlists' ? 'active' : '' }}"><a href="/profile/watchlists">Watchlist</a></li>
                            <li class="{{ request()->path() === 'profile/reviews' ? 'active' : '' }}"><a href="/profile/reviews">Reviewed movies</a></li>
                        </ul>
                    </div>
                    <div class="user-fav">
                        <p>Others</p>
                        <ul>
                            <li><a href="#">Change password</a></li>
                            <li><a href="/logout">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
