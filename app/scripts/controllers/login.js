'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('LoginCtrl', function ($scope, userService, $location) {
        $scope.checked = true;
        $scope.page = 'login';
        $scope.login = function (user) {
            if (user.email || user.pass) {
                userService.login(user)
                    .success(function (response) {
                        if (response == 'no_user') {
                            $scope.no_user = true;
                            $scope.no_pass = false;
                        } else if (response == 'no_pass') {
                            $scope.no_user = false;
                            $scope.no_pass = true;
                        } else {
                            if (response.rol) {
                                console.log(response.rol);
                                if (response.rol == '1') {
                                    $location.path('/dasboard');
                                }
                                if (response.rol == '4') {
                                    $location.path('/' + response.org + '/dashboard/');
                                }

                            }
                        }
                    })
            }
        }
    });