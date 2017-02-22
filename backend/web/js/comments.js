$(document).ready(function () {

    $(document).on('click', '.view_history', function (e) {

        var _this = $(this), page_post_id = _this.data('page-post-id'), type = _this.data('type'), comments_id = _this.data('comment-id');
        
        $.ajax({
            url: '/control/comments/history',
            method: 'POST',
            data: {'comments_id': comments_id, 'page_post_id': page_post_id, 'type': type},
            success: function (data) {
                $('#history .modal-body').html(data);
                $('#history').modal();
            }
        })

        e.preventDefault();

    });

});