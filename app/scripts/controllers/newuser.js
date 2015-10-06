'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:NewuserCtrl
 * @description
 * # NewuserCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('NewuserCtrl', function ($scope, userService, $location) {

        $scope.register = function (user) {
            console.log(user);
            userService.register(user)
                .success(function (response) {
                    console.log(response);
                    $location.path("/users");
                })
                .error(function (response) {
                    console.log(response);
                })
        }

        userService.getRoles()
            .success(function (response) {
                console.log(response);
                $scope.roles = response;
            })

    });