
// ---------------------------------------------------------------------------------------------
//►Titulo: CONTROLADOR DEL LOS MANDOS DE USUARIO
// ---------------------------------------------------------------------------------------------
/*►Descripcion: Controla los eventos del dash de usuario tec*/
/*Funcion-1: Controla la botonera lateral del Usuario TECNICO*/
function tabs_tec(tab, btn){
	// Objeto Majer
	maker = new Maker("#tabs-content", "", 5);
	// Limpiar contenedor de tabs
	maker.maker_html();
	switch(tab){
		case 'exit':
			CloseSesion();
		break;
		case 'config':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<h5>Configuraciones de Usuario</h5>'+
				'<hr/>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		// ----------------------------------------------
		// MODULO DERECHOS DE PETICION
		// ----------------------------------------------
		case 'dpt':
			// CONTENIDO
			html_cont = ''+
			'<div class="nd-conv">'+
				'<div class="nav-functions">'+
					'<h5 class="tit-nodo"><i class="fa fa-file-contract"></i>&nbsp;Derechos de Petición</h5>'+
					'<button class="btn-functions" id="def-derp" onclick="tabs_der(1, this)"><i class="fas fa-plus"></i>&nbsp; &nbsp;Crear</button>'+
					'<button class="btn-functions" id="derp-list-derp" onclick="tabs_der(2, this)"><i class="fas fa-cogs"></i></i>&nbsp; &nbsp;Listado y Detalles</button>'+
				'</div>'+
				'<div class="cont-convo-fun text-center" id="cont-derp-fun"></div>'+
			'</div>';
			// PASO DE CONTENIDO
			maker.s_html = html_cont;
			maker.s_opt = 1;
			// CREAR CONTENIDO
			maker.maker_html();
			// ACTIVAR EL TAB
			document.getElementById('def-derp').click();
		break;
		case 'ndc':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<div class="nav-functions">'+
					'<h5 class="tit-nodo"><i class="fas fa-flag"></i>&nbsp;Convocatorias</h5>'+
					'<button class="btn-functions" onclick="convo_fun(1, this)" id="deft-conv"><i class="fas fa-plus"></i>&nbsp; &nbsp;Crear</button>'+
					//'<button class="btn-functions" onclick="convo_fun(2, this)"><i class="fas fa-check-square"></i>&nbsp; &nbsp;Criterios</button>'+
					'<button class="btn-functions" id="btnlist" onclick="convo_fun(3, this)"><i class="fas fa-list-ol"></i>&nbsp; &nbsp; Listado</button>'+
					'<button class="btn-functions btn-functions-active" onclick="cri_ele($(\'#cri_ele\'))" id="cri_ele"><i class="fas fa-check-square"></i>&nbsp;Requisitos elegibilidad</button>'+
					'<button class="btn-functions" id="cri_via" onclick="cri_via($(\'#cri_via\'))"><i class="fa fa-thumbs-up"></i>&nbsp;Requisitos viabilidad</button>'+
					'<button class="btn-functions" onclick="causales($(\'#causa_rec\'))" id="causa_rec"><i class="fas fa-thumbs-down"></i>&nbsp; &nbsp;Causales rechazo</button>'+
				'</div>'+
				'<div class="cont-convo-fun text-center" id="cont-convo-fun">'+
				'</div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Activar tab
			document.getElementById("deft-conv").click();
		break;
		case 'ndc2':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<div class="nav-functions">'+
					'<h5 class="tit-nodo"><i class="fas fa-flag"></i>&nbsp;Convocatorias</h5>'+
					
					//'<button class="btn-functions" onclick="convo_fun(2, this)"><i class="fas fa-check-square"></i>&nbsp; &nbsp;Criterios</button>'+
					'<button class="btn-functions" id="btn1" onclick="ListadoConvocatorias(1)"><i class="fas fa-list-ol"></i>&nbsp; &nbsp; Listado</button>'+
					'<button class="btn-functions btn-functions-active" onclick="LCrecp($(\'#cri_ele\'))" id="cri_ele"><i class="fas fa-check-square"></i>&nbsp;Requisitos elegibilidad</button>'+
					'<button class="btn-functions" id="cri_via" onclick="LCrvcp($(\'#cri_via\'))"><i class="fa fa-thumbs-up"></i>&nbsp; &nbsp;Requisitos viabilidad</button>'+
					'<button class="btn-functions" onclick="LCaucp($(\'#causa_rec\'))" id="causa_rec"><i class="fas fa-thumbs-down"></i>&nbsp; &nbsp;Causales rechazo</button>'+
				'</div>'+
				'<div class="cont-convo-fun text-center" id="cont-convo-fun">'+
				'</div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Activar tab
			document.getElementById("btn1").click();
		break;
		case 'ndpe':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<div class="nav-functions">'+
					'<h5 class="tit-nodo"><i class="fas fa-users"></i>&nbsp;Personal</h5>'+
					'<button class="btn-functions" onclick="personal_fun(1, this)" id="deft-person"><i class="fas fa-plus"></i>&nbsp; &nbsp;Crear</button>'+
					'<button class="btn-functions" onclick="personal_fun(2, this)" id="lstper"><i class="fas fa-list-ol"></i>&nbsp; &nbsp;Listado</button>'+
					''+
				'</div>'+
				'<div class="cont-convo-fun text-center"	 id="cont-pers-fun"></div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Activar tab inicial
			document.getElementById("deft-person").click();
		break;
case 'ndpe2':
			// Contenido
			html_tab = ''+
			'<div class="nd-conv">'+
				'<div class="nav-functions">'+
					'<h5 class="tit-nodo"><i class="fas fa-users"></i>&nbsp;Personal</h5>'+
					'<button class="btn-functions" onclick="asignarpro(this)" id="asiper"><i class="fas fa-check-circle"></i>&nbsp; &nbsp;Asignar</button>'+
				'</div>'+
				'<div class="cont-convo-fun text-center"	 id="cont-pers-fun"></div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Activar tab inicial
			//document.getElementById("deft-person").click();
			asignarpro($("#asiper"))

		break;


		case 'ndpr':
			// Contenido
			html_tab = ''+
			'<div class="nd-pers">'+
				'<h5 class="tit-nodo"><i class="fas fa-book-open"></i>&nbsp;Proyectos</h5>'+
				'<hr/>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_tab;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
		
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();
		break;	
	}
	// Identificar botones
	$(".btn-tab").removeClass("btn-nav-active");
	// Agregar clase a boton por defecto
	$(btn).addClass("btn-nav-active");
}

