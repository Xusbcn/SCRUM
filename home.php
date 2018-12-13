<?php

include('config.php');
include('session.php');

//include('proyecjSessions');
$userDetails=$userClass->userDetails($session_uid);
$nombres_de_proyectos=$projectsDetails=$userClass->projectsDetails($session_uid);
$rolDetails=$userClass->rolDetails($session_uid);
$rol=$rolDetails->rol;
//echo $rol;
echo "<p style='display:none' id='roles'>" . $rol. "</p>";
?>

<!DOCTYPE html>
<html>
<head>
	<!--<link  href="http://fonts.googleapis.com/css? family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">-->
	<link rel="stylesheet" type="text/css" href="css/codigo.css">
	<script type="text/javascript" src="prueba.js"></script>
	<link rel="stylesheet" type="text/css" href="prueba.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/materialize.min.js"></script>
	<title></title>


</head>
<body>
<div class="content">
<div id=contenedor-listado_proyectos>	

	<div id="error_proyecto"></div>

	<div class="contenedor_usurio">
		<div id="nombre_usuario"><h3 id="nombeUsuario"><?php echo $userDetails->name; ?></h3></div>
		<div id="icono_logout"><a href="<?php echo BASE_URL; ?>logout.php"><img src="css/images/salida.png"></a></div>
	</div>

	<div id="lista_proyectos">
		<div id="label_proyecto"><h3 id="listaID">PROYECTOS</h3></div>
		<div id=proyectos_creados>
		<?php for ($i=0; $i<count($nombres_de_proyectos);$i++)
			{
				$text = $nombres_de_proyectos[$i];
				echo "<a href='proyectos.php?nom=$text'>" .$nombres_de_proyectos[$i]. "</a>";
			}?>
		</div>
		<div id="id_boton" >
			
		</div>
		
		<div class="container" id="div_contenedor_form" hidden>
			<div class="row">
				<div class="col s4 m8 l12">
					<div class="card-panel light-blue lighten-5">
		<div id="contenedor-formulario">
		
		<div id="div_formulario">
			<form id="formulario" style="background: #8a2b0fd4;" method="post" action="prueba2.php">
				<div id="formulario_izquierda">
				</div>
				<div id="formulario_derecha">
				</div>
			</form>
		</div>
			
</div>
</div>
</div>
</div>
</div>
	</div>
</div>




<?php 
	   		$pdo = new PDO("mysql:host=localhost;dbname=scrum2","root","");		 
			// Prepare
			$consulta = $pdo->prepare("SELECT username FROM users where rol = 'ScrumMaster'");
			$consulta2 = $pdo->prepare("SELECT username FROM users where rol = 'ProductOwner'");
			$consulta3 = $pdo->prepare("SELECT username FROM users where rol = 'Developer'");
			// Excecute
			$consulta->execute();
			$consulta2->execute();
			$consulta3->execute();
			$respuesta = $consulta->fetch();
			$respuesta2 = $consulta2->fetch();
			$respuesta3 = $consulta3->fetch();
		 ?>





</div>

		
</body>
</html>


<script type="text/javascript">

			var jsvarbutton=document.getElementById('roles').innerHTML;
			console.log(jsvarbutton);

			function mostrarBoton(){
				if (jsvarbutton!="ScrumMaster"){
					document.getElementById('id_boton').style.display="none";
				}
				else{
					document.getElementById('id_boton').style.display="bock";
				}

			}

			mostrarBoton();

			
			//combobox scrum_master
			var select_combobox_scrum = document.createElement("select");
			select_combobox_scrum.setAttribute("id", "campo_scrum_master");
			select_combobox_scrum.setAttribute("name", "campo_scrum_master");
			select_combobox_scrum.setAttribute("required", "true");
			//opciones del combobox
			var opcion_por_defecto_scrum = document.createElement("option");
			opcion_por_defecto_scrum.setAttribute("value",'');
			var texto_opcion = document.createTextNode('Scrum_master');
			opcion_por_defecto_scrum.appendChild(texto_opcion);
			select_combobox_scrum.appendChild(opcion_por_defecto_scrum);
			<?php 
			while ($respuesta) {
				?>
				var opcion_combobox_scrum = document.createElement("option");
				opcion_combobox_scrum.setAttribute("value",'<?php echo "$respuesta[username]" ?>');
				var texto_opcion = document.createTextNode('<?php echo "$respuesta[username]" ?>');
				opcion_combobox_scrum.appendChild(texto_opcion);
				select_combobox_scrum.appendChild(opcion_combobox_scrum);
				<?php
			    $respuesta = $consulta->fetch();
			}
			?>
			document.getElementById("formulario_derecha").appendChild(select_combobox_scrum);
			document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
			//combobox product_owner
			var select_combobox_product = document.createElement("select");
			select_combobox_product.setAttribute("id", "campo_product_owner");
			select_combobox_product.setAttribute("name", "campo_product_owner");
			select_combobox_product.setAttribute("required", "true");
			//opciones del combobox
			var opcion_por_defecto_product = document.createElement("option");
			opcion_por_defecto_product.setAttribute("value",'');
			var texto_opcion = document.createTextNode('ProductOwner');
			opcion_por_defecto_product.appendChild(texto_opcion);
			select_combobox_product.appendChild(opcion_por_defecto_product);
			<?php 
			while ($respuesta2) {
				?>
				var opcion_combobox_product = document.createElement("option");
				opcion_combobox_product.setAttribute("value",'<?php echo "$respuesta2[username]" ?>');
				var texto_opcion = document.createTextNode('<?php echo "$respuesta2[username]" ?>');
				opcion_combobox_product.appendChild(texto_opcion);
				select_combobox_product.appendChild(opcion_combobox_product);
				<?php
			    $respuesta2 = $consulta2->fetch();
			}
			?>
			document.getElementById("formulario_derecha").appendChild(select_combobox_product);
			document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
			document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
			//checkbox developers
			<?php 
			while ($respuesta3) {
				?>
				var i=0;
				var checkboxDiv=document.createElement("div");
				checkboxDiv.setAttribute("id","checkboxDiv");
				var checkbox = document.createElement("input");
				checkbox.setAttribute("type","checkbox");
				checkbox.setAttribute("class","checkboxes");
				checkbox.setAttribute("value",'<?php echo "$respuesta3[username]" ?>');
				checkbox.setAttribute("name",'checkbox[]');
				document.getElementById("formulario_derecha").appendChild(checkbox);
				var checkbox_label = document.createElement("label");
				var texto_label = document.createTextNode('<?php echo "$respuesta3[username]" ?>')
				checkbox_label.appendChild(texto_label);
				checkbox_label.setAttribute("class","labels");
				document.getElementById("formulario_derecha").appendChild(checkbox_label);
				document.getElementById("formulario_derecha").appendChild(document.createElement("br"));
				<?php
			    $respuesta3 = $consulta3->fetch();
			}
			?>
		</script>
