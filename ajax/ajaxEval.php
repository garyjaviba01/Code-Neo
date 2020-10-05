<?php
/*---------------------------------------------------------------------------------------------*/
#Titulo: AJAX DE EVENTOS
/*---------------------------------------------------------------------------------------------*/
#¶►(Llamado):Controladores◄#
require_once "../../controllers/EvalController.php";
#¶►(Llamado):Modelos◄#
require_once "../../models/EvalModel.php";
#►Descripcion: Se encarga de enviar los datos del filtro al controlador
#►Clase:
class AjaxEventos{
	#►Propiedades:-------------------------------------------------------------
	// Varaible para datos
	public $dataAjax;
	#►Metodo-1: Envia y recibe datos del cotroler 
	public function ajaxEvalUser(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::EvalUserCTR($dataController);
	}
	public function ajaxEvalUser2(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::EvalUserCTR2($dataController);
	}
		public function ajaxDetailConvo(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::DetailConvoCTR($dataController);
	}
	public function ajaxDetailConvo2(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::DetailConvoCTR2($dataController);
	}
	 public function ajaxlistprop(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::listpropCTR($dataController);
	}
	public function ajaxlistprop2(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::listpropCTR2($dataController);
	}
	public function ajaxDataProEva(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::DataProEvaCTR($dataController);
	}

	public function ajaxDataProEva2(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::DataProEvaCTR2($dataController);
	}
	public function ajaxListadoSubsanaciones(){
		//Paso de datos a la variable de envia al controlador
		    $dataController = $this->dataAjax;
			//Ejecutar funcion listar convocatorias
		   return EvalControllerCTR::ListadoSubsanacionesCTR($dataController);
	}
	
}

/*Fin------------------------------------------------------------------------------------------*/