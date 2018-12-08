<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$projectsDetails=$userClass->projectsDetails($session_uid);
?>
<!DOCTYPE html>
<html>
<head>
	<link  href="http://fonts.googleapis.com/css? family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/codigo.css">
	<title></title>


</head>
<body>
	<div class="contenedor_proyectos">	
	
	<div id="error_proyecto"><h3>ERRORES</h3></div>

	<div class="contenedor_usurio">
		<div id="nombre_usuario"><h3 id="nombeUsuario"><?php echo $userDetails->name; ?></h3></div>
		<div id="icono_logout"><a href="<?php echo BASE_URL; ?>logout.php"><img src="css/images/salida.png"></div>
	</div>

	<div id="lista_proyectos">
		<div id="label_proyecto"><h3 id="listaID">LISTA DE PROYECTOS</h3></div>
		<ul>
		  <li>
		      <h2><?php echo $projectsDetails->name_proj;?></h2>
		  </li>
		</ul>
	</div>
</body>
</html>