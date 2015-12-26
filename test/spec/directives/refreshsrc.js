'use strict';

describe('Directive: refreshSrc', function () {

  // load the directive's module
  beforeEach(module('sniffyApp'));

  var element,
    scope;

  beforeEach(inject(function ($rootScope) {
    scope = $rootScope.$new();
  }));

  it('should make hidden element visible', inject(function ($compile) {
    element = angular.element('<refresh-src></refresh-src>');
    element = $compile(element)(scope);
    expect(element.text()).toBe('this is the refreshSrc directive');
  }));
});
