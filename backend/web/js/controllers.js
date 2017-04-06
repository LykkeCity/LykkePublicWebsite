'use strict';

var options = {
    urls: {
        pageSave: "",
        contentBlockSave: ""
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

var PageModel = function (id, name, seo_title, seo_description, seo_keywords, datetime, template) {
    this.id = id;
    this.name = name;
    this.seo_title = seo_title;
    this.seo_description = seo_description;
    this.seo_keywords = seo_keywords;
    this.datetime = datetime;
    this.template = template;
    this.contentBlocks = [];

};

var contentBlockModel = function (id, pageId, ordering, name, title, content) {
    this.id = id;
    this.pageId = pageId;
    this.ordering = ordering;
    this.name = name;
    this.title = title;
    this.content = content;

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
        $scope.tinymceOptions = options.tinymceOptions;
        $scope.page = window.page;

        console.log($scope.page);
    }
]);


