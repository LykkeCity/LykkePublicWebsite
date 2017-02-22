$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});






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


tinymce.init({
    selector: ".editor_basic",
    skin: 'light',
    language: 'ru',
    plugins: [
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking, link, textcolor, colorpicker",
    ],
    toolbar1: "bold italic underline strikethrough | link unlink anchor | forecolor backcolor"
});



var timmceOption = {
    file_browser_callback: imgManager,
    skin: 'light',
    selector: ".editor_full",
    language: 'ru',
    plugins: [
        "noneditable importcss advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern autoresize"
    ],
    toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    image_advtab: true,
    relative_urls : false,
    remove_script_host : false,
    convert_urls : false,
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
        {title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
        ]},
        {title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]},
        {title: "Свои стили", items: [
            {title: "Оформление заголовка 1", selector: "h1", classes: 'title-cont-4'}
        ]}


    ]

};
var htmlEditor ;

$(document).ready(function () {
    htmlEditor = $('#editor_view').html();
    tinymce.init(timmceOption);
});

$('.change_editor').on('click', function () {
    $('#editor_view').html('').html(htmlEditor);
    tinymce.init(timmceOption);

});

$('.change_editor_html').on('click', function () {

    $('.editor_full').tinymce().remove();
    $('#editor_view').html('').html(htmlEditor);
    editAreaLoader.init({
        id: "editor"	// id of the textarea to transform
        ,start_highlight: true	// if start with highlight
        ,language: "ru"
        ,allow_toggle: false
        ,syntax: "html"
        ,min_width:700
        ,min_height:500
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
    }

    var result = '';
    var curent_sim = '';

    for (i = 0; i < text.length; i++) {
        if (transl[text[i]] != undefined) {
            if (curent_sim != transl[text[i]] || curent_sim != space) {
                result += transl[text[i]];
                curent_sim = transl[text[i]];
            }
        }
        else {
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
        if (!confirm('You are sure?')){
            return false;
        }
    });

});

