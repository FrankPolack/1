<?php
		include_once("clases/usuarios.php");
		include_once("clases/AccesoDatos.php");
		
		$resultado=usuarios::validarusuario("ale@admin.com.ar","123");
		var_dump($resultado);

?>