(function(){

    'use strict';

    angular.module('app', [
            'ngRoute',
            'ngSanitize',
            'ngAnimate',
            'ui.materialize',
            'infinite-scroll'
        ])
        .config(config)
        .constant('URL_API', {
            BASE_URL:  'http://localhost/wordpress/wp-json'
        })
        .value('activePlugin', {
            'rest_api': localized.state_plugin_rest_api,
            'acf': localized.state_plugin_acf
        })
        .run(run);

        //run.$inject = ['$rootScope', '$location'];
        function run($rootScope, $location) {
            var path = function() { return $location.path(); };
            $rootScope.$watch(path, function(newVal, oldVal){
                $rootScope.activetab = newVal;
            });
            //$rootScope.restApiActive = localized.state_plugin_rest_api;
        }

        function config($routeProvider) {
            $routeProvider
            .when('/', {
                templateUrl: localized.views + 'home.html',
                controller: 'SaleCtrl',
                controllerAs: 'vmh'
            })
            .when('/comprar-vivienda', {
                templateUrl: localized.views + 'list-sale.html',
                controller: 'ListSaleCtrl',
                controllerAs: 'vm'
            })
            .when('/comprar-vivienda/:id', {
                templateUrl: localized.views + 'single-sale.html',
                controller: 'SingleSaleCtrl',
                controllerAs: 'vm'
            })
            .when('/alquilar-vivienda', {
                templateUrl: localized.views + 'list-rent.html',
                controller: 'ListRentCtrl',
                controllerAs: 'vm'
            })
            .when('/alquilar-vivienda/:id', {
                templateUrl: localized.views + 'single-rent.html',
                controller: 'SingleRentCtrl',
                controllerAs: 'vm'
            })
            .when('/vivienda-favorita', {
                templateUrl: localized.views + 'like.html',
                controller: 'LikeCtrl',
                controllerAs: 'vm'
            })
            .otherwise({
                redirectTo: '/'
            });
        };
})();
