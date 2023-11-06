let executeLeaveStar = true;
let executeHoverStar = true;
let selectedRating = '';

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
    var loginct = $("#login-content");
    var overlay = $(".overlay");

    event.preventDefault();
    loginct.parents(overlay).addClass("openform");
    $(document).on('click', function (e) {
        var target = $(e.target);
        if ($(target).hasClass("overlay")) {
            $(target).find(loginct).each(function () {
                $(this).removeClass("openform");
            });
            setTimeout(function () {
                $(target).removeClass("openform");
            }, 350);
        }
    });
}

const ratingLink = $(".ratingLink");
const ratingct = $("#rating-content");
const ratingWrap = $(".rating-wrapper");

ratingWrap.each(function () {
    $(this).wrap('<div class="overlay"></div>')
});

const overlay = $(".overlay");

ratingLink.on('click', function (event) {
    event.preventDefault();
    ratingct.parents(overlay).addClass("openform");
    $(document).on('click', function (e) {
        var target = $(e.target);
        if ($(target).hasClass("overlay")) {
            $(target).find(ratingct).each(function () {
                $(this).removeClass("openform");
            });
            setTimeout(function () {
                $(target).removeClass("openform");
            }, 350);
        }
    });
});

function hoverStar(starNumber) {
    if (executeHoverStar) {
        fullStars(1, starNumber);
    }
}

function leaveStar() {
    if (executeLeaveStar) {
        emptyStars(1, 10);
    }
}

function clickStar(starNumber) {
    fullStars(1, starNumber);
    emptyStars(starNumber + 1, 10);

    const ratingNumber = document.querySelector('.rating-number');
    ratingNumber.textContent = starNumber;
    selectedRating = starNumber;

    executeLeaveStar = false;
    executeHoverStar = false;

    const ratingBtn = document.querySelector('.rateBtn');
    ratingBtn.disabled = false;
    ratingBtn.classList.remove('grey');
    ratingBtn.classList.add('gold');

}

function emptyStars(start, end) {
    for (let i = start; i <= end; i++) {
        const star = document.getElementById(`star${i}`);

        if (star) {
            star.classList.remove('fa-solid')
            star.classList.add('fa-regular');
        }
    }
}

function fullStars(start, end) {
    for (let i = start; i <= end; i++) {
        const star = document.getElementById(`star${i}`);

        if (star) {
            star.classList.remove('fa-regular')
            star.classList.add('fa-solid');
        }
    }
}

function rate(mediaId, mediaType, isAuthenticated) {
    if (!isAuthenticated) {
        showLoginModal();
        return;
    }

    if (selectedRating === '') {
        return;
    }

    const formData = new FormData();

    formData.append('mediaId', mediaId);
    formData.append('mediaType', mediaType);
    formData.append('rating', selectedRating);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch("/ratings", {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}

function removeRating(reviewId) {
    const formData = new FormData();

    formData.append('_method', "DELETE");

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/ratings/${reviewId}`, {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}

function showCommentArea(isAuthenticated) {
    if (!isAuthenticated) {
        showLoginModal();
        return;
    }

    document.getElementById('comment-area').classList.remove('hide');
}

function postComment(mediaId, mediaType) {
    let body = document.getElementById('review-body');
    let headline = document.getElementById('review-headline');

    const formData = new FormData();

    formData.append('headline', headline.value);
    formData.append('body', body.value);
    formData.append('mediaId', mediaId);
    formData.append('mediaType', mediaType);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/reviews`, {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}

function testPost() {
    const formData = new FormData();

    formData.append('name', 'myat');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log(formData);

    fetch(`/testPost`, {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}

function testDelete() {
    const formData = new FormData();

    formData.append('name', 'myat');
    formData.append('_method', 'DELETE');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log(formData);

    fetch(`/testDelete`, {
        method: "POST",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}

function testPatch() {
    const formData = new FormData();

    formData.append('name', 'myat');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log(formData);

    fetch(`/testPatch`, {
        method: "PATCH",
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
}
