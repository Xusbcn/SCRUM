
<?php
session_start();
include("config.php");
include('userClass.php');
$userClass = new userClass();

$errorMsgReg=false;
$errorMsgLoginUsername='';
$errorMsgLoginPass='';



/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
	$usernameEmail=$_POST['usernameEmail'];
	$password=$_POST['password'];

	//echo $usernameEmail;
	
	
	if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
	{
		$uid=$userClass->userLogin($usernameEmail,$password);
		if($uid)
		{
		$url=BASE_URL.'home.php';
		header("Location: $url"); // Page redirecting to home.php 
		}
		else
		{
		 $errorMsg='true';	
		 echo $errorMsgLoginUsername="El usurio o mail introducidos no se encuentra en nuestar bases de datos.";

		 echo $errorMsgLoginPass="La contraseña introducida no se encuentra en la bases de datos.";
		 
		}
	}
	
}


/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
$username=$_POST['usernameReg'];
echo $username;
$email=$_POST['emailReg'];
echo $email;
$password=$_POST['passwordReg'];
echo $password;
$name=$_POST['nameReg'];
/* Regular expression check */
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);// ha de ser entre 6 y 20 caracteres

if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
{ 
	
$uid=$userClass->userRegistration($username,$password,$email,$name);
if($uid)
{
$url=BASE_URL.'proyectos.html';
header("Location: $url"); // Page redirecting to home.php 
}
else
{
$errorMsgReg="Username or Email already exists.";
}
}
}
?>






<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/codigo.css">

	<title></title>


</head>
<body>

<div id="errorMsgs"></div>
 
<div id="login">
<h3>Login</h3>
<form method="post" action="" onsubmit="return validate()" name="login">
<label>Username or Email</label>
<input type="text" id="nickUser" name="usernameEmail" autocomplete="off" />
<label>Password</label>
<input type="password" id="nickPass" name="password" autocomplete="off"/>
<div class="botones">
<input type="submit" class="button" name="loginSubmit" value="Login"/>
<input type="submit" class="button" name="reload" value="Try Again" onClick="location.reload();"/>
</div>
</form>
</div>



<div id="signup">
<h3>Registration</h3>
<form method="post" action="" name="signup">
<label>Name</label>
<input type="text" name="nameReg" autocomplete="off" />
<label>Email</label>
<input type="text" name="emailReg" autocomplete="off" />
<label>Username</label>
<input type="text" name="usernameReg" autocomplete="off" />
<label>Password</label>
<input type="password" name="passwordReg" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input type="submit" class="button" name="signupSubmit" value="Signup">
</form>
</div>


</body>
<script type="text/javascript">


//document.getElementById("errorMsgs").style.display="none";	

function validate()
{
//cambiar();
 var error="";
 var error1="";
 var nameInput = document.getElementById('nickUser').value;
 var passInput = document.getElementById('nickPass').value;
 



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
 
}

</script>


</html>
