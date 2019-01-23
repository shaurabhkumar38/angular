<?php
$con = mysqli_connect("50.62.209.198", "hmsuser", "@zv664aU", "hms");
if(!$con){
die("couldnt connect".mysqli_error);
}
$data = json_decode(file_get_contents("php://input"));
$id = mysqli_real_escape_string($con, $data->id);
$query = "SELECT * FROM category WHERE id = '$id'";
$result = $con->query($query);
$r = array();
if( $result->num_rows>0){
while($row = $result->fetch_assoc()){
//$r[] = $row;
	$output['id'] = $row['id'];
	$output['name'] = $row['name'];
	$output['image'] = $row['image'];
	$output['status'] = $row['status'];
}
}
// $res = '{"res":'.htmlspecialchars(json_encode($r)).'}';
$res = json_encode($output);
echo $res;
?>


