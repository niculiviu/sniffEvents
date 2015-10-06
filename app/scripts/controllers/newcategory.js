'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:NewcategoryCtrl
 * @description
 * # NewcategoryCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('NewcategoryCtrl', function ($scope) {
        $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    });