'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:DasboardCtrl
 * @description
 * # DasboardCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('DasboardCtrl', function ($scope,userService,$modal,$location,eventService,orgService) {
    $scope.page='dashboard';
     $scope.newEventButton=function(){
        $scope.newEventModal=$modal.open({
            templateUrl:'views/modal/newEvent.html',
            scope:$scope
        })
    }
     
     $scope.labels2 = [];
         $scope.data2 = [];
     orgService.getOrgStats()
     .success(function(response){
        $scope.orgs=response;
         var i=0;
         for(i=0;i<response.length;i++){
            $scope.labels2.push(response[i].org_name);
            $scope.data2.push(parseInt(response[i].nr_evenimente));
        }
         $scope.aux=$scope.data2;
         $scope.data2=[];
         $scope.data2[0]=$scope.aux;
     })
     .error(function(response){
        console.log(response);
     })
     $scope.$watch('evs',function(){
     
     })
      
     $scope.labels = [];
         $scope.data = [];
         $scope.series=['Numar Evenimente'];
     eventService.getEventStats()
     .success(function(response){
        $scope.evs=response;
        var i=0;
         
        console.log(response[0]);
        for(i=0;i<response.length;i++){
            $scope.labels.push(response[i].categoryName);
            $scope.data.push(parseInt(response[i].nr_ev));
        }
         $scope.aux=$scope.data;
         $scope.data=[];
         $scope.data[0]=$scope.aux;
       
        
     })
     .error(function(response){
        console.log(response);
     })
     
       
     
     eventService.getEventsForApprouvel()
     .success(function(response){
        $scope.ev_for_aprouve=response;
     })
     
     $scope.project_ok=function(index,id){
        var obj={id:id};
         eventService.eventOk(obj).
         success(function(response){
             if(response=='Approuved')
                $scope.ev_for_aprouve.splice(index,1);
         })
         .error(function(response){
            console.log(response);
         })
     }
     $scope.project_rejected=function(index,id){
        var obj={id:id};
         eventService.eventRejected(obj).
         success(function(response){
             if(response=='Rejected')
                $scope.ev_for_aprouve.splice(index,1);
         })
         .error(function(response){
            console.log(response);
         })
     }
     $scope.newProject=function(nume,user){
        console.log(user);
        var obj={
            event_name:nume,
            user:user.id,
            org:''
        }
        eventService.insertEvent(obj)
        .success(function(response){
            $scope.newEventModal.close();
            $location.path('/editEvent/'+response);
        });
        
       
    }
     
   

  
  });
