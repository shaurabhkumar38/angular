<?php

$con = mysql_connect('localhost','root','');
mysql_select_db('student');
$x = mysql_query('select * from class');
while($y = mysql_fetch_array($x)){;

echo $y['name']; 



echo $y['roll'];
echo '</br>'


}

?>