/*Funcion-2: Controla la botonera del Nodo convocatorias*/
function convo_fun(fun, btn){
	// Objeto maker
	maker = new Maker("#cont-convo-fun", "", 5);
	// Limpiar contenedor de funciones
	maker.maker_html();
	// Tipo De Funcion
	switch(fun){
		case 1: // CREAR CONVOCATORIAS
			// Contenido
			var html_fun = ''+
			'<div class="form-convo container">'+
				'<div class="row"><div class="col-md-12" style="color:red;text-align:left;margin-bottom:20px;">Campos obligatorios *</div><div class="col-md-6"><div class="form-group">'+
				  '<label>Nombre / Titulo</label>'+
				  '<input type="text" class="form-control inps-forms" placeholder="Nombre o título de la convocatoria">'+
				'</div></div>'+
				'<div class="col-md-6"><div class="form-group">'+
				  '<label>Descripción / Contenido:</label>'+
				  '<textarea class="form-control inps-forms" rows="2" placeholder="Descripción de la convocatoria"></textarea>'+
				'</div></div></div>'+
				'<div class="row"><div class="col-md-6"><div class="form-group">'+
				  '<label>Entidad Contratante</label>'+
				  '<input type="text" class="form-control inps-forms" placeholder="Entidad contratante en la empresa">'+
				'</div></div>'+
				''+
					'<div class="col-6">'+
						'<div class="form-group">'+
						  '<label>Fecha de Inicio</label>'+
						  '<input type="date" placeholder="yyyy-mm-dd" class="form-control inps-forms" pattern="(?:19|20)\[0-9\]{2}-(?:(?:0\[1-9\]|1\[0-2\])-(?:0\[1-9\]|1\[0-9\]|2\[0-9\])|(?:(?!02)(?:0\[1-9\]|1\[0-2\])-(?:30))|(?:(?:0\[13578\]|1\[02\])-31))">'+
						'</div>'+
					'</div></div>'+
					'<div class="row"><div class="col-6">'+
						'<div class="form-group">'+
						  '<label>Fecha de Cierre</label>'+
						  '<input type="date" placeholder="yyyy-mm-dd" class="form-control inps-forms" pattern="(?:19|20)\[0-9\]{2}-(?:(?:0\[1-9\]|1\[0-2\])-(?:0\[1-9\]|1\[0-9\]|2\[0-9\])|(?:(?!02)(?:0\[1-9\]|1\[0-2\])-(?:30))|(?:(?:0\[13578\]|1\[02\])-31))">'+
						'</div>'+
					'</div>'+
				''+
				'<div class="col-6"><div class="form-group">'+
				  '<label>Página de la Convocatoria <span class="small">(Opcional)</span></label>'+
				  '<input type="text" class="form-control inps-forms-no" id="url-conv" placeholder="página web de la convocatoria">'+
				'</div>'+
				'<div></div>'+
					''+
				'</div>'+
				'<div class="col-12"><br><button class="btn-functions" onclick="add_announcement()"><i class="fas fa-check"></i>&nbsp;Guardar</button></div>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
		break;
	
		case 2: //CREAR CRITERIOS PARA CONVOCATORIA
			// Contenido
			var html_fun = ''+
			'<div id="cont-criterios">'+
				'<h5 style="">CONVOCATORIA</h5>'+
				'<div class="container d-flex justify-content-center">'+
				  '<select id="sel-convs-crit" class="custom-select inps-sel-cus" onchange="evaluation_crit(1)">'+
			  		'<option id="opt-deft-crit" selected disabled>Seleccione Convocatoria</option>'+
			  		'<option class="sel-remove-crite">Seleccione Convocatoria</option>'+
				  '</select>'+
				'</div>'+
				'<div id="calisific-crits" class="mt-1">'+
					'<h5 style="">CLASIFICACIÓN DE CRITERIOS</h5>'+
					'<div class="row text-center mt-1 p-2">'+
						'<div class="col-4">'+
							'<div id="radio-clase-crit" class="box-radios">'+
								'<h5 class="">CLASE</h5>'+
								'<p class="">Seleccion una sola clase de criterio</p>'+
								'<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rdc-a" value="Elegibilidad" name="clase">'+
						      '<label class="custom-control-label" for="rdc-a">ELEGIBILIDAD</label>'+
						    '</div>'+
						    '<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rdc-b" value="Viabilidad" name="clase">'+
						      '<label class="custom-control-label" for="rdc-b">VIABILIDAD</label>'+
						    '</div>'+
						    '<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rdc-c" value="Especial" name="clase">'+
						      '<label class="custom-control-label" for="rdc-c">ESPECIAL</label>'+
						    '</div>'+
							'</div>'+
						'</div>'+
						'<div class="col-4">'+
							'<div id="radio-cate-crit" class="box-radios">'+
								'<h5 class="">CATEGORIA</h5>'+
								'<p class="">Seleccion una categoria</p>'+
								'<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rtt-a" name="categoria">'+
						      '<label class="custom-control-label" for="rtt-a">JURÍDICO</label>'+
						    '</div>'+
						    '<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rtt-b" name="categoria">'+
						      '<label class="custom-control-label" for="rtt-b">FINANCIERO</label>'+
						    '</div>'+
						    '<div class="custom-control custom-radio custom-control-inline">'+
						      '<input type="radio" class="custom-control-input" id="rtt-c" name="categoria">'+
						      '<label class="custom-control-label" for="rtt-c">TÉCNICO</label>'+
						    '</div>'+
							'</div>'+
						'</div>'+
						'<div class="col-4">'+
							'<div id="radio-tipo-crit" class="box-radios">'+
								'<h5 class="">TIPO</h5>'+
								'<p class="">Seleccion un tipo de criterio</p>'+
								'<div class="custom-control custom-radio custom-control-inline">'+
						      '<input onclick="evaluation_crit(2)" type="radio" class="custom-control-input" id="rdt-a" name="tipo">'+
						      '<label class="custom-control-label" for="rdt-a">CUANTITATIVO</label>'+
						    '</div>'+
						    '<div class="custom-control custom-radio custom-control-inline">'+
						      '<input onclick="evaluation_crit(3)" type="radio" class="custom-control-input" id="rdt-b" name="tipo">'+
						      '<label class="custom-control-label" for="rdt-b">CUALITATIVO</label>'+
						    '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'<div id="config-crits" class="mt-4">'+
					'<h5 id="config-title">CONFIGURACIÓN DE CRITERIOS</h5>'+	
				'</div>'+

			'</div>';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			get_announcements_selector("#opt-deft-crit", ".sel-remove-crite");
		break;
		case 3: // LISTADO GENERAL DE CONVOCATORIAS
			// Contenido
			var html_fun = ''+
			'<div id="cont-list-convos">'+
				'<input type="text"  placeholder="Buscar convocatoria" class="form-control" onkeyup=\"TableFilter(\'#tblconv\',this.value)\"><table class="table table-bordered" id="tblconv">'+
					'<thead style="background:#f8f9fa;">'+
						'<tr>'+
							'<th>#</th>'+
							'<th>Nombre</th>'+
							'<th>Fecha de Inicio</th>'+
							'<th>Fecha de Cierre</th>'+
							'<th>Entidad</th>'+
							'<th>Url - Web</th>'+
							'<th>Acciones</th>'+
						'</tr>'+
					'</thead>'+
					'<tbody id="bd-list-convos">'+
						'<tr class="text-center" id="list-convos-spinner"><td colspan="7" style="text-align:center!important;">'+
							'<div class="spinner-border text-dark"></div>'+
							'<p class="">Cargando datos...</p>'+
						'</td></tr>'
					'</tbody>'+
				'</table>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Llamado de lista
			list_announcements();
		break;

case 4: // LISTADO GENERAL DE CONVOCATORIAS
			// Contenido
			var html_fun = ''+
			'<div id="cont-list-convos">'+
				'<input type="text"  placeholder="Buscar convocatoria" class="form-control" onkeyup=\"TableFilter(\'#tblconv\',this.value)\"><table class="table table-bordered" id="tblconv">'+
					'<thead style="background:#f8f9fa;">'+
						'<tr>'+
							'<th>#</th>'+
							'<th>Nombre</th>'+
							'<th>Fecha de Inicio</th>'+
							'<th>Fecha de Cierre</th>'+
							'<th>Entidad</th>'+
							'<th>Url - Web</th>'+
							'<th>Acciones</th>'+
						'</tr>'+
					'</thead>'+
					'<tbody id="bd-list-convos">'+
						'<tr class="text-center" id="list-convos-spinner"><td colspan="7" style="text-align:center!important;">'+
							'<div class="spinner-border text-dark"></div>'+
							'<p class="">Cargando datos...</p>'+
						'</td></tr>'
					'</tbody>'+
				'</table>'+
			'</div>';
			// Pasar Contenido
			maker.s_html = html_fun;
			maker.s_opt = 1;
			// Crear contenido
			maker.maker_html();
			// Llamado de lista
			list_announcements2();
		break;
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();		
		break;
	}	

	// Remover Clase de botones no activos
	$(".btn-functions").removeClass("btn-functions-active");
	// Agregar clase al boton
	$(btn).addClass("btn-functions-active");
}
/*Funcion-3: Controla la botonera del Nodo Personal*/
function personal_fun(fun, btn){
	// Objeto Maker
	maker = new Maker("#cont-pers-fun", "", 5);
	// Limpiar contenedor
	maker.maker_html();
	// Switch de Funciones
	switch(fun){
		// Crear Usuarios
		case 1:
			// Contenido Html
			var html_pers = ''+
			''+
					'<div class="row"><br>'+
	'	<br><div class="col-md-12" style="color:red;text-align:left;">Campos obligatorios *</div><br><br>'+
						'<div class="col-md-6">'+
							'<div class="form-group">'+
					  		'<label>Nombres/Apellidos<span style="color:red;">*</span></label>'+
					  		
			  				'<input type="text" class="form-control inps-forms" placeholder="Nombres y apellidos">'+
							'</div>'+
				  		'<label>Tipo de Identificación <span style="color:red;">*</span></label>'+
						 	'<select id="sel-per-iden" class="custom-select inps-forms mb-3">'+
					    	'<option selected disabled value="none">Seleccione...</option>'+
					    	'<option value="1">Cédula de ciudadanía</option>'+
					    	'<option value="2">Pasaporte</option>'+
					    	'<option value="3">Cédula de extranjeria</option>'+
					    	'<option value="4">NIT</option>'+
					  	'</select>'+
					  	'<div class="form-group">'+
					  		'<label>Número de Identificación <span style="color:red;">*</span></label>'+
			  				'<input type="text" class="form-control inps-forms" placeholder="Número de identificación">'+
							'</div>'+
							'<div class="form-group">'+
					  		'<label>Teléfono <span style="color:red;">*</span></label>'+
			  				'<input type="text" class="form-control inps-forms" placeholder="Teléfono">'+
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
			  				'<input type="text" class="form-control inps-forms" placeholder="Dirección de residencia">'+
							'</div>'+

							
							'<div class="form-group">'+
					  		'<label>Email<span style="color:red;">*</span></label>'+
			  				'<input type="email" class="form-control inps-forms" placeholder="Correo electrónico">'+
							'</div>'+
							'<div class="form-group">'+
					  		'<label>Contraseña<span style="color:red;">*</span></label>'+
			  				'<input type="password" class="form-control inps-forms" placeholder="Contraseña">'+
							'</div>'+
							'<div class="form-group">'+
							'<label>Rol  <span style="color:red;">*</span></label>'+
						 	'<select id="sel-rol" class="custom-select inps-forms mb-3">'+
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
			  				'<textarea type="text" class="form-control inps-forms" placeholder="Perfil profesional"></textarea>'+
							'</div></div>'+
					'</div>'+
					'<div class="text-center">'+
						'<button class="btn-functions" id="btn-add-pers" onclick="add_pers()"><i class="fas fa-check"></i>&nbsp;Guardar</button>'+
					'</div>'+
			'';
			// Pasar Contenido
			maker.s_html = html_pers;
			// Cambiar Opcion
			maker.s_opt = 1;
			// Contruir
			maker.maker_html();
			// Traer departamentos
			get_departaments("#opc-dep-deft", "#sel-ciud");
		break;
		// Listar Usuarios
		case 2:
			// Contenido Html
			var html_pers = ''+
			'<div id="cont-list-users">'+
			'<input type="text"  placeholder="Buscar usuarios" class="form-control" onkeyup=\"TableFilter(\'#tblusu\',this.value)\">'+
				'<table class="table table-bordered" id="tblusu">'+
					'<thead style="background:#f8f9fa;" >'+
						'<tr>'+
							'<th>#</th>'+
							'<th>Nombre</th>'+
							'<th>Email</th>'+
							'<th>Rol</th>'+
							'<th>Estado</th>'+
							'<th>Acciones</th>'+
						'</tr>'+
					'</thead>'+
					'<tbody id="bd-list-per">'+
						'<tr class="text-center" id="list-per-spinner"><td colspan="6" style="text-align:center!important;">'+
							'<div class="spinner-border text-dark"></div>'+
							'<p class="">Cargando datos...</p>'+
						'</td></tr>'
					'</tbody>'+
				'</table>'+
			'</div>';
			// Set contenido
			maker.s_html = html_pers;
			// Set opcion
			maker.s_opt = 1;
			// Crear
			maker.maker_html();
			list_pers();
		break;
		// Default
		default:
			alert('Lo sentimos ha ocurrido un error, intenta de nuevo mas tarde');
			location.reload();	
		break;
	}
	// Remover Clase de botones no activos
	$(".btn-functions").removeClass("btn-functions-active");
	// Agregar clase al boton
	$(btn).addClass("btn-functions-active");
}
/*Funcion-4: Cierre de Session*/
function CloseSesion(){
  //borrado de cookies    
  document.cookie.split(";").forEach(function(c) {
  document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
  });
  //borrado de variables de sesion
  $.ajax({
		type:'POST',
		url:'templates/filters/filterLogin.php?CloseSesion=1',
		data:{},
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
			// debug.log("Momento por favor");
		},
	  success:function(e){
	    // refrescar pagina posterior a eliminacion de sesion
	    location.reload()
		}
	});
}
TableFilter = function(id, value){

		

        var rows = document.querySelectorAll(id + ' tbody tr');

    

        for(var i = 0; i < rows.length; i++){

            var showRow = false;

            

            var row = rows[i];

            row.style.display = 'none';

            

            for(var x = 0; x < row.childElementCount; x++){

                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){

                    showRow = true;

                    break;

                }

            }

          

            if(showRow){

                row.style.display = null;

            }

        }

    }


    function ListadoConvocatorias(listado){
    
  //enviar solicitud de listado de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("tp", listado);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?LC=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
	$("#btn"+listado).addClass("btn-functions-active");
}

function DetailConvo(id){
    
  //enviar solicitud de detalle de convocatorias
   $("#cont-convo-fun").html("<div class='spinner-border text-dark'></div>");
  var sendform = new FormData();
  sendform.append("id",id);
  $.ajax({
		type:'POST',
		url:'templates/filters/filterEval.php?DC=1',
		data:sendform,
		cache:false,
		processData:false,
	  contentType:false,
		beforeSend:function(){
		// debug.log("Momento por favor");
		},
	  success:function(e){
	    // Cargar el listado de convocatorias en el elemento div
	    $("#cont-convo-fun").html(e);
		}
	});
	$(".btn-functions").removeClass("btn-functions-active");
}
// Fin------------------------------------------------------------------------------------------