function BorrarUSUARIO(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarUSUARIO",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){

		console.log(retorno);
		Mostrar("MostrarGrilla");

	});

}

function EditarUSUARIO(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUSUARIO",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		
		var usuario =JSON.parse(retorno);	
		$("#idPERFIL").val(usuario.id);
		$("#nombre").val(usuario.nombre);
		$("#correo").val(usuario.correo);
		$("#clave").val(usuario.clave);
		if (usuario.tipo== "admin")
		    $('input:radio[name="tipo"][value="admin"]').prop('checked',true);
		else
			$('input:radio[name="tipo"][value="user"]').prop('checked',true);
		
		var file = $("#imagen")[0];
		file.src = "Fotos/" + usuario.foto;
		
		console.log(retorno);
	});
	
	Mostrar("MostrarFormAlta");
}

// function GuardarPERFIL()
// {
// 		var id=$("#idPERFIL").val();
// 		var nombre=$("#nombre").val();
// 		var correo=$("#correo").val();
// 		var clave=$("#clave").val();
// 		var tipo=$("input[name=tipo]:checked").val();
// 		var foto = $("#fichero")[0].files[0].name;
        	
//         var formData = new FormData($("#frmRegistro")[0]);	

// 		var funcionAjax=$.ajax({
// 		url:"nexo.php",
// 		type:"post",
// 		data:{
// 			queHacer:"GuardarPERFIL",
// 			id:id,
// 			nombre:nombre,
// 			correo:correo,
// 			clave:clave,
// 			tipo:tipo,
// 			foto:fichero	
// 		}
// 	});
// 	funcionAjax.done(function(retorno){

// 		console.log(retorno);

// 		subirFoto(formData);
// 		Mostrar("MostrarGrilla");	
// 	});
	
// }

// function subirFoto(formData){
	
// 	$.ajax({
// 	    url: 'subirFoto.php',  
// 	    type: 'POST',
// 	    data: formData,			    
// 	    cache: false,//Para subir archivos via ajax
// 	    contentType: false,//Para subir archivos via ajax
// 	    processData: false,//Para subir archivos via ajax
// 	    beforeSend: function(){
// 	        $("#mensaje").html("Subiendo imagen");			          
// 	    },
// 	    success: function(data){
// 	    	 console.log(data);
	        
// 	        if(data == "Correcto")
// 	        	alert("Imagen subida correctamente");
// 	        	else
// 	        	alert(data);
	        
// 	    },
// 	    error: function(data){
// 	    	console.log(data);
// 	        alert("Error al subir imagen");			        
// 	    }
// 	});
// }

