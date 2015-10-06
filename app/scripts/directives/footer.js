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
      templateUrl: 'views/shared/footer.html',
      
        controller: function($scope, $modal){
        $scope.open = function () {
            var modalInstance = $modal.open({
            templateUrl: 'views/modal/functionalitati.html',
                controller: function($modal, $scope){ 
                    $scope.open2= function(){
                        var modalThankYou = $modal.open({
                            templateUrl: 'views/modal/feedbackThankYou.html'
                        })
                        modalInstance.close();
                    }
                }
        });
      };
      
    }
  }
});




//  $scope.open = function (size) {
//
//    var modalInstance = $modal.open({
//      animation: $scope.animationsEnabled,
//      templateUrl: 'myModalContent.html',
//      controller: 'ModalInstanceCtrl',
//      size: size,
//      resolve: {
//        items: function () {
//          return $scope.items;
//        }
//      }
//    });