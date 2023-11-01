<x-layout>
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
    <x-media-detail :media="$show" :currentSeason="$currentSeason" :type="'show'" :period="$period" />
</x-layout>
