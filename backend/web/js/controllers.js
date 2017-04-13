'use strict';

var options = {
    urls: {
        pageSave: "/control/api/page/save",
        contentBlockSave: "/control/api/content-block/save",
        contentBlockCreate: "/control/api/content-block/create",
        contentBlockDelete: "/control/api/content-block/delete"
    },
    tinymceOptions: {
        language: 'ru',
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        extended_valid_elements: 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright |  bullist numlist outdent indent | code link image'
    }
};

var PageModel = function (id, name, seo_title, seo_description, seo_keywords, datetime, template, url) {
    this.id = id;
    this.name = name;
    this.seo_title = seo_title;
    this.seo_description = seo_description;
    this.seo_keywords = seo_keywords;
    this.datetime = datetime;
    this.template = template;
    this.contentBlocks = [];
    this.url = url;

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
            'seo_keywords': this.seo_keywords,
            'url': this.url
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
        $http.post(options.urls.contentBlockCreate, {

        })
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
    this.deleteBlock = function ($http) {
        $http.post(options.urls.contentBlockDelete, {

        })
            .success(function (data) {

            })
            .error(function (data) {

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


app.directive('dateTimePicker', [function() {
        return {
            restrict: 'A',
            link: function(scope, element, iAttrs) {

            }
        };
    }]);

app.controller('PageViewCtrl', [
    '$scope', '$http',
    function ($scope, $http) {
        $scope.tinymceOptions = options.tinymceOptions;
        $scope.page = window.page;

        $scope.savePage = function () {
            $scope.page.savePage($http,
            function (data) {
                console.log('success');
                console.log(data);
            },
            function (data) {
                console.log('error');
                console.log(data);
            })

        };
    }
]);

$(function () {
    setTimeout(function(){
        $('input.dateTimePickerSingle').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "autoApply": true,
            // "opens": "center",
            // "drops": "up",
            "buttonClasses": "btn btn-sm btn-flat",
            "locale": {
                "format": "YYYY-MM-DD HH:mm:ss",
                // "separator": " ",
                // "applyLabel": "Ok",
                // "cancelLabel": "Отменить",
                // "fromLabel": "От",
                // "toLabel": "До",
                // "customRangeLabel": "Собственный",
                // "weekLabel": "Н",
                // "daysOfWeek": [
                //     "Вс",
                //     "Пн",
                //     "Вт",
                //     "Ср",
                //     "Чт",
                //     "Пт",
                //     "Сб"
                // ],
                // "monthNames": [
                //     "Январь",
                //     "Февраль",
                //     "Март",
                //     "Апрель",
                //     "Май",
                //     "Июнь",
                //     "Июль",
                //     "Август",
                //     "Сентябрь",
                //     "Октябрь",
                //     "Ноябрь",
                //     "Декабрь"
                // ],
                // "firstDay": 1
            }
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    },20);
});


