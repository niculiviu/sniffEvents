'use strict';

/**
 * @ngdoc service
 * @name sniffyApp.userService
 * @description
 * # userService
 * Factory in the sniffyApp.
 */
angular.module('sniffyApp')
    .factory('userService', function ($http) {

        // Public API here
        return {
            register: function (user) {
                return $http.post('services/register.php', user);
            },
            login: function (user) {
                return $http.post('services/login.php', user);
            },
            getAllUsers: function () {
                return $http.post('services/getAllUsers.php');
            },
            getLoggedUser: function () {
                return $http.post('services/getLoggedUser.php');
            },
            logout: function () {
                return $http.post('services/logout.php');
            },
            getRoles: function () {
                return $http.post('services/getAllRoles.php');
            },
            registerMobile: function (obj) {
                return $http.post('services/registerMobile.php', obj);
            },
            getOrgUsers: function (obj) {
                return $http.post('services/getOrgUsers.php', obj);
            },
            verify: function (obj) {
                return $http.post('services/verifyUser.php', obj);
            },
            adaugaRol: function (obj) {
                return $http.post('services/adaugaRol.php', obj);
            },
            adaugaUserInexistent: function (obj) {
                return $http.post('services/adaugaUserInexistentInOrg.php', obj);
            },
            eliminaRol: function (obj) {
                return $http.post('services/eliminaRol.php', obj);
            },
            updateUserProfile: function (obj) {
                return $http.post('services/updateUserProfile.php', obj);
            },
            schimbaParola: function (obj) {
                return $http.post('services/schimbaParola.php', obj);
            }
        };
    });