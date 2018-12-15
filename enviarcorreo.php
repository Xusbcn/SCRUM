<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	echo "<button onclick='enviarcorreo' >enviar correo</button>";


	function enviarcorreo(){
	$correo = "marcosav1996@gmail.com";
	$titulo = "Recuperacion de contraseña";
	$mensaje =  "hola" 
	mail($correo, $titulo);
	header("Location:index.php");
	}
	
	?>
	dasda

</body>
</html>