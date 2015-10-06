'use strict';

/**
 * @ngdoc directive
 * @name sniffEventsApp.directive:focusinput
 * @description
 * # focusinput
 */
angular.module('sniffyApp')
    .directive('focusMe', function () {
        return {
            restrict: 'A',
            scope: {
                focusMe: '='
            },
            link: function (scope, elt) {
                scope.$watch('focusMe', function (val) {
                    if (val) {
                        elt[0].focus();
                    }
                });
            }
        };
    });