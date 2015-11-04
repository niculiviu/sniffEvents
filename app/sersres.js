'use strict';

/**
 * @ngdoc function
 * @name quickBoardCloudApp.controller:ActivecloudCtrl
 * @description
 * # ActivecloudCtrl
 * Controller of the quickBoardCloudApp
 */
app.controller('ActivecloudCtrl', function ($scope, UserService, localStorageService) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    this.bag = [{
            label: 'Glasses',
            value: 'glasses',
            children: [{
                    label: 'Top Hat',
                    value: 'top_hat'
          }, {
                    label: 'Curly Mustache',
                    value: 'mustachio'
          },
                {
                    label: 'Curly Oana',
                    value: 'mustachio'
           }]

      },
        {
            label: 'AGlasses',
            value: 'glasses',
            children: [{
                    label: 'Topa tHat',
                    value: 'top_hat'
                              }, {
                    label: 'Curly MMustache',
                    value: 'mustachio'
                              },
                {
                    label: 'Curly Liviu',
                    value: 'mustachio'
                               }]
        }];

    /*this.stuff = [{
      label: 'Suitcase',
      children: [ */
    /* ... */
    /* ]
          }];*/

    UserService.checkIfLoggedIn();

    $scope.username = localStorageService.get("username");
});