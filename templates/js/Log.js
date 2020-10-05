//javascript para LogIn
function login_user(){
    
    //validar datos
	if(validateDataLogin())
	{
	    $("#response").html("<div class='spinner-border text-dark'></div>");
	    //datos a enviar
	send_form = new FormData();
	send_form.append('user', $("#user").val());
	send_form.append('pass', $("#pass").val());
	$.ajax({
		type:'POST',
		url:'templates/filters/filterLogin.php?LogIn=1',
		data:send_form,
		cache:false,
		processData:false,
		contentType:false,
		beforeSend:function(){
			// debug.log("Momento por favor");
		},
		success:function(e){
			// respuesta desde filterLogin
	           //alert(e)          
				if(String(e).indexOf("denegado") != -1)
				{		//si respuesta acceso denegado				
					$("#response").html("")
					$("#response").html("Datos de acceso incorrectos")
					$("#response").fadeIn()
					$("#response").css("background-color","#F48A73")
				}
				else
				{ 	//si respuesta usuario inactivo	
					if(String(e).indexOf("Inactivo") != -1)
				{						
					$("#response").html("")
					$("#response").html("Usuario inactivo")
					$("#response").fadeIn()
					$("#response").css("background-color","#F48A73")
				}
                    
                   	//si respuesta ERROR	
					else if(String(e).indexOf("ERROR") != -1){
					$("#response").html("")
					$("#response").html("No hay conexión con el servidor de base de datos")
					$("#response").fadeIn()
					$("#response").css("background-color","#F48A73")
					}
					else{
							//si respuesta acceso exitoso	
					var respuesta=JSON.parse(e)
					
					if(String(respuesta[0]).indexOf("exitoso") != -1){
					$("#response").html("")
					$("#response").html("Acceso exitoso")
					$("#response").fadeIn()
					$("#response").css("background-color","#C3E98D")
					window.location.href="index.php";
					//location.reload()
								 

					   }
				}


				}
	  	
		}
	});
}
}

/*-------------------------------------------------------------------------------------*/
/*FUCTION-6:VALIDAR DATOS LOGIN-----*/
/*-------------------------------------------------------------------------------------*/
function validateDataLogin(){
ban=true
 emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
 if(!emailRegex.test($("#user").val()))
	{

$("#response").html("")		
$("#response").html("Correo inválido")
$("#response").fadeIn()
$("#response").css("background-color","#FBD9B6") 
ban=false
	}
else if($("#user").val()=="" || $("#pass").val()=="")
{
$("#response").html("")
$("#response").html("Debe digitar los datos")
$("#response").fadeIn()
$("#response").css("background-color","#FBD9B6")

ban=false
}


return ban
}
function validateDataLogin2(){
ban=true
 emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
 if(!emailRegex.test($("#user").val()))
	{

$("#response").html("")		
$("#response").html("Correo inválido")
$("#response").fadeIn()
$("#response").css("background-color","#FBD9B6") 
ban=false
	}


return ban
}
function reset(){
    $("#response").html("")	
    $("#response").css("background-color","transparent") 
    
}

function restore(){
    
    
    
    //validar datos
	if(validateDataLogin2())
	{
	    $("#response").html("<div class='spinner-border text-dark'></div>");
	    //datos a enviar
	send_form = new FormData();
	send_form.append('user', $("#user").val());
	$.ajax({
		type:'POST',
		url:'templates/filters/filterLogin.php?LogIIn=1',
		data:send_form,
		cache:false,
		processData:false,
		contentType:false,
		beforeSend:function(){
			// debug.log("Momento por favor");
		},
		success:function(e){
			// respuesta desde filterLogin
	            	if(String(e).indexOf("enviada")==-1)
					{
						$("#response").css("background-color","#F48A73")
					}	
					else
					{
					   	$("#response").css("background-color","#C3E98D") 
					}
								
					$("#response").html(String(e))
					$("#response").fadeIn()
				}

	  	
		});
}
}

function Enter(e){

	var key = e.which;
  if(key == 13)  // the enter key code
   {login_user()}
 
}