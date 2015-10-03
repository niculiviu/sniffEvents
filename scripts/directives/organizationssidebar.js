'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:organizationsSidebar
 * @description
 * # organizationsSidebar
 */
angular.module('sniffyApp')
  .directive('organizationsSidebar', function () {
    return {
      templateUrl: 'views/shared/organizationSidebar.html'
      
    };
  });
