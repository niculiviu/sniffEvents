'use strict';

/**
 * @ngdoc service
 * @name sniffyApp.orgService
 * @description
 * # orgService
 * Factory in the sniffyApp.
 */
angular.module('sniffyApp')
  .factory('orgService', function ($http) {
    
    return {
      getOrgTypes: function () {
        return $http.post('services/getOrgTypes.php')
      },
      addOrg: function(obj){
        return $http.post('services/addOrg.php',obj);
      },
      getOrgs: function(){
        return $http.post('services/getOrgs.php');
      },
        getOrgStats: function(){
            return $http.post('services/getOrgStats.php');
        },
        checkOrg: function(obj){
            return $http.post('services/checkOrg.php',obj);
        },
        insertOrgAndUser: function(obj){
            return $http.post('services/insertOrgAndUser.php',obj);
        }
    };  
  });
