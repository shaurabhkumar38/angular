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
	.when('/category', {
		templateUrl:'category.html'
	})
	.when('/dashboard', {
		templateUrl:'dashboard_category.html'
	})
	.otherwise({
		redirectTo:'/'
	});
	
});


app.controller("register", function($scope, $http){
	$scope.registerData = function(){
		$http.post(
			"registerpage.php",
			{'username':$scope.user, 'pass':$scope.pass,'phone':$scope.phone}
			).then(function(response){
				alert(response.data);
				$scope.user = "";
				$scope.pass = "";
				$scope.phone = "";
			});

	}
});

/*
app.service('userservice', function(){
var newuser;
var loggedin = false;
this.setName = function(name){
	newuser = name;

}

this.getName = function(){
	return name;
}
this.isUserLoggedIn = function(){
	return loggedin;
}
this.userLoggedin = function(){

	loggedin = true;
}

})
*/

app.controller('login', function($scope, $http, $location){
	$scope.loginData = function(){
		$http.post(
			"login.php",
			{'user':$scope.user, 'pass':$scope.pass}
			).then(function(response){
				//alert(response.data);

			if(response.data == "success"){
				//user.userLoggedin();
				//user.setName(response.data.user);
				//alert('welcome path');
				$location.path('/about');
			}
			else{
				//alert('invalied again');
				$location.path('/login');
			}
			

		})
	}

});



app.directive("fileInput", function($parse){
	return{
		link:function($scope, element, attrs){
			element.on("change", function(event){
				var files = event.target.files;
				$parse(attrs.fileInput).assign($scope, element[0].files);
				$scope.$apply;
			});
		}
	}

});
/*
app.controller('addcategory', function($scope, $http){
	$scope.addCategory = function(){
		var form_data = new FormData();
		angular.forEach($scope.files, function(file){
			form_data.append('file', file);
			form_data.append('categoryName', $scope.categoryName);
			return $scope.categoryName;
		});
		$http.post("category.php", form_data, 
		{
			transformRequest: angular.identity,
			headers: {'Content-Type':undefined, 'Process-Data':false}
		}
			).then(function(response){
				alert(response.data)
			})
	}	

});

*/

app.controller('categoryPanel', function($scope, $http){
		$scope.fetchData = function(){
			$http.get('fetchdata.php').then(function(response){
				$scope.namesData = response.data;
			})
		}

		$scope.addCategory = function(){
		var form_data = new FormData();
		angular.forEach($scope.files, function(file){
			form_data.append('file', file);
			form_data.append('categoryName', $scope.categoryName);
			return $scope.categoryName;
		});
		$http.post("category.php", form_data, 
		{
			transformRequest: angular.identity,
			headers: {'Content-Type':undefined, 'Process-Data':false}
		}
			).then(function(response){
				$scope.fetchData();
				alert(response.data)
			})
	}

	$scope.fetchSingledata = function(id){


		$http.post('edit.php',
			{'id':id}
			)
		.then(function(response){
			$scope.categoryName = response.data.name;
			$scope.image = response.data.image;
				/*$scope.name = response.data.name;

				$scope.image = response.data.image;
				$scope.hidden_id = id;
				$scope.modalTital = 'Edit Data' ;
				$scope.submit_button = 'Edit' ;
				$scope.openModal();*/
			})

	}

	});