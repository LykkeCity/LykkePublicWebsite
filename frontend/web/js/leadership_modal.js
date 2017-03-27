$(function () {
    $('#leadership_modal').on('show.bs.modal', function (event) {
        console.log('showing');
        var target = $(event.relatedTarget);
        var image = target.find('.leadership_item__image').data('big-image'),
            content = target.find('.leadership_item__info').html();

        console.log(image);

        var modal = $(this);
        modal.find('.leadership_modal__image').css({backgroundImage: 'url('+image+')'});
        modal.find('.modal-title').text('New message to ');
        modal.find('.modal-body').html(content);
    })
});