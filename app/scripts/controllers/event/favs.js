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
    
    $scope.sendNotification=function(message,users){
        
        var data={
            event:$scope.event,
            message:message,
            gcm_regid:[]
        }
        
        for(var i=0;i<users.length;i++)
            if(users[i].gcm_regid)
                data.gcm_regid.push(users[i].gcm_regid);
        
        eventService.sendNotif(data)
        .success(function(response){
        
        });
    
    }
    
    
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
