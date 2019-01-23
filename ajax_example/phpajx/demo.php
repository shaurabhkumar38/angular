<html>
<head>
<script>
function dashboard() {
var query_parameter = document.getElementById("name").value;
var dataString = 'parameter=' + query_parameter;

// AJAX code to execute query and get back to same page with table content without reloading the page.
$.ajax({
type: "POST",
url: "execute_query.php",
data: dataString,
cache: false,
success: function(html) {
// alert(dataString);
document.getElementById("table_content").innerHTML=html;
}
});
return false;
}
</script>
</head>
<body>
<div id="table_content"></div>
</body>
</html>