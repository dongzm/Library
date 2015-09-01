function detailController($scope, $http) {
	$http.get("php/books.php",{params: {fun:'detail',id:request("id")}})
		.success(function(response) {
			$scope.book = response;
		});
}

var detail = angular.module("detail", []);
detail.controller("detailCtrl", ['$scope', '$http',detailController]);

