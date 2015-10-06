'use strict';

/**
 * @ngdoc directive
 * @name sniffEventsApp.directive:focusinput
 * @description
 * # focusinput
 */
angular.module('sniffEventsApp')
  .directive('focusinput', function () {
    return {
      template: '<div></div>',
      restrict: 'E',
      link: function postLink(scope, element, attrs) {
        element.text('this is the focusinput directive');
      }
    };
  });
