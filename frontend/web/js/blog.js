$(document).ready(function () {

    var inProgress = false,
        page = 2,
        spinnerContainer = $('.spinner_container');

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
            $.ajax({
                url: '/city/blog',
                method: 'POST',
                data: {"page": page},
                beforeSend: function () {
                    inProgress = true;
                    spinnerContainer.fadeIn(200);
                }
            }).done(function (data) {
                if (data !== "") {
                    $(".news_list").append(data);
                    inProgress = false;
                    page += 1;
                }
                spinnerContainer.fadeOut(200);
            });
        }
    });
    
});
