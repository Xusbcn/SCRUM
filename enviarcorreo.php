<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$pass="lzabala123";
	$conn = mysqli_connect('localhost','xus','xus123');
	mysqli_select_db($conn, 'scrum2');
	$update=("UPDATE users SET password = SHA2('lzabala123',256) WHERE uid=1;");
	$resultatem = mysqli_query($conn, $update);
	echo "buena crack";
	?>
	
</body>
</html>