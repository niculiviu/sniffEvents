'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:adminHeader
 * @description
 * # adminHeader
 */
angular.module('sniffyApp')
  .directive('adminHeader', function () {
   return {
      templateUrl: 'views/shared/adminMenu.html',
        controller: function($scope,userService,$location){
             userService.getLoggedUser()
               .success(function(response){
                console.log(response);
                $scope.loggedUser=response;
               })
             
             $scope.logout=function(){
                userService.logout()
                .success(function(response){
                    if(response=='success'){
                        $scope.loggedUser=[];
                        $location.path('/');
                    }
                    
                })
             }
        }
    };
  });
