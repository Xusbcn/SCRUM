<?php
if(!empty($_SESSION['uid']))
{
$session_uidP=$_SESSION['uid'];
include('userClass.php');
$userClass = new userClass();
}
if(empty($session_uid))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>