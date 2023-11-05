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

function removeFromWatchlist(watchlistMediaId, isAuthenticated) {
    if (!isAuthenticated) {
        showLoginModal();
        return;
    }

    const formData = new FormData();

    formData.append('_method', 'DELETE');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/watchlists/${watchlistMediaId}`, {
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
