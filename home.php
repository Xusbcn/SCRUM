<?php
include('config.php');
include('session.php');
//include('proyecjSessions');
$userDetails=$userClass->userDetails($session_uid);
$nombres_de_proyectos=$projectsDetails=$userClass->projectsDetails($session_uid);

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
		<div id="icono_logout"><a href="<?php echo BASE_URL; ?>logout.php"><img src="css/images/salida.png"></a></div>
	</div>

	<div id="lista_proyectos">
		<div id="label_proyecto"><h3 id="listaID">PROYECTOS</h3></div>
		<?php for ($i=0; $i<count($nombres_de_proyectos);$i++)
			{
				$text = $nombres_de_proyectos[$i];
				echo "<a href='proyectos.php?nom=$text'>" .$nombres_de_proyectos[$i]. "</a>";
			}?>
		
	</div>
</div>
</body>
</html>

