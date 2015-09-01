function customersController($scope, $http) {
	$http.get("php/books.php?fun=list")
		.success(function(response) {		
			$scope.books = response;
		});
}
var app = angular.module("myApp", []);
app.controller("myCtrl", ['$scope', '$http',customersController]);

