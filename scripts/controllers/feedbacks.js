'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:FeedbacksCtrl
 * @description
 * # FeedbacksCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('FeedbacksCtrl', function ($scope,eventService,$routeParams) {
    eventService.getFeedback({id:$routeParams.eventID})
    .success(function(response){
        console.log(response);
        $scope.feedbacks=response;
    });
    
    $scope.aproba=function(id,index,status){
       var obj={
            id:id,
            status:status
        };
        eventService.aprobaFeedback(obj)
        .success(function(response){
            console.log(response);
            if(response=='success'){
                $scope.feedbacks[index].businessOk=status;
            }
        })
    }
  });
