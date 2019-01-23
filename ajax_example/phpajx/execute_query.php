<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('student');

//$user_name = $_POST['parameter'];

$query="SELECT * from class";
$result=mysql_query($query);
$rs = mysql_fetch_array($result);

do
{
?>
<table>
<tr>
<td><?php echo $rs['roll']; ?></td>
<td><?php echo $rs['name']; ?></td>
</tr>
</table>
<?php
}while($rs = mysql_fetch_array($result));


