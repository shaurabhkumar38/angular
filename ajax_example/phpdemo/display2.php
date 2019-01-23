<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('student');
$x = mysql_query('select * from class');



//echo $y['name'] ."<br/>"; 



?>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div style="border:solid 1px red; width:200px; float:left;">
<?php
while($y = mysql_fetch_array($x)){?>
<div style="float:left; text-align:center; width:90px;">
<?php echo $y['roll'] ;?>
</div>
<div style="float:right; text-align:center; width:90px;">
<?php echo $y['name'] ;?>
</div>
<?php
}
?>
</div>
</body>
</html>


