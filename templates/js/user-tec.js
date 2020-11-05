// ----------------------------------------------------------------------
//►Titulo: USUARIO TECNICO
// ----------------------------------------------------------------------
//=======================================================//
//FUNCIONES - NODO CONVOCATORIAS
//=======================================================//
/*FUNCION: Crea una Nueva Convocatoria*/
function add_announcement(){
	// Contador de inputs
	var inps_cont = 0;
	// Identificar Inputs
	var inps_form = document.querySelectorAll(".inps-forms");
	// Recorrer inputs
	for(i=0; i < inps_form.length; i++){
		// Si esta vacio o es none
		if(inps_form[i].value == "" || inps_form[i].value == "none"){
		 	message = '<p class="mt-4">Completa todos los campos del formulario</p>';
			alerts_tec(message);
		 	inps_form[i].style.borderColor = "red";
			return false;
		}else{
			inps_cont++;
		 	inps_form[i].style.borderColor = "#00aef1";
		}
	}//End For
	// Campos Opcionales
	if($("#url-conv").val() == ""){
		url_conv = "Sin Pagina";
	}else{
		url_conv = $("#url-conv").val();
	}
	// Validar Fechas ------------------------------
	// Contador Fechas
	fecs_cont = 0;
	fec_today = new Date();
	// Fecha de incio
	fec_start = new Date(inps_form[3].value);
	// Fecha de Cierre
	fec_end = new Date(inps_form[4].value);
	// Validar si lña Fecha de cierre es menor a la de hoy
	if(fec_end.getTime() < fec_today.getTime()){
		// Mensaje
		message = '<p class="mt-2">La fecha de CIERRE no puede ser una fecha anterior a la fecha de HOY.</p>';
		alerts_tec(message);
		inps_form[4].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[4].style.borderColor = "#00aef1";
		fecs_cont++;
	}
	if(fec_end.getTime() < fec_start.getTime()){
		// Mensaje
		message = '<p class="mt-2">La fecha de INICIO no puede ser una fehca posterior a la fecha de CIERRE.</p>';
		alerts_tec(message);
		inps_form[3].style.borderColor = "red";		
		return false;
	}else{
		inps_form[3].style.borderColor = "#00aef1";
		fecs_cont++;
	}
	// Validar Contadores
	if(inps_cont == 5 && fecs_cont == 2){
		// Envio de Ajax Objeto Request
		request = new Request();
		// Url
		request.s_url = "fil-tec";
		// Configuracion
		request.s_config = ["POST", false, false, false, "json"];
		// Permiso
		request.s_permision = ["tec-add-conv", 1];
		// Datos de Envio
		request.s_dataSend = [
			{"name":"titulo","values":inps_form[0].value},
			{"name":"descripcion","values":inps_form[1].value},
			{"name":"entidad","values":inps_form[2].value},
			{"name":"start-fec","values":inps_form[3].value},
			{"name":"end-fec","values":inps_form[4].value},
			{"name":"url-conv","values":url_conv},
		];
		// Proceso de respuesta
		request.s_actions = function(r){
			if(r == "success"){
				// Convocatoria Creada
				// Mensaje
				message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>La Convocatoria ha sido Creada!!!</h6>";
				alerts_tec(message);
				document.getElementById("deft-conv").click();

			}else if(r == "error"){
				// Error de Peticion
				alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
				location.reload();
			}
		}
		// Ejecutar Envio
		request.request_operation();
	}else{
		// Error de Peticion
		alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
		//location.reload();
	}
}
function upd_announcement(){
	// Contador de inputs
	var inps_cont = 0;
	// Identificar Inputs
	var inps_form = document.querySelectorAll(".inps-forms");
	// Recorrer inputs
	for(i=0; i < inps_form.length; i++){
		// Si esta vacio o es none
		if(inps_form[i].value == "" || inps_form[i].value == "none"){
			if(i==0)
				message = '<p class="mt-4">Seleccione una convocatoria</p>';
			else
		 	message = '<p class="mt-4">Completa todos los campos del formulario</p>';
			
			alerts_tec(message);
		 	inps_form[i].style.borderColor = "red";
			return false;
		}
	}//End For
	// Campos Opcionales
	if($("#url-conv").val() == ""){
		url_conv = "-";
	}else{
		url_conv = $("#url-conv").val();
	}
	// Validar Fechas ------------------------------
	// Contador Fechas
	fecs_cont = 0;
	fec_today = new Date();
	// Fecha de incio
	fec_start = new Date(inps_form[4].value);
	// Fecha de Cierre
	fec_end = new Date(inps_form[5].value);
	// Validar si lña Fecha de cierre es menor a la de hoy
	if(fec_end.getTime() < fec_today.getTime()){
		// Mensaje
		message = '<p class="mt-2">La fecha de CIERRE no puede ser una fecha anterior a la fecha de HOY.</p>';
		alerts_tec(message);
		inps_form[5].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[5].style.borderColor = "#00aef1";
		fecs_cont++;
	}
	if(fec_end.getTime() < fec_start.getTime()){
		// Mensaje
		message = '<p class="mt-2">La fecha de INICIO no puede ser una fehca posterior a la fecha de CIERRE.</p>';
		alerts_tec(message);
		inps_form[4].style.borderColor = "red";		
		return false;
	}else{
		inps_form[4].style.borderColor = "#00aef1";
		fecs_cont++;
	}
	// Validar Contadores
	
		// Envio de Ajax Objeto Request
		request = new Request();
		// Url
		request.s_url = "fil-tec";
		// Configuracion
		request.s_config = ["POST", false, false, false, "json"];
		// Permiso
		request.s_permision = ["tec-upd-conv", 1];
		// Datos de Envio
		request.s_dataSend = [
			{"name":"titulo","values":inps_form[1].value},
			{"name":"descripcion","values":inps_form[2].value},
			{"name":"entidad","values":inps_form[3].value},
			{"name":"start-fec","values":inps_form[4].value},
			{"name":"end-fec","values":inps_form[5].value},
			{"name":"url-conv","values":url_conv},
			{"name":"cod","values":inps_form[0].value},
		];
		// Proceso de respuesta
		request.s_actions = function(r){
		
			if(r == "success"){
				// Convocatoria Creada
				// Mensaje
				message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>Datos modificados</h6>";
				alerts_tec(message);
        convo_fun(3, $("#btnlist"))				

			}else if(r == "error"){
				// Error de Peticion
				alert('Error al modificar');
				//location.reload();
			}
		}
		// Ejecutar Envio
		request.request_operation();
}
/*FUNCION: Listado de Convocatorias*/
function list_announcements(){
	// Objeto Request
	request = new Request();
	// Url
	request.s_url = "fil-tec"
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['tec-list-convos', 1];
	// Acciones
	request.s_actions = function(r){
		// Validar Respuestas
		if(r == "error"){
			// Error de Peticion
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		}else if(r == "no-data"){
			$("#list-convos-spinner").remove();
			// No hay datos
				// Mensaje
				message = "<h4 style='color:#FFC923' class='mt-4'>No se encontraron datos.</h4>";
				alerts_tec(message);
		}else{
			setTimeout(function(){
				// Remover spinner
				$("#list-convos-spinner").remove();
				// Insertar datos
				for(i=0; i<r.length; i++){
					// Agregar registros a la tablaa
          var url="<a href='"+r[i].url+"' target='_blank'>"+String(r[i].url)+"</a>";
					if(url.indexOf("http")==-1)
						url="-"
					$("#bd-list-convos").append(''+
						'<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+r[i].nombre+'</td>'+
							'<td style="display:none;">'+r[i].descripcion+'</td>'+
							'<td>'+r[i].fecha_ini+'</td>'+
							'<td>'+r[i].fecha_fin+'</td>'+
							'<td>'+r[i].entidad+'</td>'+
							'<td>'+url+'</td>'+
							'<td style="display:none;">'+r[i].url+'</td>'+
							'<td class="text-center">'+
								'<div class="btn-group">'+
									'<i class="fas fa-pencil-alt icon_sesion" onclick="editarConvo('+r[i].id+','+(i+1)+')"> </i>'+
									'<i class="fas fa-trash-alt icon_sesion"  onclick="DeleteConvo('+r[i].id+')"></i>'+
								'</div>'+
							'</td>'+
						'</tr>');
				}
			},200)
		}					
	}
	// Ejecutar Peticion
	request.request_list();
}

