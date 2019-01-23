var app = angular.module('mainApp', ['ngRoute']);
app.config(function($routeProvider){
	$routeProvider
	.when('/', {
		template: 'Welcome User'
	})
	.when('/page', {
		template: 'Welcome User page 2'
	})
	.otherwise({
		redirectTo: '/'
	});
});
