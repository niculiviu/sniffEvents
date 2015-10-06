'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:EventsCtrl
 * @description
 * # EventsCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('EventsCtrl', function ($scope, $modal, eventService, $location) {
        $scope.newEventButton = function () {
            $scope.newEventModal = $modal.open({
                templateUrl: 'views/modal/newEvent.html',
                scope: $scope
            })
        }
        $scope.page = 'events';
        $scope.search = '';
        $scope.search_item = function (item) {
            $scope.search = item;
        }
        $scope.newProject = function (nume, user) {
            console.log(user);
            var obj = {
                event_name: nume,
                user: user.id,
                org: ''
            }
            eventService.insertEvent(obj)
                .success(function (response) {
                    $scope.newEventModal.close();
                    $location.path('/editEvent/' + response);
                });


        }

        eventService.getEventCategories()
            .success(function (response) {
                console.log(response);
                $scope.categories = response;
            })

        eventService.getAllEvents()
            .success(function (response) {
                console.log("events:");
                console.log(response);
                $scope.events = response;
            })

        $scope.deleteEvent = function (id, index) {
            eventService.orgDeleteEvent({
                    id: id
                })
                .success(function (response) {
                    if (response == 'Deleted') {
                        $scope.events[index].isDeleted = 1;
                    }
                })
        }
    });