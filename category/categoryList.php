<html>
<head>
	<title>Lista kategorii</title>
</head>
<body>

<?
$username="localuser";
$password="password";
$database="storedb";

mysql_connect('localhost',$username,$password);
@mysql_select_db($database) or die("Nie odnaleziono bazy danych");
$query="SELECT * FROM category";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "
<table class="table table-hover table-condensed">
	<tr>
		<th>Id</th>
		<th>State</th>
		<th>Name</th>
	</tr>
";

$i=0;
while ($i < $num) {

$id=mysql_result($result,$i,"id");
$state=mysql_result($result,$i,"state");
$name=mysql_result($result,$i,"name");

echo "	
	<tr>
		<td>$id</td>
		<td>$state</td>
		<td>$name</td>
	</tr>
";

$i++;
}

echo "</table>";

?>

</body>
</html>