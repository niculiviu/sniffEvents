'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:footer
 * @description
 * # footer
 */
angular.module('sniffyApp')
  .directive('footer', function () {
     return {
      templateUrl: 'views/shared/footer.html'
      
    };
  });
