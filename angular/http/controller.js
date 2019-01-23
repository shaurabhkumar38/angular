var app = angular.module('myApp', []);
app.controller('mycntr', function($scope, $http){
	$http.get('http://localhost/angular/http/database.json')
	.success(function(response){
		$scope.persons = response.records;
		
	});
	
});