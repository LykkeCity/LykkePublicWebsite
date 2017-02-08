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


    $('.post-comment').on('click', function () {
        form = $('#form-comment').serialize();
        $.ajax({
            url: '/blog/comment',
            method: 'POST',
            data: form,
            success: function (data) {
                if (data !== 'error') {
                    $('.messages_list').prepend(data);
                    $('#msg').val('');
                } else {
                    alert(data);
                }
            }
        })
    });

    var pageComments = 1;

    $('.show-more').on('click', function () {


        var id = $(this).data('id');

        $.ajax({
            url: '/blog/show-more-comments',
            method: 'POST',
            data: {'page': pageComments, 'id': id},
            beforeSend: function () {
                $('.show-more').fadeOut();
            }
        }).done(function (data) {
            if (data !== '') {
                $('.messages_list').append(data);
                pageComments += 1;
                $('.show-more').fadeIn();
            } else {
                $('.show-more').fadeOut();
            }
        });

    });


    $(document).on('click', '.action_link-delete', function (e) {

        if (confirm("Delete?")) {
            var id = $(this).data('id'),
                _this = $(this);

            $.ajax({
                url: '/blog/delete-comment',
                method: 'POST',
                data: {'id': id},
                success: function () {
                    _this.closest('.message_card').addClass('message_card--deleted');
                    _this.closest('.message_card').find('.user_badge__title:first').append('<span class="middot">&middot;</span>  <span class="label label--dark label--text">deleted</span>');
                }
            })
        }

        e.preventDefault();

    });


    $(document).on('click', '.action_link-spam', function (e) {

        if (confirm("You are sure?")) {
            var id = $(this).data('id'),
                _this = $(this);

            $.ajax({
                url: '/blog/spam-comment',
                method: 'POST',
                data: {'id': id},
                success: function () {
                    if (_this.closest('.message_card').find('.user_badge__title .label-spam:first').length == 0) {
                        _this.closest('.message_card').find('.user_badge__title:first').append('<span class="middot">&middot;</span>  <div class="label label--text label--red label-spam">Suspicious comment</div>');
                    } else {
                        _this.closest('.message_card').find('.user_badge__title .label-spam:first').fadeOut(500).fadeIn(500);
                    }
                }
            })
        }

        e.preventDefault();

    });

    $(document).on('click', '.action_link-reply', function (e) {
        var _this = $(this);
        _this.parents('.message_card__message').find('.block-reply').toggle();
        e.preventDefault();

    });

    $(document).on('click', '.send-reply', function (e) {
        var _this = $(this);
        form = _this.parents('.block-reply').find('.reply-comment-form').serialize();

        $.ajax({
            url: '/blog/comment',
            method: 'POST',
            data: form,
            success: function (data) {
                if (data !== 'error') {
                    _this.parents('.user_badge__message').append(data);
                    _this.parents('.block-reply').toggle();
                } else {
                    alert(data);
                }
            }
        })
        e.preventDefault();

    });

    $(document).on('click', '.action_link-edit', function (e) {
        var _this = $(this), parent = _this.parents('.message_card__message');

        parent.find('.edit-textarea').val(parent.find('.comment-text').text());
        parent.find('.block-edit').toggle();

        e.preventDefault();

    });

    $(document).on('click', '.send-edit', function (e) {
        var _this = $(this), parent = _this.closest('.message_card');
        form = _this.parents('.block-edit').find('.edit-comment-form').serialize();

        $.ajax({
            url: '/blog/edit-comment',
            method: 'POST',
            data: form,
            success: function (data) {
                if (data !== 'error') {
                    if (parent.find('.user_badge__title .label-edited:first').length == 0) {
                        parent.find('.user_badge__title:first').append('<span class="middot">&middot;</span>  <div class="label label--dark label--text label-edited">edited <i class="icon icon--edit_alt"></i></div>');
                    } else {
                        parent.find('.user_badge__title .label-edited:first').fadeOut(500).fadeIn(500);
                    }
                    parent.find('.comment-text:first').text(data);
                    _this.parents('.block-edit').toggle();
                } else {
                    alert(data);
                }
            }
        })
        e.preventDefault();


    });

    $(document).on('click', '.action_link-block-user', function (e) {

        if (confirm("You are sure?")) {
            var id = $(this).data('id');

            $.ajax({
                url: '/blog/blocked-comment',
                method: 'POST',
                data: {'id': id},
                success: function (data) {
                    if (data !== 'error') {
                        alert("User Blocked!");
                    } else {
                        alert("Error Blocking User");
                    }
                }
            })
        }

        e.preventDefault();

    });

    $(document).on('click', '.action-subscribe', function (e) {

        var _this = $(this), id = _this.data('id');

        $.ajax({
            url: '/blog/subscribe-comment',
            method: 'POST',
            data: {'id': id},
            success: function (data) {
                if (data !== 'error') {
                    _this.removeClass('action-subscribe').addClass('action-unsubscribe').find('span').text('Unsubscribe');
                } else {
                    alert("Error");
                }
            }
        })

        e.preventDefault();

    });

    $(document).on('click', '.action-unsubscribe', function (e) {

        var _this = $(this), id = _this.data('id');

        $.ajax({
            url: '/blog/unsubscribe-comment',
            method: 'POST',
            data: {'id': id},
            success: function (data) {
                if (data !== 'error') {
                    _this.removeClass('action-unsubscribe').addClass('action-subscribe').find('span').text('Subscribe');
                } else {
                    alert("Error");
                }
            }
        })

        e.preventDefault();

    });

});
