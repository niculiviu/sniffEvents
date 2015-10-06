'use strict';

describe('Controller: ReguliCtrl', function () {

  // load the controller's module
  beforeEach(module('sniffyApp'));

  var ReguliCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ReguliCtrl = $controller('ReguliCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ReguliCtrl.awesomeThings.length).toBe(3);
  });
});
