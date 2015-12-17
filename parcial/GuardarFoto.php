<?php
session_start();
require_once("clases/AccesoDatos.php");
require_once("clases/usuarios.php");

									//
	if(isset($_POST['correo']) && $_POST['nombre'] && isset($_POST['clave']) && isset($_POST['tipo']) && isset($_POST['idPERFIL']))
	{
		       
		$_SESSION['registrado']=$_POST['correo'];
		$email = $_POST['correo'];
		//
		$ruta=getcwd();  //ruta directorio actual
		$rutaDestino=$ruta."/Fotos/";
		$NOMEXT=explode(".", $_FILES['fichero0']['name']);
		$EXT=end($NOMEXT);
		$nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
		$rutaActual = $ruta."/FotosTemp/".$nomarch;
		$nuevoNombreDeFoto = $email.".".$EXT;
		//Renombro con el email/usuario
		     rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
		     $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
		     echo $nomarch;
		     echo "	</br>"; //
		     echo $rutaActual;
		     echo "	</br>";
		     echo $rutaDestino.$nuevoNombreDeFoto;
		     echo "	</br>";
		       //Muevo a carpeta Fotos
			rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
		      //

		    $usuario = new usuarios();
			$usuario->id=$_POST['idPERFIL'];
			$usuario->correo=$_POST['correo'];
			$usuario->nombre=$_POST['nombre'];
			$usuario->clave=$_POST['clave'];
			$usuario->tipo=$_POST['tipo'];

		    $usuario->foto=$nuevoNombreDeFoto;

		    $cantidad=$usuario->Guardar();
		    echo $cantidad;
			
		    echo "Foto Guardada con éxito en carpeta Fotos del servidor";
		        //Guardar usuario en BD
	}
		    
		else
		{
		   	echo "Error: Debe ingresar todos los campos";
		}

?>