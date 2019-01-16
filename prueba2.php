<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

		if (isset($_POST["nombre"])){

			//Conexión para la consulta del MAX cod_project
			$conn = mysqli_connect('localhost','xus','xus123');
			mysqli_select_db($conn, 'scrum2');
			$consultaCod = ("SELECT MAX(cod_project)+10 as codigo FROM proj_users;");
			$resultatCod = mysqli_query($conn, $consultaCod);

			while ($row = mysqli_fetch_assoc($resultatCod)){
			    $codigo = $row['codigo'];
			}

			$nombre_proyecto = $_POST["nombre"];
			$campo_scrum_master = $_POST["campo_scrum_master"];
			$campo_product_owner = $_POST["campo_product_owner"];
			$descripcion_proj = $_POST["descripcion_proj"];
			$group = $_POST["group_name"];

			echo $nombre_proyecto;
			echo "<br>";
			echo $campo_scrum_master;
			echo "<br>";
			echo $campo_product_owner;
			echo "<br>";
			echo $numero_proyecto;
			echo "<br>";
			echo $group;
			echo "<br>";

			//Conexión para el insert en la tabla proj_users Scrum Master
			$conn1 = mysqli_connect('localhost','xus','xus123');
			mysqli_select_db($conn1, 'scrum2');

			$insertScrumMaster = ("INSERT INTO proj_users (id_proj_username, username, cod_project, name_proj) VALUES (LAST_INSERT_ID(), '".$campo_scrum_master."', '".$codigo."', '".$nombre_proyecto."')");
			mysqli_query($conn1, $insertScrumMaster);

			//Conexión para el insert en la tabla proj_users Product Owner
			$conn2 = mysqli_connect('localhost','xus','xus123');
			mysqli_select_db($conn2, 'scrum2');

			$insertProdOwner = ("INSERT INTO proj_users (id_proj_username, username, cod_project, name_proj) VALUES (LAST_INSERT_ID(), '".$campo_product_owner."', '".$codigo."', '".$nombre_proyecto."')");
			mysqli_query($conn2, $insertProdOwner);
			
			//Conexión para el insert en la tabla projects
			$conn3 = mysqli_connect('localhost','xus','xus123');
			mysqli_select_db($conn3, 'scrum2');

			$insertProject = ("INSERT INTO project (id_project, cod_project, name_project, description, product_owner, scrum_master, group_name, date_start, date_finish, comments, budget) VALUES (LAST_INSERT_ID(), '".$codigo."', '".$nombre_proyecto."', '".$descripcion_proj."', '".$campo_product_owner."', '".$campo_scrum_master."', '".$group."', null, null, null, null)");
			mysqli_query($conn3, $insertProject);
			
			//Vuelta al home.php después de los inserts
			header("Location:home.php");
		}
	?>
	
	<?php
		if (isset($_POST["FechaInicio"])){


			$numeroSprint = $_POST["numeroSprint"];
			$nombreSprint = $_POST["nombreSprint"];
			$fechaInicio = $_POST["FechaInicio"];
			$fechaFinal = $_POST["FechaFinal"];
			$horasTotales = $_POST["horasTotales"];

			$conn4 = mysqli_connect('localhost','xus','xus123');
				mysqli_select_db($conn4, 'scrum2');

				$insertSprint = ("INSERT INTO `sprints`(`id_sprint`, `cod_project`, `number_sprint`, `name_sprint`, `date_start`, `date_finish`, `total_hours`, `hours_left`) VALUES LAST_INSERT_ID(), 60, '".$numeroSprint."', '".$nombreSprint."', '".$fechaInicio."', '".$fechaFinal."', '".$horasTotales."', '".$horasTotales."')");
				mysqli_query($conn4, $insertSprint);

	?>

</body>
</html>