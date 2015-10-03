'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('MainCtrl', function ($scope,eventService) {
    $scope.page='home';
    
    eventService.publicEvents()
    .success(function(response){
        console.log(response);
        $scope.events=response;
    })
    eventService.getEventCategories()
    .success(function(response){
        $scope.evCategories=response;
    })
    .error(function(response){
        console.log(response);
    })
    
    eventService.pastEvents()
  .success(function (response) {
      console.log(response);
      $scope.past = response;
  })

    $scope.search='';
    $scope.search_item=function(item){
        $scope.search=item;
    }
  });
