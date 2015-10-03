'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:MobilezoneCtrl
 * @description
 * # MobilezoneCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('MobilezoneCtrl', function ($scope) {
    $scope.page='mobile';
    $scope.myInterval = 5000;
    $scope.slides=[
        {
        image:'images/carieracover.png'
    },
        {
        image:'images/partycover.png'
    },
                   {
        image:'images/concertcover.png'
    }
                  ]
  });
