'use strict';

describe('Controller: AvantajeCtrl', function () {

  // load the controller's module
  beforeEach(module('sniffyApp'));

  var AvantajeCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    AvantajeCtrl = $controller('AvantajeCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(AvantajeCtrl.awesomeThings.length).toBe(3);
  });
});
