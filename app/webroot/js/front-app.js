angular.module('prosales-app',
    [
        'ngRoute'
        , 'pascalprecht.translate'
        , 'mgcrea.ngStrap'
        , 'ngAnimate'
        , 'angularMoment'
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
}]).factory('formatDollar', [
function()
{
	Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator)
	{
		var n = this,
		decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
		decSeparator = decSeparator == undefined ? "." : decSeparator,
		thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
		sign = n < 0 ? "-" : "",
		i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;
		return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
	};

	return {
		format : function(number, decPlaces, thouSeparator, decSeparator)
		{
			return ( number || 0 ).formatMoney( decPlaces || 2, thouSeparator || ',' , decSeparator || '.');
		}
	};
}]);

