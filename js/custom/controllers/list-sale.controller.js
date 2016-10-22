(function(){

    'use strict';

    angular.module('app')
        .controller('ListSaleCtrl', ListSaleCtrl);

        ListSaleCtrl.$inject = ['$rootScope', 'SaleFactory', 'LikeFactory', 'activePlugin'];
        function ListSaleCtrl ($rootScope, SaleFactory, LikeFactory, activePlugin) {

            var vm = this;

            vm.restApiActive    = activePlugin.rest_api;
            vm.acfActive        = activePlugin.acf;

            vm.toggleDorm       = toggleDorm;
            vm.toggleBanos      = toggleBanos;
            vm.addRemoveLike    = addRemoveLike;
            vm.checkFavorite    = checkFavorite;

            vm.log=log;

            vm.selectPrice = {
                min: {
                    value: "30000",
                    choices: [0, 30000, 60000, 90000, 120000]
                },
                max: {
                    value: "210000",
                    choices: [150000, 180000, 210000, 240000]
                }
            };
            vm.selectSup = {
                min: {
                    value: "80",
                    choices: [0, 40, 80, 120]
                },
                max: {
                    value: "220",
                    choices: [140, 180, 220, 260]
                }
            };

            $rootScope.filterCheckHabitaciones = {
                0: true,
                1: true,
                2: true,
                3: true,
                4: false
            }
            $rootScope.filterCheckBanos = {
                0: true,
                1: true,
                2: true,
                3: true,
                4: false
            }

            function log(){
                console.log(vm.selectPrice);
            }

            function toggleDorm(index){
                $rootScope.filterCheckHabitaciones[index] = !$rootScope.filterCheckHabitaciones[index];
            };
            function toggleBanos(index){
                $rootScope.filterCheckBanos[index] = !$rootScope.filterCheckBanos[index];
            };

            function addRemoveLike(input, types) {
                LikeFactory.addRemoveFavorite(input, types);
            };
            function checkFavorite(input, types) {
                return LikeFactory.addRemoveClassFavorite(input, types);
            };

            if (vm.restApiActive && vm.acfActive) {
                vm.contents = new SaleFactory();
            }

        };

})();
