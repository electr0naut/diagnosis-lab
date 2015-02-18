(function () {
    //    var app = angular.module('testing', []);
    //
    //    app.config(function ($interpolateProvider) {
    //        $interpolateProvider.startSymbol('%%');
    //        $interpolateProvider.endSymbol('%%');
    //    });
    //
    //    app.controller('especiesController', function ($scope) {
    //
    //        $scope.init = function () {
    //            $http.get("/especies").success(function (especies) {
    //                $scope.especies = especies;
    //            });
    //        };
    //    });

    var myApp = angular.module('testing', []);

    myApp.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('%%');
        $interpolateProvider.endSymbol('%%');
    });

    fetchData().then(bootstrapApplication);

    function fetchData() {
        var initInjector = angular.injector(['ng']);
        var $http = initInjector.get('$http');

        return $http.get("/especies").then(function (response) {
            myApp.constant('especies', response.data);
        }, function (errorResponse) { //ErrorHandling}
        });
    }

    function bootstrapApplication() {
        angular.element(document).ready(function () {
            angular.bootstrap(document, ['testing']);
        });
    }

    app.controller('especiesController', function () {
        $this.especies = angular.constant("especies");
    });

})();