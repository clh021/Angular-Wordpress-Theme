(function(){

    'use strict';

    angular.module('app')
        .factory('LikeFactory', LikeFactory);

        LikeFactory.$inject = ['$http', 'URL_API'];
        function LikeFactory($http, URL_API) {

            return {
                checkLocalStorage: checkLocalStorage,
                getPostData: getPostData,
                addRemoveFavorite: addRemoveFavorite,
                addRemoveClassFavorite: addRemoveClassFavorite
            };

            function checkLocalStorage(types) {
                if( localStorage.getItem(types) )
                    return true;
                else
                    return false;
            }
            function getPostData(id, types) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/' + types + '/' + id).success(function(res){
                    return res;
                });
            }

            function addRemoveFavorite(input, types) {
                if( checkLocalStorage(types) ) {
                    var likes = JSON.parse(localStorage.getItem(types));
                    if( likes.indexOf(input) > -1 ) {
                        likes.splice(likes.indexOf(input), 1);
                        localStorage.setItem(types, JSON.stringify(likes));
                        Materialize.toast('Quitado de favorito', 1000);
                    } else {
                        likes.push(input);
                        localStorage.setItem(types, JSON.stringify(likes));
                        Materialize.toast('Añadido a favorito', 1000);
                    }
                    addRemoveClassFavorite(input, types);
                } else {
                    var likes = new Array();
                    likes.push(input);
                    localStorage.setItem(types, JSON.stringify(likes));
                }
            }

            function addRemoveClassFavorite(input, types) {
                if( checkLocalStorage(types) ) {
                    var likes = JSON.parse(localStorage.getItem(types));
                    if( likes.indexOf(input) > -1 ) {
                        return 'favorito';
                    } else {
                        return 'no-favorito';
                    }
                }
            }

        };


})();
