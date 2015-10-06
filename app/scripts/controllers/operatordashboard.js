'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:OperatordashboardCtrl
 * @description
 * # OperatordashboardCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('OperatordashboardCtrl', function ($scope, userService, $modal, $location, eventService, orgService, $routeParams, $rootScope) {

        $scope.newEventButton = function () {
            $scope.newEventModal = $modal.open({
                templateUrl: 'views/modal/newEvent.html',
                scope: $scope
            })
        }

        $scope.newProject = function (nume, user) {
            console.log(user);
            var obj = {
                event_name: nume,
                user: user.id,
                org: user.org
            }
            eventService.insertEvent(obj)
                .success(function (response) {
                    $scope.newEventModal.close();
                    $location.path('/' + user.org + '/editEvent/' + response);
                });


        }

        eventService.getOrgEvents({
                id: $routeParams.orgID
            })
            .success(function (response) {
                $scope.events = response;
            });

        userService.getOrgUsers({
                id: $routeParams.orgID
            })
            .success(function (response) {
                $scope.users = response;
            });

        $scope.add = function () {
            $scope.newUserModal = $modal.open({
                templateUrl: 'views/modal/addUser.html',
                scope: $scope
            });
        }
        $scope.newUser = {};
        var unexistingUserModal;

        function validateEmail(mail) {
            var email = mail;
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

            if (!regex.test(email)) {
                return false;
            }
            return true;
        }
        $scope.verify = function (email) {
            if (validateEmail(email)) {
                $scope.emailerror = false;
                userService.verify({
                        email: email
                    })
                    .success(function (response) {
                        console.log(response);
                        $scope.newUserModal.close();
                        if (response == 'userul_nu_exista') {
                            $scope.newUser.email = email;
                            $scope.nuExista();
                        } else {
                            if (response[0].rol != 2) {
                                $scope.eAdmin()
                            } else {
                                $scope.newUser = response[0];
                                $scope.exista();
                            }
                        }
                    })
            } else {
                $scope.emailerror = true;
            }
        }

        $scope.nuExista = function () {
            $scope.NuExistaModal = $modal.open({
                templateUrl: 'views/modal/nuExista.html',
                scope: $scope
            });
        }

        $scope.eAdmin = function () {
            $scope.esteAdminModal = $modal.open({
                templateUrl: 'views/modal/esteAdmin.html',
                scope: $scope
            });
        }

        $scope.exista = function () {
            $scope.existaModal = $modal.open({
                templateUrl: 'views/modal/Exista.html',
                scope: $scope
            });
        }

        $scope.adaugaUserExistent = function () {
            console.log($scope.existaModal);
            $scope.existaModal.dismiss();
            var obj = {
                user_id: $scope.newUser.id,
                org_id: $routeParams.orgID
            }
            console.log(obj);

            userService.adaugaRol(obj)
                .success(function (response) {
                    if (response == 'success') {
                        $scope.users.push($scope.newUser);
                        $scope.newUser = '';
                    }
                })
        }



        $scope.adaugaU = function (user) {
            $scope.newUser.org = $routeParams.orgID;
            if ($scope.newUser.nume || $scope.newUser.prenume || $scope.newUser.pass1) {
                userService.adaugaUserInexistent($scope.newUser)
                    .success(function (response) {
                        if (response) {
                            var obj = {
                                first_name: $scope.newUser.nume,
                                last_name: $scope.newUser.prenume,
                                id: response
                            }
                            $scope.users.push(obj);
                            $scope.newUser = '';
                            $scope.NuExistaModal.close();
                        }
                    })
            }
        }

        $scope.eliminaRol = function (id, index) {
            var obj = {
                user_id: id
            }

            userService.eliminaRol(obj)
                .success(function (response) {
                    if (response == 'success') {
                        $scope.users.splice(index, 1);
                    }
                })
        }

        $scope.deleteEvent = function (id, index) {
            eventService.orgDeleteEvent({
                    id: id
                })
                .success(function (response) {
                    if (response == 'Deleted') {
                        $scope.events.splice(index, 1);
                    }
                })
        }

    });