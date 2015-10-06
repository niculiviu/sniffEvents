'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:EventCtrl
 * @description
 * # EventCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('EventCtrl', function ($scope,eventService,$routeParams,$modal,$timeout) {
     $scope.map = {center: {latitude: 40.1451, longitude: -99.6680 }, zoom: 4 };
        $scope.options = {scrollwheel: false};
    var obj={id:$routeParams.eventID}
     eventService.getEvent(obj)
        .success(function(response){
            $scope.event=response[0];
            $scope.map = {center: {latitude:response[0].location_x , longitude:response[0].location_y }, zoom: 16};
            $scope.marker = {
                   id:0,
                   coords: {
                        latitude: response[0].location_x,
                        longitude: response[0].location_y
                      }
                   }
                          
         
            $scope.event.org={
                id:response[0].organizations_id,
                org_name: response[0].org_name
            }
            
            $scope.event.cat={
                id:response[0].eventCategory,
                categoryName: response[0].categoryName
            }
                  
            console.log($scope.event);
            
        })
     
     $scope.trimiteFeedback=function(){
        $scope.FeedbackModal=$modal.open({
            templateUrl:'views/modal/eventFeedback.html',
            scope:$scope
        });
     }
     $scope.feedback={
        msg:'',
        user:'',
        event:''
     }
     $scope.trimite=function(feedback){
        $scope.feedback.event=$routeParams.eventID;
        eventService.trimiteFeedback(feedback)
        .success(function(response){
            if(response=='success'){
                $scope.FeedbackModal.close();
                $scope.ThankYouModal=$modal.open({
                    templateUrl:'views/modal/feedbackThankYou.html'
                });
                $timeout(function(){
                    $scope.ThankYouModal.close();
                },3000)
            }
        })
     }
     
     eventService.getAprovedFeedback({id:$routeParams.eventID})
     .success(function(response){
        $scope.feednbacks=response;
     })
     
     eventService.getSchandule({id:$routeParams.eventID})
    .success(function(response){
        $scope.schandule=response;
    })
    .error(function(response){
        console.log(response);
    })
     
     
  });
