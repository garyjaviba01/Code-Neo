// ----------------------------------------------------------------------------------
//►CONTROLADOR MODULO DERECHOS DE PETICION
// ----------------------------------------------------------------------------------
// ----------------------------------------------------------
//►CONTROLADOR MODULO DERECHOS DE PETICION
// ----------------------------------------------------------

// ----------------------------------------------------------
//►CONTROLADOR MODULO DERECHOS DE PETICION
// ----------------------------------------------------------
function tabs_der(fun, btn){
	// OBJETO MAKER
	maker = new Maker('#cont-derp-fun', '', 5);
	// LIMPIAR
	maker.maker_html();
	// TIPO DE TAB FUNCIONES
	switch(fun){
		
		case 1: // CREAR DERECHO DE PETICION
			// Contenido
			var html_cont = ''+
			'<div class="der-con-tabs">'+
		
				  '<div class="row">'+
				   '<div class="col-12"><div class="col-md-12" style="color:red;text-align:left;">Campos obligatorios *</div> </div>'+
				   
				    '<div class="col-12">'+
				     
				        '<label for="sigp-code">SIGP - PROYECTO <span style="color:red;">*</span> <span class="busqueda"><i class="fa fa-search" onclick="CargarProSIGP()"></i>  </span></label>'+
				        '<select id="sigp-code" type="text" class="custom-select inps-forms" onchange="BuscarempresaSIGP()" ></select></div>'+
				
				  '<div class="col-12" style="margin-top:10px;">'+
				        '<label for="sel-emp-der" >Empresa  <span style="color:red;">*</span></label>'+
				        '<select name="empresa" id="sel-emp-der" class="custom-select inps-forms" disabled>'+
				          '<option selected disabled value="none" id="sel-emp-def">Seleccione...</option>'+
				        '</select>'+
				      '</div>'+
				      
				    '<div class="col-6" style="margin-top:10px;">'+
				      
				        '<label for="sel-fase" >Fase <span style="color:red;">*</span></label>'+
				        '<select name="fase" id="sel-fase" class="custom-select inps-forms">'+
				          '<option selected disabled value="none">Seleccione...</option>'+
				          '<option value="Elegibilidad">Elegibilidad</option>'+
				          '<option value="Viabilidad">Viabilidad</option>'+
				        '</select>'+
				      '</div>'+
				      '<div class="col-6" style="margin-top:10px;">'+
				        '<label for="fec-recibido">Fecha Recibido <span style="color:red;">*</span></label>'+
				        '<input onchange="calculaHabiles()" type="date" id="fec-recibido" class="form-control inps-forms">'+
				      '</div>'+
				    
				    '<div class="col-6" style="margin-top:10px;"> '+
				      
				        '<label for="hora-recibido">Hora Recibido <span style="color:red;">*</span></label>'+
				        '<input type="time" id="hora-recibido" class="form-control inps-forms">'+
				     
				    '</div>'+
				
				    '<div class="col-6" style="margin-top:10px;display:none;">'+
				  	
				        '<label for="fec-limite">Fecha Limite <small>(Autocalculada + 5 dias habiles)</small></label>'+
				        '<input type="text" id="fec-limite" class="form-control inps-forms" disabled>'+
				      
				    '</div>'+
				 
				    '<div class="col-6" style="margin-top:10px;">'+
				     
				        '<label for="medio-resp">Medio de Respuesta </label>'+
				        '<input type="text" class="form-control inps-forms" id="med_resp">'+
				     
				    '</div>'+
				    '<div class="col-12" style="margin-top:10px;">'+
				     
				        '<label for="resumen-obs">Resumen / Observación</label>'+
				        '<textarea type="text" class="form-control inps-forms" id="resumen-obs"></textarea>'+
				     
				    '</div>'+
				  '<div class="col-12" style="margin-top:10px;">'+
				    '<button  class="btn-functions"  onclick="nuevoDerecho2()"><i class="fas fa-check"></i>&nbsp;Guardar</button>'+
				  '</div>'+
			  
			'</div>'
			;
			// Pasar contenido
			maker.s_html = html_cont;
			// Opcion
			maker.s_opt = 1;
			// Construir
			maker.maker_html();
			// LISTADO DE CONVOCATORIAS
			get_enterprises_der('#sel-emp-def');
		    CargarData("phpMVC/Controller/controller2.php","sigp-code","list_pro_sigp");	
		break;

		case 2: // DETALLES DERECHOS DE PETICION
			var html_cont = ''+
			'<div class="mt-2">'+
				'<i class="fa fa-search" style="font-size:20px;position:absolute;left:20px;margin-top:10px;"></i><input type="text"  placeholder="Buscar Derechos de Peticion" class="form-control" onkeyup=\"TableFilter(\'#table-der\',this.value)\" style="padding-left:40px;">'+
				'<table class="table table-bordered" id="table-der">'+
					'<thead style="background:#f8f9fa;" >'+
						'<tr>'+
							'<th>#</th>'+
							'<th>Fase</th>'+
							'<th>SIGP - proyecto</th>'+
							'<th>Empresa</th>'+
							'<th>Recibido</th>'+
							'<th>Entregar</th>'+
							'<th>Acciones</th>'+
						'</tr>'+
					'</thead>'+
					'<tbody id="tb-derp">'+
						'<tr class="text-center" id="list-der-spinner"><td colspan="7" style="text-align:center!important;">'+
							'<div class="spinner-border text-dark"></div>'+
							'<p class="">Cargando datos...</p>'+
						'</td></tr>'
					'</tbody>'+
				'</table>'+
			'</div>';
			// Pasar contenido
			maker.s_html = html_cont;
			// Opcion
			maker.s_opt = 1;
			// Construir
			maker.maker_html();
			// LISTADO DERECHOS DE PETICION
			list_derechos_pet()
		break;
		
		default:
			
			alert('Lo sentimos ha ocurrido un error indesperado, intena de nuevo mas tarde');
			location.reload();

		break;
	}
	// REMOVER CLASE BOTON
	$('.btn-functions').removeClass("btn-functions-active");
	// AGREGAR CLASE BOTON ACTIVO
	$(btn).addClass("btn-functions-active");
}

