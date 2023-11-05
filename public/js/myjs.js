function addToWatchlist(mediaId, mediaType, isAuthenticated) {
    if (!isAuthenticated) {
        showLoginModal();
        return;
    }

    const formData = new FormData();

    formData.append('mediaId', mediaId);
    formData.append('mediaType', mediaType);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch("/watchlists", {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                const plusSign = document.getElementById(`plus-sign`);
                const checkSign = document.getElementById(`check-sign`);

                if (plusSign && checkSign) {
                    plusSign.classList.add('hide');
                    plusSign.classList.remove('show');
                    checkSign.classList.remove('hide');
                    checkSign.classList.add('show')
                }
            }
        });
}

function removeFromWatchlist(mediaId, mediaType, isAuthenticated) {
    if (!isAuthenticated) {
        showLoginModal();
        return;
    }

    const formData = new FormData();

    formData.append('mediaId', mediaId);
    formData.append('mediaType', mediaType);
    formData.append('_method', 'DELETE');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/watchlists`, {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                const plusSign = document.getElementById(`plus-sign`);
                const checkSign = document.getElementById(`check-sign`);

                if (plusSign && checkSign) {
                    plusSign.classList.add('show');
                    plusSign.classList.remove('hide');
                    checkSign.classList.remove('show');
                    checkSign.classList.add('hide')
                }
            }
        });
}

function showLoginModal() {
    var loginct = $( "#login-content" );
    var overlay = $(".overlay");

    event.preventDefault();
    loginct.parents(overlay).addClass("openform");
    $(document).on('click', function(e){
        var target = $(e.target);
        if ($(target).hasClass("overlay")){
            $(target).find(loginct).each( function(){
                $(this).removeClass("openform");
            });
            setTimeout( function(){
                $(target).removeClass("openform");
            }, 350);
        }
    });
}

const ratingLink = $(".ratingLink");
const ratingct = $("#rating-content");
const ratingWrap = $(".rating-wrapper");

ratingWrap.each( function(){
    $(this).wrap('<div class="overlay"></div>')
});

const overlay = $(".overlay");

ratingLink.on('click', function(event){
    event.preventDefault();
    ratingct.parents(overlay).addClass("openform");
    $(document).on('click', function(e){
        var target = $(e.target);
        if ($(target).hasClass("overlay")){
            $(target).find(ratingct).each( function(){
                $(this).removeClass("openform");
            });
            setTimeout( function(){
                $(target).removeClass("openform");
            }, 350);
        }
    });
});

function hoverStar(starNumber) {
    for (let i = 1; i <= starNumber; i++) {
        const star = document.getElementById(`star${i}`);

        if (star) {
            star.classList.remove('fa-regular')
            star.classList.add('fa-solid');
        }
    }
}

function leaveStar() {
    for (let i = 1; i <= 10; i++) {
        const star = document.getElementById(`star${i}`);

        if (star) {
            star.classList.remove('fa-solid')
            star.classList.add('fa-regular');
        }
    }
}

function clickStar() {

}
