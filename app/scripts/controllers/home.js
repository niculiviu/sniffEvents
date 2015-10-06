'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:HomeCtrl
 * @description
 * # HomeCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('HomeCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
