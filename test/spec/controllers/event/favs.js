'use strict';

describe('Controller: EventFavsCtrl', function () {

  // load the controller's module
  beforeEach(module('sniffyApp'));

  var EventFavsCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    EventFavsCtrl = $controller('EventFavsCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
