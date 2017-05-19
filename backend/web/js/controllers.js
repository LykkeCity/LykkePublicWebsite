'use strict';

var options = {
    urls: {
        pageSave: "/control/api/page/save",
        contentBlockSave: "/control/api/content-block/save",
        contentBlockCreate: "/control/api/content-block/create",
        contentBlockDelete: "/control/api/content-block/delete"
    },
    tinymceOptions: {
        force_br_newlines : false,
        force_p_newlines : false,
        forced_root_block : '',
        language: 'en',
        height: "600",
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        extended_valid_elements: 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
        plugins: 'autoresize advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright |  bullist numlist outdent indent | code link image',
        file_browser_callback: imgManager
    },
    dateRangePickerOptions: {
        "singleDatePicker": true,
        "timePicker": true,
        "timePicker24Hour": true,
        "autoApply": true,
        "buttonClasses": "btn btn-sm btn-flat",
        "locale": {
            "format": "YYYY-MM-DD HH:mm:ss"
        }
    }
};

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

function showModalSuccess() {
    $("#successModal").modal();
}

function showModalError() {
    $("#errorModal").modal();
}

var PageModel = function (id, name, seo_title, seo_description, seo_keywords, datetime, template, url, in_menu, published) {
    this.id = id;
    this.name = name;
    this.seo_title = seo_title;
    this.seo_description = seo_description;
    this.seo_keywords = seo_keywords;
    this.datetime = datetime;
    this.template = template;
    this.contentBlocks = [];
    this.url = url;
    this.in_menu = in_menu;
    this.published = published;

    this.savePage = function ($http, successCallback, errorCallback) {

        this.contentBlocks.forEach(function (block) {
            block.saveBlock($http,
                function (data) {
                    console.log(data);
                },
                function (data) {
                    console.log(data);
                })
        });

        var params = {
            'id': this.id,
            'name': this.name,
            'datetime': this.datetime,
            'template': this.template,
            'title': this.seo_title,
            'description': this.seo_description,
            'keywords': this.seo_keywords,
            'url': this.url,
            'in_menu': this.in_menu,
            'published': this.published
        };
        $http.post(options.urls.pageSave, params)
            .success(function (data) {
                // console.log(data);
                successCallback(data);
            })
            .error(function (data) {
                // console.log(data);
                errorCallback(data);
            });
    };

    this.addBlock = function ($http, successCallBack, errorCallback) {
        var param = {
            'pageId': this.id
        };
        var page = this;
        $http.post(options.urls.contentBlockCreate, param)
            .success(function (data) {
                console.log(data);
                if (data.result == "OK") {
                    var newBlock = new contentBlockModel(
                        data.contentBlock.id,
                        data.contentBlock.pageId,
                        data.contentBlock.ordering,
                        data.contentBlock.name,
                        data.contentBlock.title,
                        data.contentBlock.content
                    );
                    page.contentBlocks.push(newBlock);
                    successCallBack(data);
                } else {
                    errorCallback(data);
                }
            })
            .error(function (data) {
                errorCallback(data);
            })
    };

    this.deleteBlock = function ($http, id, $index) {
        var page = this;
        this.contentBlocks.forEach(function (el) {
            if (el.id === id) {
                el.deleteBlock($http,
                    function (data) {
                        page.contentBlocks.splice($index, 1);
                    },
                    function (data) {

                    })
            }
        })
    }
};

var contentBlockModel = function (id, pageId, ordering, name, title, content) {
    this.id = id;
    this.pageId = pageId;
    this.ordering = ordering;
    this.name = name;
    this.title = title;
    this.content = content;

    this.createBlock = function ($http) {
        $http.post(options.urls.contentBlockCreate, {})
            .success(function (data) {

            })
            .error(function (data) {

            })
    };
    this.saveBlock = function ($http, successCallback, errorCallback) {
        var params = {
            'id': this.id,
            'ordering': this.ordering,
            'name': this.name,
            'title': this.title,
            'content': this.content
        };
        $http.post(options.urls.contentBlockSave, params)
            .success(function (data) {
                successCallback(data);
            })
            .error(function (data) {
                errorCallback(data);
            })
    };
    this.deleteBlock = function ($http, successCallback, errorCallback) {
        var params = {
            'id': this.id
        };
        $http.post(options.urls.contentBlockDelete, params)
            .success(function (data) {
                if (data.result === 'OK') {
                    successCallback(data);
                }
                errorCallback(data);
            })
            .error(function (data) {
                errorCallback(data)
            })
    }
};

var app = angular.module('lykkeAdminApp',
    ['ui.tinymce'],
    function ($httpProvider) {
        // Use x-www-form-urlencoded Content-Type
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        /**
         * The workhorse; converts an object to x-www-form-urlencoded serialization.
         * @param {Object} obj
         * @return {String}
         */
        var param = function (obj) {
            var query = '', name, value, fullSubName, subName, subValue, innerObj, i;

            for (name in obj) {
                value = obj[name];

                if (value instanceof Array) {
                    for (i = 0; i < value.length; ++i) {
                        subValue = value[i];
                        fullSubName = name + '[' + i + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if (value instanceof Object) {
                    for (subName in value) {
                        subValue = value[subName];
                        fullSubName = name + '[' + subName + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if (value !== undefined && value !== null)
                    query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
            }

            return query.length ? query.substr(0, query.length - 1) : query;
        };

        // Override $http service's default transformRequest
        $httpProvider.defaults.transformRequest = [function (data) {
            return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
        }];
    });


app.controller('PageViewCtrl', [
    '$scope', '$http',
    function ($scope, $http) {
        $scope.templateEnum = [
            'index',
            'seo'
        ];

        $scope.validate = function () {

        };

        $scope.tinymceOptions = options.tinymceOptions;
        $scope.page = window.page;

        $scope.isEmbedded = function () {
            return $scope.page.template === 'embedded';
        };
        $scope.savePage = function () {
            $scope.page.savePage($http,
                function () {
                    showModalSuccess();
                },
                function (data) {
                    showModalError();
                })
        };
        $scope.addBlock = function () {
            $scope.page.addBlock($http,
                function (data) {

                },
                function (data) {
                    showModalError();
                })
        };
        $scope.deleteBlock = function (id, $index) {
            $scope.page.deleteBlock($http, id, $index)
        };
        $scope.deleteBlockDialog = function(id, $index){
            $("#dangerBlockModal").modal();
            $scope.deleteBlockId = id;
            $scope.deleteBlockIndex = $index;
        };
        $scope.deletePageDialog = function () {
            $("#dangerPageModal").modal();
        };
    }
]);

$(function () {
    // TODO: moving into directive
    setTimeout(function () {
        $('input.dateTimePickerSingle').daterangepicker(options.dateRangePickerOptions);
    }, 200);
});


