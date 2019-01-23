<?php
$con = mysqli_connect("50.62.209.198", "hmsuser", "@zv664aU", "hms");
if(!$con){
die("couldnt connect".mysqli_error);
}
$query = "SELECT * FROM category";
$result = $con->query($query);
$r = array();
if( $result->num_rows>0){
while($row = $result->fetch_assoc()){
$r[] = $row;
}
}
// $res = '{"res":'.htmlspecialchars(json_encode($r)).'}';
$res = json_encode($r);
echo $res;

?>


