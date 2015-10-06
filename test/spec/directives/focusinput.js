'use strict';

describe('Directive: focusinput', function () {

  // load the directive's module
  beforeEach(module('sniffEventsApp'));

  var element,
    scope;

  beforeEach(inject(function ($rootScope) {
    scope = $rootScope.$new();
  }));

  it('should make hidden element visible', inject(function ($compile) {
    element = angular.element('<focusinput></focusinput>');
    element = $compile(element)(scope);
    expect(element.text()).toBe('this is the focusinput directive');
  }));
});
