var app = angular.module('mainApp', ['ngRoute']);
app.config(function($routeProvider){
	$routeProvider
	.when('/', {
		template:'Welcome'
	})
	.when('/page', {
		templateUrl:'page.html'
	})
	.otherwise({
		redirectTo:'/'
	})
})