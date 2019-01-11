<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	function enviarcorreo(){
	$correo = $_SESSION["correo"];
	$titulo = "Recuperacion de contraseña";
	$mensaje = "http://ec2-54-158-157-91.compute-1.amazonaws.com/SCRUM/restablecerpss.php ";
	mail($correo, $titulo,$mensaje);
	header("Location:index.php");
	}
	enviarcorreo();
	?>
	
</body>
</html>
