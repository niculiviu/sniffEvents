'use strict';

/**
 * @ngdoc overview
 * @name sniffyApp
 * @description
 * # sniffyApp
 *
 * Main module of the application.
 */
angular
    .module('sniffyApp', [
    'ngRoute', 'ui.bootstrap', 'uiGmapgoogle-maps', 'angularUtils.directives.dirPagination', 'chart.js'
  ])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/main.html',
                controller: 'MainCtrl'
            })
            .when('/about', {
                templateUrl: 'views/about.html',
                controller: 'AboutCtrl'
            })
            .when('/home', {
                templateUrl: 'views/home.html',
                controller: 'HomeCtrl'
            })
            .when('/events', {
                templateUrl: 'views/events.html',
                controller: 'EventsCtrl'
            })
            .when('/editEvent/:eventID', {
                templateUrl: 'views/newevent.html',
                controller: 'NeweventCtrl'
            })
            .when('/editEvent', {
                templateUrl: 'views/editevent.html',
                controller: 'EditeventCtrl'
            })
            .when('/users', {
                templateUrl: 'views/users.html',
                controller: 'UsersCtrl'
            })
            .when('/newUser', {
                templateUrl: 'views/newuser.html',
                controller: 'NewuserCtrl'
            })
            .when('/editUser', {
                templateUrl: 'views/edituser.html',
                controller: 'EdituserCtrl'
            })
            .when('/organizations', {
                templateUrl: 'views/organizations.html',
                controller: 'OrganizationsCtrl'
            })
            .when('/newOrganization', {
                templateUrl: 'views/neworganization.html',
                controller: 'NeworganizationCtrl'
            })
            .when('/editOrganization', {
                templateUrl: 'views/editorganization.html',
                controller: 'EditorganizationCtrl'
            })
            .when('/feedbacks/:eventID', {
                templateUrl: 'views/feedbacks.html',
                controller: 'FeedbacksCtrl'
            })
            .when('/viewFeedback', {
                templateUrl: 'views/viewfeedback.html',
                controller: 'ViewfeedbackCtrl'
            })
            .when('/categories', {
                templateUrl: 'views/categories.html',
                controller: 'CategoriesCtrl'
            })
            .when('/newCategory', {
                templateUrl: 'views/newcategory.html',
                controller: 'NewcategoryCtrl'
            })
            .when('/editCategory', {
                templateUrl: 'views/editcategory.html',
                controller: 'EditcategoryCtrl'
            })
            .when('/howToUse', {
                templateUrl: 'views/howtouse.html',
                controller: 'HowtouseCtrl'
            })
            .when('/event/:eventID', {
                templateUrl: 'views/event.html',
                controller: 'EventCtrl'
            })
            .when('/login', {
                templateUrl: 'views/login.html',
                controller: 'LoginCtrl'
            })
            .when('/dasboard', {
                templateUrl: 'views/dasboard.html',
                controller: 'DasboardCtrl'
            })
            .when('/businessDashboard', {
                templateUrl: 'views/businessdashboard.html',
                controller: 'BusinessdashboardCtrl'
            })
            .when('/statistics', {
                templateUrl: 'views/statistics.html',
                controller: 'StatisticsCtrl'
            })
            .when('/projectStatistics', {
                templateUrl: 'views/projectstatistics.html',
                controller: 'ProjectstatisticsCtrl'
            })
            .when('/eventStatistics', {
                templateUrl: 'views/eventstatistics.html',
                controller: 'EventstatisticsCtrl'
            })
            .when('/register', {
                templateUrl: 'views/register.html',
                controller: 'RegisterCtrl'
            })
            .when('/:orgID/dashboard', {
                templateUrl: 'views/operatordashboard.html',
                controller: 'OperatordashboardCtrl'
            })
            .when('/public-events', {
                templateUrl: 'views/public-events.html',
                controller: 'PublicEventsCtrl'
            })
            .when('/ongZone', {
                templateUrl: 'views/ongzone.html',
                controller: 'OngzoneCtrl'
            })
            .when('/mobileZone', {
                templateUrl: 'views/mobilezone.html',
                controller: 'MobilezoneCtrl'
            })
            .when('/org/:orgID', {
                templateUrl: 'views/org.html',
                controller: 'OrgCtrl'
            })
            .when('/:orgID/editEvent/:eventID', {
                templateUrl: 'views/orgeditevent.html',
                controller: 'OrgediteventCtrl'
            })
            .when('/editUserProfile', {
                templateUrl: 'views/edituserprofile.html',
                controller: 'EdituserprofileCtrl'
            })
            .when('/contact', {
                templateUrl: 'views/contact.html',
                controller: 'ContactCtrl',
                controllerAs: 'contact'
            })
            .when('/avantaje', {
                templateUrl: 'views/avantaje.html',
                controller: 'AvantajeCtrl',
                controllerAs: 'avantaje'
            })
            .when('/reguli', {
                templateUrl: 'views/reguli.html',
                controller: 'ReguliCtrl',
                controllerAs: 'reguli'
            })
            .when('/faq', {
                templateUrl: 'views/faq.html',
                controller: 'FaqCtrl',
                controllerAs: 'faq'
            })
            .otherwise({
                redirectTo: '/'
            });
    });