'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:semanticDropdown
 * @description
 * # semanticDropdown
 */
angular.module('sniffyApp')
    .directive('semanticDropdown', function () {
        return {

            link: function (scope, element, attrs) {
                element.bind('click', function () {
                    console.log('click');
                    element.dropdown({
                        // you can use any ui transition
                        transition: 'drop'
                    });
                })

            }
        };
    });