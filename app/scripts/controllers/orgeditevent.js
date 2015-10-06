'use strict';

/**
 * @ngdoc function
 * @name sniffyApp.controller:OrgediteventCtrl
 * @description
 * # OrgediteventCtrl
 * Controller of the sniffyApp
 */
angular.module('sniffyApp')
    .controller('OrgediteventCtrl', function ($scope, eventService, $routeParams, orgService, $timeout, $modal, $location) {
        console.log($routeParams);
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
                user: user.id
            }
            eventService.insertEvent(obj)
                .success(function (response) {
                    $scope.newEventModal.close();
                    $location.path('/editEvent/' + response);
                });


        }
        $scope.map = {
            center: {
                latitude: 40.1451,
                longitude: -99.6680
            },
            zoom: 4
        };
        $scope.options = {
            scrollwheel: false
        };
        var events = {
            places_changed: function (searchBox) {
                var place = searchBox.getPlaces();
                if (!place || place == 'undefined' || place.length == 0) {
                    console.log('no place data :(');
                    return;
                }

                $scope.map = {
                    "center": {
                        "latitude": place[0].geometry.location.lat(),
                        "longitude": place[0].geometry.location.lng()
                    },
                    "zoom": 16
                };
                $scope.marker = {
                    id: 0,
                    coords: {
                        latitude: place[0].geometry.location.lat(),
                        longitude: place[0].geometry.location.lng()
                    }
                };

                $scope.event.location_x = place[0].geometry.location.lat();
                $scope.event.location_y = place[0].geometry.location.lng();
                $scope.event.address = place[0].formatted_address;
                $scope.event.location_name = place[0].name;
            }
        }
        $scope.searchbox = {
            template: 'searchbox.tpl.html',
            events: events
        };
        var obj = {
            id: $routeParams.eventID
        }
        $scope.event = {
            org: {
                id: '',
                org_name: ''
            }
        }

        $scope.save_draft = function (event) {
            $scope.event.draft = 0;
            if (event.start_hour || event.end_hour || event.start_minutes || event.end_minutes) {
                $scope.event.start_time = event.start_hour + ":" + event.start_minutes;
                $scope.event.end_time = event.end_hour + ":" + event.end_minutes;
            }
            console.log(event);
            eventService.save(event)
                .success(function (response) {
                    console.log(response);
                    $scope.draft_saved = true;
                })
                .error(function (response) {
                    console.log(response);
                })

        }

        $scope.publish = function (event) {
            $scope.draft_saved = false;
            console.log(event);
            $scope.event.draft = 1;
            if (event.start_hour || event.end_hour || event.start_minutes || event.end_minutes) {
                $scope.event.start_time = event.start_hour + ":" + event.start_minutes;
                $scope.event.end_time = event.end_hour + ":" + event.end_minutes;
            }
            var valid = true;

            if (event.start_hour || event.end_hour || event.start_minutes || event.end_minutes) {
                $scope.ora = false;
            } else {
                valid = false;
                $scope.ora = true;
                $scope.success = false;
            }

            if (event.project_name == '') {
                valid = false;
                $scope.title = true;
            } else {
                $scope.title = false;
            }

            if (event.description) {
                $scope.des = false;
            } else {
                valid = false;
                $scope.des = true;
                $scope.success = false;
            }

            if (event.color == '') {
                valid = false;
                $scope.col = true;
                $scope.success = false;
            } else {
                $scope.col = false;
            }

            if (event.start_date || event.end_date) {
                $scope.startOrEnd = false;
            } else {
                valid = false;
                $scope.startOrEnd = true;
                $scope.success = false;
            }

            if (event.address) {
                $scope.loc = false;
            } else {
                valid = false;
                $scope.loc = true;
                $scope.success = false;
            }
            if (valid) {
                eventService.save(event)
                    .success(function (response) {
                        console.log(response);
                        $scope.success = true;
                    })
                    .error(function (response) {
                        console.log(response);
                    })
            }
        }


        eventService.getEventCategories()
            .success(function (response) {
                console.log(response);
                $scope.categories = response;
            })
        orgService.getOrgs()
            .success(function (response) {
                $scope.orgs = response;

                eventService.getEvent(obj)
                    .success(function (response) {
                        $scope.event = response[0];
                        $scope.map = {
                            center: {
                                latitude: response[0].location_x,
                                longitude: response[0].location_y
                            },
                            zoom: 16
                        };
                        $scope.marker = {
                            id: 0,
                            coords: {
                                latitude: response[0].location_x,
                                longitude: response[0].location_y
                            }
                        }


                        $scope.event.org = {
                            id: response[0].organizations_id,
                            org_name: response[0].org_name
                        }

                        $scope.event.cat = {
                            id: response[0].eventCategory,
                            categoryName: response[0].categoryName
                        }
                        $scope.event.orgs = $scope.orgs;
                        $scope.event.categories = $scope.categories;


                        console.log($scope.event);

                    })
            })

        $scope.today = function () {
            $scope.dt = new Date();
        };
        $scope.today();

        $scope.clear = function () {
            $scope.dt = null;
        };



        $scope.toggleMin = function () {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();

        $scope.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        };

        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 2);
        $scope.events = [
            {
                date: tomorrow,
                status: 'full'
      },
            {
                date: afterTomorrow,
                status: 'partially'
      }
    ];

        $scope.getDayClass = function (date, mode) {
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0, 0, 0, 0);

                for (var i = 0; i < $scope.events.length; i++) {
                    var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);

                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        };

        $scope.mytime = new Date();

        $scope.hstep = 1;
        $scope.mstep = 15;

        $scope.options = {
            hstep: [1, 2, 3],
            mstep: [1, 5, 10, 15, 25, 30]
        };

        $scope.ismeridian = true;
        $scope.toggleMode = function () {
            $scope.ismeridian = !$scope.ismeridian;
        };

        $scope.update = function () {
            var d = new Date();
            d.setHours(14);
            d.setMinutes(0);
            $scope.mytime = d;
        };

        $scope.changed = function () {
            $log.log('Time changed to: ' + $scope.mytime);
        };

        $scope.clear = function () {
            $scope.mytime = null;
        };
        $scope.ore = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];
        $scope.minute = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09',
                  '10', '11', '12', '13', '14', '15', '16', '17', '18', '19',
                  '20', '21', '22', '23', '24', '25', '26', '27', '28', '29',
                  '30', '31', '32', '33', '34', '35', '36', '37', '38', '39',
                  '40', '41', '42', '43', '44', '45', '46', '47', '48', '49',
                  '50', '51', '52', '53', '54', '55', '56', '57', '58', '59',
                  '60'];

        $scope.schandule = [];
        eventService.getSchandule({
                id: $routeParams.eventID
            })
            .success(function (response) {
                $scope.schandule = response;
            })
            .error(function (response) {
                console.log(response);
            })

        $scope.addToSchandule = function (pro) {
            var valid = true;
            if ($scope.program.ora_inceput || $scope.program.minut_inceput ||
                $scope.program.ora_sfarsit || $scope.program.minut_sfarsit) {
                $scope.program.start = $scope.program.ora_inceput + ':' + $scope.program.minute_inceput;
                $scope.program.end = $scope.program.ora_sfarsit + ':' + $scope.program.minute_sfarsit;
            } else {
                valid = false;
            }

            if ($scope.program.detalii || $scope.program.data) {

            } else {
                valid = false;
            }

            if (valid) {
                $scope.program.event_id = $routeParams.eventID;

                eventService.addToSchandule($scope.program)
                    .success(function (response) {
                        console.log(response);
                        if (response == 'added') {
                            var obj = {
                                start_hour: $scope.program.start,
                                end_hour: $scope.program.end,
                                s_date: $scope.program.data,
                                s_desc: $scope.program.detalii
                            }
                            $scope.schandule.push(obj)
                            $scope.program = '';
                        }

                    })
                    .error(function (response) {
                        console.log(response);
                    })
            }
        }

        $scope.deleteS = function (id, index) {
            eventService.deleteS({
                    id: id
                })
                .success(function (response) {
                    if (response == 'success')
                        $scope.program.splice(index, 1);
                })
        }
    });