// ----------------------------------------------------------
//►GLOBALES
// ----------------------------------------------------------

// ----------------------------------------------------------
//►FUNCION-1: CREAR UN NUEVO DERECHO DE PETICION
// ----------------------------------------------------------
function nuevoDerecho__(){
	// ARRAY DE VALORES
	var val_inputs = []
	// -------------------------------------------
	//	VALIDAR CAMPOS
	// -------------------------------------------
	// Contador
	var inps_cont = 0;
	// Referecias
	var inputs = document.querySelectorAll('.inps-forms');

	// console.log(inputs.length);
	// Recorrer ->
	for(var i=0; i<inputs.length; i++){
		// Si esta vacio
		if(inputs[i].value == "" || inputs[i].value == "none"){
			// ALERTA DE ERROR ->
			message = '<p class="mt-4">Completa todos los campos del formulario</p>';
			alerts_tec(message);
			inputs[i].style.borderColor = "red"
			return false;
		}else{
			// CONTADOR
			inps_cont++;
			inputs[i].style.borderColor = "#00aef1";
			// AGREGAR AL ARRAY DE VALORES
			val_inputs.push(inputs[i].value)
		}
	}
	// -------------------------------------------
	//	VALIDAR CONTADOR
	// -------------------------------------------
	// console.log(val_inputs)
	if(inps_cont == 8){
		// TRATAR FECHA RECIBIDO
		// var frc = val_inputs[2].replace(/-/g, "/");
		var frc = val_inputs[3];
		var frc2 = frc.reverse();
		var frc3 = frc2.join("/");
		// -------------------------------------------
		// EVENTO AJAX
		// -------------------------------------------
		// Formulario ->
		var form_derechos = new FormData();
		// Agregar Valores
		form_derechos.append("p-der-p", 1);
		form_derechos.append("sigp", val_inputs[0])
		form_derechos.append("fase", val_inputs[2])
		form_derechos.append("recibido", frc3 + ' ' + val_inputs[4]);
		form_derechos.append("empresa", val_inputs[1])
		// form_derechos.append("hora", val_inputs[4])
		form_derechos.append("entregar", val_inputs[5])
		form_derechos.append("medio", val_inputs[6])
		form_derechos.append("observacion", val_inputs[7])
		// ENVIO OBJETO AJAX
		$.ajax({
			type:'POST',
			url:'templates/filters/fil-tec.php',
			data:form_derechos,
			cache:false,
			processData:false,
		  contentType:false,
			beforeSend:function(){
			// debug.log("Momento por favor");
			},
		  success:function(r){
		     alert(r)
		    if(r){
					// Convocatoria Creada
					// Mensaje
					message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>El Derecho de Peticion ha sido Creado!!!</h6>";
					alerts_tec(message);
					// ACTIVAR EL TAB
					document.getElementById('def-derp').click();
					return false;
				}else{
					// Error de Peticion
					alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
					//location.reload();
				}
			}
		});
	}else{
		// Error de Peticion
		alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
		//location.reload();
	}
	// -------------------------------------------
	//
	// -------------------------------------------
	// -------------------------------------------
	//
	// -------------------------------------------
	return false;
}




