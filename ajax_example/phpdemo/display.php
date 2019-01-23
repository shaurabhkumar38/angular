<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('student');
$x = mysql_query('select * from class');
?>