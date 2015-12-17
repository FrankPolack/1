<?php
include_once("AccesoDatos.php");
class usuarios
{
	public $id;
	public $nombre;
 	public $correo;
 	public $clave;
 	public $tipo;
 	public $foto;

 		public static function validarusuario($usuario,$clave) //cuando algo tiene param siempre es estatico
     	{
           //$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 						//mail
           //$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuario where correo=? and clave=?");
           //$consulta->execute(array($usuario, $clave)); 
           
           //this instancia self estatico
     		$usuarioBuscado= self::TraerUnUsuarioPorNombre($usuario); 
            //$cuenta = $objetoAccesoDato->RetornarConsulta->rowCount();
            //echo "cuenta; $cuenta";
            if ($usuarioBuscado and $usuarioBuscado->clave==$clave) 
             return true;
            else
         	 return false;    
     	}

     	public static function TraerUnUsuarioPorNombre($nombre) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from usuario where correo = ?");
			$consulta->execute(array($nombre));				 
			$usuarioBuscado= $consulta->fetchObject('usuarios');
			return $usuarioBuscado;			
		}

  		public static function TraerUsuarios()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
			$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuario");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
		}

		public function ModificarUsuarios()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
			   "UPDATE usuario 
				set 
				nombre='$this->nombre',
				correo='$this->correo',
				clave='$this->clave',
				tipo='$this->tipo',
				foto='$this->foto'	
				WHERE id='$this->id'");
			return $consulta->execute();
			// 	return true;
			// else
			// 	return false;
		 }
	
  
		 public function InsertarUsuarios() //si le pongo static no hace falta poner this
		 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,correo,clave,tipo,foto)
													values('$this->nombre','$this->correo','$this->clave','$this->tipo','$this->foto')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		 }

		 public function Guardar()
		 {
		 	//echo $this->id."id-guardar<br>";
		 	if($this->id > 0)
		 		{
		 			$this->ModificarUsuarios();
		 			//echo "-mod";
		 		}else {
		 			$this->InsertarUsuarios();
		 			//echo "-ins";
		 		}
		 }

		 public function Borrar()
		 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
			   "DELETE 
				from usuario 				
				WHERE id=:id");	
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
		 }

		public static function TraerUnUsuario($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuario where id = $id");
			$consulta->execute();				 
			$votoBuscado= $consulta->fetchObject('usuarios');
			return $votoBuscado;			
		}

}
//usuarios::validarusuario("ale@admin.com.ar","1234"); //esto es para probar si anda

// $usuario = new usuarios();
// $usuario->id= 14;
// $usuario->correo= "aa@fasf";
// $usuario->nombre= "aleee";
// $usuario->clave= 105234;
// $usuario->tipo= "admin";
// $usuario->foto= "a@fasf.jpg";
// $cantidad=$usuario->ModificarUsuarios();//Guardar();


?>