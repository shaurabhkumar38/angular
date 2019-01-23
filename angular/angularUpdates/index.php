<?php
	require_once("comments.php");
	$comment = new comments();
	
	if(isset($_GET['action']) and $_GET['action'] == "getComments"){
		echo $comment->getComments();
		exit;
	}
	
	if(isset($_GET['action']) and $_GET['action'] == "delete"){
		$comment->deleteComment($_GET['id']);
		exit;
	}
	
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		echo $comment->addComment($_POST);
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Angular Demo</title>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript">
 function commentsController($scope, $http){
	
	$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
	 
	$http.get("index.php?action=getComments")
	     .success(function(data){ $scope.comments = data;  });
	
	$scope.addComment = function(comment){
		if("undefined" != comment.msg){
			$http({
			  	method : "POST",
			  	url : "index.php", 
				data : "action=add&msg="+comment.msg
			  }).success(function(data){
				  $scope.comments.unshift(data); 
			  });
			$scope.comment = "";
		}
	}
	
	$scope.deleteComment = function(index){
		$http({
			  method : "GET",
			  url : "index.php?action=delete&id="+$scope.comments[index].id,
		}).success(function(data){
			$scope.comments.splice(index,1);
		});
	}
 }
</script>
<style type="text/css">
* { padding:0px; margin:0px; }
body{font-family:arial}
textarea{border:solid 1px #333;width:520px;height:30px;font-family:arial;padding:5px}
.main{margin:0 auto;width:600px; text-align:left:}
.updates
{
padding:20px 10px 20px 10px ;
border-bottom:dashed 1px #999;
background-color:#f2f2f2;
}
.button
{
padding:10px;
float:right;
background-color:#006699;
color:#fff;
font-weight:bold;
text-decoration:none;

}
.updates a
{
color:#cc0000;
font-size:12px;

}
</style>
</head>
<body>
	<div ng-app id="ng-app" class="main">
		<br/>
	<h1>AngularJS Updates Tutorial</h1>
	<a href="http://www.9lessons.info">www.9lessons.info</a>
	<div ng-controller="commentsController">



	<div>
	<textarea name="submitComment" ng-model="comment.msg" placeholder="What are you thinking?"></textarea>
	<a href="javascript:void(0);" class="button" ng-click="addComment(comment)">POST</a>
	</div>

	  <!-- Comments -->
	  <div ng-repeat="comment in comments">
	    <div class="updates">
	    <a href="javascript:void(0);" ng-click="deleteComment($index);" style='float:right'>Delete</a>
	    {{comment.msg}}
	    </div>
	  </div>

	</div>
	</div>


</body>
</html>
