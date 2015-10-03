'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:eventsSidebar
 * @description
 * # eventsSidebar
 */
angular.module('sniffyApp')
  .directive('eventsSidebar', function () {
     return {
      templateUrl: 'views/shared/eventSidebar.html'
      
    };
  });