// ----------------------------------------------------------
//►FUNCION-2: DETECTA CAMBIO DE FECHA INICIAL
// ----------------------------------------------------------
function calculaHabiles(){
	// TOMAR LA FECHA SELECCIONADA
	var fecha_rec = $("#fec-recibido").val();
	console.log("fecha_rec", fecha_rec);
	var year = new Date(fecha_rec).getFullYear();
	var mes = new Date(fecha_rec).getMonth() + 1;

	// VALIDAR DIMENSION - ISO: 10 CARACTERES =====================>
	if(fecha_rec.length == 10){

		/**
		console.log("mes", mes);
		if(year < 2020){
			// ALERTA DE ERROR ->
			message = '<p class="mt-4">El año no puede ser menor al año actual</p>';
			alerts_tec(message);
			// SETEAR FECHAS
			$("#fec-recibido").val("");
			$("#fec-limite").val("");
			return;
		}
		
		// VALIDAR MES =====================>
		var mesActual = new Date().getMonth() + 1;
		console.log("mes", mes);
		if(mes < mesActual){
			// ALERTA DE ERROR ->
			message = '<p class="mt-4">El Mes no puede ser menor al Mes actual</p>';
			alerts_tec(message);
			// SETEAR FECHAS
			$("#fec-recibido").val("");
			$("#fec-limite").val("");
			return;
		}**/

		// CALCULAR DIAS HABILES =====================>
		// Fecha permitida
		var fec_pass = new Date(fecha_rec);
		// Contador
		var i = 0;
		// Mientras
		while (i < 6) {
			
			// Aumentar Dia
			fec_pass.setTime(fec_pass.getTime() + 24 * 60 * 60 * 1000);
			
			// Validar si no son dias festivos
			if(fec_pass.getDay() != 6 && fec_pass.getDay() != 0){
				i++;
			}

		}

		// CONCATENAR FECHA
		if(fec_pass.getMonth()+1 < 10){
		
			var mes_rec = '0' + (fec_pass.getMonth()+1)
		
		}else{

			var mes_rec = (fec_pass.getMonth()+1)
			
		}
		if(fec_pass.getDate() < 10){

			var dia_rec = '0' + fec_pass.getDate();
		
		}else{

			var dia_rec = fec_pass.getDate();

		}
		// TEXTO FINAL
		fecha_entrega = dia_rec+ '/' + mes_rec + '/' + fec_pass.getFullYear();
		fecha_entrega = fec_pass.getFullYear() + '/' + mes_rec + '/' + dia_rec;

		// PASAR FECHA
		$("#fec-limite").val(fecha_entrega);
	}
	if(fecha_rec == ""){
		// SETEAR FECHAS
		$("#fec-recibido").val("");
		$("#fec-limite").val("");
	}
}

// ----------------------------------------------------------
//►FUNCION-3: LISTADO DERECHOS DE PETICION
// ----------------------------------------------------------
function list_derechos_pet(){
	// Objeto Request
	request = new Request();
	// Url
	request.s_url = "fil-tec"
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['tec-list-derp', 1];
	// Acciones
	request.s_actions = function(r){
		// Validar Respuestas
		if(r == "error"){
			// Error de Peticion
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		}else if(r == "no-data"){
			$("#list-der-spinner").remove();
			// No hay datos
			// Mensaje
			message = "<h4 style='color:#FFC923' class='mt-4'>No se encontraron datos.</h4>";
			alerts_tec(message);
		}else{

			setTimeout(function(){
				// Remover spinner
				$("#list-der-spinner").remove();
				// Insertar datos
				for(i=0; i<r.length; i++){
					var data_detail = [r[i].id_emp, r[i].nom_empresa, r[i].fec_rec, r[i].fec_lim, r[i].SIGP, r[i].fase];
					$("#tb-derp").append(''+
						'<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+r[i].fase+'</td>'+
							'<td>'+r[i].SIGP+'</td>'+
							'<td>'+r[i].nom_empresa+'</td>'+
							'<td>'+r[i].fec_rec+'</td>'+
							'<td>'+r[i].fec_lim+'</td>'+
							'<td class="text-center">'+
								'<div class="btn-group">'+
									'<i class="fas fa-pencil-alt icon_sesion" title="Editar" onclick="mod_edit_der('+ r[i].id +')" ></i>'+
									'<i class="fas fa-trash-alt icon_sesion" title="Eliminar derecho de petición" onclick="Del_DP('+ r[i].id +')"></i>'+
									'<i class="fa fa-search-plus icon_sesion" title="Detalles de derecho" onclick="mod_detalle_add('+ r[i].id +','+(i+1)+')"></i>'+
									
									'<i class="fas fa-file-alt icon_sesion" title="Informe derecho de petición" onclick="mod_detalle_list(this)" data-list="'+[r[i].id_emp,r[i].nom_empresa,r[i].fec_rec,r[i].fec_lim,r[i].SIGP,r[i].fase,r[i].med_res]+'" data-resp="'+r[i].res+'" data-der-l="'+ r[i].id +'"></i>'+
								'</div>'+
							'</td>'+
						'</tr>'
					);
				}

			},200)
		}					
	}
	// Ejecutar Peticion
	request.request_list();
}

