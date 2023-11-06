@props(['review'])

<div class="mv-user-review-item">
    <div class="user-infor">
        <img src="/images/uploads/userava1.jpg" alt="">
        <div>
            <h3>{{ $review->headline }}</h3>
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
                {{ date('d F Y', strtotime($review->created_at))}} by <a href="#"> {{ $review->user->username }}</a>
            </p>
        </div>
    </div>
    <p>{{ $review->body }}</p>
</div>
