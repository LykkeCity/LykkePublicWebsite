$(document).ready(function() {
    $('.startedit').on('click', function () {
        tinymce.init({
            skin: 'custom',
            selector: '.inline-edit',
            fixed_toolbar_container: "#css3-selector",
            language: 'ru',
            inline: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste save'
            ],
            toolbar: 'save insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            save_onsavecallback: function () {
                $.post('/control/page/inlinesave/', {content:this.getContent(), id:$('.inline-edit').data('page-id')}, function (data) {
                    if (data === 'success' ) {
                        alert('Изменения успешно сохранены!');
                    }else{
                        alert('Возникла ошибка =(');
                    }
                });
            },
            init_instance_callback: function () {
                tinymce.activeEditor.focus();
            },
        });

        $(this).hide();
        $('.canceledit').show();
    });

    $('.canceledit').on('click', function () {
        location.reload();
    });
});