// ----------------------------------------------------------
//►FUNCION-4: MODAL -> EDITAR DERECHOS PETICION
// ----------------------------------------------------------
function mod_edit_der(id_emp){
//#cont-derp-fun
 CargarData("templates/modules/derechos_pet.php?id="+id_emp,"cont-derp-fun",id_emp);
}

// ----------------------------------------------------------
//►FUNCION-5: MODAL -> AÑADIR DETALLES DERECHOS PETICION
// ---------------------------------------------------------
function mod_detalle_add(id_der,fila){
	// tabla table-der
	 var Nompro = document.getElementById("table-der").rows[fila].cells[2].innerText;
	 var Nomemp = document.getElementById("table-der").rows[fila].cells[3].innerText;
	 var fase = document.getElementById("table-der").rows[fila].cells[1].innerText;
	 var recibido = document.getElementById("table-der").rows[fila].cells[4].innerText;
	 var entrega = document.getElementById("table-der").rows[fila].cells[5].innerText;
	$("#myModalDer").modal();
  barralateral2();
  // SETEAR EL TITULO DEL MODAL


  $("#mod-title-der").html("DETALLES DERECHO DE PETICIÓN"); 
  // OBJETO MAKER
	maker = new Maker('#mod-body-der', '', 5);
	// LIMPIAR
	maker.maker_html();
	// Contenido
	var html_cont = ''+
	'<div class="der-con-tabs container">'+
	 '<div class="row"><div class="col-1"><b>Proyecto : </b></div><div class="col-11">'+Nompro+'</div><div class="col-1"><b>Fase :</b></div><div class="col-3">'+fase+'</div><div class="col-1"><b>Empresa :</b></div><div class="col-7">'+Nomemp+'</div><div class="col-1"><b>Fecha recibido :</b></div><div class="col-5">'+recibido+'</div> <div class="col-1"><b>Fecha límite plazo :</b></div><div class="col-5">'+entrega+'</div></div>'+
		  '<div class="row mt-2">'+
		    '<div class="col-12">'+
		      '<div class="form-group">'+
		        '<label for="sel-criterio" >Criterio</label>'+
		        '<select name="criterio" id="sel-criterio" class="custom-select inps-forms">'+
		          '<option selected disabled value="none" id="sel-criterio-def">Seleccione...</option>'+
		        '</select>'+
        	'</div>'+
		    '</div>'+
		  '</div>'+
		  '<div class="row">'+
		    '<div class="col-sm-12 col-md-6 col-lg-6">'+
		    	'<div class="text-secondary"><strong>Derecho</strong></div>'+
		    	'<hr>'+
		    	'<div style="paddin:10px">'+
		    		'<div class="form-group">'+
		        	'<label for="envia-der">Correo Envia <small>(Correo desde el cual se envía el derecho de petición).</small></label>'+
			        '<input type="email" id="envia-der" class="form-control inps-forms">'+
			      '</div>'+
			      '<div class="form-group">'+
		        	'<label for="llegada-der">Correo Llegada <small>(Correo a cual llega el derecho de petición).</small></label>'+
			        '<input type="email" id="llegada-der" class="form-control inps-forms">'+
			      '</div>'+
		        '<label for="fec-llegada-der">Fecha / Hora Llegada <small>(Fecha y hora a la que llega el correo).</small></label>'+      
			      '<div class="row">'+
			      	'<div class="col-sm-6 col-md-6 col-lg-6">'+
					      '<div class="form-group">'+
					        '<input type="date" id="fec-llegada-der" class="form-control inps-forms">'+
					      '</div>'+
			      	'</div>'+
			      	'<div class="col-sm-6 col-md-6 col-lg-6">'+
			      		'<div class="form-group">'+
					        '<input type="time" id="hora-llegada-der" class="form-control inps-forms">'+
					      '</div>'+
			      	'</div>'+
			      '</div>'+
			      '<div class="form-group">'+
			        '<label for="asunto-der">Asunto</label>'+
			        '<textarea type="text" class="form-control inps-forms" id="asunto-der"></textarea>'+
			      '</div>'+
		    	'</div>'+
		    '</div>'+
		    '<div class="col-sm-12 col-md-6 col-lg-6 bg-light">'+
		     	'<div class="text-secondary"><strong>Respuesta Derecho</strong></div>'+
		    	'<hr>'+
		    	'<div style="paddin:10px">'+
		    		'<div class="form-group">'+
		        	'<label for="envia-der-r">Correo Respuesta <small>(Correo desde el cual se envía la respuesta).</small></label>'+
			        '<input type="email" id="envia-der-r" class="form-control inps-forms">'+
			      '</div>'+
			      '<div class="form-group">'+
		        	'<label for="llegada-der-r">Correo Recepción Respuesta <small>(Correo al cual se envía la respuesta).</small></label>'+
			        '<input type="email" id="llegada-der-r" class="form-control inps-forms">'+
			      '</div>'+
		        '<label for="fec-llegada-der-r">Fecha / Hora Respuesta <small>(Fecha y hora envio de respuesta).</small></label>'+  
			      '<div class="row">'+
			      	'<div class="col-sm-6 col-md-6 col-lg-6">'+
					      '<div class="form-group">'+
					        '<input type="date" id="fec-llegada-der-r" class="form-control inps-forms">'+
					      '</div>'+
			      	'</div>'+
			      	'<div class="col-sm-6 col-md-6 col-lg-6">'+
					      '<div class="form-group">'+
					        '<input type="time" id="hora-llegada-der-r" class="form-control inps-forms">'+
					      '</div>'+
			      	'</div>'+
			      '</div>'+
			      '<div class="form-group">'+
			        '<label for="asunto-der-r">Asunto Respuesta</label>'+
			        '<textarea type="text" class="form-control inps-forms" id="asunto-der-r"></textarea>'+
			      '</div>'+
		    	'</div>'+
		    '</div>'+
		  '</div>'+
		  '<div class="text-center pt-4" id="resp-add-detalle">'+
		    '<button  class="btn-functions" id="btn-add-pers" ><i class="fas fa-check"></i>&nbsp;Guardar</button>'+
		  '</div>'+
	
	'</div>'
	;
	// Pasar contenido
	maker.s_html = html_cont;
	// Opcion
	maker.s_opt = 1;
	// Construir
	maker.maker_html();
	// Ejecutar peticion de Criterios
	// Fase
	var fase = $(btn).attr("data-fase");
	// Traer listado
	list_criterios(fase, "#sel-criterio-def");
}

