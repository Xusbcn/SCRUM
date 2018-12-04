<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/codigo.css">
	<title></title>


</head>
<body>
	<div class="contenedor_proyectos">	
	
	<div id="error_proyecto"><h3>ERRORES</h3></div>

	<div class="contenedor_usurio">
		<div id="nombre_usuario"><h3><?php echo $userDetails->name; ?></h3></div>
		<div id="icono_logout"><img src="css/images/salida.png"></div>
	</div>

	<div id="lista_proyectos">
		<div id="label_proyecto"><h3>LISTA PROYECTOS</h3></div>
	</div>

	<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>

</body>
</html>