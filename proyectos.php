<?php
include('config.php');
include('session.php');

//include('proyecjSessions');
$userDetails=$userClass->userDetails($session_uid);

?>
<!DOCTYPE html>
<html>
<head>
	<!--<link  href="http://fonts.googleapis.com/css? family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">-->
	<link rel="stylesheet" type="text/css" href="css/codigo.css">
	<title></title>


</head>
<body>
<div>	

	<div id="error_proyecto"><h3>ERRORES</h3></div>

	<div class="contenedor_usurio">
		<div id="nombre_usuario"><h3 id="nombeUsuario"><?php echo $userDetails->name; ?></h3></div>
		<div id="icono_logout"><a href="index.php"><img src="css/images/salida.png"></a></div>
	</div>

	<div id="proyectoDetails">
		
		<?php echo $v1= $_GET['nom']; ?>

	</div>
</div>
</body>
</html>
