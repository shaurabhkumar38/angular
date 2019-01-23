<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('student');

if(isset($_REQUEST['save'])){
$roll = $_REQUEST['roll'];
$name = $_REQUEST['name'];
mysql_query("insert into class values('$roll','$name')");
}
?>



<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
  <script>
            $(document).ready(function(){
		
			
            var response = '';
            $.ajax({ type: "POST",   
                     url: "display2.php",   
                     async: false,
                     success : function(text)
                     {
					 $(".result").html(text); 
                         //response = text;
                     }
            });
//$('#responsecontainer').text(response);
            //alert(response);
			
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



<div class="result" style="border:solid 1px yellow;float:left;"></div>


</body>
</html>