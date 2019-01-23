<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "student");

$result = mysqli_query($connect, "select * from class");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>