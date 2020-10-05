<?php 
/*-----------------------------------------------------------*/
#Titulo:AJAX GESTOR TECNICO
/*-----------------------------------------------------------*/
#►CONTROLLER:
require_once "../../controllers/ctr-tec.php";
#►MODEL:
require_once "../../models/mdl-tec.php";
#►CLASE AJAX:
class Ajax_Tec{
	#►Propiedad de datos:	  
	public $dts_ajax;
	#►OPERACIONES NODO CONVOCATORIAS--------------------------:
 	#►Metodo-1:INSERTAR NUEVA CONVOCATORIA------------------>
	public function add_announcement(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->add_announcement_ctr($dts_ctr);
	}
	public function upd_announcement(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->upd_announcement_ctr($dts_ctr);
	}
	#►Metodo-2: Listado de Convocatorias--------------------->
	public function list_announcements(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->list_announcement_ctr($dts_ctr);
	}
	
	#►OPERACIONES NODO PERSONAL--------------------------------:
 	#►Metodo-1:INSERTAR NUEVO USARIO------------------------->
	public function del_convo(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->del_convo($dts_ctr);
	}
	public function del_per(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->del_per($dts_ctr);
	}
	public function updst_per(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->updst_per($dts_ctr);
	}
	public function add_user(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->add_user_ctr($dts_ctr);
	}
	public function upd_user(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo del controller
		$obj_ctr->upd_user_ctr($dts_ctr);
	}
 	#►Metodo-2: Listado de Usuarios--------------------->
	public function list_users(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->list_users_ctr($dts_ctr);
	}
	
	#►OPERACIONES NODO DERECHO DE PETICION--------------------------------:

 	#►Metodo-1:AGREGAR DERECHO DE PETICION------------>
	public function add_der_p(){
		// Objeto Controller
		$obj_ctr = new TecnicCtr();
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Ejecutar Metodo
		$obj_ctr->add_der_p_ctr($dts_ctr);
	}
	#►Metodo-2: Listado de Derechos peticion--------------------->
	public function list_derp_p(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->list_derp_p_ctr($dts_ctr);
	}
	#►Metodo-3: Editar derecho peticion--------------------->
	public function editar_der_pet(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->editar_der_pet_ctr($dts_ctr);
	}	
	#►Metodo-4: Listado Criterios Derechos--------------------->
	public function list_criterios(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->list_criterios_ctr($dts_ctr);
	}
	#►Metodo-5: Agrega Detalle a Derecho Peticion--------------------->
	public function add_detail_derecho(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->add_detail_derecho_ctr($dts_ctr);
	}
	#►Metodo-6: Listado Detalles segun Derechos--------------------->
	public function list_details_der(){
		// Paso de valores
		$dts_ctr = $this->dts_ajax;
		// Objeto controller
		$obj_ctr = new TecnicCtr();
		// Metodo Listado
		$obj_ctr->list_details_der_ctr($dts_ctr);
	}

}

/*Fin--------------------------------------------------------*/
?>