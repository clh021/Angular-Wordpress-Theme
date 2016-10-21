(function(){

    'use strict';

    angular.module('app')
        .factory('SaleFactory', SaleFactory)
        .factory('SingleSaleFactory', SingleSaleFactory);

        SaleFactory.$inject = ['$http', 'URL_API'];
        function SaleFactory($http, URL_API) {
            var Contents = function() {
                this.items = [];
                this.busy = false;
                this.page = 1;
                this.posts_per_page = 4;
            }
            jQuery('#load-progress').css('display', 'block');
            Contents.prototype.nextPage = function () {
                if(this.busy) return;
                this.busy = true;
                var url = URL_API.BASE_URL + '/wp/v2/sale?filter[posts_per_page]='+this.posts_per_page+'&page='+this.page;
                $http.get(url, {cache: 'true'}).success(function(data) {
                    for (var i = 0; i < data.length; i++) {
                        this.items.push(data[i]);
                    };
                    jQuery('#load-progress').css('display', 'none');
                    if (data.length < this.posts_per_page) return;
                    this.page++;
                    this.busy = false;
                }.bind(this));
            };

            return Contents;

        };

        SingleSaleFactory.$inject = ['$http', 'URL_API'];
        function SingleSaleFactory($http, URL_API) {

            return {
                getPostData: getPostData,
                getStickyPostData: getStickyPostData,
                getRelevantPostData: getRelevantPostData,
                getLastsPostData: getLastsPostData
            };

            function getPostData(id) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/sale/' + id).success(function(res){
                    return res;
                });
            }

            function getStickyPostData() {
                return $http.get(URL_API.BASE_URL + '/wp/v2/sale?venta_destacada=1').success(function(res){
                    return res;
                });
            }

            function getRelevantPostData(venta_numero_habitaciones, venta_numero_banos) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/sale?venta_numero_habitaciones=' + venta_numero_habitaciones + '&venta_numero_banos=' + venta_numero_banos).success(function(res){
                    return res;
                });
            }

            function getLastsPostData(number) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/sale?per_page=' + number).success(function(res){
                    return res;
                });
            }

        };

})();
