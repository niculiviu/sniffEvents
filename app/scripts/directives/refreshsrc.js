'use strict';

/**
 * @ngdoc directive
 * @name sniffyApp.directive:refreshSrc
 * @description
 * # refreshSrc
 */
angular.module('sniffyApp')
  .directive('refreshSrc', function () {
    return {

      link: function postLink(scope, element, attrs) {
          scope.$watch('pictureUploaded',function(){
              console.log(Math.random());
                element.attr('src','services/images/'+attrs.photoId+'.png?decache=' + Math.random());
          });
       
      }
    };
  });
