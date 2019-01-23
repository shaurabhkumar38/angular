<?php
	$con = mysql_connect('localhost','root','');
mysql_select_db('student');

$x = mysql_query('select * from class');
/*while($y = mysql_fetch_array($x)){;
echo $y['name']; echo ' ' ;echo $y['roll']; 
echo '<br/>';
}*/





if(isset($_REQUEST['save'])){
$roll = $_REQUEST['roll'];
$name = $_REQUEST['name'];
mysql_query("insert into class values('$roll','$name')");
}

if(isset($_REQUEST['del'])){
mysql_query("delete from class");
}


?>



<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript">

 $(document).ready(function() {

    $("#display").click(function() {                

     
});
});

</script>
</head>
<body>
<form method="post" >
<input type="text" name="roll">
<input type="text" name= "name">
<input type="submit" value="Save" name="save"  id="display">
<input type="submit" value="delete" name="del" >
</form>

<div id="responsecontainer" style="border:solid 1px red; width:200px; height:300px;">
<?php 

while($y = mysql_fetch_array($x)){;
echo $y['name']; echo ' ' ;echo $y['roll']; 
echo '<br/>'; 

}
?>
</div>


</body>
</html>