
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>

    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarLogin();return false;">

        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>

        <label for="correo" class="sr-only">Correo electrónico</label>
        <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" required="" autofocus=""
         value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>"> <!--esto llama a la setcookie -->

        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" required=""
        value="<?php  if(isset($_COOKIE["clave"])){echo $_COOKIE["clave"];}?>">

        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordarme
          </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      
      <p>ale@admin.com.ar</p>
      <p>1234</p>
      
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta registrado. </h3>";?>    
       
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Cerrar Sesion</button>
 
  <?php  }  ?>
    
  
