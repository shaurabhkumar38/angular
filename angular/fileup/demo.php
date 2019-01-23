<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<script src="angular.min.js"></script>
<script>
var app = angular.module("myapp", []);
app.directive("fileInput", function($parse){
	return{
		restrict:'A',
		link:function(scope, element, attrs){
			element.bind('change', function(){
				//var files = event.target.files;
				$parse(attrs.fileInput).assign(element[0].files);
				scope.$apply();
				//console.log(files[0].name);
			});
		}
	}
});

app.controller("myController", function($scope, $http){
	$scope.uploadFile = function(){
		var form_data = new FormData();
		angular.forEach($scope.files, function(file){
			form_data.append('file', file)
		});
		var request = $http(
		'upload.php', form_data,
		{	method:'post',
		url:'http://localhost:1234/angular/fileup/upload.php',
		data:form_data,
			transformRequest:angular.identity,
			headers: {'Content-Type':undefined}
		});
		request.then(function(data){
			alert(data);
		}, function(error){
			
		});
	}
});
</script>
</head>
<body ng-app="myapp" ng-controller="myController">
<div class="container">
<div class="col-md-offset-3 col-md-6">
<div class="col-md-12">
<label>Image</label>
<input type="file" file-input="files">
</div>

<div class="col-md-12">
<input type="button" ng-click="uploadFile()" class="btn btn-primary" value="Add">
</div>
</div>

</div>
</body>

</html>