function loginController($scope, $http) {
    $scope.formDate = {};

    $scope.processForm = function() {
        $http({
            method: "POST",
            url: "../php/login.php",
            data: $.param($scope.formDate),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).success(function(data){
            $scope.message = data.message;
            if(data.success){
                window.location.href = "index.php"; 
            }
        })
    };
}
var login = angular.module("login", []);
login.controller("loginCtrl", ['$scope', '$http',loginController]);


