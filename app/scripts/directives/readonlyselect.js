'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:readonlySelect
 * @description
 * # readonlySelect
 */
angular.module('sniffyApp')
    .directive('readonlySelect', function () {
        return {

            link: function postLink(scope, element, attrs) {
                $('input, select').readonly();
            }
        };
    });