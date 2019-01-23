<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script src="../js/angular.min.js"></script>
<script>
var app = angular.module("myApp", []);
app.directive("fileInput", function($parse){
	return{
		link:function($scope, element, attrs){
			element.on("change", function(event){
				var files = event.target.files;
				$parse(attrs.fileInput).assign(element[0].files);
				$scope.$apply();
			});
		}
	}
});
app.controller("usercontroller", function($scope, $http){
	$scope.insertData = function(){
		var form_data = new FormData();
		angular.forEach($scope.files, function(file){
			form_data.append('file', file)
		});
		$http.post(
		'upload.php', form_data,
		{
			transformRequest:angular.identity,
			headers:{'Content-Type':undefined, 'Process-Data':false}
		}).success(function(data){
			alert(data);
		});
	}
});
</script>
</head>
<body ng-app="myApp" ng-controller="usercontroller">
<div class="container">
<div class="col-md-offset-3 col-md-6">
<div class="col-md-12">
<label>Image</label>
<input type="file" file-model="customer.file">
</div>
<div class="col-md-12">
<label>Url</label>
<input type="text" name="url" class="form-control" ng-model="url">
</div>
<div class="col-md-12">
<input type="button" name="addval" ng-click="insertData()" class="btn btn-primary" value="Add">
</div>
</div>

</div>
</body>

</html>