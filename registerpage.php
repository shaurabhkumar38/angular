<?php
$con = mysqli_connect("50.62.209.198", "hmsuser", "@zv664aU", "hms");
$data = json_decode(file_get_contents("php://input"));
if(count($data) > 0){
	$name = mysqli_real_escape_string($con, $data->username);
	$pass = mysqli_real_escape_string($con, $data->pass);
	$phone = mysqli_real_escape_string($con, $data->phone);
$query = "INSERT INTO register(name, pass, phone) VALUES ('$name', '$pass', '$phone')";
if(mysqli_query($con, $query)){

	//echo 'Data inserted';
	
}
else{
	//echo 'Error';
}
}

?>