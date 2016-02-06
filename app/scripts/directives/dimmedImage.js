'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:errSrc
 * @description
 * # errSrc
 */
angular.module('sniffyApp')
  .directive('dimmedImage', function() {
  return {
    link: function(scope, element, attrs) {
        element.dimmer({
                on: 'hover'
            });
    }
  }
});