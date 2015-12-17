<?php 
session_start();
require_once("../clases/usuarios.php");//sube un nivel

$recordar=$_POST['recordarme'];

if(usuarios::validarusuario($_POST['usuario'],$_POST['clave']))
//if($_POST['usuario']=="ale@admin.com.ar" && $_POST['clave']=="1234")
{
			  //usuarioActual	
	$_SESSION['registrado']=$_POST['usuario'];

	if($recordar=="true")
	{
		setcookie("registro",$_POST['usuario'],  time()+36000 , '/');
		setcookie("clave",$_POST['usuario'],  time()+36000 , '/');
	}
	else
	{
		setcookie("registro",$_POST['usuario'],  time()-36000 , '/');
		setcookie("clave",$_POST['usuario'],  time()-36000 , '/');	
	}

	echo "correcto";
}
else
{
	echo "no-esta";
}


?>