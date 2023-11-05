<?php $profileLink = "/profiles/" . auth()->user()->id ?>
<div class="hero user-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>’s profile</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="{{ $profileLink }}">Home</a></li>
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
                    <div class="user-img">
                        <a href="#"><img src="/images/uploads/user-img.png" alt=""><br></a>
                        <a href="#" class="redbtn">Change avatar</a>
                    </div>
                    <div class="user-fav">
                        <p>Account Details</p>
                        <ul>
                            <li><a href="{{ $profileLink }}">Profile</a></li>
                            <li class="active"><a href="{{ $profileLink }}/watchlists">Watchlist</a></li>
                            <li><a href="{{ $profileLink }}/reviews">Reviewed movies</a></li>
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