// ----------------------------------------------------------
//►FUNCION-6: MODAL -> DATOS DERECHOS PETICION / DETALLLES
// ---------------------------------------------------------
function mod_detalle_list(btn){
	// ABIRI MODAL
	$("#myModalDer").modal();
  barralateral2();

  // TOMAR DATOS DERECHO PETICION 
  data_der = $(btn).attr("data-list").split(",");
  // TOMAR ID DERECHO PETCION 
  id_der_pet = $(btn).attr("data-der-l");
  // console.log("data_der", data_der);
  // SETEAR EL TITULO DEL MODAL
  $("#mod-title-der").html("DETALLES DERECHO PETICIÓN");
  
  // TRATADO FECHA ENTREGA ->
  var fec_ent_1 = data_der[3].split("-")
  var fec_ent_view = fec_ent_1[2] +"/"+ fec_ent_1[1] +"/"+ fec_ent_1[0];

  // TRATADO FECHA RECIBIDO ->
  var fec_rec_1 = data_der[2].split(" ");
  // Hora
  var hora = fec_rec_1[1];
  // Fecha 
  var fec_rec_2 = fec_rec_1[0].split("-");
  var fec_rec_view = fec_rec_2[2] +"/"+ fec_rec_2[1] +"/"+ fec_rec_2[0];
  // OBJETO MAKER
	maker = new Maker('#mod-body-der', '', 5);
	
	// LIMPIAR
	maker.maker_html();
	
	// NUEVO CONTENIDO
	var html_cont = ''+
	'<ul class="list-group mt-2 text-center">'+
  	'<li class="list-group-item list-group-item-primary"><strong>FASE: </strong>'+data_der[5].toUpperCase()+'</li>'+
  '</ul>'+
	'<div class="row mt-3">'+
		'<div class="col-sm-12 col-md-6 col-lg-6">'+
			'<ul class="list-group">'+
				'<li class="list-group-item list-group-item-light"><strong>Fecha Recibido:</strong> '+fec_rec_view+'</li>'+
				'<li class="list-group-item list-group-item-light"><strong>Hora Recibido:</strong> '+hora+'</li>'+
				'<li class="list-group-item list-group-item-danger"><strong>Fecha Limite:</strong> '+fec_ent_view+'</li>'+
			'</ul>'+
		'</div>'+
		'<div class="col-sm-12 col-md-6 col-lg-6">'+
			'<ul class="list-group">'+
				'<li class="list-group-item list-group-item-light"><strong>EMPRESA:</strong> '+ data_der[1] +'</li>'+
				'<li class="list-group-item list-group-item-light"><strong>SIGP:</strong> '+ data_der[4] +'</li>'+
				'<li class="list-group-item list-group-item-info"><strong>MEDIO:</strong> '+ data_der[6] +'</li>'+
			'</ul>'+
		'</div>'+
	'</div>'+
  '<ul class="list-group mt-2">'+
  	'<li class="list-group-item list-group-item-primary"><strong>RESUMEN</strong></li>'+
  	'<li class="list-group-item list-group-item-light">'+ $(btn).attr("data-resp") +'</li>'+
  '</ul>'+
  '<br>'+
  '<ul class="list-group mt-2 text-center">'+
  	'<li class="list-group-item list-group-item-primary"><strong>Detalles Agregados</strong></li>'+
  '</ul>'+
  '<div class="row mt-2">'+
  	'<div class="col-12">'+
  		 '<div id="accordion">'+
			  
				  
				'</div>'+
  	'</div>'+
  '</div>';
  // Pasar contenido
	maker.s_html = html_cont;
	// Opcion
	maker.s_opt = 1;
	// Construir
	maker.maker_html();
	// Listado Detalles Derechos Peticion
	
	list_details_derecho(id_der_pet, "#accordion");

}

