<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$projectDeveloper=$userClass->projectDeveloper($session_uid);
$nombre_usuario_proyecto=$userDetails->name;
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

	
<div id="marco_proyecto">
		<?php 
		$pdo=getDB();
		$sql="SELECT * from project WHERE cod_project IN (SELECT cod_project FROM proj_users WHERE name_proj='".$v1."' AND username IN (SELECT username FROM users WHERE name='".$nombre_usuario_proyecto."'))";
		foreach ($pdo->query($sql) as $row) {
        echo $row['id_project'] . "\t";
        echo $row['cod_project'] . "\t";
        echo $row['name_project'] . "\t";
        echo $row['description'] . "\t";
        echo $row['product_owner'] . "\t";
        echo $row['scrum_master'] . "\t";
        echo $row['group_name'] . "\t";
        echo $row['date_start'] . "\t";
        echo $row['date_finish'] . "\t";
        echo $row['comments'] . "\t";
    	}
		?>
	</div>


	<div id="marco_sprints">
		<?php 
		$pdo=getDB();
		$sql="SELECT * from sprints WHERE cod_project IN (SELECT cod_project FROM proj_users WHERE name_proj='".$v1."' AND username IN (SELECT username FROM users WHERE name='".$nombre_usuario_proyecto."'))";

		foreach ($pdo->query($sql) as $row) {
        echo $row['id_sprint'] . "\t";
        echo $row['cod_project'] . "\t";
        echo $row['number_sprint'] . "\t";
        echo $row['name_sprint'] . "\t";
        echo $row['date_start'] . "\t";
        echo $row['date_finish'] . "\t";
        echo $row['total_hours'] . "\t";
        echo $row['hours_left'] . "\t";
    	}
		?>
	</div>



	<div id="marco_specifications">
		<?php 
		$pdo=getDB();
		$sql="SELECT * from specifications WHERE cod_project IN (SELECT cod_project FROM proj_users WHERE name_proj='".$v1."' AND username IN (SELECT username FROM users WHERE name='".$nombre_usuario_proyecto."'))";

		foreach ($pdo->query($sql) as $row) {
        echo $row['id_specification'] . "\t";
        echo $row['cod_specification'] . "\t";
        echo $row['cod_project'] . "\t";
        echo $row['name_specification'] . "\t";
        echo $row['description'] . "\t";
        echo $row['comments'] . "\t";
        echo $row['hours'] . "\t";
        echo $row['date'] . "\t";
        echo $row['completed'] . "\t";
        echo '<br>';
    	}
		?>
	</div>
</div>
</body>
</html>
