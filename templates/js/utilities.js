/*---------------------------------------------------------------------------------------------*/
//►Titulo: UTILIDADES
/*---------------------------------------------------------------------------------------------*/
/*FUNCION-1: Genera Alarmas*/
function alerts_tec(message){
	// Mensaje HTML
	var html_message = ''+
	'<div id="message">'+
		'<div class="row">'+
			'<div class="col-12 text-center">'+message+'</div>'+
		'</div>'+
	'</div>';
	// Objeto Maker
	maker = new Maker("#message", "", 6);
	// Remover mensaje anterior
	maker.maker_html();
	// Target
	maker.s_targ = "#tabs-content";
	// Opcion 
	maker.s_opt = 1;
	// Pasar Html Mensaje
	maker.s_html = html_message;
	// Crear Alerta
	maker.maker_html();
	setTimeout("remove_alert()", 2500);
}
function remove_alert(){
	$("#message").remove();
}

/*FUNCION-2: Traer Departamentos*/
function get_departaments(selector){
	// OBJETO REQUEST----------------------
	request = new Request();
	// Url
	request.s_url = 'fil-utilities';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['util-dep', 1];
	// Funcion De Respuesta
	request.s_actions = function(r){
		if(r == "error"){
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		}else{
			// Remover Departamentos
			$(".opc-dep-l").remove();
			// Remover Ciudades
			// $(".opc-ciud-l").remove();
			// Pasar Lista Departamentos
			for(i=0; i<r.length; i++){
				$(selector).after('<option value="'+r[i].codigo+'" class="opc-dep-l">'+
						r[i].nombre
					+'</option>');
			}
		}
	}
	// Ejecutar peticion
	request.request_list();

}
/*FUNCION-3: Traer Ciudades*/
function get_dep_cities(selection, sel){
	// OBJETO REQUEST----------------------
	request = new Request();
	// Url
	request.s_url = 'fil-utilities';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['util-ciud', 1];
	// Datos de Envio
	request.s_dataSend = [
		{"name":"opc-dep", "values":selection.value}
	];
	// Funcion De Respuesta
	request.s_actions = function(r){
		// Activar selector Ciudades
		$("#"+sel).attr({"disabled":false});
   	$("#"+sel).html("<option  disabled value='none' id='opc-ciud-deft'>Ciudad</option>");
		if(r == "error"){
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		}else{
			// Remover Ciudades Anteriores
			$(".opc-ciud-l").remove();
			// Agergar nuevas ciudades
			
			for(i=0; i<r.length; i++){
				$("#opc-ciud-deft").after('<option value="'+r[i].codigo+'" class="opc-ciud-l">'+
						r[i].nombre
					+'</option>')
			}
		}
	}
	// Ejecutar peticion
	request.request_operation();

}
/*FUNCION-4: Listado Selector Convocatorias*/
function get_announcements_selector(selector, rem){
		// OBJETO REQUEST----------------------
	request = new Request();
	// Url
	request.s_url = 'fil-utilities';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['util-convos', 1];
	// Acciones
	request.s_actions = function(r){
		if(r == "error"){
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		}else{
			// Remover Departamentos
			$(rem).remove();
			// Remover Ciudades
			// $(".opc-ciud-l").remove();
			// Pasar Lista Departamentos
			for(i=0; i<r.length; i++){
				$(selector).after('<option value="'+r[i].id+'" class="opc-dep-l"><b>NOMBRE: </b>'+r[i].nombre+'/ <b>ENTIDAD: </b>'+r[i].entidad+'</option>');
			}
		}
	}
	// Ejecutar peticion
	request.request_list();
}

/*FUNCION-5: LISTADO SELECTOR EMPRESAS D-P*/
function get_enterprises_der(selector){
	console.log(selector)
	// OBJETO REQUEST->
	obj_request = new Request();
	// URL ->
	obj_request.s_url = 'fil-utilities';
	// CONFIGURACION ->
	obj_request.s_config = ['POST', false, false, false, 'json'];
	// PERMISO->
	obj_request.s_permision = ['util-empresas', 1];
	// CALLBACK
	obj_request.s_actions = function(r){
		
		if(r == "error"){
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		}else{
			// Recorrer array de empresas
			for(var i=0; i < r.length; i++){
				$(selector).after('<option value="'+r[i].id+'">'+r[i].razon_social+'</option>')
			}
		}
	}
	// EJECUTAR REQUEST
	obj_request.request_list();
}


/*Fin------------------------------------------------------------------------------------------*/