// ----------------------------------------------------------
//►FUNCION-8: EDITA DERECHO DE PETICION
// ----------------------------------------------------------
function editar_derecho(){
	// REMOVER ALERTAS ANTERIORES
	$(".alert").remove()
	// ARRAY DE VALORES
	var val_inputs = []
	// -------------------------------------------
	//	VALIDAR CAMPOS
	// -------------------------------------------
	// Contador
	var inps_cont = 0;
	// Referecias
	var inputs = document.querySelectorAll('.inps-forms');

	// console.log(inputs.length);
	// Recorrer ->
	for(var i=0; i<inputs.length; i++){
		// Si esta vacio
		if(inputs[i].value == "" || inputs[i].value == "none"){
			// ALERTA DE ERROR ->
			$("#resp-edit-der").append(
				'<div class="alert alert-warning mt-2">'+
				  '<strong>Error!</strong> debes completar todos los campos.'+
				'</div>'
			);
			inputs[i].style.borderColor = "red"
			return false;
		}else{
			// CONTADOR
			inps_cont++;
			inputs[i].style.borderColor = "#00aef1";
			// AGREGAR AL ARRAY DE VALORES
			val_inputs.push(inputs[i].value)
		}
	}
	// -------------------------------------------
	//	VALIDAR CONTADOR
	// -------------------------------------------
	// console.log(val_inputs)
	if(inps_cont == 6){
		// TRATAR FECHA RECIBIDO
		// var frc = val_inputs[2].replace(/-/g, "/");
		var frc = val_inputs[1].split("-");
		var frc2 = frc.reverse();
		var frc3 = frc2.join("/");
		// -------------------------------------------
		// EVENTO AJAX
		// -------------------------------------------
		// Formulario ->
		var form_derechos = new FormData();
		// Agregar Valores
		form_derechos.append("p-der-pe", 1);
		form_derechos.append("id_empresa", $("#form-edit-der").attr("data-ide"))
		form_derechos.append("sigp", val_inputs[0])
		form_derechos.append("recibido", frc3 + '/' + val_inputs[2].replace(":", "/"));
		form_derechos.append("entregar", val_inputs[3])
		form_derechos.append("medio", val_inputs[4])
		form_derechos.append("observacion", val_inputs[5])
		// ENVIO OBJETO AJAX
		$.ajax({
			type:'POST',
			url:'templates/filters/fil-tec.php',
			data:form_derechos,
			cache:false,
			processData:false,
		  contentType:false,
			beforeSend:function(){
			// debug.log("Momento por favor");
			},
		  success:function(r){

		  	
		    
		    if(r){

					// DERECHO DE PETICION CREADO
					// Cerrar Modal
					CloseModalDer()
					// Mensaje
					message = "<h6 style='color:#23FFC9' class='mt-4'><i class='fas fa-thumbs-up'></i><br/>El Derecho de Peticion ha sido Actualizado!!!</h6>";
					alerts_tec(message);

					// ACTIVAR EL TAB
					document.getElementById('derp-list-derp').click();

					return false;

				}else{
					// Error de Peticion
					alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
					location.reload();
				}
			
			}
		});
	}else{
		// Error de Peticion
		alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
		location.reload();
	}
	return false;
}

