'use strict';

/**
 * @ngdoc service
 * @name sniffyApp.eventService
 * @description
 * # eventService
 * Factory in the sniffyApp.
 */
angular.module('sniffyApp')
    .factory('eventService', function ($http) {

        return {
            insertEvent: function (obj) {
                return $http.post('services/addEvent.php', obj);
            },
            getEvent: function (obj) {
                return $http.post('services/getEventInfo.php', obj);
            },
            getEventCategories: function () {
                return $http.post('services/getEventCategories.php')
            },
            getAllEvents: function () {
                return $http.post('services/getAllEvents.php')
            },
            save: function (obj) {
                return $http.post('services/updateEvent.php', obj);
            },
            publicEvents: function () {
                return $http.post('services/getPublicEvents.php');
            },
            getEventStats: function () {
                return $http.post('services/getEventStats.php');
            },
            getEventsForApprouvel: function () {
                return $http.post('services/getEventsForApprouvel.php');
            },
            eventOk: function (obj) {
                return $http.post('services/eventOk.php', obj);
            },
            eventRejected: function (obj) {
                return $http.post('services/eventRejected.php', obj);
            },
            addToSchandule: function (obj) {
                return $http.post('services/addToSchandule.php', obj);
            },
            getSchandule: function (obj) {
                return $http.post('services/getSchandule.php', obj);
            },
            deleteS: function (obj) {
                return $http.post('services/deleteS.php', obj);
            },
            trimiteFeedback: function (obj) {
                return $http.post('services/trimiteFeedback.php', obj);
            },
            getFeedback: function (obj) {
                return $http.post('services/getFeedback.php', obj);
            },
            aprobaFeedback: function (obj) {
                return $http.post('services/aprobaFeedback.php', obj);
            },
            getAprovedFeedback: function (obj) {
                return $http.post('services/getAprovedFeedback.php', obj);
            },
            getOrgEvents: function (obj) {
                return $http.post('services/getOrgEvents.php', obj);
            },
            orgDeleteEvent: function (obj) {
                return $http.post('services/orgDeleteEvent.php', obj);
            },
            pastEvents: function () {
                return $http.post('services/getPastEvents.php');
            }
        };
    });