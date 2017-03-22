function updateData(e) {
    console.log(e);
    var _this = $(e),
        id = _this.data('id'),
        data = _this.is(':checked') ? 1 : 0;

    var params = {
        id: id,
        data: data
    };

    console.log(params);
    $.ajax({
        url: '/control/user/' + _this.attr('class'),
        method: 'POST',
        data: params,
        success: function (data) {
            console.log(data);
            if (data != true) {
                alert('Error');
            }
        }
    })
}