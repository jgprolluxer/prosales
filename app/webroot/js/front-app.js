angular.module('prosales-app',
    [
        'mgcrea.ngStrap',
        'ngAnimate',
        'ngRoute',
        'pascalprecht.translate',
        'angularMoment'
        ])
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
        }).factory('uniqueID', [
function()
{
	var charSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
	charSetSize , charCount,
	charSetSize = charSet.length;

	function generateRandomId()
	{
		var id = '';
		for (var i = 1; i <= charCount; i++) {
			var randPos = Math.floor(Math.random() * charSetSize);
			id += charSet[randPos];
		}
		return "1-" + id;
	}

	function generate(sCount)
	{
		charCount = sCount || 10;
		return generateRandomId();
	}
	return {
		getID : function(sCount)
		{
			return generate(sCount);
		}
	};
}]);

