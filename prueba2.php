<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

		if (isset($_POST["nombre"])){ 

			$nombre_proyecto = $_POST["nombre"];
			$campo_scrum_master = $_POST["campo_scrum_master"];
			$campo_product_owner = $_POST["campo_product_owner"];
			$numero_proyecto = $_POST["numero_proyecto"];
			$descripcion_proj = $_POST["descripcion_proj"];

			echo $nombre_proyecto;
			echo "<br>";
			echo $campo_scrum_master;
			echo "<br>";
			echo $campo_product_owner;
			echo "<br>";
			echo $numero_proyecto;
			echo "<br>";

			$radio = $_POST["checkbox"];
	                foreach ($radio as $key => $value) {
	                    echo "<br>$value";
	                }
	                
		 ?>

		<?php
			
		   	try {
		   		$pdo = new PDO("mysql:host=localhost;dbname=scrum2","xus","xus123");
		   		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sentencia = $pdo->prepare("INSERT INTO proj_users (id_proj_username, username,cod_project, name_proj) VALUES (:id_proj_username, :username, :cod_project, :name_proj)");
				$sentencia->bindParam(':id_proj_username', $id_incremental);
				$sentencia->bindParam(':username',$campo_scrum_master);
				$sentencia->bindParam(':cod_project', $numero_proyecto);
				$sentencia->bindParam(':name_proj', $nombre_proyecto);

				$id_incremental = "LAST_INSERT_ID()";
				$sentencia->execute();

				$sentencia = $pdo->prepare("INSERT INTO project VALUES (:id_project, :cod_project, :name_project, :description, :product_owner, :scrum_master, :date_start, :date_finish, :comments, :budget)");
				$sentencia->bindParam(':id_project', $id_incremental);
				$sentencia->bindParam(':cod_project',$numero_proyecto);
				$sentencia->bindParam(':name_project',$nombre_proyecto);
				$sentencia->bindParam(':description', $descripcion_proj);
				$sentencia->bindParam(':product_owner', $campo_product_owner);
				$sentencia->bindParam(':scrum_master', $campo_scrum_master);
				$sentencia->bindParam(':date_start', $vacio);
				$sentencia->bindParam(':date_finish', $vacio);
				$sentencia->bindParam(':comments', $vacio);
				$sentencia->bindParam(':budget', $vacio);

				$id_incremental = "LAST_INSERT_ID()";
				$vacio = "";
				$sentencia->execute();
			}
			 catch (PDOException $e) {
			    echo 'Falló la conexión: ' . $e->getMessage();
			}
		}
		else{
			echo "no has introducido datos";
		}
		//header("Location:home.php");
	?>

</body>
</html>