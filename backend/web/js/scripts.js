/** Tooltips */
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

/** Datatables */
$(function () {
    $('table.dataTable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});


/** Editor options (TinyMCE and HTML editor) */
function imgManager(field, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: '/backend/web/js/plugins/tinymce/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
        title: 'KCFinder',
        width: 700,
        height: 500,
        inline: true,
        close_previous: false
    }, {
        window: win,
        input: field
    });
    return false;
}

function openKCFinder(div) {
    window.KCFinder = {
        callBack: function (url) {
            window.KCFinder = null;
            var img = new Image();
            img.src = url;
            div.value = url;
            div.parent().parent().find('.imgFinder').attr('src', url);
        }
    };
    window.open('/backend/web/js/plugins/tinymce/kcfinder/browse.php?type=image&dir=/frontend/web/userfiles',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}

var timmceOption = {
    file_browser_callback: imgManager,
    skin: 'light',
    inline: true,
    selector: ".editor_full",
    language: 'en_GB',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "preview media | forecolor backcolor emoticons | styleselect formatselect fontselect fontsizeselect",
    image_advtab: true,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: false,
    autoresize_min_height: 300,
    autoresize_max_height: 600,
    font_formats: "Andale Mono=andale mono,times;" +
    "Arial=arial,helvetica,sans-serif;" +
    "Arial Black=arial black,avant garde;" +
    "Book Antiqua=book antiqua,palatino;" +
    "Comic Sans MS=comic sans ms,sans-serif;" +
    "Courier New=courier new,courier;" +
    "Century Gothic=Century Gothic;" +
    "Georgia=georgia,palatino;" +
    "Gill Sans MT=gill_sans_mt;" +
    "Gill Sans MT Bold=gill_sans_mt_bold;" +
    "Gill Sans MT BoldItalic=gill_sans_mt_bold_italic;" +
    "Gill Sans MT Italic=gill_sans_mt_italic;" +
    "Helvetica=helvetica;" +
    "Impact=impact,chicago;" +
    "Iskola Pota=iskoola_pota;" +
    "Iskola Pota Bold=iskoola_pota_bold;" +
    "Symbol=symbol;" +
    "Tahoma=tahoma,arial,helvetica,sans-serif;" +
    "Terminal=terminal,monaco;" +
    "Times New Roman=times new roman,times;" +
    "Trebuchet MS=trebuchet ms,geneva;" +
    "Verdana=verdana,geneva;" +
    "Webdings=webdings;" +
    "Wingdings=wingdings,zapf dingbats",
    fontsize_formats: "5px 6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 30px 35px 45px",
    style_formats: [
        {
            title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
        ]
        },
        {
            title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
        ]
        },
        {
            title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
        ]
        },
        {
            title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]
        }


    ]

};

tinymce.init({
    selector: ".editor_basic",
    skin: 'light',
    theme: 'modern',
    language: 'en_GB',
    insert_toolbar: 'quickimage quickvideo quicktable',
    plugins: [
        "media searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking, link, textcolor, colorpicker"
    ],
    toolbar1: "bold italic underline strikethrough | link unlink anchor | forecolor backcolor"
});

var htmlEditor;

$(document).ready(function () {
    htmlEditor = $('#editor_view').html();
    tinymce.init(timmceOption);
});

$('.change_editor').on('click', function () {
    $('#editor_view').html('').html(htmlEditor);
    tinymce.init(timmceOption);
});

$('.change_editor_html').on('click', function () {
    console.log('destroy the editor');
    $('.editor_full').tinymce().remove();
    $('#editor_view').html('').html(htmlEditor);
    editAreaLoader.init({
        id: "editor"	// id of the textarea to transform
        , start_highlight: true	// if start with highlight
        , language: "en"
        , allow_toggle: false
        , syntax: "html"
        , min_width: 700
        , min_height: 500
    });
});

function translit(id, alias) {
    var space = '_';
    var text = $(id).val().toLowerCase();
    var transl = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
        'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
        'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
        'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
        ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
        '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
        '(': space, ')': space, '-': space, '\=': space, '+': space, '[': space,
        ']': space, '\\': space, '|': space, '/': space, '.': space, ',': space,
        '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
        '?': space, '<': space, '>': space, '№': space
    };

    var result = '';
    var curent_sim = '';

    for (var i = 0; i < text.length; i++) {
        if (transl[text[i]] != undefined) {
            if (curent_sim != transl[text[i]] || curent_sim != space) {
                result += transl[text[i]];
                curent_sim = transl[text[i]];
            }
        } else {
            result += text[i];
            curent_sim = text[i];
        }
    }

    result = TrimStr(result);
    $(alias).val(result);

}

function TrimStr(s) {
    s = s.replace(/^-/, '');
    return s.replace(/-$/, '');
}

$(document).ready(function () {

    $('.datetimepicker').datetimepicker({
        locale: 'ru',
        defaultDate: new Date(),
        format: 'YYYY/MM/DD H:m:s'
    });

    $('.action-delete').on('click', function () {
        if (!confirm('You are sure?')) {
            return false;
        }
    });

});

