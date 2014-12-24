angular.module('prosales-app')
        .controller('adminAddAccountController', function ($scope, $http)
{
    $scope.dataContext = [];
    $scope.newAccount = {
        Account: {
            firstname : '',
            lastname : '',
            alias : '',
            sex : '',
            birthdate: '',
            team_id: '',
            mode: '',
            type: ''
        }
    };
    
    $scope.addAccount = function()
    {
        
    };

    window.scope = $scope;
});