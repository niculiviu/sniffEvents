'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:categoriesSidebar
 * @description
 * # categoriesSidebar
 */
angular.module('sniffyApp')
    .directive('categoriesSidebar', function () {
        return {
            template: '<div></div>',
            restrict: 'E',
            link: function postLink(scope, element, attrs) {
                element.text('this is the categoriesSidebar directive');
            }
        };
    });