'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:mainMenu
 * @description
 * # mainMenu
 */
angular.module('sniffyApp')
    .directive('mainMenu', function () {
        return {
            templateUrl: 'views/shared/mainMenu.html',
            controller: function ($scope, userService, $location) {
                userService.getLoggedUser()
                    .success(function (response) {
                        console.log(response);
                        $scope.loggedUser = response;
                    })

                $scope.logout = function () {
                    userService.logout()
                        .success(function (response) {
                            if (response == 'success') {
                                $scope.loggedUser = [];
                                $location.path('/');
                            }

                        })
                }
            }

        };
    });