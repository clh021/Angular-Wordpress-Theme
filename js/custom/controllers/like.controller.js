(function(){

    'use strict';

    angular.module('app')
        .controller('LikeCtrl', LikeCtrl);

        LikeCtrl.$inject = ['URL_API', 'LikeFactory', 'activePlugin'];
        function LikeCtrl (URL_API, LikeFactory, activePlugin) {

            var vm = this;

            vm.restApiActive    = activePlugin.rest_api;
            vm.acfActive        = activePlugin.acf;

            vm.addRemoveLike    = addRemoveLike;
            vm.checkFavorite    = checkFavorite;

            vm.sales = [];
            vm.rents = [];

            function addRemoveLike(input, types) {
                jQuery('#post-'+input).hide('slow');
                LikeFactory.addRemoveFavorite(input, types);
            }

            function checkFavorite(types) {
                if( LikeFactory.checkLocalStorage(types) ) {
                    var likes = JSON.parse(localStorage.getItem(types));
                    for (var i = 0; i < likes.length; i++) {
                        LikeFactory.getPostData(likes[i], types).then(function(dataResponse) {
                            if (types == 'sale')
                                vm.sales.push(dataResponse.data);
                            if (types == 'rent')
                                vm.rents.push(dataResponse.data);
                        });
                    }
                    console.log('Estos son tus favoritos: ', likes);
                } else {
                    console.log("No tienes favoritos");
                }
            }

            if (vm.restApiActive && vm.acfActive) {
                vm.checkFavorite('sale');
                vm.checkFavorite('rent');
            }

        };

})();
