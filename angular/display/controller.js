app.controller('cntr',function($scope, myService){
	
	getfun();
	function getfun()
	{
		 var data1=myService.response1();
		 data1.then(function(emp){
			 
			 $scope.names = emp.data;
			 
		 });
		
	}


});