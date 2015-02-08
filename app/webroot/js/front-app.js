angular.module('prosales-app', ['ngRoute', 'pascalprecht.translate', 'datatables', 'ui.bootstrap'])
        .factory('languageConfigStorage', function ()
        {
            var STORAGE_ID = 'languageProSales-app';
            return {
                get: function () {
                    return JSON.parse(localStorage.getItem(STORAGE_ID) || '[]');
                },
                put: function (todos) {
                    localStorage.setItem(STORAGE_ID, JSON.stringify(todos));
                }
            };
        })
        .config(function ($translateProvider)
        {
            $translateProvider.useStaticFilesLoader({
                prefix: '/js/languages/',
                suffix: '.json'
            });
            $translateProvider.preferredLanguage('es_MX');

        })
        .controller('ApplicationController', function ($scope, $translate, languageConfigStorage)
        {

            var langConfig = languageConfigStorage.get();
            $scope.changeLanguage = function (key)
            {
                $translate.use(key);
                languageConfigStorage.put(key);
            };
            if (0 < langConfig.length) {
                $scope.changeLanguage(langConfig);
            }

        })
        .run(function ($rootScope) {
            $rootScope.$on('$routeChangeSuccess', function ()
            {
            });
        });

