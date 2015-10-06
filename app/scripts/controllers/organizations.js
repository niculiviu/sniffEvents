'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:OrganizationsCtrl
 * @description
 * # OrganizationsCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
  .controller('OrganizationsCtrl', function ($scope,orgService) {
   $scope.page='organizations';
    orgService.getOrgTypes()
   .success(function(response){
    console.log(response);
        $scope.orgTypes=response;
   });
    
   orgService.getOrgs()
   .success(function(response){
     $scope.orgs=response;
   })
   
   $scope.addOrg=function(org,user){
    console.log(org);
    console.log(user);
       
       var obj={
            name: org.name,
            type: org.type.id,
            by:user.id
       }
       
       orgService.addOrg(obj)
       .success(function(response){
         var newOrg={
            org_name:org.name,
            type: org.type.type,
             id:response,
             first_name:user.first_name,
             last_name:user.last_name
         }
         $scope.orgs.push(newOrg);
       })
   }
  });
