
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<html>
<head>
  <title></title>

<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.js"></script> 
<script src="js/jsRegistroJquery.js"></script>

</head>
<body>

<?php 
session_start();

if(isset($_SESSION['registrado'])){  ?>

    <div class="container">

    <form id="frmRegistro" class="form-ingreso"> <!--onsubmit="GuardarPERFIL();return false"> <!action="GuardarFoto.php"-->

        <h2 class="form-ingreso-heading"></h2>
         
        <label for="nombre" class="sr-only">Nombre de usuario</label>
        <input type="text"  id="nombre" class="form-control" placeholder="Nombre" > <!--required campo obligatorio -->
        
        <label for="correo" class="sr-only">Correo</label> <!--que sea de type email es lo q verifica si esta bien ing el correo--> 
        <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" > 
        
        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" >

        <input type="radio" name="tipo" id="tipo" value="admin" checked>admin
        <input type="radio" name="tipo" id="tipo" value="user">user <br>
         
        Foto<input class="form-control btn btn-info"  name="fichero" type="file" id="fichero">
        <span id="error" class='error1' style="display: none;"></span>
        Preview<img  name="imagen" id="imagen" src="" alt="Imagen aqui" width="280" height="250">
         
       <input readonly type="hidden" id="idPERFIL" class="form-control" ><br><br>
       <!--text -->
        <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>

      </form>

    <div id="mensaje" style="display: none;">&nbsp;</div> <!-- /container -->

  <?php }else{  echo"<h3>No estas registrado. </h3>"; } ?>         

</body>
</html>

  
