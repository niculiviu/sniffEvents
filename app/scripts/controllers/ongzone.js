'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:OngzoneCtrl
 * @description
 * # OngzoneCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('OngzoneCtrl', function ($scope,orgService) {
    
    $scope.page='ong';
    function validateEmail(mail){
            var email = mail;
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

            if(!regex.test(email)){
                return false;
                }
        return true;
        }       
    
    $scope.checkOrg=function(org){
        $scope.loading=true;
        var obj={org:org};
        if(org!=''){
            orgService.checkOrg(obj)
            .success(function(response){
                $scope.loading=false;
                if(response[0].nr!=0){
                    $scope.org_exista=true;
                }else{
                    $scope.org_exista=false;
                }
            })
            .error(function(response){
                console.log(response);
            })
        }
    }
    
    $scope.newOrgUser=function(user){
        $scope.success=false;
        var valid=true;
if($scope.newUser){
 if($scope.newUser.nume &&
    $scope.newUser.prenume &&
    $scope.newUser.email &&
    $scope.newUser.pass1 &&
    $scope.newUser.pass2 &&
    $scope.newUser.org){
            
            $scope.obligatoriu=false;
     
                if($scope.newUser.pass1!=$scope.newUser.pass2){
                    valid=false;
                    $scope.parola=true;
                }else{
                    $scope.parola=false;
                }

                if(validateEmail($scope.newUser.email)){
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
        else{
            valid=false;
        }
        
        if(valid){
            orgService.insertOrgAndUser($scope.newUser)
            .success(function(response){
                if(response=='success'){
                    $scope.success = true;
                    $scope.errorEmail = false;
                }
                if (response=='error') {
                    $scope.errorEmail = true;
                    $scope.success = false;
                }
                console.log(response);
            })
            .error(function(response){
                console.log(response);
            })
        }
        
        
    }
  });
