(function(){

    'use strict';

    angular.module('app')
        .controller('SingleRentCtrl', SingleRentCtrl);

        SingleRentCtrl.$inject = ['$routeParams', 'SingleRentFactory', 'activePlugin'];
        function SingleRentCtrl($routeParams, SingleRentFactory, activePlugin) {

            var vm = this;

            vm.restApiActive    = activePlugin.rest_api;
            vm.acfActive        = activePlugin.acf;

            vm.getPost = getPost;

            var id = $routeParams.id;

            function getPost(id) {
                SingleRentFactory.getPostData(id).then(function(dataResponse) {
                    vm.post = dataResponse.data;
                    getRelevantPost(vm.post.fields.alquiler_numero_habitaciones, vm.post.fields.alquiler_numero_banos);
                });
            }

            function getRelevantPost(hab, ban) {
                SingleRentFactory.getRelevantPostData(hab, ban).then(function(dataResponse) {
                    vm.relevants = dataResponse.data;
                });
            }

            if (vm.restApiActive && vm.acfActive) {
                vm.getPost(id);
            }

        };

})();
