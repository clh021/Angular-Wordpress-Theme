(function(){

    'use strict';

    angular.module('app')

        .filter('rentNumberBed', rentNumberBed)
        .filter('rentNumberBath', rentNumberBath)
        .filter('rentFilterPrice', rentFilterPrice)
        .filter('rentFilterSup', rentFilterSup);

        rentNumberBed.$inject = ['$rootScope'];
        function rentNumberBed($rootScope) {

            return function (viviendas) {
                var output = [];

                var limit = Object.keys($rootScope.filterCheckHabitaciones).length;
                angular.forEach(viviendas, function (vivienda) {
                    for ( var i = 0; i < limit; i++ ) {
                        if ($rootScope.filterCheckHabitaciones[i] == true) {
                            if (i == limit-1 && vivienda.fields.alquiler_numero_habitaciones >= i) {
                                output.push(vivienda);
                            } else if (vivienda.fields.alquiler_numero_habitaciones == i){
                                output.push(vivienda);
                            }
                        }
                    }
                });
                if (output.length == 0) {
                    $rootScope.$emit('refreshOutput');
                }

                return output;
            }
        };

        rentNumberBath.$inject = ['$rootScope'];
        function rentNumberBath($rootScope) {

            return function (viviendas) {
                var output = [];

                var limit = Object.keys($rootScope.filterCheckBanos).length;
                angular.forEach(viviendas, function (vivienda) {
                    for ( var i = 0; i < limit; i++ ) {
                        if ($rootScope.filterCheckBanos[i] == true) {
                            if (i == limit-1 && vivienda.fields.alquiler_numero_banos >= i) {
                                output.push(vivienda);
                            } else if (vivienda.fields.alquiler_numero_banos == i){
                                output.push(vivienda);
                            }
                        }
                    }
                });
                if (output.length == 0) {
                    $rootScope.$emit('refreshOutput');
                }

                return output;
            }
        };

        function rentFilterPrice() {

            return function (viviendas, minValue, maxValue) {
                var output = [];

                minValue = parseInt(minValue);
                maxValue = parseInt(maxValue);

                if (isNaN(minValue) || isNaN(maxValue)) {
                    return output;
                } else {
                    angular.forEach(viviendas, function (vivienda) {
                        if (vivienda.fields.alquiler_precio >= minValue && vivienda.fields.alquiler_precio <= maxValue) {
                            output.push(vivienda);
                        }
                    });
                }

                return output;
            }
        };

        function rentFilterSup() {

            return function (viviendas, minValue, maxValue) {
                var output = [];

                minValue = parseInt(minValue);
                maxValue = parseInt(maxValue);

                if (isNaN(minValue) || isNaN(maxValue)) {
                    return output;
                } else {
                    angular.forEach(viviendas, function (vivienda) {
                        if (vivienda.fields.alquiler_metros_cuadrados >= minValue && vivienda.fields.alquiler_metros_cuadrados <= maxValue) {
                            output.push(vivienda);
                        }
                    });
                }

                return output;
            }
        };

})();
