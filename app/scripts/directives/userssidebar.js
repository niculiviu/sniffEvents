'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:usersSidebar
 * @description
 * # usersSidebar
 */
angular.module('sniffyApp')
    .directive('usersSidebar', function () {
        return {
            templateUrl: 'views/shared/usersSidebar.html'

        };
    });