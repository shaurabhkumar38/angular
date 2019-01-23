var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider){
	$routeProvider
	.when('/', {
		templateUrl:'home.html'
	})
	.when('/about', {
		templateUrl:'about.html'
	})
	.when('/service', {
		templateUrl:'service.html'
	})
	.when('/login', {
		templateUrl:'login.html'
	})		
	.when('/register', {
		templateUrl:'register.html'
	})
	.otherwise({
		redirectTo:'/'
	});
	
});


app.controller("register", function($scope, $http){
	$scope.registerData = function(){
		$http.post(
			"http://hms.lansm.com/angular1/registerpage.php",
			{'name': $scope.user, 'pass':$scope.pass,'phone':$scope.phone
		}
			).success(function(data){
				alert(data);
			})

	}
});

