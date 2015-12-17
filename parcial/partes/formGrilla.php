<?php 
session_start();

if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuarios.php");

	$arrayUsuario= usuarios::TraerUsuarios();

 ?>
<!--
<script type="text/javascript">
$("#content").css("width", "900px");
</script>
-->
<table class="table" style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Correo</th><th>Clave</th><th>Tipo</th><th>Foto</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayUsuario as $usuarios) {

	echo"<tr>
			<td><a onclick='EditarUSUARIO($usuarios->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			";
			 if($usuarios->tipo=="admin")
			 {
			 echo "<td><a onclick='BorrarUSUARIO($usuarios->id)' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>";
			 }
			 else
			 {
			  echo "<td> </td>";
			 }
			echo"
			<td>$usuarios->nombre</td>
			<td>$usuarios->correo</td>
			<td>$usuarios->clave</td>
			<td>$usuarios->tipo</td>
			<td><img src=Fotos/$usuarios->foto heigth=80 width=80></td> 
			<td>$usuarios->id</td>

		</tr>";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>