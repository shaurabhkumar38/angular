var app = angular.module('mainApp', ['ngRoute']);
app.config(function($routeProvider){
	$routeProvider
	.when('/', {
		templateUrl:'menu.html'		
	})
	.when('/page', {
		templateUrl:'page.html'
	})
	.when('/page2', {
		templateUrl:'page2.html'
	})
	.otherwise({
		redirectTo:'/'
	})
})