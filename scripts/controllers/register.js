'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:RegisterCtrl
 * @description
 * # RegisterCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('RegisterCtrl', function ($scope,userService,$location) {
    function validateEmail(mail){
            var email = mail;
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

            if(!regex.test(email)){
                return false;
                }
        return true;
        }       
    
    $scope.register=function(user){
        var valid=true;
        $scope.success=false;
        
        if($scope.user){
         if($scope.user.nume &&
            $scope.user.prenume &&
            $scope.user.email &&
            $scope.user.pass1 &&
            $scope.user.pass2){
             
             $scope.obligatoriu=false;
             
             if($scope.user.pass1!=$scope.user.pass2){
                    valid=false;
                    $scope.parola=true;
                }else{
                    $scope.parola=false;
                }

                if(validateEmail($scope.user.email)){
                $scope.email=false;
                }else{
                    valid=false;
                    $scope.email=true;
                }
             
         }else{
             $scope.obligatoriu=true;
             valid=false;
         } 
        }
        
        if(valid){
            userService.registerMobile(user)
            .success(function(response){
                console.log(response);
                if(response=='mobile_user_success'){
                    $scope.success=true;
                }
                
            })
            .error(function(response){
                console.log(response);
            })
        }
    }
  });
