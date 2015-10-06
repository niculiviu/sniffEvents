'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:UsersCtrl
 * @description
 * # UsersCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('UsersCtrl', function ($scope, userService) {
        $scope.page = 'users';
        userService.getAllUsers()
            .success(function (response) {
                console.log(response);
                $scope.users = response;
            })

        userService.getRoles()
            .success(function (response) {
                console.log(response);
                $scope.roles = response;
            })

    });