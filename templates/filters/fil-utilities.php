<?php 
/*----------------------------------------------------------------------*/
#Titulo:FILTRO UTILIDADES
/*----------------------------------------------------------------------*/
#►CLASE AJAX:
require_once "../../ajax/ajax-utilities.php";	
#►LISTADO DE DEPARTAMENTOS:
if(isset($_POST['util-dep'])){
	// Validar permiso
	if($_POST['util-dep'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_utils();
		// Paso de valores
		$obj_ajax->dts_ajax = $_POST['util-dep'];
		// Ejecutar metodo ajax
		$obj_ajax->departaments_list();
	}
}
#►LISTADO DE CIUDADES:
if(isset($_POST['util-ciud'])){
	// Validar permiso
	if($_POST['util-ciud'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_utils();
		// PAso de valores
		$obj_ajax->dts_ajax = [$_POST['util-ciud'], $_POST['opc-dep']];
		// Ejecutar Metodo Ajax
		$obj_ajax->cities_list();
	}
}
#►LISTADO DE CONVOCATORIAS:
if(isset($_POST['util-convos'])){
	// Validar permiso
	if($_POST['util-convos'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_utils();
		// PAso de valores
		$obj_ajax->dts_ajax = $_POST['util-convos'];
		// Ejecutar Metodo Ajax
		$obj_ajax->convos_list();
	}
}

#►LISTADO DE EMPRESAS:
if(isset($_POST['util-empresas'])){
	// VALIDAR PERMISO
	if($_POST['util-empresas'] == 1){
		// Objeto Ajax
		$obj_ajax = new Ajax_utils();
		// Paso de valores
		$obj_ajax->dts_ajax = $_POST['util-empresas'];
		// Ejecutar Metodo
		$obj_ajax->get_enterprises();							
	}
}

/*Fin-------------------------------------------------------------------*/
?>