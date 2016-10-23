(function(){

    'use strict';

    angular.module('app')
        .factory('RentFactory', RentFactory)
        .factory('SingleRentFactory', SingleRentFactory);

        RentFactory.$inject = ['$http', 'URL_API'];
        function RentFactory($http, URL_API) {
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
                var url = URL_API.BASE_URL + '/wp/v2/rent?filter[posts_per_page]='+this.posts_per_page+'&page='+this.page;
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

        SingleRentFactory.$inject = ['$http', 'URL_API'];
        function SingleRentFactory($http, URL_API) {

            return {
                getPostData: getPostData,
                getRelevantPostData: getRelevantPostData,
                getLastsPostData: getLastsPostData
            };

            function getPostData(id) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/rent/' + id).success(function(res){
                    return res;
                });
            }

            function getRelevantPostData(alquiler_numero_habitaciones, alquiler_numero_banos) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/rent?alquiler_numero_habitaciones=' + alquiler_numero_habitaciones + '&alquiler_numero_banos=' + alquiler_numero_banos).success(function(res){
                    return res;
                });
            }

            function getLastsPostData(number) {
                return $http.get(URL_API.BASE_URL + '/wp/v2/rent?per_page=' + number).success(function(res){
                    return res;
                });
            }

        };

})();
