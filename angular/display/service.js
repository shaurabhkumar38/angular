app.service('myService',function($http){
this.response1= function(){
return $http.get('page2.php'); 
 };
});