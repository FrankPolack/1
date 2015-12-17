<?php 

require_once("clases/AccesoDatos.php");
require_once("clases/usuarios.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formPerfil.php");
		break;

	case 'BorrarUSUARIO':
			$usuario = new usuarios();
			$usuario->id=$_POST['id'];
			$cantidad=$usuario->Borrar();
			echo $cantidad;	
		break;

	// case 'GuardarPERFIL':
	// 		$usuario = new usuarios();
	// 		$usuario->id=$_POST['id'];
	// 		$usuario->nombre=$_POST['nombre'];
	// 		$usuario->correo=$_POST['correo'];
	// 		$usuario->clave=$_POST['clave'];
	// 		$usuario->tipo=$_POST['tipo'];
	// 		//$usuario->foto=$_POST['fichero'];
	// 		$usuario->foto =$_POST['correo'].$_POST['fichero'];

	// 		$cantidad=$usuario->Guardar();
	// 		echo $cantidad;
	// 	break;

	case 'TraerUSUARIO':
			$resultado = usuarios::TraerUnUsuario($_POST['id']);		
			echo json_encode($resultado);
		break;

	default:
		# code...
		break;
}

 ?>