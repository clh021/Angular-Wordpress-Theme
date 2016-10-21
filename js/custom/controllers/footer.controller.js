(function(){

    'use strict';

    angular.module('app')
        .controller('FooterCtrl', FooterCtrl);

        FooterCtrl.$inject = ['SingleSaleFactory', 'activePlugin'];
        function FooterCtrl (SingleSaleFactory, activePlugin) {

            var vm = this;

            vm.restApiActive    = activePlugin.rest_api;
            vm.acfActive        = activePlugin.acf;

            vm.getLastsPost = getLastsPost;

            function getLastsPost(number){
                SingleSaleFactory.getLastsPostData(number).then(function(dataResponse) {
                    vm.posts = dataResponse.data;
                });
            };

            if (vm.restApiActive && vm.acfActive) {
                vm.getLastsPost(4);
            }

        };

})();
