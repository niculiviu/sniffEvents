'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:orgMenu
 * @description
 * # orgMenu
 */
angular.module('sniffyApp')
  .directive('orgMenu', function () {
    return {
      templateUrl: 'views/shared/organizationMenu.html',
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