// ----------------------------------------------------------
//►FUNCION-9: AGREDA DETALL DERECHO PETICION
// ----------------------------------------------------------	
function add_detail_dercho(id_der){
	// REMOVER ALERTAS ANTERIORES
	$(".alert").remove()
	// ARRAY DE VALORES
	var val_inputs = [];
	// -------------------------------------------
	//	VALIDAR CAMPOS
	// -------------------------------------------
	// Contador
	var inps_cont = 0;
	// Referecias
	var inputs = document.querySelectorAll('.inps-forms');
	// Recorrer ->
	for(var i=0; i<inputs.length; i++){
		// Si esta vacio
		if(inputs[i].value == "" || inputs[i].value == "none"){
			// ALERTA DE ERROR ->
			$("#resp-add-detalle").append(
				'<div class="alert alert-warning mt-2">'+
				  '<strong>Error!</strong> debes completar todos los campos.'+
				'</div>'
			);
			inputs[i].style.borderColor = "red"
			return false;
		}else{
			// CONTADOR
			inps_cont++;
			inputs[i].style.borderColor = "#00aef1";
			// AGREGAR AL ARRAY DE VALORES
			val_inputs.push(inputs[i].value)
		}
	}
	// console.log(val_inputs);
	/*
		0: "Puntaje adicional"
		1: "envia@gmail.com"
		2: "correoLLegada@gmail.com"
		3: "2020-09-23"
		4: "23:58"
		5: "dasdasd"
		6: "correoRespuesta@gmail.com"
		7: "correoRecibeRespuesta@gmail.cvom"		
		8: "2020-09-24"		
		9: "09:00"		
		10: "dasdasdasdas"
	*/
	// VALIDAR CONTADOR
	if(inps_cont == 11){
		// VALIDAR FECHAS -----------
		var fec_lleg_1 = new Date(val_inputs[3]);
		var fec_res_1 = new Date(val_inputs[7]);
		var year = new Date().getFullYear();
		// VALIDAR AÑOS
		if(fec_lleg_1.getFullYear() < year || fec_res_1.getFullYear() < year){
			// ALERTA DE ERROR ->
			$("#resp-add-detalle").append(
				'<div class="alert alert-warning mt-2">'+
				  '<strong>Error!</strong> el año en las fechas no puede ser menor al actual.'+
				'</div>'
			);
		
			return false;
		
		}else{

			$(".alert").remove();
			// TRATADO DE HORAS
			var hora_l = val_inputs[4].replace(":", "-");
			var hora_r = val_inputs[9].replace(":", "-");
			// OBJETO REQUEST----------------------
			request = new Request();
			// Url
			request.s_url = 'fil-tec';
			// Configuracion
			request.s_config = ['POST', false, false, false, 'json'];
			// Permiso
			request.s_permision = ['p-der-add-detalle', 1];
			// Tipo de Criterios
			// Datos de Envio
			request.s_dataSend = [
				{"name":"id_der","values":id_der},
				{"name":"criterio","values":val_inputs[0]},
				{"name":"cor_env","values":val_inputs[1]},
				{"name":"cor_lleg","values":val_inputs[2]},
				{"name":"fec_lleg","values":val_inputs[3] + "-" + hora_l},
				{"name":"asunto","values":val_inputs[5]},
				{"name":"cor_resp","values":val_inputs[6]},
				{"name":"cor_rec_resp","values":val_inputs[7]},
				{"name":"fec_resp","values":val_inputs[8] + "-" + hora_r},
				{"name":"asunto_resp","values":val_inputs[10]},
			];
			// Acciones
			request.s_actions = function(r){
				
				console.log(r);
				
				
				if(r){
					// DETALLE DE PETICION CREADO
					CloseModalDer();
					// Mensaje
					message = "<h6 style='color:#23FFC9'><i class='fas fa-thumbs-up'></i><br/>El Detalle ha sido agregado al Derecho de Peticion!!!</h6>";
					alerts_tec(message);

					// ACTIVAR EL TAB
					document.getElementById('derp-list-derp').click();

					return false;
				}else{

					alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
					location.reload()
					
				}

			}
			// Ejecutar peticion
			// Ejecutar Envio
			request.request_operation();
		}

	}else{
		// Error de Peticion
		alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
		location.reload();

	}
	return false;

}	

// ----------------------------------------------------------
//►FUNCION-10: LISTADO DE CRITERIOS
// ----------------------------------------------------------
function list_criterios(tipo, selector){
	// OBJETO REQUEST----------------------
	request = new Request();
	// Url
	request.s_url = 'fil-tec';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['p-der-cri', 1];
	// Tipo de Criterios
	// Datos de Envio
	request.s_dataSend = [
		{"name":"fase","values":tipo},
	];
	// Acciones
	request.s_actions = function(r){
		console.log(r);
		
		if(r == "error"){
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		}else{

			// Pasar Lista de Opciones
			for(i=0; i<r.length; i++){
				$(selector).after('<option value="'+r[i].nombre+'" class="opc-dep-l">'+r[i].nombre+'</option>');
			}
		}

	}
	// Ejecutar peticion
	// Ejecutar Envio
	request.request_operation();
}

