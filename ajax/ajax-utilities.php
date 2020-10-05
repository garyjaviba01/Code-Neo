<?php 
/*----------------------------------------------------------------------*/
#Titulo:AJAX UTILIDADES
/*----------------------------------------------------------------------*/
#►CLASE CONTROLADOR:
require_once "../../controllers/ctr-utilities.php";
#►CLASE MODELO:
require_once "../../models/mdl-utilities.php";
#►CLASE AJAX:
class Ajax_utils{
	#►Propiedad de datos:	
	public $dts_ajax;
 	#►Metodo-1: Listado de Departamentos-------------------------------------->
	public function departaments_list(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new UtilitiesCtr();
		// Ejecutar Metodo  y alamacenar respuesta
		$obj_ctr->get_departaments_list_ctr($dts_ctr);
	}
 	#►Metodo-2: Listado de Ciudad / Departamento------------------------>
	public function cities_list(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new UtilitiesCtr();
		// Ejecutar Metodo  y alamacenar respuesta
		$obj_ctr->get_cities_list_ctr($dts_ctr);
	}
	#►Metodo-3: Listado de Convocatorias-------------------------------------->
	public function convos_list(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new UtilitiesCtr();
		// Ejecutar Metodo  y alamacenar respuesta
		$obj_ctr->get_convos_list_ctr($dts_ctr);	
	}
	
	#►Metodo-4: Listado de Empresas-------------------------------------->
	public function get_enterprises(){
		// Pass de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto Controller
		$obj_ctr = new UtilitiesCtr();
		// MEtodo y Respuesta
		$obj_ctr->get_enterprises_ctr($dts_ctr);
	}
}
/*Fin-------------------------------------------------------------------*/
?>