function list_announcements2(){
	// Objeto Request
	request = new Request();
	// Url
	request.s_url = "fil-tec"
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['tec-list-convos', 1];
	// Acciones
	request.s_actions = function(r){
		// Validar Respuestas
		if(r == "error"){
			// Error de Peticion
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		}else if(r == "no-data"){
			$("#list-convos-spinner").remove();
			// No hay datos
				// Mensaje
				message = "<h4 style='color:#FFC923' class='mt-4'>No se encontraron datos.</h4>";
				alerts_tec(message);
		}else{
			setTimeout(function(){
				// Remover spinner
				$("#list-convos-spinner").remove();
				// Insertar datos
				for(i=0; i<r.length; i++){
					// Agregar registros a la tablaa
          var url="<a href='"+r[i].url+"' target='_blank'>"+String(r[i].url)+"</a>";
					if(url.indexOf("http")==-1)
						url="-"
					$("#bd-list-convos").append(''+
						'<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+r[i].nombre+'</td>'+
							'<td style="display:none;">'+r[i].descripcion+'</td>'+
							'<td>'+r[i].fecha_ini+'</td>'+
							'<td>'+r[i].fecha_fin+'</td>'+
							'<td>'+r[i].entidad+'</td>'+
							'<td>'+url+'</td>'+
							'<td style="display:none;">'+r[i].url+'</td>'+
							'<td class="text-center">'+
								'<div class="btn-group">'+
									'<i class="fas fa-search icon_sesion" onclick="editarConvo('+r[i].id+','+(i+1)+')"> </i>'+
								'</div>'+
							'</td>'+
						'</tr>');
				}
			},200)
		}					
	}
	// Ejecutar Peticion
	request.request_list();
}