// ----------------------------------------------------------
//►FUNCION-11: LISTADO DETALLES SEGUN DERECHO
// ----------------------------------------------------------
function list_details_derecho(id_der, selector){
	// OBJETO REQUEST----------------------
	request = new Request();
	// Url
	request.s_url = 'fil-tec';
	// Configuracion
	request.s_config = ['POST', false, false, false, 'json'];
	// Permiso
	request.s_permision = ['p-der-list-details', 1];
	// Tipo de Criterios
	// Datos de Envio
	request.s_dataSend = [
		{"name":"derecho_pet","values":id_der},
	];
	
	// Acciones
	request.s_actions = function(r){

		console.log(r);
		
		if(r == "error"){
		
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload()
		
		}else if(r== "no-data"){

			$(selector).after('<h6 class="text-secondary">No hay Detalles aún...</h6>')
		
		}else{

			// Pasar Lista de Opciones
			for(i=0; i<r.length; i++){
				$(selector).append(
					'<div class="card">'+
				    '<div class="card-header">'+
				      '<a class="card-link" data-toggle="collapse" href="#collapse-'+(i+1)+'">Detalle #'+(i+1)+'</a>'+
				    '</div>'+
				    '<div id="collapse-'+(i+1)+'" class="collapse" data-parent="#accordion">'+
				      '<div class="card-body">'+
				         '<ul class="list-group">'+
								  '<li class="list-group-item list-group-item-success">Criterio</li>'+
								  '<li class="list-group-item list-group-item-light">'+r[i].criterio+'</li>'+
								'</ul>'+
								'<div class="row mt-2">'+
									'<div class="col-sm-12 col-md-6 col-lg-6">'+
										'<ul class="list-group">'+
								  		'<li class="list-group-item list-group-item-info">Derecho / Envia</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Correo:</strong> '+ r[i].envia +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Recepción:</strong> '+ r[i].llega +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Fecha - Hora:</strong> '+ r[i].fecha +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Asunto:</strong> '+ r[i].asunto +'</li>'+
										'</ul>'+
									'</div>'+
									'<div class="col-sm-12 col-md-6 col-lg-6">'+
										'<ul class="list-group">'+
								  		'<li class="list-group-item list-group-item-info">Derecho / Respuesta</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Correo:</strong> '+ r[i].correo_res +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Recepción:</strong> '+ r[i].correo_rec_res +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Fecha - Hora:</strong> '+ r[i].fecha_res +'</li>'+
								  		'<li class="list-group-item list-group-item-light"><strong>Asunto:</strong> '+ r[i].asunto_res +'</li>'+
										'</ul>'+
									'</div>'+
								'</div>'+
				      '</div>'+
				    '</div>'+
				  '</div>'
				);
			}
		
		}

	}
	// Ejecutar peticion
	// Ejecutar Envio
	request.request_operation();
}

// ----------------------------------------------------------
//►FUNCION-7: CIERRA MODAL DERECHOS DE PETICION
// ----------------------------------------------------------
function CargarData(pag, div,fun) {
    var sendform = new FormData();
    sendform.append("f", fun);
    $.ajax({
        type: "POST",
        url: pag,
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#" + div).html(e);
        },
    });
}



function Del_DP(id){
    if(confirm("¿Esta seguro de eliminar el derecho de petición?")){
  var sendform = new FormData();
    sendform.append("f", "Del_DP");
    sendform.append("id", id);
    
    
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
           
            alerts_tec(e); 
          if(String(e).indexOf("eliminado")!=-1)
          { $("#tb-derp").html("")
            list_derechos_pet()  
          }
        },
    });   
    
    }
}

function BuscarempresaSIGP(){
    
  var sendform = new FormData();
    sendform.append("f", "BuscarempresaSIGP");
    sendform.append("sigp", $("#sigp-code").val());
    
    
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
          
            $("#sel-emp-der").val(e);
        },
    });   
    
}

function CloseModalDer(){
  $("#myModalDer").modal("toggle");
  $("#mod-body-der").empty();
  barralateral();
}
function CargarDatosDerPet(id) {
    var sendform = new FormData();
    sendform.append("f", "CargarDatosDerPet");
    sendform.append("id", id);
    $.ajax({
        type: "POST",
        url: "phpMVC/Controller/controller2.php",
        data: sendform,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (e) {
            
            var respuesta = JSON.parse(e);

            $("#sigp-code").val(respuesta[5]);
            $("#sel-emp-der").val(respuesta[4]);
            $("#sel-fase").val(respuesta[6]);
            $("#fec-recibido").val(respuesta[0]);
            $("#hora-recibido").val(respuesta[1]);
            $("#med_resp").val(respuesta[3]);
            $("#resumen-obs").val(respuesta[2]);
            calculaHabiles()
        },
    });
}