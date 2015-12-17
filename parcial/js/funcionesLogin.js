 function validarLogin()
    {

        	var elUsuario=$("#correo").val(); //nombreUsuario
        	var laClave=$("#clave").val(); //claveUsuario
            var recordar=$("#recordarme").is(':checked');

        	var funcionAjax =$.ajax({
        		url:"php/validarUsuario.php", 
        		type:"post",
        		data:
        			{
        			usuario:elUsuario,
        			clave:laClave,
                    recordarme:recordar
        			}
        		});

        	funcionAjax.done(function(respuesta){
                
                console.log(respuesta); //para ver errores y lo q trae   
        		if(respuesta=="correcto") //!=no-esta .trim para sacar espacio
        		{
        			alert("Bienvenido");
					//$("#MensajeError").val("");
					//window.location.href="partes/formPerfil.php"; //"menu.php"; // vamos al menu
					MostarLogin();	
        		}
        		else
        		{
        			alert("No esta registrado");
        			//$("#MensajeError").val("NO esta registrado... ");

        			// mostrar mensaje "no esta en la base"
        			//vamos al registro
        			//window.location.href="registroJquery.php";
        		}
		});

    }

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){

			MostarLogin();
			
	});	
}