/*FUNCION: Activa elementos de criterios*/
function evaluation_crit(obj){
	switch(obj){
		case 1:
			$("#radio-clase-crit").fadeIn("slow");
			$("#radio-cate-crit").fadeIn("slow");
			$("#radio-tipo-crit").fadeIn("slow");
		break;

		case 2: // CONFIGURACION CUANTI
			// Encender contenedor Configuracion
			$("#config-crits").fadeIn("slow");
			// Eliminar cuali
			$("#crits-cuali").remove();
			// Insrtar Caunti
			$("#config-title").after(''+
					'<div id="crits-cuanti">'+
						'<p class="">Los criterios cuantitativos estan configurados por un criterio general y una cantidad determinada de sub criterios. <br>Cada criterio general es medido por la cantidad de sus subcriterios que lo conforman.</p>'+
						'<div class="input-group mb-3">'+
				      '<div class="input-group-prepend">'+
				        '<span class="input-group-text text-cuanti">Cantidad de criterios generales:</span>'+
				      '</div>'+
				      '<input type="number" class="form-control inps-forms" placeholder="??">'+
				      '<div class="input-group-prepend">'+
				        '<span class="input-group-text text-cuanti">Cantidad de subcriterios para cada criterio general</span>'+
				      '</div>'+
				      '<input type="number" class="form-control inps-forms" placeholder="??">'+
				    '</div>'+
				    '<div class="text-center mt-2">'+
				    	'<button class="btn-functions" onclick="evaluation_crit(4)">Generar Criterios</button>'+
				    	'<button class="btn-functions restart-crits" onclick="evaluation_crit(6)">Reiniciar</button>'+
				    '</div>'+
						'<div id="generate-crits"></div>'+
					'</div>'
				);
				// Desactivar Radios
				$("div.box-radios input").attr("disabled","true");
		break;

		case 3: //CONFIGURACION CUALI
			// Encender contenedor Configuracion
			$("#config-crits").fadeIn("slow");
			// Eliminar cuanti
			$("#crits-cuanti").remove();
			// Insertar Cuali
			$("#config-title").after(''+
					'<div id="crits-cuali">'+
						'<p class="">Los criterios cualitativos estan configurados por dos tipos de seleccion:<br>'+
						'Ej: Cumple / No Cumple, Falso / Verdadero, Si / No <br>Pero con una sola respuesta correcta.'+
						'</p>'+
						'<div class="input-group mb-3 d-flex">'+
							'<div class="input-group-prepend">'+
								'<span class="input-group-text text-cuanti">Cantidad:</span>'+
							'</div>'+
							'<input type="number" class="form-control inps-forms" placeholder="??">'+
						'</div>'+
						'<div class="text-center mt-2">'+
				    	'<button class="btn-functions" onclick="evaluation_crit(5)">Generar Criterios</button>'+
				    	'<button class="btn-functions restart-crits" onclick="evaluation_crit(6)">Reiniciar</button>'+
				    '</div>'+
						'<div id="generate-crits"></div>'+
					'</div>'
				);
			
			// Desactivar Radios
			$("div.box-radios input").attr("disabled","true");
		break;

		case 4: // GENERAR CRITERIOS CUANTITATIVOS
			// Limpiar anteriores
			$("#generate-crits").empty();
			// Desactivar Radios
			$("div.box-radios input").attr({"disabled":"true"});
			// Tomar inputs
			inps = $(".inps-forms");
			cont_inps = 0;
			// Recorrer
			for(i=0; i<inps.length; i++){
				// Validar Inputs
				if(inps[i].value == ""){
					// Mensaje
					inps[i].placeholder = "Completa este campo";
					inps[i].focus();
					return false;	
				}else{
					// Contador
					cont_inps++;
				}
			}
			if(cont_inps == 2){

				if(inps[1].value > 0){
					
					for(i=0; i<inps[0].value; i++){
						// Insertar nuevos
						$("#generate-crits").append(''+
							'<div class="crit-cuanti mt-3">'+
								'<h5><strong>Criterio General '+(i+1)+'</strong></h5>'+
								'<div class="row">'+
									'<div class="col-1"><strong>Indice</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
									'<div class="col-5"><strong>Título</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
									'<div class="col-5"><strong>Descripción</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
									'<div class="col-1"><strong>Valor</strong><input type="number" class="form-control inps-forms-cuanti"></div>'+
								'</div>'+
								'<div class="mt-2" id="subcrit-cuanti-'+i+'">'+
									'<h6><strong>Subcriterio(s)</strong></h6>'+
								'</div>'+
							'</div>'
						)
						// Insertar Subcriterios
						for(s=0; s<inps[1].value; s++){
							$("#subcrit-cuanti-"+i).append(''+
								'<div class="row">'+
									'<div class="col-1"><strong>Indice</strong><input type="text" class="form-control"></div>'+
									'<div class="col-5"><strong>Título</strong><input type="text" class="form-control"></div>'+
									'<div class="col-5"><strong>Descripción</strong><input type="text" class="form-control"></div>'+
									'<div class="col-1"><strong>Valor</strong><input type="number" class="form-control"></div>'+
								'</div>'
							);
						}
					}			
				}else{
					for(i=0; i<inps[0].value; i++){
						$("#generate-crits").append(''+
						'<div class="crit-cuanti mt-2">'+
							'<h5><strong>Criterio General '+(i+1)+'</strong></h5>'+
							'<div class="row">'+
								'<div class="col-1"><strong>Indice</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-5"><strong>Título</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-5"><strong>Descripción</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-1"><strong>Valor</strong><input type="number" class="form-control inps-forms-cuanti"></div>'+
							'</div>'+
						'</div>'
					)

					}
				}
				
				// Mostrar
				$("#generate-crits").fadeIn("slow");
			}
		break;

		case 5: // GENERAR CRITERIOS CUALITATIVOS
			// Limpiar anteriores
			$("#generate-crits").empty();
			// Desactivar Radios
			$("div.box-radios input").attr({"disabled":"true"});	
			// Tomar Valores de Radios
			// Tomar inputs
			inps = $(".inps-forms");
			// Validar 
			if(inps[0].value == ""){
				// Mensaje
				inps[0].placeholder = "Completa este campo";
				inps[0].focus();
				return false;

			}else{
				// Recorrer
				for(i=0; i<inps[0].value; i++){
					$("#generate-crits").append(''+
						'<div class="crit-cuali mt-2">'+
							'<h5><strong>Criterio '+(i+1)+'</strong></h5>'+
							'<div class="row">'+
								'<div class="col-1"><strong>Indice</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-3"><strong>Título</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-4"><strong>Descripción</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-2"><strong>Selección 1</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
								'<div class="col-2"><strong>Selección 2</strong><input type="text" class="form-control inps-forms-cuanti"></div>'+
							'</div>'+
						'</div>'
					);
				}
			}
			// Mostrar
			$("#generate-crits").fadeIn("slow");
		break;

		case 6: //CLASIFICAR NUEVAMENTE
			$("div.box-radios input").removeAttr("disabled");
		break;
	}
}
//=======================================================//
//FUNCIONES - NODO PERSONAL
//=======================================================//
/*FUNCION: Crea un nuevo usuario*/
function add_pers(){
	// Contador de inputs
	var inps_cont = 0;
	// Contador de inputs Expresiones
	var inps_exp = 0;
	// Identificar Inputs
	var inps_form = document.querySelectorAll(".inps-forms");
	// Recorrer inputs
	for(i=0; i < inps_form.length; i++){
		// Si esta vacio o es none
		if(inps_form[i].value == ""){
		 	message = '<p class="mt-4">Completa todos los campos del formulario</p>';
			alerts_tec(message);
		 	inps_form[i].style.borderColor = "red";
			return false;
		}else{
			inps_cont++;
		 	inps_form[i].style.borderColor = "#00aef1";
			console.log("inps_form", inps_form[i].value);
		}
	}
	// Validar Correo -----------------
	// Expresion regular email 
	exp_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
	// Validar Contraseña -----------------
	if(!exp_email.test(inps_form[7].value)){
		message = "<p class='mt-2'>Debe incluir un email con un formato correcto"+
		"<br/>Ej: mieamil@ejemplo.ejemplo</p>";
		alerts_tec(message)
		inps_form[7].focus();
	 	inps_form[7].style.borderColor = "red";

		return false;

	}else{
	 	inps_form[7].style.borderColor = "#00aef1";
		inps_exp++;
	
	}
	// Validar Contraseña -----------------------
	// Expresion regular Contraseña 
	exp_pass = new RegExp(" ");
	if(exp_pass.test(inps_form[8].value)){
		
		inps_form[8].value == "";
		message = "<p class='mt-2'>La contraseña no debe llevar espacios"+
		"<br/>Ej: miCon_trSe236</p>";
		alerts_tec(message);
		inps_form[8].focus();
	 	inps_form[8].style.borderColor = "red";

		return false;
	
	}else{
	 	inps_form[8].style.borderColor = "#00aef1";
		inps_exp++;
	}
	// Validar Telefono y Numero de Identificacion ------------------
	// Expresion regular Números 
	exp_num = new RegExp("[0-9]");
	// Identificacion
	if(!exp_num.test(inps_form[2].value)){
		
		inps_form[2].value == "";
		message = "<p class='mt-2'>Solo incluya números en el Número de Indetificación"+
		"<br/>Ej: 10000363000</p>";
		alerts_tec(message);
		inps_form[2].focus();
	 	inps_form[2].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[2].style.borderColor = "#00aef1";
		inps_exp++;
	}
	// Teléfono
	if(!exp_num.test(inps_form[3].value)){
		
		inps_form[3].value == "";
		message = "<p class='mt-2'>Solo incluya números en el teléfono"+
		"<br/>Ej: 3055555555</p>";
		alerts_tec(message);
		inps_form[3].focus();
	 	inps_form[3].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[3].style.borderColor = "#00aef1";
		inps_exp++;
	}
	if($("#sel-per-iden").val()==null || $("#sel-depa").val()==null || $("#sel-rol").val()==null)
	{
	 	message = "<p class='mt-2'>Seleccione los campos obligatorios</p>";
		alerts_tec(message); 
	
	}
	else{
		inps_exp++;
	    
	}
	//alert(inps_exp+" - "+$("#sel-per-iden").val()+" - "+$("#sel-depa").val()+" - "+$("#sel-rol").val())
	if(inps_exp == 5){
		// Objeto Request
		request = new Request();
		// Url
		request.s_url = 'fil-tec';
		// Configuracion
		request.s_config = ['POST', false, false, false, 'json'];
		// Permiso
		request.s_permision = ['tec-add-per', 1];
		// Datos de Envio
		request.s_dataSend = [
			{"name":"nombre", "values":inps_form[0].value},
			{"name":"t-identi", "values":inps_form[1].value},
			{"name":"identificacion", "values":inps_form[2].value},
			{"name":"telefono", "values":inps_form[3].value},
			{"name":"ciudad", "values":inps_form[5].value},
			{"name":"direccion", "values":inps_form[6].value},
			{"name":"profesion", "values":inps_form[11].value},
			{"name":"email", "values":inps_form[7].value},
			{"name":"password", "values":inps_form[8].value},
			{"name":"rol", "values":inps_form[9].value},
			{"name":"estado", "values":inps_form[10].value}
		];
		// Acciones
		request.s_actions = function(r){
			// Validar Respuesta
			if(r == "success"){
				// Usuario Creado
				// Mensaje
				message = "<h4 style='color:#23FFC9' class='mt-2'><i class='fas fa-thumbs-up'></i><br/>El Usuario ha sido Creado!!!</h4>";
				alerts_tec(message);
				// Llamar nuevamente el formulario
				personal_fun(1,$("#deft-person"));

			}else if(r == "exist"){
				// Usuario Ya Existe
				message = "<h4 style='color:#FFB24F' class='mt-2'><i class='far fa-registered'></i><br/>El Usuario ya Existe!!!</h4>";
				alerts_tec(message);
				// Llamar nuevamente el formulario

			}else if(r == "error"){
				// Error de Peticion
				alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
				//location.reload();
			}else{
				// Error de Peticion
				alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
				//location.reload();
			}
		}
		// Operacion
		request.request_operation();
	}
}
/*FUNCION: Actuliza el Usuario*/
function upd_userr(){
	// Contador de inputs
	var inps_cont = 0;
	// Contador de inputs Expresiones
	var inps_exp = 0;
	// Identificar Inputs
	var inps_form = document.querySelectorAll(".inps-forms");
	// Recorrer inputs
	for(i=0; i < inps_form.length; i++){
		// Si esta vacio o es none
		if((inps_form[i].value == "" || inps_form[i].value == "none") && i!=9){
			
		 	message = '<p class="mt-4">Completa todos los campos del formulario</p>';
			alerts_tec(message);
		 	inps_form[i].style.borderColor = "red";
			return false;
		}else{
			inps_cont++;
		 	inps_form[i].style.borderColor = "#00aef1";
			console.log("inps_form", inps_form[i].value);
		}
	}
	// Validar Correo -----------------
	// Expresion regular email 
	exp_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
	// Validar Contraseña -----------------
	if(!exp_email.test(inps_form[8].value)){
		message = "<p class='mt-2'>Debe incluir un email con un formato correcto"+
		"<br/>Ej: mieamil@ejemplo.ejemplo</p>";
		alerts_tec(message)
		inps_form[8].focus();
	 	inps_form[8].style.borderColor = "red";

		return false;

	}else{
	 	inps_form[8].style.borderColor = "#00aef1";
		inps_exp++;
	
	}
	// Validar Contraseña -----------------------
	// Expresion regular Contraseña 
	exp_pass = new RegExp(" ");
	if(exp_pass.test(inps_form[9].value)){
		inps_form[9].value == "";
		message = "<p class='mt-2'>La contraseña no debe llevar espacios"+
		"<br/>Ej: miCon_trSe236</p>";
		alerts_tec(message);
		inps_form[9].focus();
	 	inps_form[9].style.borderColor = "red";

		return false;
	
	}else{
	 	inps_form[9].style.borderColor = "#00aef1";
		inps_exp++;
	}
	// Validar Telefono y Numero de Identificacion ------------------
	// Expresion regular Números 
	exp_num = new RegExp("[0-9]");
	// Identificacion
	if(!exp_num.test(inps_form[3].value)){
		
		inps_form[3].value == "";
		message = "<p class='mt-2'>Solo incluya números en el Número de Indetificación"+
		"<br/>Ej: 10000363000</p>";
		alerts_tec(message);
		inps_form[3].focus();
	 	inps_form[3].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[3].style.borderColor = "#00aef1";
		inps_exp++;
	}
	// Teléfono
	if(!exp_num.test(inps_form[4].value)){
		
		inps_form[4].value == "";
		message = "<p class='mt-2'>Solo incluya números en el teléfono"+
		"<br/>Ej: 3055555555</p>";
		alerts_tec(message);
		inps_form[4].focus();
	 	inps_form[4].style.borderColor = "red";
		return false;
	
	}else{
	 	inps_form[4].style.borderColor = "#00aef1";
		inps_exp++;
	}
	if($("#ti").val()==null || $("#sel-depa").val()==null || $("#sel-rol").val()==null){
	 	message = "<p class='mt-2'>Seleccione los campos obligatorios</p>";
		alerts_tec(message);   
	}else{
		inps_exp++; 
	    
	}

	if(inps_exp == 5){
		// Objeto Request
		request = new Request();
		// Url
		request.s_url = 'fil-tec';
		// Configuracion
		request.s_config = ['POST', false, false, false, 'json'];
		// Permiso
		request.s_permision = ['tec-upd-per', 1];
		// Datos de Envio
		request.s_dataSend = [
			{"name":"cod", "values":inps_form[0].value},
			{"name":"nombre", "values":inps_form[1].value},
			{"name":"t-identi", "values":inps_form[2].value},
			{"name":"identificacion", "values":inps_form[3].value},
			{"name":"telefono", "values":inps_form[4].value},
			{"name":"ciudad", "values":inps_form[6].value},
			{"name":"direccion", "values":inps_form[7].value},
			{"name":"profesion", "values":inps_form[12].value},
			{"name":"email", "values":inps_form[8].value},
			{"name":"password", "values":inps_form[9].value},
			{"name":"rol", "values":inps_form[10].value},
			{"name":"estado", "values":inps_form[11].value}
		];
		// Acciones
		request.s_actions = function(r){
			// Validar Respuesta
			
			if(r == "success"){
				// Usuario Creado
				// Mensaje
				message = "<h4 style='color:#23FFC9' class='mt-2'><i class='fas fa-thumbs-up'></i><br/>Usuario modificado</h4>";
				alerts_tec(message);
				// Llamar nuevamente el formulario
				personal_fun(2,$("#lstper"));

			}else if(r == "error"){
				// Error de Peticion
				alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
				//location.reload();
			}else{
				// Error de Peticion
				alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
				//location.reload();
			}
		}
		// Operacion

		request.request_operation();
	}
}
/*FUNCION: Crea un nuevo usuario*/
function list_pers(){
	// Objeto Request
	request = new Request();
	// Url
	request.s_url = 'fil-tec';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['tec-list-per', 1];
	// Acciones
	request.s_actions = function(r){
		// Validar Respuestas
		if(r == "error"){
			// Error de Peticion
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		}else if(r == "no-data"){
			// Remover spinner
			$("#list-per-spinner").remove();
			// Usuario Creado
			// Mensaje
			message = "<h4 style='color:#FFC923' class='mt-4'>No se encontraron datos.</h4>";
			alerts_tec(message);
		}else{
			setTimeout(function(){
				// Remover spinner
				$("#list-per-spinner").remove();
				// Insertar datos
				for(i=0; i<r.length; i++){
					// Validar Estado para boton estado
					if(r[i].estado == 0){
						var btn_state = ''+
						'<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="switch'+i+'" onclick="UpdState('+r[i].cod+',1)">'+
            '<label class="custom-control-label" for="switch'+i+'"></label></div>';
					}else{
						var btn_state = ''+
						'<div class="custom-control custom-switch"><input type="checkbox" checked class="custom-control-input" id="switch'+i+'" onclick="UpdState('+r[i].cod+',0)">'+
            '<label class="custom-control-label" for="switch'+i+'"></label></div>';
					}
					$("#bd-list-per").append(''+
						'<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td style="display:none">'+r[i].cod+'</td>'+
							'<td style="display:none">'+r[i].rol+'</td>'+
							'<td style="display:none">'+r[i].tip_ide+'</td>'+
							'<td style="display:none">'+r[i].num_ide+'</td>'+
							'<td>'+r[i].nombre+'</td>'+
							'<td>'+r[i].email+'</td>'+
							'<td style="display:none">'+r[i].telefono+'</td>'+
							'<td style="display:none">'+r[i].direccion+'</td>'+
							'<td style="display:none">'+r[i].ciudad+'</td>'+
							'<td style="display:none">'+r[i].nomdep	+'</td>'+
							'<td style="display:none">'+r[i].profesion+'</td>'+
							'<td style="display:none">'+r[i].estado+'</td>'+
							'<td>'+r[i].nomrol+'</td>'+
							'<td>'+btn_state+'</td>'+
							'<td class="text-center">'+
								
									'<i class="fas fa-pencil-alt icon_sesion" onclick="updUser('+r[i].cod+','+(i+1)+')"></i>'+
									'<i class="fas fa-trash-alt icon_sesion" onclick="delUser('+r[i].cod+','+(i+1)+')"></i>'+
	
							'</td>'+
						'</tr>');
				}
				
			},200)
		}
	}
	// Traer Listado
	request.request_list();
}

