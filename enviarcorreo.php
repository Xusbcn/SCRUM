<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$mailUser="marcosarteaga@iesesteveterradas.cat";
	$conn = mysqli_connect('localhost','xus','xus123');
	mysqli_select_db($conn, 'scrum2');
	$consultaem = ("SELECT uid FROM users WHERE email = '$mailUser';");
	$resultatem = mysqli_query($conn, $consultaem);
	while( $ema = mysqli_fetch_assoc($resultatem)){
		echo $ema["uid"];
	};
	echo "hola";
	?>
	
</body>
</html>
