<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	include("config.php");
	include('userClass.php');
	echo "<form action='formcorreo.php' method='POST' >";
	echo "<p>Introduce tu correo electronico: </p>";
	echo "<input type='text' name='mail'><br><br>";
	echo "<input type='submit'value='Enviar' name='send'>";
	echo "</form>";
	$error=0;
	$conn = mysqli_connect('localhost','xus','xus123');
	mysqli_select_db($conn, 'scrum2');
	$consulta = ("SELECT * FROM users;");
	$resultat = mysqli_query($conn, $consulta);
	$arrayMail=[];
	while( $emails = mysqli_fetch_assoc($resultat)){
		//print_r($emails["email"]);
		array_push($arrayMail,$emails["email"] );

	}
	if(isset($_POST["send"])){
		foreach ($arrayMail as $m) {
			if ($m==$_POST["mail"]) {
				enviarcorreo();
				
			}else{
				$error=1;
			}
	}
	}

	if ($error==1) {
		echo "Correo introducido no valido";
	}
	
	function enviarcorreo(){
		$consultaem = ("SELECT uid FROM users WHERE email = $_POST["mail"];");
		$resultatem = mysqli_query($conn, $consulta);
		$correo = $_POST["mail"];
		$titulo = "Recuperacion de contraseña";
		$mensaje = "http://ec2-54-158-157-91.compute-1.amazonaws.com/SCRUM/restablecerpss.php?userID=".$resultatem;
		mail($correo, $titulo,$mensaje);
		header("Location:index.php");
	}

	

	?>


</body>
</html>
