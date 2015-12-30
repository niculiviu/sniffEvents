'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:EventFavsCtrl
 * @description
 * # EventFavsCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('EventFavsCtrl', function ($scope,eventService,$routeParams) {

    eventService.getAllFavMobile($routeParams.event)
    .success(function(response){
            $scope.favs=response;
    })
    
    eventService.getEvent({id:$routeParams.event})
    .success(function(response){
     $scope.event=response[0];
    });
    
    
    $scope.sendNotif=function(user){
        eventService.getEvent({id:$routeParams.event})
    .success(function(response){
        user.event=response[0];
           
            eventService.sendNotif(user)
        .success(function(response){
        
        });
    })
        
        
    }
  });