function DeleteConvo(id){   
  if(confirm("¿ Está seguro que desea eliminar la convocatoria?")){
  
		var sendform = new FormData();
		sendform.append("tec-del-convo","1")
		sendform.append("id",id)
		$.ajax({
			type:'POST',
			url:'templates/filters/fil-tec.php',
			data:sendform,
			cache:false,
			processData:false,
		  contentType:false,
			beforeSend:function(){
			// debug.log("Momento por favor");
			},
		  success:function(e){
		    // Cargar el listado de convocatorias en el elemento div

		    message = "<h4 style='color:#FFB24F' class='mt-2'><i class='fa fa-exclamation-circle'></i><br/>"+e+"</h4>";
				alerts_tec(message);
				if(String(e).indexOf("eliminada")!=-1){
		   convo_fun(3, $("#btnlist")) }
			}
		});
	}
}
function delUser(id){
    
	if(confirm("¿ Está seguro que desea eliminar el usuario ?")){
  
	  var sendform = new FormData();
		sendform.append("tec-del-per","1")
		sendform.append("id",id)
		$.ajax({
			type:'POST',
			url:'templates/filters/fil-tec.php',
			data:sendform,
			cache:false,
			processData:false,
		  contentType:false,
			beforeSend:function(){
			// debug.log("Momento por favor");
			},
		  success:function(e){
		    // Cargar el listado de convocatorias en el elemento div

		  	
		  if(String(e).indexOf("eliminado")!=-1){
		    message = "<h4 style='color:#FFB24F' class='mt-2'><i class='fa fa-exclamation-circle'></i><br/>"+e+"</h4>";
				alerts_tec(message);
		  personal_fun(2, $("#lstper")) }
		  else{
		      message = "<h4 style='color:#FFB24F' class='mt-2'><i class='fa fa-exclamation-circle'></i><br/>No se puede eliminar al usuario</h4>";
				alerts_tec(message);
		  }

			}
		});
	}
}
function UpdState(id,estado){  
	var sendform = new FormData();
	sendform.append("tec-upd-est","1")
	sendform.append("id",id)
	sendform.append("st",estado)
	$.ajax({
		type:'POST',
		url:'templates/filters/fil-tec.php',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div

	    message = "<h4 style='-webkit-column-rule: #FFB2FF;-moz-column-rule: #FFB2FF;-o-column-rule: #FFB2FF;column-rule: #FFB2FF;	4F' class='mt-2'><i class='fa fa-exclamation-circle'></i><br/>"+e+"</h4>";
			alerts_tec(message);
			personal_fun(2, $("#lstper"))	
	  }
	});
}
function editarConvo(id,fila){
	var table =document.getElementById("tblconv")
	var nom= table.rows[fila].cells[1].innerHTML
	var con=table.rows[fila].cells[2].innerHTML
	var fec_ini=table.rows[fila].cells[3].innerHTML
	var fec_cie=table.rows[fila].cells[4].innerHTML
	var ent=table.rows[fila].cells[5].innerHTML
	var urlconv=table.rows[fila].cells[7].innerHTML

	var html_fun = ''+
				'<div class="form-convo container">'+
					'<div class="row"><div class="col-md-6"><div class="form-group">'+
					  '<label>Nombre / Titulo</label>'+
					  '<input type="hidden"  class="inps-forms" id="cod" value="'+id+'"><input type="text" id="nom" class="form-control inps-forms">'+
					'</div></div>'+
					'<div class="col-md-6"><div class="form-group">'+
					  '<label>Descripción / Contenido:</label>'+
					  '<textarea id="con" class="form-control inps-forms" rows="2"></textarea>'+
					'</div></div></div>'+
					'<div class="row"><div class="col-md-6"><div class="form-group">'+
					  '<label>Entidad Contratante</label>'+
					  '<input type="text" id="ent" class="form-control inps-forms">'+
					'</div></div>'+
					''+
						'<div class="col-6">'+
							'<div class="form-group">'+
							  '<label>Fecha de Inicio</label>'+
							  '<input type="date" id="fec_ini" class="form-control inps-forms">'+
							'</div>'+
						'</div></div>'+
						'<div class="row"><div class="col-6">'+
							'<div class="form-group">'+
							  '<label>Fecha de Cierre</label>'+
							  '<input type="date"  id="fec_cie" class="form-control inps-forms">'+
							'</div>'+
						'</div>'+
					''+
					'<div class="col-6"><div class="form-group">'+
					  '<label>Página de la Convocatoria <span class="small">(Opcional)</span></label>'+
					  '<input type="text" class="form-control inps-forms-no" id="url-conv">'+
					'</div>'+
					'<div></div>'+
						''+
					'</div>'+
					'<div class="col-12"><br><button class="btn-functions" onclick="upd_announcement()"><i class="fas fa-check"></i>&nbsp;Editar</button></div>'+
				'</div>';
	$("#cont-convo-fun").html(html_fun)


	$("#nom").val(nom)
	$("#con").val(con)
	$("#fec_ini").val(fec_ini)
	$("#fec_cie").val(fec_cie)
	$("#ent").val(ent)
	$("#url-conv").val(urlconv)
}
function updUser(id,fila){
	var table =document.getElementById("tblusu")
	var nom= table.rows[fila].cells[5].innerHTML
	var ti=table.rows[fila].cells[3].innerHTML
	var ni=table.rows[fila].cells[4].innerHTML
	var tel=table.rows[fila].cells[7].innerHTML
	var dep=table.rows[fila].cells[10].innerHTML
	var ciu=table.rows[fila].cells[9].innerHTML
	var dir=table.rows[fila].cells[8].innerHTML
	var pro=table.rows[fila].cells[11].innerHTML
	var ema=table.rows[fila].cells[6].innerHTML
	var rol=table.rows[fila].cells[2].innerHTML
	var st=table.rows[fila].cells[12].innerHTML

	var html_fun = 	'<div class="row"><br>'+
		'	<br><div class="col-md-12" style="color:red;text-align:left;">Campos obligatorios *</div><br><br>'+
							'<div class="col-md-6">'+
								'<div class="form-group">'+
						  		'<label>Nombres/Apellidos<span style="color:red;">*</span></label>'+
						  		'<input type="hidden" class="inps-forms" id="cod" value="'+id+'">'+
				  				'<input type="text" class="form-control inps-forms" placeholder="Nombres y apellidos" id="nom" >'+
								'</div>'+
					  		'<label>Tipo de Identificación <span style="color:red;">*</span></label>'+
							 	'<select  class="custom-select inps-forms mb-3" id="ti" >'+
						    	'<option selected disabled value="none">Seleccione...</option>'+
						    	'<option value="1">Cédula de ciudadanía</option>'+
						    	'<option value="2">Pasaporte</option>'+
						    	'<option value="3">Cédula de extranjeria</option>'+
						    	'<option value="4">NIT</option>'+
						  	'</select>'+
						  	'<div class="form-group">'+
						  		'<label>Número de Identificación <span style="color:red;">*</span></label>'+
				  				'<input type="text" class="form-control inps-forms" placeholder="Número de identificación" id="ni">'+
								'</div>'+
								'<div class="form-group">'+
						  		'<label>Teléfono <span style="color:red;">*</span></label>'+
				  				'<input type="text" class="form-control inps-forms" placeholder="Teléfono" id="tel">'+
								'</div>'+
							
									 '<div class="form-group">'+
										'<label>Departamento de Residencia<span style="color:red;">*</span></label>'+
									 	'<select id="sel-depa" class="custom-select inps-forms mb-3" onchange="get_dep_cities(this, `sel-ciud`)">'+
								    	'<option selected disabled value="none" id="opc-dep-deft">Departamento</option>'+
								  	'</select>'+
									'</div>'+
									'<div class="form-group">'+
										'<label>Ciudad de Residencia</label>'+
									 	'<select id="sel-ciud" class="custom-select inps-forms mb-3" disabled>'+
								    	'<option selected disabled value="none" id="opc-ciud-deft">Ciudad</option>'+
								  	'</select>'+
									
								'</div>'+
								
							'</div>'+
							'<div class="col-md-6">'+
					  '<div class="form-group">'+
						  		'<label>Dirección<span style="color:red;">*</span></label>'+
				  				'<input type="text" class="form-control inps-forms" placeholder="Dirección de residencia" id="dir">'+
								'</div>'+

								
								'<div class="form-group">'+
						  		'<label>Email<span style="color:red;">*</span></label>'+
				  				'<input type="email" class="form-control inps-forms" placeholder="Correo electrónico" id="ema">'+
								'</div>'+
								'<div class="form-group">'+
						  		'<label>Contraseña<i class="fa fa-question" style="cursor:help;margin-left:20px;" onmouseover="$(\'#help1\').css(\'display\',\'block\')" onmouseout="$(\'#help1\').css(\'display\',\'none\')"></i><span class="tooltiptext" id="help1">Digite la contraseña, solo si desea modificarla</span></label>'+
				  				'<input type="password" class="form-control inps-forms" placeholder="Contraseña" >'+
								'</div>'+
								'<div class="form-group">'+
								'<label>Rol  <span style="color:red;">*</span></label>'+
							 	'<select id="sel-rol" class="custom-select inps-forms mb-3" disabled>'+
						    	'<option selected disabled value="none">Seleccione...</option>'+
						    '<option value="2">DIGITADOR</option>'+
						    	'<option value="3">EVALUADOR ELEGIBILIDAD</option>'+
						    	'<option value="4">EVALUADOR VIABILIDAD</option>'+
						    	'<option value="5" disabled>GESTOR TÉCNICO</option>'+
						    		'<option value="6">ABOGADO - ASESOR JURÍDICO</option>'+
						     	'<option value="7">COLOMBIA PRODUCTIVA</option>'+
						     	'<option value="8">SERVICIO NACIONAL DE APRENDIZAJE - SENA</option>'+
						     	'<option value="9" disabled>TERCER EVALUADOR</option>'+
						  	'</select></div>'+
						  	'<div class="form-group">'+
						  	'<label>Estado De Usuario</label>'+
							 	'<select id="sel-esta" class="custom-select inps-forms mb-3">'+
						    	'<option value="1">ACTIVO</option>'+
						    	'<option value="0">INACTIVO</option>'+
						  	'</select></div>'+
						  	
							'</div><div class="col-md-12">'+
							'<div class="form-group">'+
						  		'<label>Perfil profesional<span style="color:red;">*</span></label>'+
				  				'<textarea type="text" class="form-control inps-forms" placeholder="Perfil profesional" id="pro"></textarea>'+
								'</div></div>'+
						'</div>'+
						'<div class="text-center">'+
							'<button class="btn-functions" id="btn-add-pers" onclick="upd_userr()"><i class="fas fa-check"></i>&nbsp;Editar</button>'+
						'</div>'

	$("#cont-pers-fun").html(html_fun);	

	Departamentos33(dep,ciu,nom,ti,ni,tel,dir,pro,ema,rol,st);
}
function Departamentos33(dep,ciu,nom,ti,ni,tel,dir,pro,ema,rol,st){
	var depar=""; 
	var sendform = new FormData();

	$.ajax({
		type:'POST',
		url:'templates/modules/ciudad.php?ld=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	   $("#sel-depa").html(e);
	   $("#sel-depa").val(dep)
	   Ciudades33(ciu,nom,ti,ni,tel,dir,pro,ema,rol,st)
	  }
	});
}
function Ciudades33(ciu,nom,ti,ni,tel,dir,pro,ema,rol,st){
	var depar=""; 
	var sendform = new FormData();

	$.ajax({
		type:'POST',
		url:'templates/modules/ciudad.php?lc=1',
		data:sendform,
		cache:false,
		processData:false,
		contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
		success:function(e){
		  // Cargar el listado de convocatorias en el elemento div
		  $("#sel-ciud").html("<option disabled value='none' id='opc-ciud-deft'>Ciudad</option>"+e);
		  $("#sel-ciud").val(ciu)
		  $("#nom").val(nom)
			$("#ti").val(ti)
			$("#ni").val(ni)
			$("#tel").val(tel)
			$("#dir").val(dir)
			$("#pro").val(pro)
			$("#ema").val(ema)
			$("#sel-rol").val(rol)
			$("#sel-esta").val(st)
		}
	});
}
function Departamentos(dp){
	var depar=""; 
	var sendform = new FormData();

	$.ajax({
		type:'POST',
		url:'templates/modules/ciudad.php?ld=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	   $("#sel-depa").html(e);
	   $("#sel-depa").val(dp)
	  }
	});
}
function Ciudades(cd){
	var depar=""; 
	var sendform = new FormData();

	$.ajax({
		type:'POST',
		url:'templates/modules/ciudad.php?lc=1',
		data:sendform,
		cache:false,
		processData:false,
		contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
		success:function(e){
		  // Cargar el listado de convocatorias en el elemento div
		$("#sel-ciud").html("<option disabled value='none' id='opc-ciud-deft'>Ciudad</option>"+e);
		$("#sel-ciud").val(cd)
		}
	});
}
// Fin-------------------------------------------------------------------