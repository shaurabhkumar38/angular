<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link type="text/css" rel="stylesheet" href="../bootstrap.min.css" >
<script src="../angular.min.js"></script>
<script>
var app = angular.module('MyApp',[]);
app.controller('cntr', function($scope, $http){
	$scope.insert = function(){
		$http.post(
		"insert.php",
		{'firstname':$scope.fname,'lastname':$scope.lname}
		).success(function(data){
			alert(data);
			
		})
	}
	
});
</script>
</head>
<body>
<div class="col-md-12" ng-app="MyApp" ng-controller="cntr">
<h2 class="text-center">Insert Data</h3>
<div class="col-md-6 col-md-offset-3">
<div class="form-group">
<label>First Name</label>
<input type="text" class="form-control" ng-modal="fname">
</div>
<div class="form-group">
<label>Last Name</label>
<input type="text" class="form-control" ng-modal="lname">
</div>
<div class="form-group">
<input type="submit" class="btn btn-info" value="Submit" ng-click="insert()">
</div>
</div>
</div>
</body>
</html>