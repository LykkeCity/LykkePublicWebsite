$(document).ready(function(){

    var inProgress = false,
        page = 2,
        spinnerContainer = $('.spinner_container');

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
            $.ajax({
                url: '/city/blog',
                method: 'POST',
                data: {"page" : page},
                beforeSend: function() {
                    inProgress = true;
                    spinnerContainer.fadeIn(200);
                }
            }).done(function(data){
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
            success: function(data) {
                if (data !== 'error') {
                    $('.messages_list').prepend(data);
                }else{
                    alert(data);
                }
            }
        })
    });

    var  pageComments = 1;

    $('.show-more').on('click', function () {


        var id = $(this).data('id');

        $.ajax({
            url: '/blog/show-more-comments',
            method: 'POST',
            data: {'page':pageComments, 'id':id},
            beforeSend: function() {
                $('.show-more').fadeOut();
            }
        }).done(function(data){
            if (data !== '') {
                $('.messages_list').append(data);
                pageComments += 1;
                $('.show-more').fadeIn();
            }else{
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
                data: {'id':id},
                success: function() {
                    _this.parents('.message_card').fadeOut();
                }
            })
        }

        e.preventDefault();

    });
    

});
