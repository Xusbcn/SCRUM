<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$pass=123456;
	$conn = mysqli_connect('localhost','xus','xus123');
	mysqli_select_db($conn, 'scrum2');
	$update=("UPDATE users SET password = SHA2('$pass',512) WHERE uid=1;");
	$resultatem = mysqli_query($conn, $update);
	echo "buena crack";
	?>
	
</body>
</html>