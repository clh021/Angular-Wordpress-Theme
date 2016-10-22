(function(){

    'use strict';

    angular.module('app')
        .controller('SaleCtrl', SaleCtrl);

        SaleCtrl.$inject = ['SingleSaleFactory', 'SingleRentFactory', 'activePlugin'];
        function SaleCtrl (SingleSaleFactory, SingleRentFactory, activePlugin) {

            var vmh = this;

            vmh.restApiActive   = activePlugin.rest_api;
            vmh.acfActive       = activePlugin.acf;

            vmh.getLastsSalePost    = getLastsSalePost;
            vmh.getLastsRentPost    = getLastsRentPost;
            vmh.getStickyPost       = getStickyPost;

            function getLastsSalePost(number) {
                SingleSaleFactory.getLastsPostData(number).then(function(dataResponse) {
                    vmh.sale = dataResponse.data;
                });
            };
            function getLastsRentPost(number) {
                SingleRentFactory.getLastsPostData(number).then(function(dataResponse) {
                    vmh.rent = dataResponse.data;
                });
            };

            function getStickyPost() {
                SingleSaleFactory.getStickyPostData().then(function(dataResponse) {
                    vmh.sticky = dataResponse.data;
                });
            };

            if (vmh.restApiActive && vmh.acfActive) {
                vmh.getLastsSalePost(3);
                vmh.getLastsRentPost(3);
                vmh.getStickyPost();
            }
        };

})();
