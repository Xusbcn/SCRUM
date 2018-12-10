<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	//he tenido que hacer en el phpmyadmin
	/*
	INSERT INTO `users`(`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES (11,'jmartinez','1234','Developer','Jordi','martinez','ssa@a',123)
	INSERT INTO `proj_users`(`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES (5,'jmartinez','30','qui2')
	INSERT INTO `project`(`id_project`, `cod_project`, `name_project`, `description`, `product_owner`, `scrum_master`, `date_start`, `date_finish`, `comments`, `budget`) VALUES (3,30,'nombre_proy','descripcion','emieza','lzabala',now(),now(),'xcomentario',1000)
	*/

		$nombre_proyecto = $_POST["nombre"];
		$campo_scrum_master = $_POST["campo_scrum_master"];
		$campo_product_owner = $_POST["campo_product_owner"];
		$numero_proyecto = $_POST["numero_proyecto"];

		
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
		$sentencia = $mbd->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
		$sentencia->bindParam(':name', $nombre);
		$sentencia->bindParam(':value', $valor);

		// insertar una fila
		$nombre = 'uno';
		$valor = 1;
		$sentencia->execute();

		// insertar otra fila con diferentes valores
		$nombre = 'dos';
		$valor = 2;
		$sentencia->execute();


		$sentencia = $mbd->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
		$sentencia->bindParam(':name', $nombre);
		$sentencia->bindParam(':value', $valor);

		// insertar una fila
		$nombre = 'uno';
		$valor = 1;
		$sentencia->execute();

		// insertar otra fila con diferentes valores
		$nombre = 'dos';
		$valor = 2;
		$sentencia->execute();
	?>

</body>
</html>