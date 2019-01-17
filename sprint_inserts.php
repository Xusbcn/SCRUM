<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if (isset($_POST["FechaInicio"])){

			$nameProyecto = $_POST["nombreProyecto"];
			$numeroSprint = $_POST["numeroSprint"];
			$nombreSprint = $_POST["nombreSprint"];
			$fechaInicio = $_POST["FechaInicio"];
			$fechaFinal = $_POST["FechaFinal"];
			$horasTotales = $_POST["horasTotales"];

			$conn5 = mysqli_connect('localhost','xus','xus123');
			mysqli_select_db($conn5, 'scrum2');

			$consultaCod = ("SELECT cod_project as codigoProyecto FROM project WHERE name_project = '".$nameProyecto."'");
			$resCod = mysqli_query($conn5, $consultaCod);

			var_dump($consultaCod);

			while ($row = mysqli_fetch_assoc($resCod)){
			    $Codigo = $row['codigoProyecto'];
			}

			$conn4 = mysqli_connect('localhost','xus','xus123');
				mysqli_select_db($conn4, 'scrum2');

				$insertSprint = ("INSERT INTO sprints (id_sprint, cod_project, number_sprint, name_sprint, date_start, date_finish, total_hours, hours_left) VALUES (LAST_INSERT_ID(), '".$Codigo."', '".$numeroSprint."', '".$nombreSprint."', '".$fechaInicio."', '".$fechaFinal."', '".$horasTotales."', '".$horasTotales."');");
				mysqli_query($conn4, $insertSprint);

				var_dump($insertSprint);
		}
	?>
</body>
</html>