var app = angular.module('myApp', []);

app.controller("bannerController", function ($scope, $http, $timeout) {
    $scope.banners = [];

    $scope.init = function () {
        $scope.loading = true;
        $http.get('http://www.hermo.my/test/api.html?list=banner').
            success(function (data) {
                $scope.banners = data.items;

                // I am the callback handler for the ngRepeat completion.
                $scope.doSomething = function (index) {
                    $('.flexslider').flexslider({
                        animation: "slide"
                    });
                };
            });
    };

    $scope.init();
});

app.controller("productController", function ($scope, $http, $timeout) {
    $scope.banners = [];

    $scope.init = function () {
        $scope.loading = true;

        $http.get('http://www.hermo.my/test/api.html?list=best-selling').
        success(function (data) {
            $scope.products = data.items;
        });
    };

    $scope.init();
});

app.filter('checkurl', function () {
    return function (input) {
        return input.replace('"', '');
    };
});
// I invoke the given expression when associated ngRepeat loop
// has finished its first round of rendering.
app.directive(
        "repeatComplete",
        function ($rootScope) {
            // Because we can have multiple ng-repeat directives in
            // the same container, we need a way to differentiate
            // the different sets of elements. We'll add a unique ID
            // to each set.
            var uuid = 0;
            // I compile the DOM node before it is linked by the
            // ng-repeat directive.
            function compile(tElement, tAttributes) {
                // Get the unique ID that we'll be using for this
                // particular instance of the directive.
                var id = ++uuid;
                // Add the unique ID so we know how to query for
                // DOM elements during the digests.
                tElement.attr("repeat-complete-id", id);
                // Since this directive doesn't have a linking phase,
                // remove it from the DOM node.
                tElement.removeAttr("repeat-complete");
                // Keep track of the expression we're going to
                // invoke once the ng-repeat has finished
                // rendering.
                var completeExpression = tAttributes.repeatComplete;
                // Get the element that contains the list. We'll
                // use this element as the launch point for our
                // DOM search query.
                var parent = tElement.parent();
                // Get the scope associated with the parent - we
                // want to get as close to the ngRepeat so that our
                // watcher will automatically unbind as soon as the
                // parent scope is destroyed.
                var parentScope = (parent.scope() || $rootScope);
                // Since we are outside of the ng-repeat directive,
                // we'll have to check the state of the DOM during
                // each $digest phase; BUT, we only need to do this
                // once, so save a referene to the un-watcher.
                var unbindWatcher = parentScope.$watch(
                        function () {
                            console.info("Digest running.");
                            // Now that we're in a digest, check to see
                            // if there are any ngRepeat items being
                            // rendered. Since we want to know when the
                            // list has completed, we only need the last
                            // one we can find.
                            var lastItem = parent.children("*[ repeat-complete-id = '" + id + "' ]:last");
                            // If no items have been rendered yet, stop.
                            if (!lastItem.length) {
                                return;
                            }
                            // Get the local ng-repeat scope for the item.
                            var itemScope = lastItem.scope();
                            // If the item is the "last" item as defined
                            // by the ng-repeat directive, then we know
                            // that the ng-repeat directive has finished
                            // rendering its list (for the first time).
                            if (itemScope.$last) {
                                // Stop watching for changes - we only
                                // care about the first complete rendering.
                                unbindWatcher();
                                // Invoke the callback.
                                itemScope.$eval(completeExpression);
                            }
                        }
                );
            }
            // Return the directive configuration. It's important
            // that this compiles before the ngRepeat directive
            // compiles the DOM node.
            return({
                compile: compile,
                priority: 1001,
                restrict: "A"
            });
        }
);

//app.directive('collapseElem2', ['$timeout', function ($timeout) {
//  return {
//    link: function ($scope, element, attrs) {
//      $scope.$on('dataloaded', function () {
//        $timeout(function () { 
//            console.log('write in');
////            $('.flexslider').flexslider({
////                animation: "slide"
////            });
//        }, 0, false);
//      })
//    }
//  };
//}]);


//phonecatControllers.controller('PhoneListCtrl', ['$scope', 'Phone', function($scope, Phone) {
//  $scope.phones = Phone.query();
//  $scope.orderProp = 'age';
//}]);
//
//app.controller('bannerController', ['$scope', 'Phone', function($scope, $http) {
//    	$scope.banners = Banner.query();
//
//
//
//        // $scope.myWelcome = response.data;
//
//    //     $('.flexslider').flexslider({
//		  //   animation: "slide"
//		  // });
//    }]);
//    
//    $scope.phones = [
//    {'name': 'Nexus S',
//     'snippet': 'Fast just got faster with Nexus S.'},
//    {'name': 'Motorola XOOM™ with Wi-Fi',
//     'snippet': 'The Next, Next Generation tablet.'},
//    {'name': 'MOTOROLA XOOM™',
//     'snippet': 'The Next, Next Generation tablet.'}
//  ];
//});