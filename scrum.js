<script type="text/javascript">


//document.getElementById("errorMsgs").style.display="none";	

function validate()
{
//cambiar();
 var error="";
 var error1="";
 var nameInput = document.getElementById('nickUser').value;
 var passInput = document.getElementById('nickPass').value;
 
 var namePhp = '<?php echo $errorMsg;?>';
 var passPhp = '<?php echo $errorMsg;?>';

 var divErrorUser=document.createElement('div');//contendra errores de usuario.
 var divErrorPass=document.createElement('div');//contendrá errores de password.

 var divImageErrorUser=document.createElement('div');//contendrá el icono de error.
 var divImageErrorPass=document.createElement('div');//contendrá el icono de error.
 var divParrafoUser=document.createElement('div');//contendrá el parrafo de error usuario.
 var divParrafoPass=document.createElement('div');//contendrá el parrafo de error password
 var divImageParrafoUser=document.createElement('div');
 var divImageParrafoPass=document.createElement('div');

//uso genérico
 var imageErrorUser=document.createElement('IMG');
 imageErrorUser.setAttribute("src", "css/images/cancelar.png");
 imageErrorUser.setAttribute("width", "20px");
 var imageErrorPass=document.createElement('IMG');
 imageErrorPass.setAttribute("src", "css/images/cancelar.png");
 imageErrorPass.setAttribute("width", "20px");
 

//error en al introducir usuario o mail.
	var parrafoUser=document.createElement('p');
	divParrafoUser.appendChild(parrafoUser);
	
	divParrafoUser.classList.add("text");
	divImageErrorUser.appendChild(imageErrorUser);
 	divImageErrorUser.classList.add("parpadea");
 	divImageErrorUser.classList.add("icono");
	divImageParrafoUser.appendChild(divImageErrorUser);
	divImageParrafoUser.appendChild(divParrafoUser);
	divImageParrafoUser.classList.add("contenedor");


//error en al introducir la contraseña..
	var parrafoPass=document.createElement('p');
	divParrafoPass.appendChild(parrafoPass);
	divParrafoPass.classList.add("text");
	divImageErrorPass.appendChild(imageErrorPass);
	divImageErrorPass.classList.add("parpadea");
 	divImageErrorPass.classList.add("icono");
	divImageParrafoPass.appendChild(divImageErrorPass);
	divImageParrafoPass.appendChild(divParrafoPass);
	divImageParrafoPass.classList.add("contenedor");
	
 

 if( nameInput== "" )
 {
  errorUser = document.createTextNode("Introduce un usuario o email.");
  parrafoUser.appendChild(errorUser);
 // divErrorUser.appendChild(divImageParrafoUser);
  document.getElementById("errorMsgs").appendChild(divImageParrafoUser);
  document.getElementById("errorMsgs").style.display="block";
 //return false;
 }
 if( passInput== "" )
 {
  errorPass = document.createTextNode("Introduce una contraseña");
  parrafoPass.appendChild(errorPass);
  //divErrorPass.appendChild(divImageParrafoPass);
  document.getElementById( "errorMsgs" ).appendChild(divImageParrafoPass);
  document.getElementById("errorMsgs").style.display="block";
 // return false;
 }
 if(namePhp=='true' && nameInput!= "" )
 {
 	errorUser = document.createTextNode("'<?php echo $errorMsgLoginUsername;?>'");
  	parrafoUser.appendChild(errorUser);
 // divErrorUser.appendChild(divImageParrafoUser);
  	document.getElementById("errorMsgs").appendChild(divImageParrafoUser);
  	document.getElementById("errorMsgs").style.display="block";
 }
 if(passPhp=='true' && passInput!= "" )
 {

  errorPass = document.createTextNode("'<?php echo $errorMsgLoginPass;?>'");
  parrafoPass.appendChild(errorPass);
  //divErrorPass.appendChild(divImageParrafoPass);
  document.getElementById( "errorMsgs" ).appendChild(divImageParrafoPass);
  document.getElementById("errorMsgs").style.display="block";
 // return false;
  	//return false;
 }
 	return false;
}

</script>



public function projectsDetails($uid)
{
$sql="SELECT name_proj FROM proj_users WHERE username IN (SELECT username FROM users where uid=:uid)";
try{
$db = getDB();
$stmt = $db->prepare( $sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL)); 
$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
$stmt->execute();
while ($fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      $datos = $fila[0] ."\n";
      var_dump($datos);
    }
    $stmt = null;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}






public function projectsDetails($uid)
{
try{
$db = getDB();
$stmt = $db->prepare("SELECT name_proj FROM proj_users WHERE username IN (SELECT username FROM users where uid=:uid)"); 
$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
return $data;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}