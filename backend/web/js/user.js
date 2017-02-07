
function updateDate(e) {
    var _this = $(e),
        id = _this.data('id'),
        data = _this.is(':checked') ? 1 : 0;

    $.ajax({
        url: '/control/user/'+_this.attr('class'),
        method: 'POST',
        data: {id: id, data: data},
        success: function (data) {
            if (data != true) {
                alert('Error');
            }
        }
    })
}