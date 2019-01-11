<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" >
		Introduce la nueva contraseña:<br>
		<input type="text" name="pass1"><br>
		Vuelve a introducir la nueva contraseña:<br>
		<input type="text" name="pass2"><br>
		<input type="submit" name="btsubmit" value="enviar">

	</form>
	<?php 
		print_r($_SESSION["correo"]);
	 ?>

</body>
</html>