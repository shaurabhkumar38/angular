<?php
$con = mysqli_connect("50.62.209.198", "hmsuser", "@zv664aU", "hms");
$name = htmlspecialchars($_POST['categoryName']);
if(!empty($_FILES))
{
	$tempPath = $_FILES['file']['tmp_name']; 
	$path = 'upload/'.$_FILES['file']['name'];
	
$query = "INSERT INTO category(name, image, status) VALUES ('$name', '$path', 0)";
	if(mysqli_query($con, $query)){

if(move_uploaded_file($tempPath, $path))
	{

	echo 'Image upload';	
	}
	else{
		echo 'Image Not upload';

}

}
else{
	echo 'Error';
}

	
}

?>


