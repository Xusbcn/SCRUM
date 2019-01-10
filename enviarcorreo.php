<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	echo "<button onclick='enviarcorreo' >enviar correo</button>";
	function enviarcorreo(){
	$correo = "marcosarteaga@iesesteveterradas.cat";
	$titulo = "Recuperacion de contraseña";
	$mensaje = "<a href='restablecerpss.php'></a>"
	mail($correo, $titulo);
	header("Location:index.php");
	}
	
	?>
	
</body>
</html>