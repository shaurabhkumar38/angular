<?php
$connect = mysqli_connect("localhost","root","","pbird");
if(!empty($_FILES)){
	$img = $_FILES['file']['name'];
	$path = 'upload/' . $img;
	if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
	{
		$query = "INSERT INTO imgup(img) VALUES ('$img')";
		if(mysqli_query($connect, $query)){
			echo 'file upload';
		}
		else{
			echo ''; 
		}
	}
}else{
	echo 'some error';
}

?>