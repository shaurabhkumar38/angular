<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
var myApp = angular.module('myApp', []);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
myApp.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            console.log("Success");
         })
         .error(function(){
            console.log("Success");
         });
     }
 }]);

 myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

   $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
   };

}]);
</script>
</head>
<h1>{{7+8}}</h1>
<body ng-app="myApp" ng-controller="myCtrl">
    <div class="file-upload">
        <input type="text" ng-model="name">
        <input type="file" file-model="myFile"/>
        <button ng-click="uploadFile()">upload me</button>
    </div>
</body>
</html>
