(function(){

    'use strict';

    angular.module('app')

        .filter('saleNumberBed', saleNumberBed)
        .filter('saleNumberBath', saleNumberBath)
        .filter('saleFilterPrice', saleFilterPrice)
        .filter('saleFilterSup', saleFilterSup);

        saleNumberBed.$inject = ['$rootScope'];
        function saleNumberBed($rootScope) {

            return function (viviendas) {
                var output = [];

                var limit = Object.keys($rootScope.filterCheckHabitaciones).length;
                angular.forEach(viviendas, function (vivienda) {
                    for ( var i = 0; i < limit; i++ ) {
                        if ($rootScope.filterCheckHabitaciones[i] == true) {
                            if (i == limit-1 && vivienda.fields.venta_numero_habitaciones >= i) {
                                output.push(vivienda);
                            } else if (vivienda.fields.venta_numero_habitaciones == i){
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

        saleNumberBath.$inject = ['$rootScope'];
        function saleNumberBath($rootScope) {

            return function (viviendas) {
                var output = [];

                var limit = Object.keys($rootScope.filterCheckBanos).length;
                angular.forEach(viviendas, function (vivienda) {
                    for ( var i = 0; i < limit; i++ ) {
                        if ($rootScope.filterCheckBanos[i] == true) {
                            if (i == limit-1 && vivienda.fields.venta_numero_banos >= i) {
                                output.push(vivienda);
                            } else if (vivienda.fields.venta_numero_banos == i){
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

        function saleFilterPrice() {

            return function (viviendas, minValue, maxValue) {
                var output = [];

                minValue = parseInt(minValue);
                maxValue = parseInt(maxValue);

                if (isNaN(minValue) || isNaN(maxValue)) {
                    return output;
                } else {
                    angular.forEach(viviendas, function (vivienda) {
                        if (vivienda.fields.venta_precio >= minValue && vivienda.fields.venta_precio <= maxValue) {
                            output.push(vivienda);
                        }
                    });
                }

                return output;
            }
        };

        function saleFilterSup() {

            return function (viviendas, minValue, maxValue) {
                var output = [];

                minValue = parseInt(minValue);
                maxValue = parseInt(maxValue);

                if (isNaN(minValue) || isNaN(maxValue)) {
                    return output;
                } else {
                    angular.forEach(viviendas, function (vivienda) {
                        if (vivienda.fields.venta_metros_cuadrados >= minValue && vivienda.fields.venta_metros_cuadrados <= maxValue) {
                            output.push(vivienda);
                        }
                    });
                }

                return output;
            }
        };

})();
