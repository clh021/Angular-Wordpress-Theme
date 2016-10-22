(function(){

    'use strict';

    angular.module('app')
        .controller('SingleSaleCtrl', SingleSaleCtrl);

        SingleSaleCtrl.$inject = ['$routeParams', 'SingleSaleFactory', 'activePlugin'];
        function SingleSaleCtrl($routeParams, SingleSaleFactory, activePlugin) {

            var vm = this;

            vm.restApiActive    = activePlugin.rest_api;
            vm.acfActive        = activePlugin.acf;

            vm.getPost = getPost;

            var id = $routeParams.id;

            function getPost(id) {
                SingleSaleFactory.getPostData(id).then(function(dataResponse) {
                    vm.post = dataResponse.data;
                    getRelevantPost(vm.post.fields.venta_numero_habitaciones, vm.post.fields.venta_numero_banos);
                });
            }

            function getRelevantPost(hab, ban) {
                SingleSaleFactory.getRelevantPostData(hab, ban).then(function(dataResponse) {
                    vm.relevants = dataResponse.data;
                });
            }

            if (vm.restApiActive && vm.acfActive) {
                vm.getPost(id);
            }

        };

})();
