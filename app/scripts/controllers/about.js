'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('AboutCtrl', function ($scope) {
        $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    
    $scope.page='about';
    });