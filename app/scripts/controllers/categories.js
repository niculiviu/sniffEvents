'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:CategoriesCtrl
 * @description
 * # CategoriesCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('CategoriesCtrl', function ($scope) {
        $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    });