<?php 
    session_start();

    if (!isset($_SESSION["userName"])) {
        header('Location: ../admin/login.html');
    }  
?>
<!DOCTYPE html>
<html lang="zh-CN" ng-app="index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Dashboard Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>            
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="index.html">档案馆</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Export</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">                
                <h2 class="sub-header">人员列表</h2>
                <div class="table-responsive">
                    <table class="table table-striped"  ng-controller="indexCtrl">
                        <thead>
                            <tr>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>学校</th>
                                <th>年级</th>
                                <th>专业</th>
                                <th>小组</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody ng-repeat="student in students">
                           <tr>
                             <td ng-bind="student.name"></td>
                             <td ng-bind="student.sex"></td>
                             <td ng-bind="student.school"></td>
                             <td ng-bind="student.grade"></td>
                             <td ng-bind="student.major"></td>
                             <td ng-bind="student.groupname"></td>
                             <td ng-click="edit($index)"><span class="glyphicon glyphicon-edit">编辑</span></td>
                           </tr>                                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/angular.js/1.4.1/angular.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
        var index = angular.module("index", []);
        index.controller("indexCtrl", customersController);
        function customersController($scope, $http) {
            $http.get("../php/index.php?fun=list")
                .success(function(response) {       
                    $scope.students = response;
                });

            $scope.edit = function(index){
                //alert(index);
                //window.location.href = "https://www.baidu.com";
            }
            $scope.edit();
        }
    </script>
</body>

</html>
