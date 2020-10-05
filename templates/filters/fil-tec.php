<?php 
/*-----------------------------------------------------------*/
#Titulo:FILTRO GESTOR TECNICO
/*-----------------------------------------------------------*/
#►CLASE AJAX:
require_once "../../ajax/ajax-tec.php";
#►OPERACIONES NODO CONVOCATORIAS---------------------------:
#►INSERTAR NUEVA CONVOCATORIA:
if(isset($_POST["tec-add-conv"])){
	if($_POST["tec-add-conv"] == 1){
	 	// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso de valores
		$obj_ajax->dts_ajax = array(
			"per"=>$_POST['tec-add-conv'],
			"titulo"=>$_POST['titulo'],
			"descripcion"=>$_POST['descripcion'],
			"entidad"=>$_POST['entidad'],
			"startfec"=>$_POST['start-fec'],
			"endfec"=>$_POST['end-fec'],
			"urlconv"=>$_POST['url-conv']
		);
		// Metodo Ajax
		$obj_ajax->add_announcement();
	}
}
if(isset($_POST["tec-upd-conv"])){
	if($_POST["tec-upd-conv"] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso de valores
		$obj_ajax->dts_ajax = array(
			"cod"=>$_POST['cod'],
			"per"=>$_POST['tec-upd-conv'],
			"titulo"=>$_POST['titulo'],
			"descripcion"=>$_POST['descripcion'],
			"entidad"=>$_POST['entidad'],
			"startfec"=>$_POST['start-fec'],
			"endfec"=>$_POST['end-fec'],
			"urlconv"=>$_POST['url-conv']
		);
		// Metodo Ajax
		$obj_ajax->upd_announcement();
	}
}
#►LISTADO DE CONVOCATORIAS:
if(isset($_POST['tec-list-convos'])){
	// Validar permiso
	if($_POST['tec-list-convos'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = $_POST['tec-list-convos'];
		// Metodo
		$obj_ajax->list_announcements();
	}
}
if(isset($_POST['tec-del-convo'])){
	// Validar permiso
	if($_POST['tec-del-convo'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
	 $obj_ajax->dts_ajax = array(
			"id"=>$_POST['id']
		);
		// Metodo
		$obj_ajax->del_convo();
	}
}
if(isset($_POST['tec-del-per'])){
	// Validar permiso
	if($_POST['tec-del-per'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
	 $obj_ajax->dts_ajax = array(
			"id"=>$_POST['id']
		);
		// Metodo
		$obj_ajax->del_per();
	}
}
if(isset($_POST['tec-upd-est'])){
	// Validar permiso
	if($_POST['tec-upd-est'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
	 $obj_ajax->dts_ajax = array(
			"id"=>$_POST['id'],
			"st"=>$_POST['st']
		);
		// Metodo
		$obj_ajax->updst_per();
	}
}
#►OPERACIONES NODO PERSONAL--------------------------------:
#►INSERTAR NUEVO USARIO:
if(isset($_POST['tec-add-per'])){
	// Validar permiso
	if($_POST['tec-add-per'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso de valores
		$obj_ajax->dts_ajax = array(
			"per"=>$_POST['tec-add-per'],
			"nombre"=>$_POST['nombre'],
			"tident"=>$_POST['t-identi'],
			"identificacion"=>$_POST['identificacion'],
			"telefono"=>$_POST['telefono'],
			"ciudad"=>$_POST['ciudad'],
			"profesion"=>$_POST['profesion'],
			"email"=>$_POST['email'],
			"password"=>$_POST['password'],
			"rol"=>$_POST['rol'],
			"estado"=>$_POST['estado'],
			"direccion"=>$_POST['direccion']
		);
		// Llamado del metodo 
		$obj_ajax->add_user();
	}	
}
if(isset($_POST['tec-upd-per'])){
	// Validar permiso
	if($_POST['tec-upd-per'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso de valores
		$obj_ajax->dts_ajax = array(
			"cod"=>$_POST['cod'],
			"nombre"=>$_POST['nombre'],
			"tident"=>$_POST['t-identi'],
			"identificacion"=>$_POST['identificacion'],
			"telefono"=>$_POST['telefono'],
			"ciudad"=>$_POST['ciudad'],
			"profesion"=>$_POST['profesion'],
			"email"=>$_POST['email'],
			"password"=>$_POST['password'],
			"rol"=>$_POST['rol'],
			"estado"=>$_POST['estado'],
			"direccion"=>$_POST['direccion']
		);
		// Llamado del metodo 
		$obj_ajax->upd_user();
	}	
}
#►LISTADO DE USUARIOS:
if(isset($_POST['tec-list-per'])){
	// Validar permiso
	if($_POST['tec-list-per'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = $_POST['tec-list-per'];
		// Metodo
		$obj_ajax->list_users();
	}
}

#►OPERACIONES NODO DERECHOS DE PETICION--------------------------------:
#►NUEVO DERECHO DE PETICION:
if(isset($_POST['p-der-p'])){
	// PERMISO
	if($_POST['p-der-p'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso de valores
		$obj_ajax->dts_ajax = array(
			"p-der-p" => $_POST['p-der-p'],
			"sigp" => $_POST['sigp'],
			"fase" => $_POST['fase'],
			"recibido" => $_POST['recibido'],
			"empresa" => $_POST['empresa'],
			"entregar" => $_POST['entregar'],
			"medio" => $_POST['medio'],
			"observacion" => $_POST['observacion']
		);
	echo $_POST['empresa'] ;
		// EJECUTAR METODO
		$obj_ajax->add_der_p();
	}
}

#►LISTADO DERECHOS DE PETICION:
if(isset($_POST['tec-list-derp'])){
	// Validar permiso
	if($_POST['tec-list-derp'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = $_POST['tec-list-derp'];
		// Metodo
		$obj_ajax->list_derp_p();
	}
}

#►EDITAR DERECHOS DE PETICION:
if(isset($_POST['p-der-pe'])){
	// Validar permiso
	if($_POST['p-der-pe'] == 1){		
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = array(
			"id"=>$_POST['id'],
			"sigp"=>$_POST['sigp'],
			"fase"=>$_POST['fase'],
			"recibido"=>$_POST['recibido'],
			"entregar"=>$_POST['entregar'],
			"empresa" => $_POST['empresa'],
			"medio"=>$_POST['medio'],
			"observacion"=>$_POST['observacion']
		);
	     //echo json_encode($obj_ajax->dts_ajax);
		// Metodo
		$obj_ajax->editar_der_pet();
	}
}

#►LISTADO DE CRITERIOS DERECHOS:
if(isset($_POST['p-der-cri'])){
	// Validar permiso
	if($_POST['p-der-cri'] == 1){
		// echo json_encode($_POST['fase']);		
		
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = array(
			"permiso"=>$_POST['p-der-cri'],
			"fase"=>$_POST['fase']
		);
		// Metodo
		$obj_ajax->list_criterios();
		
	}
}
#►AGREGAR DETALLES A DERECHO DE PETICION:
if(isset($_POST['p-der-add-detalle'])){
	// Validar permiso
	if($_POST['p-der-add-detalle'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = array(
			"permiso" => $_POST['p-der-add-detalle'],
			"id_der" => $_POST['id_der'],
			"criterio" => $_POST['criterio'],
			"cor_env" => $_POST['cor_env'],
			"cor_lleg" => $_POST['cor_lleg'],
			"fec_lleg" => $_POST['fec_lleg'],
			"asunto" => $_POST['asunto'],
			"cor_resp" => $_POST['cor_resp'],
			"cor_rec_resp" => $_POST['cor_rec_resp'],
			"fec_resp" => $_POST['fec_resp'],
			"asunto_resp" => $_POST['asunto_resp']
		);
		// Metodo
		$obj_ajax->add_detail_derecho();
	}
}

#►LISTADO DETALLES SEGUN DERECHO PETICION:
if(isset($_POST['p-der-list-details'])){
	// Validar permiso
	if($_POST['p-der-list-details'] == 1){
		// echo json_encode($_POST['fase']);		
		
		// Objeto Ajax
		$obj_ajax = new Ajax_Tec();
		// Paso
		$obj_ajax->dts_ajax = array(
			"permiso"=>$_POST['p-der-list-details'],
			"derecho_pet"=>$_POST['derecho_pet']
		);
		// Metodo
		$obj_ajax->list_details_der();
		
	}
}


/*Fin--------------------------------------------------------*/
?>