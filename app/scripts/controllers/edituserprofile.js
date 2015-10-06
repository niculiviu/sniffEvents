'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:EdituserprofileCtrl
 * @description
 * # EdituserprofileCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('EdituserprofileCtrl', function ($scope, userService) {

        function validateEmail(mail) {
            var email = mail;
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

            if (!regex.test(email)) {
                return false;
            }
            return true;
        }

        $scope.updateUser = function () {
            var valid = true;
            $scope.success = false;
            if ($scope.loggedUser.first_name && $scope.loggedUser.last_name && $scope.loggedUser.email) {
                $scope.obligatorii = false;
                if (validateEmail($scope.loggedUser.email)) {
                    $scope.email_error = false;
                } else {
                    $scope.email_error = true;
                    valid = false;
                }
            } else {
                $scope.obligatorii = true;
                valid = false;
            }

            if (valid) {
                userService.updateUserProfile($scope.loggedUser)
                    .success(function (response) {
                        if (response == 'success') {
                            $scope.success = true;
                        }
                    })
            }
        }

        $scope.verify = function (email) {
            if (validateEmail(email)) {
                $scope.loading = true;
                $scope.email_error = false;
                userService.verify({
                        email: email
                    })
                    .success(function (response) {
                        console.log(response);
                        if (response == 'userul_nu_exista') {
                            $scope.loading = false;
                            $scope.mai_exista = false;
                        } else {
                            $scope.loading = true;
                            $scope.mai_exista = true;
                        }
                    })
            } else {
                $scope.email_error = true;
            }
        }

        $scope.schimbaParola = function () {
            var valid = true;
            $scope.parola_schimbata = false;
            $scope.parola_veche = false;
            if ($scope.newPass.old && $scope.newPass.pass1 && $scope.newPass.pass2) {
                $scope.parola_obligatorii = false;
                if ($scope.newPass.pass1 != $scope.newPass.pass2) {
                    valid = false;
                    $scope.parolele_nu_se_potrivesc = true;
                } else {
                    $scope.parolele_nu_se_potrivesc = false;
                }
            } else {
                valid = false;
                $scope.parola_obligatorii = true;
            }

            if (valid) {
                $scope.newPass.id = $scope.loggedUser.id;
                userService.schimbaParola($scope.newPass)
                    .success(function (response) {
                        if (response == 'success') {
                            $scope.newPass = '';
                            $scope.parola_schimbata = true;
                        } else {
                            if (response == 'parola_veche') {
                                $scope.parola_veche = true;
                            }
                        }
                    })
            }
        }
    });