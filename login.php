<?php
$con = mysqli_connect("50.62.209.198", "hmsuser", "@zv664aU", "hms");
session_start();
$data = json_decode(file_get_contents("php://input"));
if(count($data) > 0){
$user = mysqli_real_escape_string($con, $data->user);
$pass = mysqli_real_escape_string($con, $data->pass);

$query = "SELECT * FROM register WHERE name = '$user' && pass = '$pass'";

$result = mysqli_query($con, $query);

$count = mysqli_num_rows($result);
		
      if($count == 1) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
      	echo "success";
}
else{

	echo 'Database Error';
}

}




?>